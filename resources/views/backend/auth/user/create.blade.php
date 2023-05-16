@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Create User'))

@section('content')
    <x-forms.post :action="route('admin.auth.user.store')" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create User')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{ userType: '{{ $model::TYPE_USER }}' }">
                    {{-- <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label">@lang('Type')</label>

                        <div class="col-md-9">
                            <select name="type" class="form-control" required x-on:change="userType = $event.target.value">
                                <option value="{{ $model::TYPE_USER }}">@lang('User')</option>
                                <option value="{{ $model::TYPE_ADMIN }}">@lang('Administrator')</option>
                            </select>
                        </div>
                    </div> --}}
                    <!--form-group-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row mb-3">
                                <label for="firstname" class="col-md-3 col-form-label">@lang('Firstname')</label>

                                <div class="col-md-9">
                                    <input type="text" name="firstname" class="form-control"
                                        placeholder="{{ __('Firstname') }}" value="{{ old('firstname') }}" maxlength="100"
                                        required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="email" class="col-md-3 col-form-label">@lang('E-mail Address')</label>

                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255"
                                        required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="city"
                                    class="col-md-3 col-form-label text-md-right">@lang('City')</label>

                                <div class="col-md-9">
                                    <input type="text" name="city" class="form-control"
                                        placeholder="{{ __('city') }}" value="{{ old('city') }}" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="email"
                                    class="col-md-3 col-form-label text-md-right">@lang('Profile Photo')</label>
                                <div class="col-md-9">
                                    <input type="file" name="avatar_location" class="form-control" />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="email"
                                    class="col-md-3 col-form-label text-md-right">@lang('ID Image')</label>
                                <div class="col-md-9">
                                    <input type="file" name="id_image" class="form-control" />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="active" class="col-md-5 col-form-label">@lang('Active')</label>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input name="active" id="active" class="form-check-input" type="checkbox"
                                            value="1" {{ old('active', true) ? 'checked' : '' }} />
                                    </div>
                                    <!--form-check-->
                                </div>
                            </div>
                            <!--form-group-->

                            <div x-data="{ emailVerified: false }">
                                <div class="form-group row mb-3">
                                    <label for="email_verified" class="col-md-5 col-form-label">@lang('E-mail Verified')</label>

                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" name="email_verified" id="email_verified" value="1"
                                                class="form-check-input" x-on:click="emailVerified = !emailVerified"
                                                {{ old('email_verified') ? 'checked' : '' }} />
                                        </div>
                                        <!--form-check-->
                                    </div>
                                </div>
                                <!--form-group-->

                                <div x-show="!emailVerified">
                                    <div class="form-group row mb-3">
                                        <label for="send_confirmation_email"
                                            class="col-md-5 col-form-label">@lang('Send Confirmation E-mail')</label>

                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input type="checkbox" name="send_confirmation_email"
                                                    id="send_confirmation_email" value="1" class="form-check-input"
                                                    {{ old('send_confirmation_email') ? 'checked' : '' }} />
                                            </div>
                                            <!--form-check-->
                                        </div>
                                    </div>
                                    <!--form-group-->
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="password_confirmation"
                                    class="col-md-3 col-form-label">@lang('Roles')</label>

                                <div class="col-md-9 pt-2">
                                    @foreach ($roles as $role)
                                        <label for="{{ $role->id }}">
                                            {{-- <input type="radio" name="roles[]" id="{{ $role->id }}"
                                                value="{{ $role->name }}"
                                                {{ old('roles[]', 'user_company') == $role->name ? 'checked' : '' }}> --}}
											<input type="radio" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->id }}" class="form-check-input" {{ (old('rules') && in_array($role->id, old('rules'), true)) ? 'checked' : '' }} /> {{ $role->title }}
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
                                        placeholder="{{ __('Lastname') }}" value="{{ old('lastname') }}" maxlength="100"
                                        required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="postcode"
                                    class="col-md-3 col-form-label text-md-right">@lang('Postcode')</label>

                                <div class="col-md-9">
                                    <input type="text" name="postcode" class="form-control"
                                        placeholder="{{ __('postcode') }}" value="{{ old('postcode') }}" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="phone"
                                    class="col-md-3 col-form-label text-md-right">@lang('Phone')</label>

                                <div class="col-md-9">
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="{{ __('phone') }}" value="{{ old('phone') }}" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="birthday"
                                    class="col-md-3 col-form-label text-md-right">@lang('Birthday')</label>

                                <div class="col-md-9">
                                    <input type="date" name="birthday" class="form-control"
                                        placeholder="{{ __('birthday') }}" value="{{ old('birthday') }}" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="address"
                                    class="col-md-3 col-form-label text-md-right">@lang('Address')</label>

                                <div class="col-md-9">
                                    <textarea name="address" id="address" class="form-control" cols="30" rows="3">{{ old('address') }}</textarea>
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row mb-3">
                                <label for="password" class="col-md-3 col-form-label">@lang('Password')</label>

                                <div class="col-md-9">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="{{ __('Password') }}" maxlength="100" required
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
                                        maxlength="100" required autocomplete="new-password" />
                                </div>
                            </div>
                            <!--form-group-->
                        </div>


                        {{-- @include('backend.auth.includes.roles')

                    @if (!config('boilerplate.access.user.only_roles'))
                        @include('backend.auth.includes.permissions')
                    @endif --}}

                        {{-- <div class="form-group row mt-2">
                        <label for="password_confirmation" class="col-md-3 col-form-label">@lang('Canton')</label>

                        <div class="col-md-9">
                            <select class="form-control" name="canton_id">
                                <option>Select</option>
                                @foreach ($cantonData as $canton)
                                    <option value="{{ $canton->id }}">{{ $canton->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!--form-group--> --}}


                    </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create User')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
