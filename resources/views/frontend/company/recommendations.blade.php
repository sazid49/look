@extends('frontend.layouts.legacy.app')


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
            <div class="section-title d-sm-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent" style="margin-bottom: 0px;">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}"><i
                                        class="fa fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend.list.index') }}">Listing</a></li>
                        <li class="breadcrumb-item"><a href="/company">Company</a></li>
                        <?php if ( !empty( $company->category ) ) : ?>
                        <li class="breadcrumb-item"><a
                                    href="/company/<?php echo str_replace(' ', '_', $company->category->value); ?>"><?php echo $company->category->value; ?></a>
                        </li>
                        <?php endif; ?>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('frontend.company.information', [$company,$company->slug]) }}"><?php echo $company->company_name; ?></a>
                        </li>
                    </ol>
                </nav>
                <div class="page-date">
                    <i data-feather="calendar"></i><?php echo date ( 'l' ) . ', ' . date ( 'd M Y' ); ?>
                </div>
            </div>
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
                                        <h4>{{__('labels.company.empfehlungen')}}</h4>
                                        <hr>
                                        <div class="row">
                                            @if(isset($company->recommendation[0]))
                                                <div class="col-md-12">
                                                    <div>
                                                        <span><b>{{ __('labels.company.company_name') }} :</b> </span>
                                                        <span>{{$company->recommendation[0]->company_name ?? ''}}</span>
                                                    </div>
                                                    <div>
                                                        <span><b>{{ __('labels.company.contact_name') }} :</b> </span>
                                                        <span>{{$company->recommendation[0]->contact_name ?? ''}}</span>
                                                    </div>
                                                    <div>
                                                        <span><b>{{ __('labels.company.relation') }} :</b> </span>
                                                        <span>{{$company->recommendation[0]->relationship ?? ''}}</span>
                                                    </div>
                                                    <div>
                                                        <span><b>{{ __('labels.company.telephone') }} :</b> </span>
                                                        <span>{{$company->recommendation[0]->phone ?? ''}}</span>
                                                    </div>

                                                </div>
                                            @endif
                                        </div>
                                        <br>
                                        <div class="row">
                                            @if(isset($company->recommendation[1]))
                                                <div class="col-md-12">
                                                    <div>
                                                        <span><b>{{ __('labels.company.company_name') }} :</b> </span>
                                                        <span>{{$company->recommendation[1]->company_name ?? ''}}</span>
                                                    </div>
                                                    <div>
                                                        <span><b>{{ __('labels.company.contact_name') }} :</b> </span>
                                                        <span>{{$company->recommendation[1]->contact_name ?? ''}}</span>
                                                    </div>
                                                    <div>
                                                        <span><b>{{ __('labels.company.relation') }} :</b> </span>
                                                        <span>{{$company->recommendation[1]->relationship ?? ''}}</span>
                                                    </div>
                                                    <div>
                                                        <span><b>{{ __('labels.company.telephone') }} :</b> </span>
                                                        <span>{{$company->recommendation[1]->phone ?? ''}}</span>
                                                    </div>

                                                </div>
                                            @endif
                                        </div>
                                        <br>

                                        <div class="row">
                                            @if(isset($company->recommendation[2]))
                                                <div class="col-md-12">
                                                    <div>
                                                        <span><b>{{ __('labels.company.company_name') }} :</b> </span>
                                                        <span>{{$company->recommendation[2]->company_name ?? ''}}</span>
                                                    </div>
                                                    <div>
                                                        <span><b>{{ __('labels.company.contact_name') }} :</b> </span>
                                                        <span>{{$company->recommendation[2]->contact_name ?? ''}}</span>
                                                    </div>
                                                    <div>
                                                        <span><b>{{ __('labels.company.relation') }} :</b> </span>
                                                        <span>{{$company->recommendation[2]->relationship ?? ''}}</span>
                                                    </div>
                                                    <div>
                                                        <span><b>{{ __('labels.company.telephone') }} :</b> </span>
                                                        <span>{{$company->recommendation[2]->phone ?? ''}}</span>
                                                    </div>

                                                </div>
                                            @endif
                                        </div>
                                        <br>

                                        <div class="row">
                                            @if(isset($company->recommendation[3]))
                                                <div class="col-md-12">
                                                    <div>
                                                        <span><b>{{ __('labels.company.company_name') }} :</b> </span>
                                                        <span>{{$company->recommendation[3]->company_name ?? ''}}  </span>
                                                    </div>
                                                    <div>
                                                        <span><b>{{ __('labels.company.contact_name') }} :</b> </span>
                                                        <span>{{$company->recommendation[3]->contact_name ?? ''}}</span>
                                                    </div>
                                                    <div>
                                                        <span><b>{{ __('labels.company.relation') }} :</b> </span>
                                                        <span>{{$company->recommendation[3]->relationship ?? ''}}</span>
                                                    </div>
                                                    <div>
                                                        <span><b>{{ __('labels.company.telephone') }} :</b> </span>
                                                        <span>{{$company->recommendation[3]->phone ?? ''}}</span>
                                                    </div>

                                                </div>
                                            @endif
                                        </div>

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
