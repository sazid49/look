@extends('frontend.layouts.legacy.panel')

@section('title', __('My Account'))

@section('content')
    <section id="pt-slider" class="cust_padding_top">
        <div class="container cust_padding_bottom">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <x-frontend.card>
                        <x-slot name="header">
                            <h5>@lang('My Profile')</h5>
                        </x-slot>
                        <x-slot name="body">
                            <x-forms.patch :action="route('frontend.user.profile.update')" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label for="firstname" class="col-md-3 col-form-label text-md-right">@lang('Firstname')</label>

											<div class="col-md-9">
												<input type="text" name="firstname" class="form-control" placeholder="{{ __('Firstname') }}" value="{{ old('firstname') ?? $logged_in_user->userdetails->firstname }}" required autofocus autocomplete="name" />
											</div>
										</div>
										<!--form-group--><br>

										<div class="form-group row">
											<label for="email" class="col-md-3 col-form-label text-md-right">@lang('E-mail Address')</label>
											<div class="col-md-9">
												<input type="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? $logged_in_user->email }}" disabled />
											</div>
										</div>
										<br>

										<div class="form-group row">
											<label for="city" class="col-md-3 col-form-label text-md-right">@lang('City')</label>

											<div class="col-md-9">
												<input type="text" name="city" class="form-control" placeholder="{{ __('city') }}" value="{{ old('city') ?? $logged_in_user->userdetails->city }}" required />
											</div>
										</div>
										<!--form-group--><br>

										<div class="form-group row">
											<label for="email" class="col-md-3 col-form-label text-md-right">@lang('Profile Photo')</label>
											<div class="col-md-9">
												@if (Storage::disk('public')->exists($logged_in_user->avatar_location))
													<img class="rounded-circle1 mb-2" style="max-height: 100px" src="{{ url('storage/'.$logged_in_user->avatar_location) }}" />
												@endif
												<input type="file" name="avatar_location" class="form-control" />
											</div>
										</div>
										<!--form-group--><br>

										<div class="form-group row">
											<label for="email" class="col-md-3 col-form-label text-md-right">@lang('ID Image')</label>
											<div class="col-md-9">
												@if (Storage::disk('public')->exists($logged_in_user->id_image))
													<img class="rounded-circle1 mb-2" style="max-height: 100px" src="{{ url('storage/'.$logged_in_user->id_image) }}" />
												@endif
												<input type="file" name="id_image" class="form-control" />
											</div>
										</div>
										<!--form-group--><br>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label for="lastname" class="col-md-3 col-form-label text-md-right">@lang('Lastname')</label>

											<div class="col-md-9">
												<input type="text" name="lastname" class="form-control" placeholder="{{ __('Lastname') }}" value="{{ old('lastname') ?? $logged_in_user->userdetails->lastname }}" required autofocus autocomplete="name" />
											</div>
										</div>
										<!--form-group--><br>

										<div class="form-group row">
											<label for="postcode" class="col-md-3 col-form-label text-md-right">@lang('Postcode')</label>

											<div class="col-md-9">
												<input type="text" name="postcode" class="form-control" placeholder="{{ __('postcode') }}" value="{{ old('postcode') ?? $logged_in_user->userdetails->postcode }}" required />
											</div>
										</div>
										<!--form-group--><br>

										<div class="form-group row">
											<label for="phone" class="col-md-3 col-form-label text-md-right">@lang('Phone')</label>

											<div class="col-md-9">
												<input type="text" name="phone" class="form-control" placeholder="{{ __('phone') }}" value="{{ old('phone') ?? $logged_in_user->userdetails->phone }}" required />
											</div>
										</div>
										<!--form-group--><br>

										<div class="form-group row">
											<label for="address" class="col-md-3 col-form-label text-md-right">@lang('Address')</label>

											<div class="col-md-9">
												<textarea name="address" id="address" class="form-control"  cols="30" rows="3">{{ old('address',$logged_in_user->userdetails->address) }}</textarea>
											</div>
										</div>
										<!--form-group--><br>

										<div class="form-group row">
											<label for="birthday" class="col-md-3 col-form-label text-md-right">@lang('Birthday')</label>

											<div class="col-md-9">
												<input type="date" name="birthday" class="form-control" placeholder="{{ __('birthday') }}" value="{{ old('birthday') ?? $logged_in_user->userdetails->birthday }}" required />
											</div>
										</div>
										<!--form-group--><br>
									</div>
									<div class="col-md-12">
										<div class="form-group row"><br>
											<div class="col-md-12 offset-md-5 text-right">
												<button class="btn btn-primary float-right" type="submit">@lang('Update Profile')</button>
											</div>
										</div>
										<!--form-group-->
									</div>
								</div>


							</x-forms.patch>
                        </x-slot>
                    </x-frontend.card>
                </div>
                <div class="col-md-12">
                    <x-frontend.card>
                        <x-slot name="header">
                            <h5>Change Password</h5>
                        </x-slot>
                        <x-slot name="body">
                            <x-forms.patch :action="route('frontend.auth.password.change')">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group mt-3">
											<label for="current_password" class="col-form-label text-md-right">@lang('Current Password')</label>
											<input type="password" name="current_password" class="form-control" placeholder="{{ __('Current Password') }}" maxlength="100" required autofocus />
										</div><!--form-group-->
									</div>
									<div class="col-md-4">
										<div class="form-group mt-3">
											<label for="password" class="col-form-label text-md-right">@lang('New Password')</label>
											<input type="password" name="password" class="form-control" placeholder="{{ __('New Password') }}" maxlength="100" required />
										</div><!--form-group-->
									</div>
									<div class="col-md-4">
										<div class="form-group mt-3">
											<label for="password_confirmation" class="col-form-label text-md-right">@lang('New Password Confirmation')</label>
											<input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('New Password Confirmation') }}" maxlength="100" required />
										</div><!--form-group-->
									</div>
								</div>

								<div class="form-group row mt-3">
									<div class="row"><br>
										<div class="col-md-12 offset-md-5">
											<button class="btn btn-primary float-right" type="submit">@lang('Update Password')</button>
										</div>
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
