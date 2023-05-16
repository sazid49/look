@extends('frontend.layouts.legacy.app')

@section('title', __('labels.company.information_tab_title'))

@section('style')
    <style>
        body {
            font-family: Arial;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        img {
            vertical-align: middle;
        }

        /* Position the image container (needed to position the left and right arrows) */
        .container {
            position: relative;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Add a pointer when hovering over the thumbnail images */
        .cursor {
            cursor: pointer;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 40%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* Container for image text */
        .caption-container {
            text-align: center;
            background-color: #222;
            padding: 2px 16px;
            color: white;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Six columns side by side */
        .column {
            float: left;
            width: 20%;
            padding: 2px;
        }

        /* Add a transparency effect for thumnbail images */
        .demo {
            opacity: 0.6;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }

        .footer-social-links li {
            margin: 5px;
        }

        .footer-social-links li a i {
            height: 38px;
            width: 38px;
            /* background: #00c3ff; */
            color: #FFF;
            display: block;
            text-align: center;
            line-height: 36px;
            border-radius: 50%;
            border: 2px solid transparent;
            transition: .3s;
        }

        .footer-social-links li a i.facebook-link {
            background-color: #4a6d9d;
        }

        .footer-social-links li a i.instagram-link {
            background-color: #e1306c;
        }

        .footer-social-links li a i.twitter-link {
            background-color: #3bc1ed;
        }

        .footer-social-links li a i.youtube-link {
            background-color: #D52925;
        }

        .footer-social-links li a i.tiktok-link {
            background-color: #2A0C1D;
        }
    </style>
@stop
@section('content')
    @php
        $address_encode = urlencode($place->address);
        $full_address_encoded = $address_encode . '%2C' . $place->postcode . '%20' . $place->city . '%2C' . 'Schweiz';
    @endphp
    <div class="content">
        <div class="container1">
            @include('frontend.places.include.breadcrumb')
            <div class="row">
                <div class="col-md-12">
                    <div class="company-headerbar">
                        @include('frontend.places.include.head')
                        <br>
                        @if ($place->published == 1)
                            <div class="row">
                                <div class="col-md-8">
                                    @php
                                        $total = $place->gallery_show->count();
                                        $flag = 0;
                                        $count = 1;
                                    @endphp

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                @if ($total != 0)
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            @foreach ($place->gallery_show as $key => $gallery)
                                                                @if ($count < 6)
                                                                    @php
                                                                        $flag = $key;
                                                                        $flag++;
                                                                    @endphp
                                                                    @if (!empty($gallery['image']))
                                                                        @if (Storage::disk('public')->exists($gallery['image']))
                                                                            <div class="mySlides">
                                                                                <div class="numbertext">{{ $flag }}
                                                                                    / 5
                                                                                </div>
                                                                                <img src="{{ url('storage/' . $gallery['image']) }}"
                                                                                     style="width:100%">
                                                                                @php
                                                                                    $count++;
                                                                                @endphp
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                            @endforeach

                                                            <a class="prev" onclick="plusSlides(-1)"
                                                               style="position: absolute;left: 15px;">❮</a>
                                                            <a class="next" onclick="plusSlides(1)"
                                                               style="position: absolute;right: 15px;">❯</a>

                                                        </div>
                                                    </div>
                                                    &nbsp;
                                                    @php
                                                        $count = 1;
                                                    @endphp
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            @foreach ($place->gallery_show as $key => $gallery)
                                                                @if ($count < 6)
                                                                    @php
                                                                        $flag = $key;
                                                                        $flag++;
                                                                    @endphp
                                                                    <div class="column">
                                                                        @if (!empty($gallery['image']))
                                                                            @if (Storage::disk('public')->exists($gallery['image']))
                                                                                <img class="demo cursor"
                                                                                     onclick="currentSlide({{ $flag }})"
                                                                                     style="width:100%" alt="no data"
                                                                                     src="{{ url('storage/' . $gallery['image']) }}"
                                                                                     width="80px" height="auto"
                                                                                     class="user-profile-image">
                                                                                @php
                                                                                    $count++;
                                                                                @endphp
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="row">
                                                    <div class="col-md-12 text-left">
                                                        <h3>Quelques mots à propos de {{ $place->company_name }}</h3>
                                                        <br>
                                                        <p>
                                                            {!! strip_tags(htmlspecialchars_decode($place->description_de)) !!}
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Location</h4>
                                            <hr>
                                            <div id="listing-location" class="listing-section mb-3">
                                                <div class="listing-map">
                                                    <iframe width="100%" height="350" frameborder="0" style="border:0"
                                                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCxYGPwCo6IpUNcSuiTY1rJWjVtFRg4jkU&q=<?php echo $full_address_encoded; ?>"
                                                            allowfullscreen>
                                                    </iframe>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-8">
                                                        <h4>{{ $place->address, ',' . $place->postcode . ',' . $place->city }}
                                                        </h4>
                                                    </div>
                                                    <div class="col-md-4 pt-1">
                                                        <a target="_blank" class="btn btn-primary"
                                                           href="http://maps.google.com/?q=<?php echo $full_address_encoded; ?>">Get
                                                            Direction</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    @if (!empty($place->socialmedia) && $place->socialmedia->youtube_video != '')
                                        <div class="card">
                                            <div class="card-body">
                                                <h4>Youtube</h4>
                                                <hr>
                                                <div id="listing-location" class="listing-section mb-3">
                                                    <div class="listing-map">
                                                        <iframe width="100%" height="350" frameborder="0"
                                                                style="border:0"
                                                                src="{{ str_replace('watch?v=', 'embed/', $place->socialmedia->youtube_video) }}"
                                                                allowfullscreen>
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    @endif
                                    @if (!empty($place->socialmedia))
                                        <div class="card">
                                            <div class="card-body">
                                                <h4>Social Media</h4>
                                                <hr>
                                                <div class="listing-links-container mt-3 footer-social-links social-links">
                                                    <ul class="list-unstyled d-flex">
                                                        @if (!empty($place->socialmedia->facebook))
                                                            @php
                                                                $link = $place->socialmedia->facebook;
                                                                if (!str_contains($place->socialmedia->facebook, 'http')) {
                                                                    $link = 'https://' . $place->socialmedia->facebook;
                                                                }
                                                            @endphp
                                                            <li>
                                                                <a href="{{ $link }}" target="_blank">
                                                                    <i class="fa fa-facebook facebook-link"></i>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if (!empty($place->socialmedia->twitter))
                                                            @php
                                                                $link = $place->socialmedia->twitter;
                                                                if (!str_contains($place->socialmedia->twitter, 'http')) {
                                                                    $link = 'https://' . $place->socialmedia->twitter;
                                                                }
                                                            @endphp
                                                            <li>
                                                                <a href="{{ $link }}" target="_blank">
                                                                    <i class="fa fa-twitter twitter-link"></i>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if (!empty($place->socialmedia->instagram))
                                                            @php
                                                                $link = $place->socialmedia->instagram;
                                                                if (!str_contains($place->socialmedia->instagram, 'http')) {
                                                                    $link = 'https://' . $place->socialmedia->instagram;
                                                                }
                                                            @endphp
                                                            <li>
                                                                <a href="{{ $link }}" target="_blank">
                                                                    <i class="fa fa-instagram instagram-link"></i>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if (!empty($place->socialmedia->youtube_video))
                                                            @php
                                                                $link = $place->socialmedia->youtube_video;
                                                                if (!str_contains($place->socialmedia->youtube_video, 'http')) {
                                                                    $link = 'https://' . $place->socialmedia->youtube_video;
                                                                }
                                                            @endphp
                                                            <li>
                                                                <a href="{{ $link }}" target="_blank">
                                                                    <i class="fa fa-youtube youtube-link"></i>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if (!empty($place->socialmedia->tiktok))
                                                            @php
                                                                $link = $place->socialmedia->tiktok;
                                                                if (!str_contains($place->socialmedia->tiktok, 'http')) {
                                                                    $link = 'https://' . $place->socialmedia->tiktok;
                                                                }
                                                            @endphp
                                                            <li>
                                                                <a href="{{ $link }}" target="_blank">
                                                                    <img src="{{ asset('frontend/image/tiktok.jpg') }}"
                                                                         alt="" height="36px"
                                                                         style="border-radius: 18px">
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    @include('frontend.places.include.right')
                                </div>
                            </div>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function () {
            $("#share").click(function () {
                $("#share_div").toggle();
            })
        });
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("demo");
            let captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>
@stop
