<?php
namespace App\Http\Controllers\Backend;

use App\Domains\Auth\Http\Requests\Frontend\Auth\UpdatePasswordRequest;
use App\Domains\Auth\Models\CountryCode;
use App\Domains\Auth\Models\Company;
use App\Domains\Auth\Services\UserService;
use App\Http\Requests\Backend\UpdateProfileRequest;

/**
 * Class AccountController.
 */
class AccountController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // $user           = auth()->user();
        // $company_detail = Company::where('user_id', $user->id)->first();

        return view('backend.auth.user.account');//->with('company_detail',$company_detail);
    }

	/**
	 * @param  UpdateProfileRequest  $request
	 * @param  UserService  $userService
	 * @return mixed
	 */
	public function update(UpdateProfileRequest $request, UserService $userService)
	{
		$userService->updateAdminProfile($request->user(),$request->user()->userdetails, $request->validated());
		return redirect()->route('admin.auth.account')->withFlashSuccess(__('Profile successfully updated.'));
		/* if (session()->has('resent')) {
			return redirect()->route('frontend.auth.verification.notice')->withFlashInfo(__('You must confirm your new e-mail address before you can go any further.'));
		} */
	}

	/**
     * @param  UpdatePasswordRequest  $request
     * @return mixed
     *
     * @throws \Throwable
     */
    public function updatePassword(UpdatePasswordRequest $request, UserService $userService)
    {
        $userService->updatePassword($request->user(), $request->validated());

        return redirect()->route('admin.auth.account')->withFlashSuccess(__('Password successfully updated.'));
    }

}
