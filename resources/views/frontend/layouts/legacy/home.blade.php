<!DOCTYPE html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', appName())">
    <link rel="icon" href="{{ asset('frontend/assets/images/favicon2.png') }}" type="image/png" sizes="16x16">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    @yield('meta')

    @stack('before-styles')
	<!-- Theme Style -->
	<link rel="stylesheet" href="{{ asset('frontend/css/faceted.css') }}" />
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" />
	<!-- jQuery UI -->
	<link rel="stylesheet" href="{{ asset('frontend/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.css') }}">
	<!-- ion range slider -->
	<link rel="stylesheet" href="{{ asset('frontend/vendor/ion.rangeSlider-master/css/ion.rangeSlider.min.css') }}">


    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/app.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">



    <!-- custom
 ================================================== -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">

    <!-- animate
 ================================================== -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">

    @stack('after-styles')
	@yield('style')
</head>

<body>


    <div id="wrapper">

        <!-- Header Containerc
   ================================================== -->
   		@include('frontend.includes.head')



        <div class="container"><br>
            @include('includes.partials.messages')
            @yield('content')



            {{-- <?php if (FACEBOOK_ENABLED || TWITTER_ENABLED || GOOGLE_ENABLED) : ?>
            <small class="text-center text-muted mt-3 d-block">
                <?= __('or_connect_with') ?>
            </small>

        <!-- Social Login Buttons
            ================================================== -->
            <div class="text-center d-flex justify-content-around mt-3 col-md-6 mx-auto">
                <?php if (FACEBOOK_ENABLED) : ?>
                    <a href="socialauth.php?p=facebook&token=<?= $token ?>" class="btn-social btn-facebook">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                <?php endif; ?>

                <?php if (TWITTER_ENABLED) : ?>
                    <a href="socialauth.php?p=twitter&token=<?= $token ?>" class="btn-social btn-twitter">
                        <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                <?php endif; ?>

                <?php if (GOOGLE_ENABLED) : ?>
                    <a href="socialauth.php?p=google&token=<?= $token ?>" class="btn-social btn-google">
                        <i class="fab fa-google fa-2x"></i>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?> --}}

        </div>


        <!-- Footer
        ================================================== -->
        <div id="footer" class="margin-top-15">
            <div class="container d-none">

                <div class="row">

                    <div class="col-md-5">

                        <div class="footer-left">© <?php echo date('Y'); ?> <?= __('made_with') ?>
                            <!-- <i class="fas fa-heart"></i> <?= __('in_switzerland') ?> -->
                        </div>

                    </div>

                    <div class="col-md-7">

                        <div class="footer-right"><a href=""><?= __('the_lookon') ?></a> |
                            <a href=""><?= __('enter') ?></a> |

                            <?php if(!isset($currentUser)){ ?>

                            <a href="/admin/login.php"><?= __('login') ?></a> |

                            <?php } ?>
                            <a href="{{route('frontend.cms.pages','datenschutzerklarung')}}"><?= __('conditions') ?></a> |
                            <a href="/pages/impressum"><?= __('impressum') ?></a>

                            | <a href="https://lookon.ch/sitemap/sitemap_1.html"><?= __('Sitemap') ?></a>

                        </div>

                    </div>

                </div>



            </div>



            <footer class="footer text-center text-md-left">
                <div class="footer-top  py-4" style="padding-top: 0px !important;">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="footer-links">

                                    <a href="" class="zoomIn animated"><?= __('the_lookon') ?></a>
                                    <a href="/admin/login.php" class=" zoomIn animated "><?= __('login') ?></a>


                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="footer-links">
                                    <a href="{{route('frontend.cms.pages','datenschutzerklarung')}}"
                                        class="zoomIn animated"><?= __('datenschutz') ?></a>
                                    <a href="/pages/impressum" class="zoomIn animated "><?= __('impressum') ?></a>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="footer-links">
                                    <a href="/pages/nutzungsbedingungen"
                                        class="zoomIn animated"><?= __('nutzungsbedingungen') ?></a>
                                    <a href="/pages/allgemeine-geschaftsbedingungen"
                                        class="zoomIn animated "><?= __('agb') ?></a>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="footer-links">
                                    <a href="/pages/inhaltsrichtlinien"
                                        class="zoomIn animated"><?= __('inhaltsrichtlinien') ?></a>
                                    <a href="/sitemap/sitemap_1.html"
                                        class="zoomIn animated "><?= __('sitemap') ?></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="footer-bottom py-2 ">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="copyright font-medium zoomIn animated">© <?php echo date('Y'); ?>
                                    <?= __('made_with') ?></div>
                            </div>

                        </div>
                    </div>
                </div>
            </footer>



            <!-- svg external source -->
            <div class="d-none">
                <svg version="1.1" id="French" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                    style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <circle style="fill:#F0F0F0;" cx="256" cy="256" r="256" />
                    <path style="fill:#D80027;"
                        d="M512,256c0-110.071-69.472-203.906-166.957-240.077v480.155C442.528,459.906,512,366.071,512,256z" />
                    <path style="fill:#0052B4;"
                        d="M0,256c0,110.071,69.473,203.906,166.957,240.077V15.923C69.473,52.094,0,145.929,0,256z" />
                </svg>




                <svg version="1.1" id="German" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 473.68 473.68" style="enable-background:new 0 0 473.68 473.68;"
                    xml:space="preserve">
                    <circle style="fill:#FFFFFF;" cx="236.85" cy="236.85" r="236.83" />
                    <path style="fill:#D32027;"
                        d="M460.14,157.874H314.218c6.335,50.593,6.376,106.339,0.12,156.995h146.116
				c8.526-24.438,13.219-50.682,13.219-78.026C473.677,209.139,468.875,182.573,460.14,157.874z" />
                    <path style="fill:#0B0B0B;"
                        d="M314.218,157.874H460.14c-0.026-0.075-0.049-0.138-0.075-0.206
				C429.752,72.2,351.785,9.319,258.105,0.972C294.357,20.844,304.944,83.804,314.218,157.874z" />
                    <path style="fill:#F3C515;"
                        d="M258.109,472.697c93.848-8.362,171.927-71.46,202.12-157.156c0.079-0.228,0.146-0.452,0.228-0.673
				h-146.12C305.142,389.338,294.51,452.743,258.109,472.697z" />
                    <path style="fill:#DB2727;"
                        d="M0,236.842c0,27.348,4.693,53.588,13.219,78.026h313.313c6.256-50.66,6.215-106.402-0.12-156.995
				H13.534C4.798,182.573,0,209.139,0,236.842z" />
                    <path style="fill:#151515;"
                        d="M13.605,157.668c-0.026,0.067-0.049,0.131-0.075,0.206h312.883
				c-9.274-74.07-32.056-137.029-68.303-156.901C251.097,0.352,244.007,0,236.835,0C133.806,0,46.184,65.802,13.605,157.668z" />
                    <path style="fill:#F8D12E;"
                        d="M326.532,314.868H13.219c0.079,0.221,0.15,0.445,0.228,0.673
				c32.452,92.102,120.19,158.135,223.387,158.135c7.173,0,14.263-0.352,21.274-0.98C294.51,452.743,317.336,389.338,326.532,314.868z" />
                </svg>
            </div>
        </div>

    </div>



    @stack('script')
    @include('frontend.includes.scripts')
    @yield('scripts')
    @stack('before-scripts')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Common Scripts
    ================================================== -->
    <script src="{{ asset('frontend/assets/js/vendor/sha512.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/app/bootstrap.php')}}"></script>
    {{-- <script src="{{ asset('frontend/assets/js/app/common.js') }}"></script> --}}

    <!-- Page Scripts
    ================================================== -->
    {{-- <script type="text/javascript" src="{{ asset('frontend/assets/js/app/login.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/app/passwordreset.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('frontend/assets/js/header.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/tooltips.min.js') }}"></script>
    <script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
    </script>

    @stack('after-scripts')
</body>

</html>
