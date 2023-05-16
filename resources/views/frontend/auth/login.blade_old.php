@extends('frontend.layouts.legacy.app')

@section('title', __('Login'))

@section('content')

    <!-- Login Form
                    ================================================== -->
    <div class="form-wrapper active" id="login">
        <div class="row sticky-wrapper">
            <div class="col-lg-8 col-md-8 pr-md-0">
                <div id="listing-overview" class="listing-section p-0 p-md-2 card">

                    <div class="card-header subtitle border-bottom pb-3">
                        <h5>{{__('labels.login.title')}}</h5>
                    </div>
                    <div class=" card-body">
                        <div class="row sticky-wrapper">
                            <div class="col-lg-12 col-md-12 ">
                                <form action="{{route('frontend.auth.login')}}" method="POST"
                                      class="form-horizontal needs-validation margin5px" novalidate>
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">{{__('labels.login.email')}}</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="password">{{__('labels.login.password')}}</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                               required>
                                    </div>

                                    @if(config('boilerplate.access.captcha.login'))
                                        <div class="row">
                                            <div class="col">
                                                @captcha
                                                <input type="hidden" name="captcha_status" value="true"/>
                                            </div><!--col-->
                                        </div><!--row-->
                                    @endif

                                    <div class="d-md-flex justify-content-between align-items-center mt-4 ">
                                        <button type="submit" id="btn-login"
                                                class="mb-3 mb-md-0 button btn btn-theme btn-rounded  d-flex align-items-center justify-content-center">
                                            <i data-feather="log-in" class="mr-2"></i>
                                            <span>{{__('labels.login.title')}}</span>
                                        </button>
                                        <a href="{{route('frontend.auth.password.request')}}"
                                           class="form-change d-block text-center text-md-right">
                                            {{__('labels.login.forgot_your_password')}}
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Login Sidebar
                    ================================================== -->
            <div class="col-lg-4 col-md-4 margin-top-0 sticky login-sidebar justify-content-center flex-wrap px-md-0">
                <div class="form-sidebar-body">
                    <div class="form-sidebar-title pb-3 ">
                        <h4>{{__('labels.login.title')}}</h4>
                    </div>
                    <div class="py-3 py-md-4">
                        <ul class="liste-okey form-sidebar-list pl-0 list-unstyled mb-0">
                            <li>Bewertungen abgeben</li>
                            <li>Massgeschneiderte Offerten einholen</li>
                            <li>Auf verschiedene Unternehmen bewerben</li>
                        </ul>
                    </div>


                    <div class="text-center sign-up-controls">
                        {{__('labels.login.dont_have_an_account')}}

                        <a href="{{route('frontend.auth.register')}}"
                           class="form-change button btn btn-theme-alt btn-rounded btn-block mt-2 text-white resgisetrformclick d-flex align-items-center justify-content-center">
                            <i data-feather="user-plus" class="mr-2"></i>
                            <span>{{__('labels.register.title')}}</span>
                        </a>
                    </div>
                    <div class="text-center sign-in-controls" style="display: none;">
                        <?= __ ( 'already_have_an_account' ) ?>
                        <a href="#login" class="form-change"><?= __ ( 'login' ) ?></a>
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
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush
