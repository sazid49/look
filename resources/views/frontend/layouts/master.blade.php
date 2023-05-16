<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ appName() }} - @yield('title')</title>
    @include('frontend.includes.head')

    <!-- Open Graph Meta Start -->
    <meta property="og:url"           content="{{ url()->current() }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ appName() }}" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="favicon.png" />
    <!-- Open Graph Meta End -->

</head>
<body>

<!-- Load Facebook SDK for JavaScript -->
{{--<div id="fb-root"></div>--}}
{{--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v15.0&appId=585471984971216&autoLogAppEvents=1" nonce="vY5sv4p6"></script>--}}

@include('includes.partials.read-only')
@include('includes.partials.logged-in-as')
@include('includes.partials.announcements')

@include('frontend.includes.header')

@yield('content')

{{--@includeWhen(request()->routeIs('frontend.index'),'frontend.includes.footer')--}}

@include('frontend.includes.footer')

@include('frontend.includes.scripts')

<script>
    @if(session()->has('success'))
    swal("Success","{{ session()->get('success') }}","success");
    @endif
</script>

@stack('js')

</body>
</html>

