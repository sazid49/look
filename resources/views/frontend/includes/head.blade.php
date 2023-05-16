
<meta charset="UTF-8">
<meta name="description" content="@yield('meta_description', appName())">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="author" content="XYZ">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name=”robots” content="noindex, nofollow">

@yield('meta')

@stack('before-styles')
<link rel="shortcut icon" href="{{ asset('frontend/image/favicon.png') }}" type="image/png">
<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free-6.2.1-web/css/all.min.css') }}">
<link rel="stylesheet" type="text/css" href="/assets/css/jquery.timepicker.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-datepicker.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/select2.min.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/slick.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/jquery.fancybox.min.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="/assets/css/steps.css">
<link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
@stack('after-styles')
