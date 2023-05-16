<!doctype html>
<html lang="en">

<head>
    @include('frontend.includes.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('style')
</head>

<body style="background-color: #e9ecef">
    <div class="container main">
        <div class="jumbotron" style="padding: 0px 0px 0px 10px;background-color: #FFf;margin-bottom: 0px;">
            <h1 class="display-3"><img src="{{ asset('img/logo.png') }}" alt="Needle" width="100px" /></h1>
        </div>

        @include('includes.partials.messages')
        @yield('content')
    </div>

    @include('frontend.includes.script')
    @stack('script')
	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
		
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var page = url.split('page=')[1];
            window.history.pushState("", "", url);
            faceted(page);
        })
    </script>
    @yield('script')
</body>

</html>
