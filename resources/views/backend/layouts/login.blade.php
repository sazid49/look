<!doctype html>
<html lang="{{ htmlLang() }}" >
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
	@langrtl
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
        body, .navigation{
            font-family: 'Cairo' !important;
        }
    </style>
	@endlangrtl
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- <link href="{{ asset('assets/css/frontend.css') }}" rel="stylesheet"> -->

    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <livewire:styles />
    @stack('after-styles')
	@if (env('ADMIN_LOGIN_CAPTCHA_STATUS'))
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	@endif
</head>
<body>
    

    <div id="app">
      
		<div class="col-md-12 p-4">
			@include('includes.partials.messages')
		</div>

        <main>
            @yield('content')
        </main>
    </div><!--app-->

    @stack('before-scripts')

    <script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js')}}"></script>


    <!-- JAVASCRIPT -->
   
    <script src="{{ URL::asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/node-waves/waves.min.js')}}"></script>



    <!-- App js -->
    <script src="{{ URL::asset('assets/js/app.js')}}"></script>

   {{-- <livewire:scripts /> --}}

    
    
    @stack('after-scripts')
</body>
</html>
