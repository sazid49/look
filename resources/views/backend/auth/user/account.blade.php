@extends('backend.layouts.app')

@section('title', __('My Account'))

@section('content')
    <section id="pt-slider" class="cust_padding_top">
        <div class="container cust_padding_bottom">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <x-frontend.card>
                        <x-slot name="header">
                            <h5>@lang('My Profile')</h5>
                        </x-slot>
                        <x-slot name="body">
                            <x-forms.patch :action="route('admin.auth.update')" enctype="multipart/form-data">
								<div class="form-group row">
									<label for="firstname" class="col-md-3 col-form-label text-md-right">@lang('Firstname')</label>

									<div class="col-md-9">
										<input type="text" name="firstname" class="form-control" placeholder="{{ __('Firstname') }}" value="{{ old('firstname') ?? $logged_in_user->userdetails->firstname }}" required autofocus autocomplete="name" />
									</div>
								</div>
								<!--form-group--><br>

								<div class="form-group row">
									<label for="lastname" class="col-md-3 col-form-label text-md-right">@lang('Lastname')</label>

									<div class="col-md-9">
										<input type="text" name="lastname" class="form-control" placeholder="{{ __('Lastname') }}" value="{{ old('lastname') ?? $logged_in_user->userdetails->lastname }}" required autofocus autocomplete="name" />
									</div>
								</div>
								<!--form-group--><br>

								<div class="form-group row">
									<label for="email" class="col-md-3 col-form-label text-md-right">@lang('Profile Photo')</label>
									<div class="col-md-9">
										<input type="file" name="avatar" class="form-control" />
									</div>
								</div>
								<!--form-group--><br>

								<div class="form-group row">
									<label for="email" class="col-md-3 col-form-label text-md-right">@lang('E-mail Address')</label>
									<div class="col-md-9">
										<input type="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? $logged_in_user->email }}" disabled />
									</div>
								</div>
								<!--form-group-->

								<div class="form-group row">
									<div class="col-md-12 offset-md-3 text-right">
										<button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Profile')</button>
									</div>
								</div>
								<!--form-group-->
							</x-forms.patch>
                        </x-slot>
                    </x-frontend.card>
                </div>
                <div class="col-md-6">
                    <x-frontend.card>
                        <x-slot name="header">
                            <h5>Change Password</h5>
                        </x-slot>
                        <x-slot name="body">
                            <x-forms.patch :action="route('admin.auth.updatePassword')">
								<div class="form-group row mt-3">
									<label for="current_password" class="col-md-4 col-form-label text-md-right">@lang('Current Password')</label>

									<div class="col-md-8">
										<input type="password" name="current_password" class="form-control" placeholder="{{ __('Current Password') }}" maxlength="100" required autofocus />
									</div>
								</div><!--form-group-->

								<div class="form-group row mt-3">
									<label for="password" class="col-md-4 col-form-label text-md-right">@lang('New Password')</label>

									<div class="col-md-8">
										<input type="password" name="password" class="form-control" placeholder="{{ __('New Password') }}" maxlength="100" required />
									</div>
								</div><!--form-group-->

								<div class="form-group row mt-3">
									<label for="password_confirmation" class="col-md-4 col-form-label text-md-right">@lang('New Password Confirmation')</label>

									<div class="col-md-8">
										<input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('New Password Confirmation') }}" maxlength="100" required />
									</div>
								</div><!--form-group-->

								<div class="form-group row mt-0">
									<div class="col-md-4 text-right">&nbsp;</div>
									<div class="col-md-8 text-right">
										<button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Password')</button>
									</div>
								</div><!--form-group-->
							</x-forms.patch>
                        </x-slot>
                    </x-frontend.card>
                </div>
            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
@endsection
