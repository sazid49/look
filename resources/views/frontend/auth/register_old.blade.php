@extends('frontend.layouts.legacy.app')

@section('title', __('Register'))

@section('content')

    <!-- Login Form
                    ================================================== -->
    {{-- <div class="form-wrapper active" id="login">
        <div class="row sticky-wrapper">
            <div class="col-lg-8 col-md-8 pr-md-0">
                <div id="listing-overview" class="listing-section p-0 p-md-2 card">

                    <div class="card-header subtitle border-bottom pb-3">
                        <h5>Einloggen</h5>
                    </div>
                    <div class=" card-body">
                        <div class="row sticky-wrapper">
                            <div class="col-lg-12 col-md-12 ">
                                <form class="form-horizontal needs-validation margin5px" novalidate>

                                    <div class="form-group">
                                        <label for="email"><?php echo __('email'); ?></label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="password"><?php echo __('password'); ?></label>
                                        <input type="password" id="password" name="password" class="form-control" required>
                                    </div>

                                    <div class="d-md-flex justify-content-between align-items-center mt-4 ">
                                        <button type="submit" id="btn-login"
                                            class="mb-3 mb-md-0 button btn btn-theme btn-rounded  d-flex align-items-center justify-content-center"
                                            data-loading-text="<?= __('logging_in') ?>">
                                            <i data-feather="log-in" class="mr-2"></i><span><?= __('login') ?></span>
                                        </button>
                                        <a href="#forgot" class="form-change d-block text-center text-md-right">
                                            <?= __('forgot_password') ?>
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
                        <h4> <?php echo __('login'); ?></h4>
                    </div>
                    <div class="py-3 py-md-4">
                        <ul class="liste-okey form-sidebar-list pl-0 list-unstyled mb-0">
                            <li>Bewertungen abgeben</li>
                            <li>Massgeschneiderte Offerten einholen</li>
                            <li>Auf verschiedene Unternehmen bewerben</li>
                        </ul>
                    </div>


                    <div class="text-center sign-up-controls">
                        <?= __('dont_have_an_account') ?>

                        <a href="#create"
                            class="form-change button btn btn-theme-alt btn-rounded btn-block mt-2 text-white resgisetrformclick d-flex align-items-center justify-content-center">
                            <i data-feather="user-plus" class="mr-2"></i><span><?= __('sign_up') ?></span></a>
                    </div>
                    <div class="text-center sign-in-controls" style="display: none;">
                        <?= __('already_have_an_account') ?>
                        <a href="#login" class="form-change"><?= __('login') ?></a>
                    </div>


                </div>


            </div>

        </div>
    </div> --}}


    <!-- Registration Form
                    ================================================== -->
    <br><br>
    <div class="form-wrapper1" id="create">
        <div class="row sticky-wrapper">
            <div class="col-lg-8 col-md-8 pr-md-0">
                <div id="listing-overview" class="listing-section card p-0 p-md-2">

                    <div class="card-header subtitle border-bottom pb-3">
                        <h5>{{__('labels.register.page_heading_title')}}</h5>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{route('frontend.auth.register')}}" class="form-custom-responsive">
                            @csrf

                            <div class="row form-group">
                                <div class="col-auto">
                                    <label for="private_person">
                                        <span class="bt_bb_required">{{__('labels.register.private_person')}}</span>
                                    </label>
                                </div>
                                <div class="col">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="private_or_company_yes"
                                               name="private_or_company" value="1"
                                               {{(old('private_or_company')) ? "checked" : ""}} required>
                                        <label class="custom-control-label" for="private_or_company_yes"
                                               onclick="hideNotPrivatePerson()">{{__('labels.general.yes')}}</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="private_or_company_no"
                                               name="private_or_company"
                                               value="0" {{(!old('private_or_company')) ? "checked" : ""}}>
                                        <label class="custom-control-label" for="private_or_company_no"
                                               onclick="showNotPrivatePerson()">{{__('labels.general.no')}}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="notprivateperson"
                                 style="display: {{(old('private_or_company')) ? "none" : ""}};">

                                <div class="col col-md-12 col-sm-12">
                                    <div class="form-group" id="company_name">
                                        <label for="company_name">{{__('labels.register.company_name')}}</label>
                                        <input type="text" name="company_name" value="{{old('company_name')}}"
                                               pattern="^[_A-zöäüàéèÖÄÜ0-9]*((-|\s)*[_A-zöäüàéèÖÄÜ0-9])*$"
                                               class="form-control"
                                               id="company_name">
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="firstname">
                                            <span class="bt_bb_required">{{__('labels.register.firstname')}}</span>
                                        </label>
                                        <input type="text" name="firstname" value="{{old('firstname')}}"
                                               pattern="^[_A-zöäüàéèÖÄÜ]*((-|\s)*[_A-zöäüàéèÖÄÜ])*$"
                                               class="form-control"
                                               id="firstname" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lastname">
                                            <span class="bt_bb_required">{{__('labels.register.lastname')}}</span>
                                        </label>
                                        <input type="text" name="lastname" value="{{old('lastname')}}"
                                               pattern="^[_A-zöäüàéèÖÄÜ]*((-|\s)*[_A-zöäüàéèÖÄÜ])*$"
                                               class="form-control"
                                               id="lastname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="company_postcode"><span
                                                    class="bt_bb_required">{{__('labels.register.postcode')}}</span>
                                        </label>
                                        <input type="number" name="company_postcode" value="{{old('company_postcode')}}"
                                               class="form-control" id="company_postcode" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="company_city"><span
                                                    class="bt_bb_required">{{__('labels.register.city')}}</span>
                                        </label>
                                        <input type="text" name="company_city" value="{{old('company_city')}}"
                                               pattern="^[_A-zöäüàéèÖÄÜ]*((-|\s)*[_A-zöäüàéèÖÄÜ])*$"
                                               class="form-control"
                                               id="company_city" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">
                                            <span class="bt_bb_required">{{__('labels.register.email')}}</span>
                                        </label>
                                        <input type="text" name="email" value="{{old('email')}}" class="form-control"
                                               id="email" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="phone">{{__('labels.register.phone')}}</label>
                                        <input type="number" name="phone" value="{{old('phone')}}" class="form-control"
                                               id="phone">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password"><?= __ ( 'labels.register.password' ) ?>
                                            <span
                                                    class="required">*</span>
                                        </label>
                                        <input type="password" name="password" value="" class="form-control"
                                               id="password" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password_confirmation">
                                            <?= __ ( 'labels.register.password_confirmation' ) ?>
                                            <span class="required">*</span>
                                        </label>
                                        <input type="password" name="password_confirmation" value=""
                                               class="form-control" id="password_confirmation">
                                    </div>
                                </div>
                            </div>

                            @if(config('boilerplate.access.captcha.registration'))
                                {{-- <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>
                                                <?= Session()->get('bot_first_number') ?> +
                                                <?= Session()->get('bot_second_number') ?>
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" name="bot_protection" value="" class="form-control"
                                                id="bot_protection">
                                            <!-- <div class="invalid-feedback">Bitte Telefonnummer eingeben</div> -->
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row">
                                    <div class="col">
                                        @captcha
                                        <input type="hidden" name="captcha_status" value="true"/>
                                    </div><!--col-->
                                </div><!--row-->
                            @endif

                            <button id="btn-register" type="submit"
                                    class="button btn btn-theme btn-rounded  d-flex align-items-center justify-content-center">
                                <i data-feather="user-plus" class="mr-2"></i>
                                <span>{{__('labels.register.create_account')}}</span>
                            </button>

                        </form>
                    </div>

                </div>
            </div>

            <!-- Sidebar Registration
                            ================================================== -->
            <div class="col-lg-4 col-md-4 margin-top-0 sticky login-sidebar justify-content-center flex-wrap px-md-0">
                <div class="form-sidebar-body">


                    <div class="form-sidebar-title pb-3 ">
                        <h4>{{__('labels.register.create_account')}}</h4>
                    </div>
                    <div class="py-3 py-md-4">
                        <ul class="liste-okey form-sidebar-list pl-0 list-unstyled mb-0">
                            <li>{{__('labels.register.enter_company')}}</li>
                            <li>{{__('labels.register.tailor_made_offers')}}</li>
                            <li>{{__('labels.register.advertise_jobs')}}</li>
                        </ul>
                    </div>
                    <div class="text-center sign-up-controls" style="display: none;">
                        {{__('labels.register.dont_have_an_account')}}
                        <a href="#create"
                           class="form-change button btn btn-theme-alt btn-rounded btn-block mt-2 text-white d-flex align-items-center justify-content-center">

                            <i data-feather="user-plus" class="mr-2"></i>
                            <span><?= __ ( 'labels.register.sign_up' ) ?></span>
                        </a>

                    </div>

                    <div class="text-center sign-in-controls">
                        <?= __ ( 'labels.register.already_have_an_account' ) ?>
                        <a href="{{route('frontend.auth.login')}}"
                           class="form-change button btn btn-theme-alt btn-rounded btn-block mt-2 text-white d-flex align-items-center justify-content-center">
                            <i data-feather="log-in" class="mr-2"></i>
                            <span><?= __ ( 'labels.register.login' ) ?></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br><br>
    <!-- Forgot Password Form
            ================================================== -->
    {{-- <div class="form-wrapper" id="forgot">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div id="listing-overview" class="listing-section p-0 p-md-2 card">
						<div class="card-header subtitle border-bottom pb-3">
							<h5><?= __('forgot_password') ?></h5>
						</div>

						<div class=" card-body">
							<form id="forgot-pass-form">
								<div class="form-group">
									<label>
										<?= __('your_email') ?>
									</label>
									<input type="email" name="email" class="form-control">
								</div>

								<button id="btn-forgot-password" type="submit"
									class="button btn btn-theme btn-rounded mt-3 mt-md-4 d-flex align-items-center justify-content-center">
									<i data-feather="key" class="mr-2"></i><span><?= __('reset_password') ?></span>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div> --}}

@endsection

@push('after-scripts')
    <?php
    if ( isset( $_GET ) && count ( $_GET ) > 0 && isset( $_GET[ 'sidebarform' ] ) )
    {
        ?>
    <script>
        jQuery(document).ready(function () {
            jQuery(".resgisetrformclick").trigger("click");
            jQuery("#private_or_company_no").attr('checked', true);
            showNotPrivatePerson();
        });
    </script>
        <?php
    }
    ?>
            <!-- Show input field "Company Name", if its a company
    ================================================== -->
    <script>
        function showNotPrivatePerson() {
            $("#notprivateperson").fadeIn('slow', function () {
                $("#notprivateperson").show();
            });
        }

        function hideNotPrivatePerson() {
            $("#notprivateperson").fadeOut('slow', function () {
                $("#notprivateperson").hide();
            });
        }
    </script>
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    {{-- <script type="text/javascript" src="{{ asset('frontend/assets/js/app/register.js') }}"></script> --}}
@endpush
