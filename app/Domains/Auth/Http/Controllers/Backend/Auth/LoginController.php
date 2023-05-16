<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Auth;

use App\Domains\Auth\Events\User\UserLoggedIn;
use App\Domains\Auth\Models\User;
use App\Rules\CaptchaV2;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;
use App\Models\SMSTemplate;

/**
 * Class LoginController.
 */
class LoginController
{
	/*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @return string
	 */
	public function redirectPath()
	{
		return route(homeRoute());
	}

	/**
	 * Show the application's login form.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showLoginForm()
	{
		return view('frontend.auth.login');
	}

	/**
	 * Show the application's admin form.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showAdminLoginForm()
	{
		return view('backend.auth.login');
	}

	/**
	 * Validate the user login request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return void
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function validateLogin(Request $request)
	{
		$request->validate([
			$this->username() => ['required', 'max:255', 'string'],
			'password' => array_merge(['max:100'], PasswordRules::login()),
			'g-recaptcha-response' => ['required_if:captcha_status,true', new CaptchaV2],
		], [
			'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha']),
		]);
	}

	/**
	 * Overidden for 2FA
	 * https://github.com/DarkGhostHunter/Laraguard#protecting-the-login.
	 *
	 * Attempt to log the user into the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return bool
	 */
	protected function attemptLogin(Request $request)
	{
		try {
			return $this->guard()->attempt(
				$this->credentials($request),
				$request->filled('remember')
			);
		} catch (HttpResponseException $exception) {
			$this->incrementLoginAttempts($request);

			throw $exception;
		}
	}

	/**
	 * The user has been authenticated.
	 *
	 * @param  Request  $request
	 * @param $user
	 * @return mixed
	 */
	protected function authenticated(Request $request, $user)
	{
		if (!$user->isActive()) {
			auth()->logout();

			return redirect()->route('frontend.auth.login')->withFlashDanger(__('Your account has been deactivated.'));
		}

		event(new UserLoggedIn($user));

		if (config('boilerplate.access.user.single_login')) {
			auth()->logoutOtherDevices($request->password);
		}
	}



	public function login(Request $request)
	{
		$this->validateLogin($request);
		if (
			method_exists($this, 'hasTooManyLoginAttempts') &&
			$this->hasTooManyLoginAttempts($request)
		) {
			$this->fireLockoutEvent($request);

			return $this->sendLockoutResponse($request);
		}

		if ($this->attemptLogin($request)) {

			// $otp = mt_rand(1000, 9999);
			$user = Auth::user();
			if (!$user->isActive()) {
				auth()->logout();
				throw new GeneralException(__('exceptions.frontend.auth.deactivated'));
			}

			$is_administrator = $request->user()->hasRole(config('boilerplate.access.role.admin'));

			if ($is_administrator) {
				// Is user Administrator ?
				return redirect()->route('admin.dashboard');
			} else {
				return redirect()->route('frontend.index');
			}
		}

		$this->incrementLoginAttempts($request);
		return $this->sendFailedLoginResponse($request);
	}


	public function checkOtp(Request $request)
	{
		$email = $request->session()->get('email');
		if (empty($email)) {
			return redirect()->route('frontend.index');
		}
		return view('frontend.auth.check_otp');
	}

	public function verifyOTP(Request $request)
	{
		$email = $request->session()->get('email');
		if (!empty($email)) {
			$userDetail = User::where('email', $email)->first();
			if (empty($userDetail)) {
				return redirect()->route('frontend.index');
			} else {
				$otp = implode("", $request->otp);
				if ($userDetail->otp == $otp) {

					Auth::loginUsingId($userDetail->id);
					// Is user Administrator ?
					$is_administrator = $request->user()->hasRole(config('boilerplate.access.role.admin'));
					if ($is_administrator) {
						return redirect()->route('admin.dashboard');
					}
					return redirect()->route('frontend.user.dashboard');
				} else {
					return redirect()->back()->withFlashDanger('OTP is wrong! Please enter correct OTP.');
				}
			}
		} else {
			return redirect()->route('frontend.index');
		}
	}
}
