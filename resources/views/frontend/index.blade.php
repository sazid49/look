@extends('frontend.layouts.master')

@section('title',"Home")

@section('content')
    <!-- frontpage banner search section start -->
    <section class="banner">
        <div class=" img-container" data-slideshow>
            <img src="{{ URL::asset('img/banner10.jpg') }}" />
            <img src="{{ URL::asset('img/banner2.jpg') }}" />
            <img src="{{ URL::asset('img/banner7.jpg') }}" />
            <img src="{{ URL::asset('img/banner6.jpg') }}" />
        </div>
        <div class="container-fluid container-xl position-relative">
            <div class="search-panel">
                <form action="company.php">
                    <div class="row g-2 align-items-center justify-content-center flex-lg-nowrap">
                        <div class="col-sm col-lg">
                            <input type="text" class="form-control mb-2 search-input" id="res-search" placeholder="What Are you looking for?">
                        </div>
                        <div class="col-sm-auto">
                            <button type="submit" class="btn btn-theme mb-2">{{ __('search') }}</button>
                        </div>
                        <div class="col-sm col-lg-auto">
                            <div class="form-control mb-2 cursor-pointer advance-btn d-flex justify-content-between" aria-expanded="false" aria-controls="advanceSearchCollapse" data-bs-toggle="collapse" href=".advanceSearchCollapse">
                                <span class="me-2 d-lg-none">Advanced Filter</span>
                                <svg width="24" height="24" class="icon theme-clr">
                                    <use xlink:href="#ic_setting" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="collapse advanceSearchCollapse">
                        <h2 class="font-medium text-uppercase body-font border-bottom filter-header d-flex d-md-none mb-0 align-items-center">
                            <span>
                              <svg class="icon me-2 advance-close-btn d-md-none">
                                <use xlink:href="#ic_back"></use>
                              </svg>
                            </span>
                            Advanced Filter
                        </h2>
                        <div class="card card-body advance-body border-0 shadow">
                            <div class="d-flex nav nav-tabs advance-nav mb-3" role="tablist">
                                <a href="#" class="active" data-bs-target="#afCompany" data-bs-toggle="tab" role="tab" aria-controls="afCompany" aria-selected="true">
                                    Company
                                </a>
                                <a href="#" data-bs-target="#afPlace" data-bs-toggle="tab" role="tab" aria-controls="afPlace" aria-selected="false">
                                    Place
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="afCompany" class="tab-pane fade show active advance-filter-pane" role="tabpanel" tabindex="0">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="pe-md-4">
                                                <h4 class="font-16 title">Price Range</h4>
                                                <div class="mb-3 filter-options range-filter">
                                                    <div>
                                                        <div id="slider-range">
                                                        </div>
                                                    </div>
                                                    <form>
                                                        <input type="hidden" name="min-value" value="">
                                                        <input type="hidden" name="max-value" value="">
                                                    </form>
                                                </div>
                                                <div class="mb-3 xs2-font d-flex justify-content-between">
                                                    <span id="slider-range-value1"></span>
                                                    <span id="slider-range-value2"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <h4 class="font-16 cat-title">Category</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                        <input type="checkbox" class="form-check-input" id="Apotheke" checked>
                                                        <label class="form-check-label" for="Apotheke">Apotheke</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                        <input type="checkbox" class="form-check-input" id="Architektur">
                                                        <label class="form-check-label" for="Architektur">Architektur</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                        <input type="checkbox" class="form-check-input" id="Autogarage">
                                                        <label class="form-check-label" for="Autogarage">Autogarage</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                        <input type="checkbox" class="form-check-input" id="Bank">
                                                        <label class="form-check-label" for="Bank">Bank Sparkasse</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                        <input type="checkbox" class="form-check-input" id="Bauwesen">
                                                        <label class="form-check-label" for="Bauwesen">Bauwesen</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                        <input type="checkbox" class="form-check-input" id="Bäckerei">
                                                        <label class="form-check-label" for="Bäckerei">Bäckerei</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                        <input type="checkbox" class="form-check-input" id="Bank2">
                                                        <label class="form-check-label" for="Bank2">Bank Sparkasse</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                        <input type="checkbox" class="form-check-input" id="Bauwesen2">
                                                        <label class="form-check-label" for="Bauwesen2">Bauwesen</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                        <input type="checkbox" class="form-check-input" id="Bodenbeläge2">
                                                        <label class="form-check-label" for="Bodenbeläge2">Bodenbeläge</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                        <input type="checkbox" class="form-check-input" id="Bäckerei2">
                                                        <label class="form-check-label" for="Bäckerei2">Bäckerei</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="afPlace" class="tab-pane fade advance-filter-pane" role="tabpanel" tabindex="0">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="font-16 cat-title">Category</h4>
                                        </div>
                                        <div class="col-md">
                                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                <input type="checkbox" class="form-check-input" id="Apotheke" checked>
                                                <label class="form-check-label" for="Apotheke">Apotheke</label>
                                            </div>
                                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                <input type="checkbox" class="form-check-input" id="Architektur">
                                                <label class="form-check-label" for="Architektur">Architektur</label>
                                            </div>
                                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                <input type="checkbox" class="form-check-input" id="Autogarage">
                                                <label class="form-check-label" for="Autogarage">Autogarage</label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                <input type="checkbox" class="form-check-input" id="Bäckerei">
                                                <label class="form-check-label" for="Bäckerei">Bäckerei</label>
                                            </div>
                                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                <input type="checkbox" class="form-check-input" id="Bank2">
                                                <label class="form-check-label" for="Bank2">Bank Sparkasse</label>
                                            </div>
                                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                <input type="checkbox" class="form-check-input" id="Bauwesen2">
                                                <label class="form-check-label" for="Bauwesen2">Bauwesen</label>
                                            </div>
                                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                <input type="checkbox" class="form-check-input" id="Bodenbeläge2">
                                                <label class="form-check-label" for="Bodenbeläge2">Bodenbeläge</label>
                                            </div>

                                        </div>
                                        <div class="col-md">
                                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                <input type="checkbox" class="form-check-input" id="Bank">
                                                <label class="form-check-label" for="Bank">Bank Sparkasse</label>
                                            </div>
                                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                <input type="checkbox" class="form-check-input" id="Bauwesen">
                                                <label class="form-check-label" for="Bauwesen">Bauwesen</label>
                                            </div>
                                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                <input type="checkbox" class="form-check-input" id="Bank">
                                                <label class="form-check-label" for="Bank">Bank Sparkasse</label>
                                            </div>
                                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                                                <input type="checkbox" class="form-check-input" id="Bauwesen">
                                                <label class="form-check-label" for="Bauwesen">Bauwesen</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer px-0 bg-white text-end pt-3 pb-0">
                                <button class="btn btn-gray btn-sm mb-2 mb-md-0">{{ __('Reset') }}</button>
                                <button class="btn btn-theme btn-sm">{{ __('Apply') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- frontpage banner search section end -->

    <!-- featured categores section start -->
    @include('components.featured_categories_slider')
    <!-- featured categores section end -->

    <!-- popular company section start -->
    @include('components.popular_companies_slider')
    <!-- popular company section end -->

    <!-- popular places section start -->
    @include('components.popular_places_slider')
    <!-- popular places section end -->

    <!-- Recent jobs section start -->
    @include('components.latest_jobs_slider')
    <!-- Recent jobs section end -->

    <!-- New Users section start -->
    @include('components.latest_users_slider')
    <!-- New Users section end -->

    <!-- Latest Reviews Section Start -->
    @include('components.latest_reviews_slider')
    <!-- Latest Reviews Section End -->
@stop
