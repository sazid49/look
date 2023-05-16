@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Update User'))

@section('content')
    <x-forms.patch :action="route('admin.auth.user.update', $user)" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update User')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : '{{ $user->type }}'}">
                    {{-- @if (!$user->isMasterAdmin())
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">@lang('Type')</label>

                            <div class="col-md-10">
                                <select name="type" class="form-control" required x-on:change="userType = $event.target.value">
                                    <option value="{{ $model::TYPE_USER }}" {{ $user->type === $model::TYPE_USER ? 'selected' : '' }}>@lang('User')</option>
                                    <option value="{{ $model::TYPE_ADMIN }}" {{ $user->type === $model::TYPE_ADMIN ? 'selected' : '' }}>@lang('Administrator')</option>
                                </select>
                            </div>
                        </div><!--form-group-->
                    @endif --}}
					<div class="row">
                        <div class="col-md-6">
							<div class="form-group row mb-3">
                                <label for="firstname" class="col-md-3 col-form-label">@lang('Firstname')</label>
                                <div class="col-md-9">
                                    <input type="text" name="firstname" class="form-control"
                                        placeholder="{{ __('Firstname') }}" value="{{ old('firstname',$user->userdetails->firstname) }}" maxlength="100"
                                        required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="email" class="col-md-3 col-form-label">@lang('E-mail Address')</label>

                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="{{ __('E-mail Address') }}" value="{{ old('email',$user->email) }}" maxlength="255"
                                        required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="city"
                                    class="col-md-3 col-form-label text-md-right">@lang('City')</label>

                                <div class="col-md-9">
                                    <input type="text" name="city" class="form-control"
                                        placeholder="{{ __('city') }}" value="{{ old('city',$user->userdetails->city) }}" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="email"
                                    class="col-md-3 col-form-label text-md-right">@lang('Profile Photo')</label>
                                <div class="col-md-9">
									@if (Storage::disk('public')->exists($user->avatar))
										<img class="rounded-circle1 mb-2" style="max-height: 100px" src="{{ url('storage/'.$user->avatar) }}" />
									@endif
                                    <input type="file" name="avatar" class="form-control" />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="email"
                                    class="col-md-3 col-form-label text-md-right">@lang('ID Image')</label>
                                <div class="col-md-9">
									@if (Storage::disk('public')->exists($user->id_image))
										<img class="rounded-circle1 mb-2" style="max-height: 100px" src="{{ url('storage/'.$user->id_image) }}" />
									@endif
                                    <input type="file" name="id_image" class="form-control" />
                                </div>
                            </div>
                            <!--form-group-->

							<div class="form-group row mb-3">
                                <label for="active" class="col-md-3 col-form-label">@lang('Active')</label>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input name="active" id="active" class="form-check-input" type="checkbox"
                                            value="1" {{ old('active', $user->active) ? 'checked' : '' }} />
                                    </div>
                                    <!--form-check-->
                                </div>
                            </div>
                            <!--form-group-->

							<div class="form-group row mb-3">
								<label for="password_confirmation"
									class="col-md-3 col-form-label">@lang('Roles')</label>

								<div class="col-md-9 pt-2">
									@foreach ($roles as $role)
										<label for="{{ $role->id }}">
											{{-- <input type="radio" name="roles[]" id="{{ $role->id }}" value="{{ $role->name }}" --}}
											<input type="radio" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->id }}" class="form-check-input" {{ (old('rules') && in_array($role->id, old('rules'), true)) || (isset($user) && in_array($role->id, $user->roles->modelKeys(), true)) ? 'checked' : '' }} /> {{ $role->name }}
										</label>
										&nbsp; &nbsp;
									@endforeach
								</div>
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group row mb-3">
                                <label for="lastname" class="col-md-3 col-form-label">@lang('Lastname')</label>

                                <div class="col-md-9">
                                    <input type="text" name="lastname" class="form-control"
                                        placeholder="{{ __('Lastname') }}" value="{{ old('lastname',$user->userdetails->lastname) }}" maxlength="100"
                                        required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="postcode"
                                    class="col-md-3 col-form-label text-md-right">@lang('Postcode')</label>

                                <div class="col-md-9">
                                    <input type="text" name="postcode" class="form-control"
                                        placeholder="{{ __('postcode') }}" value="{{ old('postcode',$user->userdetails->postcode) }}" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="phone"
                                    class="col-md-3 col-form-label text-md-right">@lang('Phone')</label>

                                <div class="col-md-9">
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="{{ __('phone') }}" value="{{ old('phone',$user->userdetails->phone) }}" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="birthday"
                                    class="col-md-3 col-form-label text-md-right">@lang('Birthday')</label>

                                <div class="col-md-9">
                                    <input type="date" name="birthday" class="form-control"
                                        placeholder="{{ __('birthday') }}"
                                        value="{{ old('birthday',$user->userdetails->birthday) }}"
                                        required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="address"
                                    class="col-md-3 col-form-label text-md-right">@lang('Address')</label>

                                <div class="col-md-9">
                                    <textarea name="address" id="address" class="form-control" cols="30" rows="3">{{ old('address', $user->userdetails->address) }}</textarea>
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="password" class="col-md-3 col-form-label">@lang('Password')</label>

                                <div class="col-md-9">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="{{ __('Password') }}" maxlength="100"
                                        autocomplete="new-password" />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="password_confirmation"
                                    class="col-md-3 col-form-label">@lang('Password Confirmation')</label>

                                <div class="col-md-9">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" placeholder="{{ __('Password Confirmation') }}"
                                        maxlength="100" autocomplete="new-password" />
                                </div>
                            </div>
                            <!--form-group-->
						</div>
					</div>

                    {{-- <div class="form-group row mt-2">
                        <label for="password_confirmation" class="col-md-2 col-form-label">@lang('Canton')</label>

                        <div class="col-md-10">
                            <select class="form-control" name="canton_id">
                                <option>Select</option>
                                @foreach($cantonData as  $canton)
                                    <option value="{{ $canton->id }}" @if($user->canton_id == $canton->id) selected @endif>{{ $canton->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!--form-group-->

                    @if (!$user->isMasterAdmin())
                        @include('backend.auth.includes.roles')

                        @if (!config('boilerplate.access.user.only_roles'))
                            @include('backend.auth.includes.permissions')
                        @endif
                    @endif --}}
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update User')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
