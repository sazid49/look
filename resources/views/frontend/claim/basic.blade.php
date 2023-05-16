@extends('frontend.layouts.master')

@section('title', __('Company Register'))

@section('content')

    <main class="login p-0" style="margin-top: 60px">
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="order-2 order-sm-1 col-sm-5 col-12 login-left">
                    <div class="text-start h-100 login-top overflow-hidden">
                        <div class="row login-row h-100 g-0">
                            <div class="login-bg col">
                                <img src="{{ asset('img/home-hero-1a.jpg') }}" alt="" class="img-fluid">
                                <img src="{{ asset('img/banner1.jpg') }}" alt="" class="img-fluid me-n5">
                            </div>
                            <div class="login-bg2 col align-self-lg-end">
                                <img src="{{ asset('img/home-hero-3.jpg') }}" alt="" class="img-fluid">
                                <img src="{{ asset('img/home-hero-1b.jpg') }}" alt="" class="img-fluid me-n5">


                            </div>
                        </div>
                        <ul class="list-unstyled checklist gray-clr">
                            <li class="li1 bg-white radius-4 d-flex align-items-center py-2 px-3 position-absolute">
                                <svg class="icon me-2 gray-clr">
                                    <use xlink:href="#ic_circle_check"></use>
                                </svg>
                                {{ __('Your business will be seen by thousands of people') }}
                            </li>
                            <li class="li2 bg-white radius-4 d-flex align-items-center text-nowrap py-2 px-3 position-absolute">
                                <svg class="icon me-2 gray-clr">
                                    <use xlink:href="#ic_circle_check"></use>
                                </svg>
                                {{ __('Receive offers directly from interested parties') }}
                            </li>
                            <li class="li3 bg-white radius-4 d-flex align-items-center text-nowrap py-2 px-3 position-absolute">
                                <svg class="icon me-2 gray-clr">
                                    <use xlink:href="#ic_circle_check"></use>
                                </svg>
                                {{ __('Advertise positions that are currently vacant') }}
                            </li>
                            <li class="li4 bg-white radius-4 d-flex align-items-center text-nowrap py-2 px-3 position-absolute">
                                <svg class="icon me-2 gray-clr">
                                    <use xlink:href="#ic_circle_check"></use>
                                </svg>
                                {{ __('Get better positions on Google') }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="order-1 order-sm-2 col-sm-7 col-12">
                    <div class=" d-flex align-items-center justify-content-center bg-white">
                        <div class="login-form cmpregister-form py-5">
                            <div class="px-3">
                                <h2 class="fw-600 md-font mb-3 text-center">{{ __('Enter your company') }}</h2>
                                <div class="wizard-content">
                                    <form id="steps-form" action="{{ route('frontend.auth.company.register') }}" method="POST" class="tab-wizard wizard-circle wizard clearfix">
                                        @csrf
                                        <h6>{{ __('Basic Information') }}</h6>
                                        <section>
                                            <p class="bold-font sm-font mb-2 text-center">{{ __('Basic Information') }}</p>
                                            <p class="font-14 gray-clr text-center">{{ __('Enter basic information about your company and person') }}</p>
                                            <div class="px-0">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group" id="company_name">
                                                            <label class="form-label" for="company_name"> {{ __('Company') }}</label>
                                                            <input type="text" id="company_name" name="company_name" class="form-control inpt-control required" style="display:block;" value="{{ $company->company_name }}">
                                                            <div class="invalid-feedback">{{ __('Please enter last name') }}</div>
                                                        </div>
                                                    </div>
                                                    <!-- Address / Adresse -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="">{{ __('Street and number') }}</label>
                                                            <input class="form-control" type="text" name="address" value="{{ $company->address }}">
                                                            <div class="invalid-feedback">{{ __('Please enter last name') }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="gen_postcode"> PLZ</label>
                                                            <input type="text" id="postcode" name="postcode" class="form-control" value="{{ $company->postcode }}">
                                                            <div class="invalid-feedback">{{ __('Please enter the zip code') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="city"> Ort</label>
                                                            <input type="text" id="city" name="city" class="form-control" value="{{ $company->city }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email">{{ __('E-Mail') }}</label>
                                                            <input type="text" id="email" name="email" class="form-control inpt-control required" value="{{ $company->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="phone">{{ __('Telephone') }}</label>
                                                            <input type="text" id="phone" name="phone" class="form-control" value="{{ $company->phone_1 }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="form-label" for="website">{{ __('Website') }}</label>
                                                            <input type="text" id="website" name="website" class="form-control" value="{{ $company->website }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                @guest()
                                                <div class="rms-content-title">
                                                    <div class="body-font fw-600 border-bottom mb-3 pb-2 mt-2">{{ __('Contact person') }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="gen_firstname">{{ __('First name') }}</label>
                                                            <input type="text" id="gen_firstname" name="firstname" class="form-control inpt-control required" value="">
                                                            @error('firstname')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="gen_lastname">{{ __('Surname') }}</label>
                                                            <input type="text" id="gen_lastname" name="lastname" class="form-control inpt-control required" value="">
                                                            @error('surname')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="gen_password">{{ __('Password') }}</label>
                                                            <input type="password" id="gen_password" name="password" class="form-control inpt-control required" value="">
                                                            @error('password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="gen_confirm_password">{{ __('Confirm Password') }}</label>
                                                            <input type="password" id="gen_confirm_password" name="confirm_password" class="form-control inpt-control required" value="">
                                                            @error('confirm_password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                @endguest
                                            </div>
                                        </section>
                                        <h6>{{ __('Confirmation') }}</h6>
                                        <section>
                                            <p class="font-14 gray-clr text-center">{{ __('Accept data protection regulations and enter company') }}</p>
                                            <div class="px-0">
                                                <div id="add-listing" class="separated-form">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-7 col-lg-6">
                                                            <div class="pricing pricing-palden">
                                                                <!-- pricing item 1 -->
                                                                <div class="pricing-item features-item ja-animate card" data-animation="move-from-bottom" data-delay="item-0" style="min-height: 497px;">
                                                                    <div class="pricing-deco text-center card-body bg-light-gray card-header">
                                                                        <img src="{{ asset('img/crown.svg') }}" alt="" height="70" width="70">
                                                                        <div class="pricing-price mt-3 mb-1 body-font fw-600">240 CHF</div>
                                                                        <h3 class="pricing-title md-font fw-700 mb-2">{{ __('Once - forever') }}</h3>
                                                                        <p class="mb-2 theme-clr ">{{ __('Immediate activation') }}</p>
                                                                        <p><small class="mt-2 gray-clr mb-2">{{ __('No further costs') }}</small></p>
                                                                    </div>
                                                                    <div class="pb-2 card-body">
                                                                        <ul class="list-unstyled xs-font text-start feature p-3 mb-0">
                                                                            <li class="mb-3">{{ __('Contact information of your company') }}</li>
                                                                            <li class="mb-3">{{ __('Company address with Google Maps function') }}</li>
                                                                            <li class="mb-3">{{ __('Help formatting the photos') }}</li>
                                                                            <li class="mb-3">{{ __('Slider with her 5 professional photos') }}</li>
                                                                            <li class="mb-3">{{ __('Lookon writes the company description in 100 words') }}</li>
                                                                            <li class="mb-3">{{ __('opening hours') }}</li>
                                                                            <li class="mb-3">{{ __('Tailor-made offer form for your business') }}</li>
                                                                            <li class="mb-3">{{ __('Jobs tenders') }}</li>
                                                                            <li class="mb-3">{{ __('Activation: immediately') }}</li>
                                                                            <li class="mb-3">{{ __('Changes / correction of the company profile by Lookon') }}</li>
                                                                            <li class="mb-3">{{ __('No recurring costs') }}</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mt-4">{{ __('After the entry you can fill out your company with further information.') }}</p>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox form-check mb-3">
                                                                <input id="agb" type="checkbox" name="agb" class="form-check-input mt-1 required">
                                                                <label class="form-check-label" for="agb">{{ __('I have read the') }} <a href='https://lookon.ch/pages/datenschutzerklarung' target='_blank'>{{ __('Privacy Policy') }}</a>
                                                                    {{ __('and the') }} <a href='https://lookon.ch/pages/allgemeine-geschaftsbedingungen' target='_blank'>{{ __('AGB') }}</a>
                                                                    {{ __('read and I agree.') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox form-check mb-3">
                                                                <input id="newsletter" type="checkbox" name="newsletter" class="form-check-input mt-1 required" value="Yes">
                                                                <label class="form-check-label" for="newsletter">{{ __('I would like to subscribe to the newsletter.') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@push('after-scripts')
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <script>
        // steps js start
        var form = $("#steps-form");
        form.steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            // enableCancelButton: true,
            startIndex: 0,
            pagination: false,
            labels: {
                cancel: "Cancel",
                finish: "Verify",
                next: "Continue",
                previous: "Cancel",
                loading: "Loading ..."
            },
        });

        // steps js end
    </script>

    {{-- <script type="text/javascript" src="{{ asset('frontend/assets/js/app/register.js') }}"></script> --}}
@endpush
