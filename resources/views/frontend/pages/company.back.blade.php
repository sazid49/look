<?php
/**
 * Created by PhpStorm.
 * User: Radd, Norrin
 * Date: 12/17/2022
 * Time: 1:45 PM
 */


?>
@extends('frontend.layouts.master')

@section('title')
    Company - @yield("title")
@endsection

@section('content')
    <main class="fixheight">
        <section class="d-flex align-items-center listing-profile-header">
            <div class="container-fluid container-xl">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-name">
                            <a href="#">
                                <img src="img/cmplogo1.jpg" alt="" class="listing-logo me-3">
                            </a>
                            <div class="d-sm-flex align-items-center flex-grow-1">
                                <div>
                                    <div class="d-flex">
                                        <h1 class="md-font font-semibold xs2-font mb-1 me-3">Farael's Bistro</h1>
                                        <div class="d-flex d-sm-none ms-auto">
                                            <span class="d-flex mb-2 ms-1 mt-1">
                                            <svg class="icon-14 star-fill me-1">
                                              <use xlink:href="#ic_star"></use>
                                            </svg>
                                            <svg class="icon-14 star-fill me-1">
                                              <use xlink:href="#ic_star"></use>
                                            </svg>
                                            <svg class="icon-14 star-fill me-1">
                                              <use xlink:href="#ic_star"></use>
                                            </svg>
                                            <svg class="icon-14 star-fill me-1">
                                              <use xlink:href="#ic_star"></use>
                                            </svg>
                                            <svg class="icon-14 star me-1">
                                              <use xlink:href="#ic_star"></use>
                                            </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-0 d-flex flex-wrap align-items-center gray-clr">
                                        <div class="mb-2 mb-md-0">
                                            <svg class="icon-20 me-1">
                                                <use xlink:href="#ic_map_pin"></use>
                                            </svg>
                                            <span class="font-14 me-3">Länggasstrasse 32, 3012 Bern</span>
                                        </div>
                                    </div>
                                    <div class="d-none d-sm-flex">
                                    <span class="d-flex mb-1 mt-2 ms-1">
                                      <svg class="icon-14 star-fill me-1">
                                        <use xlink:href="#ic_star"></use>
                                      </svg>
                                      <svg class="icon-14 star-fill me-1">
                                        <use xlink:href="#ic_star"></use>
                                      </svg>
                                      <svg class="icon-14 star-fill me-1">
                                        <use xlink:href="#ic_star"></use>
                                      </svg>
                                      <svg class="icon-14 star-fill me-1">
                                        <use xlink:href="#ic_star"></use>
                                      </svg>
                                      <svg class="icon-14 star me-1">
                                        <use xlink:href="#ic_star"></use>
                                      </svg>
                                    </span>
                                    </div>
                                </div>
                                <div class="ms-auto gray-clr text-end">
                                    <div class="d-flex justify-content-md-end">
                                        <div class="mb-2 mb-md-2 mt-md-0">
                                            <svg class="icon-20 me-1">
                                                <use xlink:href="#ic_eye"></use>
                                            </svg>
                                            <span class="font-14">410</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-md-end">
                                        <div class="mb-2 mb-md-2 mt-md-0">
                                            <svg class="icon-20 me-1">
                                                <use xlink:href="#ic_date"></use>
                                            </svg>
                                            <span class="font-14">Last Updated: Sep 20, 2022</span>
                                        </div>
                                    </div>

                                    <div class="mb-3 d-flex align-items-center font-14  justify-content-md-end">
                                        <svg class="icon-20 me-1">
                                            <use xlink:href="#ic_filepencil"></use>
                                        </svg>
                                        <span>
                                          All data is managed from company itself
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tab Menu Start -->
        @include('frontend.includes.company.tab_menu')
        <!-- Tab Menu End -->

        <!-- quick links header -->
        <div class="quick-links bg-light-gray pt-1 pt-md-2 pb-md-2">
            <div class="container-fluid container-xl">
                <div class="row">
                    <div class="col-12">
                        <ul class="d-flex nav quick-nav justify-content-lg-center list-unstyled cts-carousel">
                            <li class="nav-item">
                                <a href="tel:031 525 73 73" class="nav-link d-flex align-items-center">
                                    <svg class="icon-18 me-2">
                                        <use xlink:href="#ic_call"></use>
                                    </svg>
                                    <span>
                                        Call Now
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="mailto:m.mahmoud055@hotmail.com " class="nav-link d-flex align-items-center">
                                    <svg class="icon-18 me-2">
                                        <use xlink:href="#ic_mail"></use>
                                    </svg>
                                    <span>
                                        Email
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.coiffeur-boss.digitalone.site/" target="_blank"
                                   class="nav-link d-flex align-items-center">
                                    <svg class="icon-18 me-2">
                                        <use xlink:href="#ic_world"></use>
                                    </svg>
                                    <span>
                                        Website
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link d-flex align-items-center">
                                    <svg class="icon-18 me-2">
                                        <use xlink:href="#ic_map_pin"></use>
                                    </svg>
                                    <span>
                                        Get Directions
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown dropdown-animate py-1 share-nav" data-bs-toggle="hover">
                                    <div class="d-flex align-items-center nav-link" data-bs-toggle="dropdown"
                                         data-bs-offset="10,20">
                                        <svg class="icon-18 me-2">
                                            <use xlink:href="#ic_share"></use>
                                        </svg>
                                        <span>
                                            Share
                                        </span>
                                    </div>
                                    <div class="dropdown-menu mt-0 dropdown-menu-end social_share">
                                        <div class="d-flex radius-6">
                                            <a href="#" class="bg-white gray-clr theme-hover border-0">
                                                <svg class="icon">
                                                    <use xlink:href="#ic_facebook"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="bg-white gray-clr theme-hover border-0">
                                                <svg class="icon">
                                                    <use xlink:href="#ic_twitter"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="bg-white gray-clr theme-hover border-0">
                                                <svg class="icon">
                                                    <use xlink:href="#ic_linkedin"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="bg-white gray-clr theme-hover border-0">
                                                <svg class="icon">
                                                    <use xlink:href="#ic_whatsapp"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link d-flex align-items-center">
                                    <svg class="icon-18 me-2">
                                        <use xlink:href="#ic_bookmark"></use>
                                    </svg>
                                    <span>
                                        Bookmark
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link d-flex align-items-center">
                                    <svg class="icon-18 me-2">
                                        <use xlink:href="#ic_star_line"></use>
                                    </svg>
                                    <span>
                                        Leave a Review
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- quick links header end -->

        <section class="list-detail">
            <div class="container-fluid container-xl">
                <div class="tab-content py-4">
                    @yield('content')
                    <!-- Information tab pane start -->
                    @if(Route::currentRouteName() == 'frontend.pages.company.information')
                        <!-- @include('frontend.includes.company.information') -->
                    @endif
                    <!-- Information tab pane end -->

                    <!-- Offer tab pane start -->
                    @if(Route::currentRouteName() == 'frontend.pages.company.offer')
                        @include('frontend.includes.company.offer')
                    @endif
                    <!-- Offer tab pane end -->

                    <!-- reviews tab pane start -->
                    @if(Route::currentRouteName() == 'frontend.company.reviews')
                            <?php //@include('frontend.includes.company.reviews')?>
                    @endif
                    <!-- reviews tab pane end -->

                    <!-- gallery tab start -->
                    @if(Route::currentRouteName() == 'frontend.pages.company.gallery')
                        @include('frontend.includes.company.gallery')
                    @endif
                    <!-- gallery tab end -->

                    <!-- team tab pane start -->
                    @if(Route::currentRouteName() == 'frontend.pages.company.team')
                        @include('frontend.includes.company.team')
                    @endif
                    <!-- team tab pane end -->

                    <!-- pricelist tab pane start -->
                    @if(Route::currentRouteName() == 'frontend.pages.company.price_list')
                        @include('frontend.includes.company.price_list')
                    @endif
                    <!-- pricelist tab pane end -->

                    <!-- news tab start -->
                    @if(Route::currentRouteName() == 'frontend.pages.company.news')
                        @include('frontend.includes.company.news')
                    @endif
                    <!-- news tab end -->

                    <!-- contact tab pane start -->
                    @if(Route::currentRouteName() == 'frontend.pages.company.contact_us')
                        @include('frontend.includes.company.contact_us')
                    @endif
                    <!-- contact tab pane end -->

                    <!-- job tab pane start -->
                    @if(Route::currentRouteName() == 'frontend.pages.company.register')
                        @include('frontend.includes.company.jobs')
                    @endif
                    <!-- job tab pane end -->

                    <!-- handelsregister tab pane start -->
                    @if(Route::currentRouteName() == 'frontend.pages.company.register')
                        @include('frontend.includes.company.register')
                    @endif
                    <!-- handelsregister tab pane end -->
                </div>
            </div>
        </section>
    </main>
@endsection
