@extends('backend.layouts.login')

@section('title', __('Login'))

@section('content')
    <div class="account-pages pt-sm-5">
        <h2 class="text-center">Admin Login</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">{{ appName() }}</h5>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ URL::asset('/assets/images/profile-img.png') }}" alt=""class="img-fluid"> 
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="javascript:void(0)" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ URL::asset('img/logo.png') }}" alt="{{ appName() }}" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="javascript:void(0)" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ URL::asset('img/logo.png') }}" alt="{{ appName() }}" class="rounded-circle1" height="13">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <x-forms.post :action="route('admin.login.post')">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="email" class="form-control" id="username"
                                            placeholder="Username">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">@lang('Password')</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="{{ __('Password') }}" aria-label="Password"
                                                aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                        <label class="form-check-label" for="remember-check">
                                            @lang('Remember Me')
                                        </label>
                                    </div>

                                    @if (env('ADMIN_LOGIN_CAPTCHA_STATUS'))
                                        <div class="row">
                                            @if (!env('RECAPTCHA_SITEKEY'))
                                                <div class="col">
                                                    @captcha
                                        			<input type="hidden" name="captcha_status" value="true" />
                                                </div>
                                            @else
                                                <div class="col mt-3">
                                                    <input type="hidden" name="captcha_status" value="true" />
                                                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITEKEY') }}"></div>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                    {{-- @if (config('access.captcha.login'))
                                        <div class="row">
                                            @if (!env('RECAPTCHA_SITEKEY'))
                                                <div class="col">
                                                    @captcha
                                                    {{ html()->hidden('captcha_status', 'true') }}
                                                </div>
                                            @else
                                                <div class="col mt-3">
                                                    {{ html()->hidden('captcha_status', 'true') }}
                                                    <div class="g-recaptcha"
                                                        data-sitekey="{{ env('RECAPTCHA_SITEKEY') }}"></div>
                                                </div>
                                            @endif
                                        </div>
                                    @endif --}}

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light"
                                            type="submit">Login</button>
                                    </div>
                                </x-forms.post>
                            </div>

                        </div>
                    </div>
                    <div class="text-center">
                        <div>
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Powered <i class="mdi mdi-heart text-danger"></i> by
                                Lookon. | &copy; Copyrights {{ date('Y') }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    @if (config('access.captcha.login'))
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            var _submitForm, _captchaForm, _captchaSubmit, _execute = true;
        </script>___scripts_3___
    @endif
@endpush
