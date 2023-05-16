@extends('frontend.layouts.legacy.app')

@section('title', __('labels.company.gallery_tab_title'))

@section('style')
    {{-- <link rel="stylesheet" href="{{asset('/frontend/vendor/OwlCarousel/docs/assets/css/docs.theme.min.css')}}"> --}}

    <!-- Owl Stylesheets -->
    <link rel="stylesheet"
          href="{{ asset('/frontend/vendor/OwlCarousel/docs/assets/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('/frontend/vendor/OwlCarousel/docs/assets/owlcarousel/assets/owl.theme.default.min.css') }}">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close, .close1 {
            position: absolute;
            top: 68px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close1:hover,
        .close:focus,
        .close1:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }

        .prev-btn, .prev-btn1 {
            position: absolute;
            top: 50%;
            color: #FFF;
            left: 3%;
        }

        .next-btn, .next-btn1 {
            position: absolute;
            top: 50%;
            color: #FFF;
            right: 3%;
        }
    </style>
@stop
@section('content')
    <div class="content">
        <div class="container1">
            @include('frontend.places.include.breadcrumb')
            <div class="row">
                <div class="col-md-12">
                    <div class="company-headerbar">
                        @php
                            $address_encode = urlencode($place->address);
                            $full_address_encoded = $address_encode . '%2C' . $place->postcode . '%20' . $place->city . '%2C' . 'Schweiz';
                        @endphp
                        @include('frontend.places.include.head')
                        <br>
                        <div class="row">
                            <div class="col-md-8">

                                <div class="card">
                                    <div class="card-body">
                                        <h4>{{ __('labels.company.galerie') }}</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="owl-carousel owl-theme">
                                                    @php
                                                        $key_id = 0;
                                                    @endphp


                                                    @foreach ($place->gallery as $key => $gallery)
                                                        @php
                                                            $flag = $key;
                                                            $flag++;
                                                        @endphp
                                                        @if (!empty($gallery['image']))

                                                            @if (Storage::disk('public')->exists($gallery['image']))
                                                                <div class="item">
                                                                    @php
                                                                        $key_id++;
                                                                    @endphp
                                                                    <img class="demo cursor myImg {{ 'img_' . $key_id }}"
                                                                         key="{{ $key_id }}" id="myImg"
                                                                         src="{{ url('storage/' . $gallery['image']) }}">

                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4>{{ __('labels.company.from_users') }}</h4>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="owl-carousel owl-theme">
                                                    @php
                                                        $key_id1 = 0;
														$reviewImages = $place->PlaceReview->where('image','!=',"");
                                                    @endphp
                                                    @foreach ($reviewImages as $key => $gallery)
                                                        @php
                                                            $flag = $key;
                                                            $flag++;
                                                        @endphp
                                                        @if (!empty($gallery['image']))
                                                            @if (Storage::disk('public')->exists($gallery['image']))
                                                                <div class="item">
                                                                    @php
                                                                        $key_id1++;
                                                                    @endphp
                                                                    <img class="demo cursor myImg1 {{ 'img1_' . $key_id1 }}"
                                                                         key="{{ $key_id1 }}" id="myImg1"
                                                                         src="{{ url('storage/' . $gallery['image']) }}">
                                                                    @if($gallery['user_id'] == NULL)
                                                                        <span>{{ $gallery['firstname'].' '.$gallery['lastname'] }}</span>
                                                                    @else
                                                                        <span>{{ $gallery->user->name }}</span>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-4">
                                @include('frontend.places.include.right')
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <button id="prev-btn" class="btn prev-btn">
            <i class="fa fa-arrow-left"></i>
        </button>
        <button id="next-btn" class="btn next-btn">
            <i class="fa fa-arrow-right"></i>
        </button>
        <img class="modal-content " style="max-width: 600px;" id="img01">
        <div id="caption"></div>
        <input type="hidden" name="key_id" id="key_id">
        <input type="hidden" name="last_key" id="last_key" value="{{ $key_id }}">
    </div>

    <!-- The Modal -->
    <div id="myModal1" class="modal">
        <span class="close">&times;</span>
        <button id="prev-btn1" class="btn prev-btn1">
            <i class="fa fa-arrow-left"></i>
        </button>
        <button id="next-btn1" class="btn next-btn1">
            <i class="fa fa-arrow-right"></i>
        </button>
        <img class="modal-content " style="max-width: 600px;" id="img011">
        <div id="caption1"></div>
        <input type="hidden" name="key_id1" id="key_id1">
        <input type="hidden" name="last_key1" id="last_key1" value="{{ $key_id1 }}">
    </div>

@stop
@section('script')
    <!-- javascript -->
    <script src="{{ asset('/frontend/vendor/OwlCarousel/docs/assets/owlcarousel/owl.carousel.js') }}"></script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
    <script>
        $(".myImg").click(function () {
            var myImg = $(this).attr('src');
            var key_id = $(this).attr('key');
            $("#img01").attr('src', myImg)
            $("#key_id").val(key_id)
            $("#myModal").show();
        });

        $(".myImg1").click(function () {
            var myImg = $(this).attr('src');
            var key_id = $(this).attr('key');
            $("#img011").attr('src', myImg)
            $("#key_id1").val(key_id)
            $("#myModal1").show();
        });

        $("").click(function () {
            var myImg = $(this).attr('src');
            var key_id = $(this).attr('key');
            $("#img01").attr('src', myImg)
            $("#key_id").val(key_id)
            $("#myModal").show();
        });


        // Get the modal
        var modal = document.getElementById("myModal");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        $(document).ready(function () {
            $("#share").click(function () {
                $("#share_div").toggle();
            })
        });

        $('.close').click(function () {
            $("#myModal").hide();
            $("#myModal1").hide();
        });
        // $('.close1').click(function() {
        //     $("#myModal1").hide();
        // });

        $('.next-btn').click(function () {
            var key_id = $("#key_id").val();
            key_id++;

            var myImg = $(".img_" + key_id).attr('src');
            if (myImg !== undefined) {
                $("#img01").attr('src', myImg)
                $("#key_id").val(key_id)
            } else {
                key_id = 1;
                var myImg = $(".img_" + key_id).attr('src');
                $("#img01").attr('src', myImg)
                $("#key_id").val(key_id)
            }
        });

        $('.prev-btn').click(function () {
            var key_id = $("#key_id").val();
            var last_key = $("#last_key").val();
            key_id--;

            var myImg = $(".img_" + key_id).attr('src');
            if (myImg !== undefined) {
                $("#img01").attr('src', myImg)
                $("#key_id").val(key_id)
            } else {
                key_id = last_key;
                var myImg = $(".img_" + key_id).attr('src');
                $("#img01").attr('src', myImg)
                $("#key_id").val(key_id)
            }
        });

        $('.next-btn1').click(function () {
            var key_id = $("#key_id1").val();
            key_id++;

            var myImg = $(".img1_" + key_id).attr('src');
            if (myImg !== undefined) {
                $("#img011").attr('src', myImg)
                $("#key_id1").val(key_id)
            } else {
                key_id = 1;
                var myImg = $(".img1_" + key_id).attr('src');
                $("#img011").attr('src', myImg)
                $("#key_id1").val(key_id)
            }
        });
        $('.prev-btn1').click(function () {
            var key_id = $("#key_id1").val();
            var last_key = $("#last_key1").val();
            key_id--;

            var myImg = $(".img1_" + key_id).attr('src');
            if (myImg !== undefined) {
                $("#img011").attr('src', myImg)
                $("#key_id1").val(key_id)
            } else {
                key_id = last_key;
                var myImg = $(".img1_" + key_id).attr('src');
                $("#img011").attr('src', myImg)
                $("#key_id1").val(key_id)
            }
        });
    </script>

@stop
