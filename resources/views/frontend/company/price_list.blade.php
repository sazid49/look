@extends('frontend.layouts.legacy.app')

@section('title', __('labels.company.pricelist_tab_title'))

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
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
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
    </style>
@stop
@section('content')
    <div class="content">
        <div class="container1">
            @include('frontend.company.include.breadcrumb')
            <div class="row">
                <div class="col-md-12">
                    <div class="company-headerbar">
                        @php
                            $address_encode = urlencode($company->address);
                            $full_address_encoded = $address_encode.'%2C'.$company->postcode.'%20'.$company->city . '%2C' . 'Schweiz';
                        @endphp
                        @include('frontend.company.include.head')
                        <br>
                        <div class="row">
                            <div class="col-md-8">

                                <div class="card">
                                    <div class="card-body">
                                        <h4>{{__('labels.company.price_list')}}</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">

                                                @if (!$company->pricing->isEmpty())
                                                    @foreach ($company->pricing as $pricing)
                                                        @if ($pricing->parent_id == NULL)
                                                            <br><br>
                                                            <div class="row category_title">
                                                                <div class="col-md-11 col-xl-11">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label"><b>{{ucfirst($pricing->title)}}</b></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="row item_title">
                                                                <div class="col-md-11 col-xl-11">
                                                                    <div class="row">
                                                                        <div class="form-group mb-3 col-md-4">
                                                                            <label class="control-label"><b>{{ __('labels.company.title') }}
                                                                                    :</b> {{ $pricing->title }}</label>
                                                                        </div>
                                                                        <div class="form-group mb-3 col-md-4">
                                                                            <label class="control-label"><b>{{ __('labels.company.description') }}
                                                                                    :</b> {{ $pricing->description }}
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-group mb-3 col-md-4">
                                                                            <label class="control-label"><b>{{ __('labels.company.price') }}
                                                                                    :</b> {{ $pricing->price }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                @include('frontend.company.include.right')
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
        <img class="modal-content" id="img01">
        <div id="caption"></div>
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
            $("#img01").attr('src', myImg)
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
    </script>

@stop
