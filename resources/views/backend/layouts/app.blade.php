<!doctype html>
<html lang="{{ htmlLang() }}">
<!-- @langrtl dir="rtl" @endlangrtl -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    <link rel="icon" href="{{ URL::asset('img/favicon.png') }}" type="image/png" sizes="16x16">

    @stack('before-styles')

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/vendors/css/extensions/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/slim-cropping-plugin/example/css/slim.min.css')}}">

{{--    <livewire:styles />--}}

    @stack('after-styles')
</head>

<body class="c-app" data-sidebar="dark">


    @include('backend.includes.sidebar')
    <div id="layout-wrapper">

		@include('backend.includes.header')
        <!--  @include('includes.partials.read-only')
        @include('includes.partials.logged-in-as') -->
        <!--  @include('includes.partials.announcements') -->

		<div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!--  <div class="fade-in"> -->
                    @include('includes.partials.messages')
                    @yield('content')
                    <!-- </div> -->
                </div>
            </div>
            @include('backend.includes.footer')
        </div>

    </div>

    @include('backend.includes.right-sidebar')

    @stack('before-scripts')
     <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>


    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/js/xcrud.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/slim-cropping-plugin/example/js/slim.kickstart.min.js')}}"></script>

    <input type="hidden" id="app_url" value="{{ env('APP_URL') }}">
    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/developer.js') }}"></script>

    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <livewire:scripts />
    @stack('after-scripts')
</body>

</html>
