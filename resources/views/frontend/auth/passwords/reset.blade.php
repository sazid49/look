@extends('frontend.layouts.legacy.app')

@section('title', __('Reset Password'))

@section('content')

    <!-- Forgot Password Form -->
    <div class="form-wrapper1" id="forgot">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="listing-overview" class="listing-section p-0 p-md-2 card">
                    <div class="card-header subtitle border-bottom pb-3">
                        <h5>@lang('Reset Password')</h5>
                    </div>

                    <div class=" card-body">
                        <form action="{{route('frontend.auth.password.update')}}" method="POST" id="forgot-pass-form">
                            <input type="hidden" name="token" value="{{ $token }}"/>
                            @csrf
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">@lang('E-mail Address')</label>

                                <div class="col-md-6">
                                    <input type="email" name="email" id="email" class="form-control"
                                           placeholder="{{ __('E-mail Address') }}" value="{{ $email ?? old('email') }}"
                                           maxlength="255" required autofocus autocomplete="email"/>
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">@lang('Password')</label>

                                <div class="col-md-6">
                                    <input type="password" id="password" name="password" class="form-control"
                                           placeholder="{{ __('Password') }}" maxlength="100" required
                                           autocomplete="password"/>
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="password_confirmation"
                                       class="col-md-4 col-form-label text-md-right">@lang('Password Confirmation')</label>

                                <div class="col-md-6">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                           class="form-control" placeholder="{{ __('Password Confirmation') }}"
                                           maxlength="100" required autocomplete="new-password"/>
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="btn-forgot-password" type="submit"
                                            class="button btn btn-theme btn-rounded mt-3 mt-md-4 d-flex align-items-center justify-content-center">
                                        <i data-feather="key" class="mr-2"></i>
                                        <span>@lang('Reset Password')</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br><br>
@endsection

@push('after-scripts')
    <script type="text/javascript">
        $(function () {
        })
    </script>
@endpush
