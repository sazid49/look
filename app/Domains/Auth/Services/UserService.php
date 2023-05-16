<?php

namespace App\Domains\Auth\Services;

use App\Domains\Auth\Events\User\UserCreated;
use App\Domains\Auth\Events\User\UserDeleted;
use App\Domains\Auth\Events\User\UserDestroyed;
use App\Domains\Auth\Events\User\UserRestored;
use App\Domains\Auth\Events\User\UserStatusChanged;
use App\Domains\Auth\Events\User\UserUpdated;
use App\Domains\Auth\Models\User;
use App\Domains\Auth\Models\UserDetails;
use App\Domains\Company\Models\Company;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService.
 */
class UserService extends BaseService
{
	/**
	 * UserService constructor.
	 *
	 * @param  User  $user
	 */
	public function __construct(User $user, Company $company,UserDetails $userdetails)
	{
		$this->model = $user;
		$this->company = $company;
		$this->userdetails = $userdetails;
	}

	/**
	 * @param $type
	 * @param  bool|int  $perPage
	 * @return mixed
	 */
	public function getByType($type, $perPage = false)
	{
		if (is_numeric($perPage)) {
			return $this->model::byType($type)->paginate($perPage);
		}

		return $this->model::byType($type)->get();
	}

	/**
	 * @param  array  $data
	 * @return mixed
	 *
	 * @throws GeneralException
	 */
	public function registerUser(array $data = []): User
	{
		DB::beginTransaction();
		try {
			$data['name'] = $data['firstname'] . " " . $data['lastname'];
			$user = $this->createUser($data);

			$data['user_id'] = $user->id;

			$this->userdetails::query()->create($data);

			if ($data['company_name'] != "") {
				$data['claimed'] = 1;
				$data['claimed_by'] = $user->id;
				$data['inserted_by'] = $user->id;
				$data['updated_by'] = $user->id;

				$this->company::query()->create($data);
			}
		} catch (Exception $e) {
			// dd($e);
			DB::rollBack();
			throw new GeneralException(__('There was a problem creating your account.'));
		}

		DB::commit();

		return $user;
	}

	/**
	 * @param $info
	 * @param $provider
	 * @return mixed
	 *
	 * @throws GeneralException
	 */
	public function registerProvider($info, $provider): User
	{
		$user = $this->model::where('provider_id', $info->id)->first();

		if (!$user) {
			DB::beginTransaction();

			try {
				$user = $this->createUser([
					'name' => $info->name,
					'email' => $info->email,
					'provider' => $provider,
					'provider_id' => $info->id,
					'email_verified_at' => now(),
				]);
			} catch (Exception $e) {
				DB::rollBack();

				throw new GeneralException(__('There was a problem connecting to :provider', ['provider' => $provider]));
			}

			DB::commit();
		}

		return $user;
	}

	/**
	 * @param  array  $data
	 * @return User
	 *
	 * @throws GeneralException
	 * @throws \Throwable
	 */
	public function store(array $data = []): User
	{
		// dd($data['roles']);
		DB::beginTransaction();
		try {

			$avatar = "";
			if (!empty($data['avatar'])) {
				$avatar = $data['avatar']->store('/avatars', 'public');
			}

			$id_image = "";
			if (!empty($data['id_image'])) {
				$id_image = $data['id_image']->store('/id_image', 'public');
			}

			$user = $this->model::create([
				'type' => $data['type'] ?? "user",
				'name' => $data['firstname']." ".$data['lastname'],
				'email' => $data['email'],
				'email_verified_at' => isset($data['email_verified']) && $data['email_verified'] === '1' ? now() : null,
				'password' => $data['password'],
				'avatar' => $avatar,
				'id_image' => $id_image,
				'id_image_approve' => 0,
				'active' => isset($data['active']) && $data['active'] === '1',
				// 'canton_id' => $data['canton_id'] ?? null,
			]);

			$userdetails = new UserDetails;
			$userdetails->user_id = $user->id;
			$userdetails->firstname = $data['firstname'] ?? null;
			$userdetails->lastname = $data['lastname'] ?? null;
			$userdetails->postcode = $data['postcode'] ?? null;
			$userdetails->city = $data['city'] ?? null;
			$userdetails->address = $data['address'] ?? null;
			$userdetails->birthday = $data['birthday'] ?? null;
			$userdetails->phone = $data['phone'] ?? null;
			$userdetails->save();

			// $user->name = $data['firstname']." ".$data['lastname'];

			$user->syncRoles($data['roles'] ?? []);

			// if (!config('boilerplate.access.user.only_roles')) {
			// 	$user->syncPermissions($data['permissions'] ?? []);
			// }
		} catch (Exception $e) {
			DB::rollBack();
			// dd($e->getMessage());
			throw new GeneralException(__('There was a problem creating this user. Please try again.'));
		}

		event(new UserCreated($user));

		DB::commit();

		// They didn't want to auto verify the email, but do they want to send the confirmation email to do so?
		if (!isset($data['email_verified']) && isset($data['send_confirmation_email']) && $data['send_confirmation_email'] === '1') {
			$user->sendEmailVerificationNotification();
		}

		return $user;
	}

	/**
	 * @param  User  $user
	 * @param  array  $data
	 * @return User
	 *
	 * @throws \Throwable
	 */
	public function update(User $user, array $data = []): User
	{
		DB::beginTransaction();

		try {
			$dataArr = [
				// 'type' => $user->isMasterAdmin() ? $this->model::TYPE_ADMIN : $data['type'] ?? $user->type,
				'name' => $data['firstname']." ".$data['lastname'],
				'email' => $data['email'],
				'password' => $data['password'],
				'active' => isset($data['active']) && $data['active'] === '1',
			];

			if(!empty($data['password'])) {
				$dataArr['password'] = $data['password'];
			}

			if (!empty($data['avatar'])) {
				$dataArr['avatar'] = $data['avatar']->store('/avatars', 'public');
			}

			if (!empty($data['id_image'])) {
				$dataArr['id_image'] = $data['id_image']->store('/id_image', 'public');
			}

			$user->update($dataArr);

			$userdetails = UserDetails::find($user->userdetails->id);
			if (empty($userdetails)) {
				$userdetails = new UserDetails;
			}
			$userdetails->firstname = $data['firstname'];
			$userdetails->lastname = $data['lastname'];
			$userdetails->postcode = $data['postcode'] ?? null;
			$userdetails->city = $data['city'] ?? null;
			$userdetails->address = $data['address'] ?? null;
			$userdetails->birthday = $data['birthday'] ?? null;
			$userdetails->phone = $data['phone'] ?? null;
			$userdetails->save();
			$user->syncRoles($data['roles'] ?? []);
			// if (!$user->isMasterAdmin()) {
			// 	// Replace selected roles/permissions

			// 	if (!config('boilerplate.access.user.only_roles')) {
			// 		$user->syncPermissions($data['permissions'] ?? []);
			// 	}
			// }
		} catch (Exception $e) {
            dd($e);
			DB::rollBack();
			throw new GeneralException(__('There was a problem updating this user. Please try again.'));
		}

		//event(new UserUpdated($user));

		DB::commit();
		return $user;
	}

	/**
	 * @param  User  $user
	 * @param  array  $data
	 * @return User
	 */
	public function updateProfile(User $user,UserDetails $userdetails, array $data = []): User
	{
		$userdetails->firstname = $data['firstname'] ?? null;
		$userdetails->lastname = $data['lastname'] ?? null;
		$userdetails->postcode = $data['postcode'] ?? null;
		$userdetails->city = $data['city'] ?? null;
		$userdetails->address = $data['address'] ?? null;
		$userdetails->birthday = $data['birthday'] ?? null;
		$userdetails->phone = $data['phone'] ?? null;
		$userdetails->save();

		$user->name = $data['firstname']." ".$data['lastname'];

		if (!empty($data['avatar'])) {
			$user->avatar = $data['avatar']->store('/avatars', 'public');
		}

		if (!empty($data['id_image'])) {
			$user->id_image = $data['id_image']->store('/id_image', 'public');
		}

		// if ($user->canChangeEmail() && $user->email !== $data['email']) {
		// 	$user->email = $data['email'];
		// 	$user->email_verified_at = null;
		// 	$user->sendEmailVerificationNotification();
		// 	session()->flash('resent', true);
		// }

		return tap($user)->save();
	}

	/**
	 * @param  User  $user
	 * @param $data
	 * @param  bool  $expired
	 * @return User
	 *
	 * @throws \Throwable
	 */
	public function updatePassword(User $user, $data, $expired = false): User
	{
		if (isset($data['current_password'])) {
			throw_if(
				!Hash::check($data['current_password'], $user->password),
				new GeneralException(__('That is not your old password.'))
			);
		}

		// Reset the expiration clock
		if ($expired) {
			$user->password_changed_at = now();
		}

		$user->password = $data['password'];

		return tap($user)->update();
	}

	/**
	 * @param  User  $user
	 * @param $status
	 * @return User
	 *
	 * @throws GeneralException
	 */
	public function mark(User $user, $status): User
	{
		if ($status === 0 && auth()->id() === $user->id) {
			throw new GeneralException(__('You can not do that to yourself.'));
		}

		if ($status === 0 && $user->isMasterAdmin()) {
			throw new GeneralException(__('You can not deactivate the administrator account.'));
		}

		$user->active = $status;

		if ($user->save()) {
			event(new UserStatusChanged($user, $status));

			return $user;
		}

		throw new GeneralException(__('There was a problem updating this user. Please try again.'));
	}

	/**
	 * @param  User  $user
	 * @return User
	 *
	 * @throws GeneralException
	 */
	public function delete(User $user): User
	{
		if ($user->id === auth()->id()) {
			throw new GeneralException(__('You can not delete yourself.'));
		}

		if ($this->deleteById($user->id)) {
			event(new UserDeleted($user));

			return $user;
		}

		throw new GeneralException('There was a problem deleting this user. Please try again.');
	}

	/**
	 * @param  User  $user
	 * @return User
	 *
	 * @throws GeneralException
	 */
	public function restore(User $user): User
	{
		if ($user->restore()) {
			event(new UserRestored($user));

			return $user;
		}

		throw new GeneralException(__('There was a problem restoring this user. Please try again.'));
	}

	/**
	 * @param  User  $user
	 * @return bool
	 *
	 * @throws GeneralException
	 */
	public function destroy(User $user): bool
	{
		if ($user->forceDelete()) {
			event(new UserDestroyed($user));

			return true;
		}

		throw new GeneralException(__('There was a problem permanently deleting this user. Please try again.'));
	}

	/**
	 * @param  array  $data
	 * @return User
	 */
	protected function createUser(array $data = []): User
	{
		return $this->model::create([
			'type' => $data['type'] ?? $this->model::TYPE_USER,
			'name' => $data['name'] ?? null,
			'email' => $data['email'] ?? null,
			'password' => $data['password'] ?? null,
			'provider' => $data['provider'] ?? null,
			'provider_id' => $data['provider_id'] ?? null,
			'email_verified_at' => $data['email_verified_at'] ?? null,
			'active' => $data['active'] ?? true,
		]);
	}

	/**
	 * @param  User  $user
	 * @param  array  $data
	 * @return User
	 */
	public function updateAdminProfile(User $user,UserDetails $userdetails, array $data = []): UserDetails
	{
		$userdetails->firstname = $data['firstname'] ?? null;
		$userdetails->lastname = $data['lastname'] ?? null;
		$userdetails->save();

		$user->name = $data['firstname']." ".$data['lastname'];

		if (!empty($data['avatar'])) {
			$user->avatar = $data['avatar']->store('/avatars', 'public');
		}
		$user->save();

		/* if ($user->canChangeEmail() && $user->email !== $data['email']) {
            $user->email = $data['email'];
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
            session()->flash('resent', true);
        } */

		return tap($userdetails)->save();
	}

	/**
	 * @param  User  $user
	 * @param  array  $data
	 * @return User
	 */
	public function claimRegisterUser($data, $company)
	{
		// Figure out if email is not the same and check to see if email exists
		if ($this->model->where('email', '=', $data['email'])->first()) {
			throw new GeneralException(trans('exceptions.backend.access.admins.email_error'));
		}

		DB::beginTransaction();
		try {
			if (!Auth()->user()) {
				$user = $this->model::create([
					'type' => 'user',
					'name' => $data['firstname'] . ' ' . $data['lastname'],
					'email' => $data['email'],
					'password' => $data['password'],
					'active' => 1,
				]);
			} else {
				$user = Auth()->user();
			}

			$company->update([
				'company_name' => $data['company_name'],
				'firstname' => $data['firstname'] ?? $user->firstname,
				'lastname' => $data['lastname'] ?? $user->lastname,
				'email' => $data['email'],
				'address' => $data['address'],
				'postcode' => $data['postcode'],
				'city' => $data['city'],
				'phone_1' => $data['phone'],
				'website' => $data['website'],
				'claimed' => 1,
				'claimed_by' => $user->id,
				'inserted_by' => $user->id,
				'updated_by' => $user->id,
			]);
		} catch (Exception $e) {
			DB::rollBack();
			throw new GeneralException(__('There was a problem creating this user. Please try again.'));
		}

		event(new UserCreated($user));
		DB::commit();

		// They didn't want to auto verify the email, but do they want to send the confirmation email to do so?
		$user->sendEmailVerificationNotification();
	}
}
