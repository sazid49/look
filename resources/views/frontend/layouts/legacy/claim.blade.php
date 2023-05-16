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

    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-137017033-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "UA-137017033-1");
    </script>

    @stack('before-styles')
    <!--  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,500i,700,700i,900" rel="stylesheet"> -->
    <!-- Bootstrap 4.3.1
  ================================================== -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.4.1.3.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/registration/font-awesome.min.css') }}" type="text/css"
        media="all" />
    <!--  <link rel="stylesheet" href="assets/css/app.css" type="text/css" media="all" /> -->

    <!-- animate
   ================================================== -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/registration/animate.css') }}" />
    <link href="{{ asset('frontend/assets/css/registration/multistep.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <style>
        body {
            background-color: #efefef;
        }
    </style>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <!-- custom
      ================================================== -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}" />
    @stack('after-styles')
    @yield('style')
    <script type="text/javascript">
        var inscribe = "{{ __('labels.claim.error_1') }}";
        var inscribe_2 = "{{ __('labels.claim.error_2') }}";
        var inscribe_3 = "{{ __('labels.claim.error_3') }}";
        var inscribe_4 = "{{ __('labels.claim.error_4') }}";
        var inscribe_5 = "{{ __('labels.claim.error_5') }}";
    </script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Wrapper -->
    <div id="wrapper">

        @include('includes.partials.messages')
        @yield('content')



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
                                <a href="/sitemap/sitemap_1.html" class="zoomIn animated "><?= __('sitemap') ?></a>
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
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 473.68 473.68"
                style="enable-background:new 0 0 473.68 473.68;" xml:space="preserve">
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


    <!-- Footer / End -->

    <!-- <script type="text/javascript" src="assets/js/registration/jquery.1.11.3.min.js"></script> -->
    <!--Multi Step Wizard -->
    <!-- <script type='text/javascript' src='assets/js/registration/bootstrap.min.js'></script> -->
    <script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap-4.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/registration/multistep.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/header.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/tooltips.min.js') }}"></script>
	@yield('script')
    <script>
        jQuery(".dropdown.l-dropdown").click(function() {
            jQuery(this).toggleClass("show");
        });

        $(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();

            $("#rms-wizard").stepWizard({
                stepTheme: "defaultTheme" /*defaultTheme,steptheme1,steptheme2*/ ,
                allstepClickable: false,
                compeletedStepClickable: true,
                stepCounter: true,
                StepImage: true,
                animation: true,
                animationClass: "fadeIn",
                stepValidation: true,
                validation: true,
                field: {
                    username: {
                        required: true,
                        minlength: 7,
                        Regex: /^[a-zA-Z0-9]+$/,
                    },
                    password: {
                        required: true,
                        minlength: 5,
                        maxlength: 20,
                        Regex: /^(?=.*[0-9_\W]).+$/,
                    },
                    confirm_password: {
                        required: true,
                    },
                    email: {
                        required: true,
                        Regex: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    },
                    lookonpackage: {
                        required: false,
                    },
                },
                message: {
                    username: "Please Enter UserName ",
                },
            });
        });
    </script>

    <div id="__lpform_company_name"
        style="
        max-height: 16px;
        vertical-align: top;
        position: absolute;
        top: 408.875px;
        left: 649px;
        z-index: 37;
      ">
        <img id="__lpform_company_name_icon"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAOFJREFUOBHFUjsSgjAQJYkFNJ5AzmJt64weQe/kEXQs5SI01sINLKAh8T3IjsCIoo5jZja7eXn7dvMJgr8PY8xCKZXB3JuW+Vx1wSniD0+SBa2qSRRFMxqwRPAhYdmHV46kMAzjoihyxhCJy7JkZyxwoO8P59yK2KS/4de1KGMhDvDuAqi4Q+UNiYwlQWu9lrjtrbV7rrWAaDWFWW+p4C89Evh8xz6RmN97+rz1HaDNU1VVHQ1iaHMJkVGXeO1kN4sag8jDO2B3pMF/95HwG80ZTzWH2LQpPHrOccztaPbPiDcgS12+ITUDKQAAAABJRU5ErkJggg=="
            height="16" style="opacity: 1; vertical-align: top" width="16" />
    </div>
    <div id="__lpform_gen_password"
        style="
        max-height: 16px;
        vertical-align: top;
        position: absolute;
        top: 952.562px;
        left: 649px;
        z-index: 37;
      ">
        <img id="__lpform_gen_password_icon"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAATtJREFUOBGVkk0rRHEUh6+3sqDIy8ICCzvyuhNrpdjINyBZ+BC+AaVskA9gRYqyZU1hRVlYSYgSC/E85txp5s40zK+ee875nXPm3vu/kySV1UG7s/JIabcdaxvu4Tsw3wF7FTVN9wG+4BBWA3M9e86UVS/uG9zAOGSlZ+8VerJN6xP4gH4LNAYHgbkagE84tihUH4Xvu1ZgbpBPBuap1kmcbdWo9YJGciE5i+idJmAhMNdTp7mQjBrro2iM+BTR9x0Kwvo9l0uK5zCKnuAuzPRJoiwbhsM9N9ZE0UD0W7+AAx7kMhRqk+IKLqAZusCzyGueTGMp7yRJN/lM1HXELXBmLrySsIiTnssU+SMcgQsensu78Kf8If95LqS8k6/AvzTI1C24fA2z0ARVqYXpfdiraisz7Fdqy3hF5Q/jeT3O9RaMMQAAAABJRU5ErkJggg=="
            height="16" style="opacity: 0.6; vertical-align: top" width="16" />
    </div>
    <div id="__lpform_gen_confirm_password"
        style="
        max-height: 16px;
        vertical-align: top;
        position: absolute;
        top: 952.562px;
        left: 1216.5px;
        z-index: 37;
      ">
        <img id="__lpform_gen_confirm_password_icon"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAATtJREFUOBGVkk0rRHEUh6+3sqDIy8ICCzvyuhNrpdjINyBZ+BC+AaVskA9gRYqyZU1hRVlYSYgSC/E85txp5s40zK+ee875nXPm3vu/kySV1UG7s/JIabcdaxvu4Tsw3wF7FTVN9wG+4BBWA3M9e86UVS/uG9zAOGSlZ+8VerJN6xP4gH4LNAYHgbkagE84tihUH4Xvu1ZgbpBPBuap1kmcbdWo9YJGciE5i+idJmAhMNdTp7mQjBrro2iM+BTR9x0Kwvo9l0uK5zCKnuAuzPRJoiwbhsM9N9ZE0UD0W7+AAx7kMhRqk+IKLqAZusCzyGueTGMp7yRJN/lM1HXELXBmLrySsIiTnssU+SMcgQsensu78Kf8If95LqS8k6/AvzTI1C24fA2z0ARVqYXpfdiraisz7Fdqy3hF5Q/jeT3O9RaMMQAAAABJRU5ErkJggg=="
            height="16" style="opacity: 0.6; vertical-align: top" width="16" />
    </div>
    <div style="position: static !important"></div>
</body>

</html>
