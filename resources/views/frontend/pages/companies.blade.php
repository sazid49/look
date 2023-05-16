@extends('frontend.layouts.master')

@section('title', __('labels.category.tab_title'))

@section('content')
    <main class="search-page pt-0">
        <section class="search-section">
            <div class="container-fluid container-xl">
                <div class="row main-content ms-md-0 position-relative">
                    <div class="sidebar col-md-4 col-lg-3 px-0">
                        <!-- <div class="position-sticky top-70"> -->
                        <h2 class="font-medium text-uppercase body-font border-bottom filter-header d-flex d-md-none mb-0 align-items-center">
                      <span>
                        <svg class="icon me-2 filter-close-btn d-md-none">
                          <use xlink:href="#ic_back"></use>
                        </svg>
                      </span>
                            {{ __('labels.general.filter') }}
                        </h2>
                        <div class="filter-inner d-flex flex-column">
                            <div class="filter-body">
                                <div>
                                    <h2 class="font-semibold body-font border-bottom filter-title">{{ __('labels.search.search_something') }}</h2>
                                    <div class="mb-3 filter-options overflow-y-auto" id="category-options">
                                        <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}">
                                    </div>
                                    <h2 class="font-semibold body-font border-bottom filter-title">Categories</h2>
                                    <div class="mb-3 filter-options overflow-y-auto" id="category-options">
                                        @foreach($category_list as $category)
                                            <div class="custom-control custom-checkbox form-check mb-3">
                                                <input type="checkbox" class="form-check-input category"
                                                       id="cat-{{$category->category_id}}"
                                                       value="{{ $category->category_id }}" @if(request()->has('categories')){{ in_array($category->category_id,request()->get('categories')) ? 'checked' : '' }}@endif>
                                                <label class="form-check-label"
                                                       for="cat-{{$category->category_id}}">{{ $category->value }}
                                                    ({{-- $category->companies->count() --}})</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <label for="image" class="my-4 d-block">
                                        <input type="checkbox" class="form-check-input" name="image" id="image"
                                               value="1">
                                        <strong>{{ __('labels.search.filter_only_with_image') }}</strong>
                                    </label>

                                    <label for="updated" class="mb-4 d-block">
                                        <input type="checkbox" class="form-check-input" name="updated" id="updated">
                                        <strong>{{ __('labels.search.filter_updated_last_30_days') }}</strong>
                                    </label>

                                    <label for="offer" class="mb-4 d-block">
                                        <input type="checkbox" class="form-check-input" name="offer" id="offer">
                                        <strong>{{ __('labels.search.filter_with_quotation_form') }}</strong>
                                    </label>

                                    <label for="jobs" class="mb-4 d-block">
                                        <input type="checkbox" class="form-check-input" name="jobs" id="jobs">
                                        <strong>{{ __('labels.search.filter_with_free_jobs') }}</strong>
                                    </label>

                                    <label for="active" class="mb-4 d-block">
                                        <input type="checkbox" class="form-check-input" name="active" id="active">
                                        <strong>{{ __('labels.search.filter_active_companies') }}</strong>
                                    </label>

                                    <label for="open" class="mb-4 d-block">
                                        <input type="checkbox" class="form-check-input" name="open" id="open">
                                        <strong>{{ __('labels.search.filter_opened_now') }}</strong>
                                    </label>

                                    <h2 class="font-semibold body-font border-bottom filter-title">Canton</h2>
                                    <div class="mb-3 filter-options overflow-y-auto" id="canton-options">
                                        @foreach($cantons as $canton)
                                            <div class="custom-control custom-checkbox form-check mb-3">
                                                <input type="checkbox" class="form-check-input canton"
                                                       id="cat-{{$canton->id}}" value="{{ $canton->iso }}">
                                                <label class="form-check-label"
                                                       for="cat-{{$canton->id}}">{{ $canton->value }}({{-- $canton->companies->count() --}})</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <h2 class="font-semibold body-font border-bottom filter-title">{{ __('Rating') }}</h2>
                                    <div class="mb-3 theme-clr xs2-font d-flex justify-content-between">
                                        <span id="slider-range-value1"></span>
                                        <span id="slider-range-value2"></span>
                                    </div>
                                    <div class="mb-30 filter-options range-filter">
                                        <div>
                                            <div id="slider-range"></div>
                                        </div>
                                        <form>
                                            <input type="hidden" name="min-value" id="min-value" value="">
                                            <input type="hidden" name="max-value" id="max-value" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white text-end pt-4 pb-0 d-block mt-auto">
                            <button class="btn btn-theme btn-sm w-100">{{ __('labels.search.search_something') }}</button>
                        </div>
                        <button class="btn px-0 pt-0 font-medium xxs-font text-uppercase reset-filter d-flex align-items-center" onclick="resetFilter()">
                            <svg class="icon-20 me-1">
                                <use xlink:href="#ic_reset"></use>
                            </svg>
                            {{ __('labels.search.reset_filters') }}
                        </button>
                        <div class="alert text-center mt-md-4 looking-alert">
                            {{ __('labels.search.looking_places') }} <a class="font-semibold text-underline text-nowrap" href="places.php">
                                {{ __('labels.search.click_here') }}</a>
                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="content col-md-8 col-lg-9">
                        <div id="result">
                            <!-- tabs start here -->
                            {{--                            <div class="d-flex justify-content-between align-items-center">--}}
                            {{--                                <p class="gray-clr card-body px-0 xs2-font mb-0">{{_('labels.search.page')}} <span--}}
                            {{--                                        class="fw-500 dark-clr">{{ $companies->firstItem() }}</span> {{ __('labels.search.to')}} <span--}}
                            {{--                                        class="fw-500 dark-clr">{{ $companies->lastItem() }}</span>--}}
                            {{--                                        {{ __('labels.search.found')}} {{ $companies->total() }} <span class="fw-500 dark-clr">{{ __('labels.search.companies')}}</span></p>--}}

                            {{--                                <div class="filters-actions ms-auto">--}}
                            {{--                                    <div class="filter-action-btn">--}}
                            {{--                                        <button class="btn filter-btn d-md-none">--}}
                            {{--                                            <svg class="icon me-2">--}}
                            {{--                                                <use xlink:href="#ic_filter"></use>--}}
                            {{--                                            </svg>--}}
                            {{--                                            Filter--}}
                            {{--                                        </button>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="d-flex align-items-center sort-group">--}}
                            {{--                                    <span class="sort-label d-none d-md-block">--}}
                            {{--                                    {{_('labels.search.sort_by')}}:--}}
                            {{--                                    </span>--}}
                            {{--                                        <div class="border border-start v-seperator position-static d-none"></div>--}}
                            {{--                                        <select class="custom-select form-control js-select-single sort-select">--}}
                            {{--                                            <option value="popularity" selected="">{{_('labels.search.sort_random')}}</option>--}}
                            {{--                                            <option value="view">view</option>--}}
                            {{--                                            <option value="founded">Founded</option>--}}
                            {{--                                        </select>--}}
                            {{--                                        --}}{{--                                    <select class="custom-select form-control js-select-single sort-select">--}}
                            {{--                                        --}}{{--                                        <option value="asc" selected="">Ascending</option>--}}
                            {{--                                        --}}{{--                                        <option value="desc">Descending</option>--}}
                            {{--                                        --}}{{--                                    </select>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            {{--                            <div class="row lo-row-list">--}}
                            {{--                                @foreach($companies as $company)--}}
                            {{--                                    <div class="col-md-6 col-lg-4 col-xl-4">--}}
                            {{--                                        <div class="lo-card mb-4">--}}
                            {{--                                            <div class="lo-card-body card">--}}
                            {{--                                                <div class="top-card position-relative">--}}
                            {{--                                                    <a href="{{route('frontend.company.information',[$company->id,$company->slug])}}">--}}
                            {{--                                                        <img--}}
                            {{--                                                            src="{{ asset('storage') }}/{{ $company->thumbnail ?? 'placeholder_search.png' }}"--}}
                            {{--                                                            class="card-img-top" alt="...">--}}
                            {{--                                                    </a>--}}
                            {{--                                                    <div--}}
                            {{--                                                        class="homes-tag button alt featured f1 position-absolute text-dark bg-white">--}}
                            {{--                                                        <svg class="icon-18 me-1 theme-clr">--}}
                            {{--                                                            <use xlink:href="#ic_playcard"></use>--}}
                            {{--                                                        </svg>--}}
                            {{--                                                        {{ $company->category->value ?? '' }}--}}
                            {{--                                                    </div>--}}
                            {{--                                                    <button class="btn-icon bookmark-btn">--}}
                            {{--                                                        <input type="checkbox" id="bookmark" class="d-none">--}}
                            {{--                                                        <label for="bookmark" class="btn-bookmark mb-0">--}}
                            {{--                                                            <svg width="20" height="20">--}}
                            {{--                                                                <use xlink:href="#ic_save"/>--}}
                            {{--                                                            </svg>--}}
                            {{--                                                        </label>--}}
                            {{--                                                    </button>--}}
                            {{--                                                    @if(isOpen($company->id))--}}
                            {{--                                                        <p class="percent-off xs-font font-medium bg-green text-white position-absolute">{{ __('Open') }}</p>--}}
                            {{--                                                    @else--}}
                            {{--                                                        <p class="percent-off xs-font font-medium bg-red text-white position-absolute">{{ __('Closed') }}</p>--}}
                            {{--                                                    @endif--}}
                            {{--                                                </div>--}}
                            {{--                                                <div class="card-body">--}}
                            {{--                                                    <div class="d-flex justify-content-between lo-head">--}}
                            {{--                                                        <a href="{{route('frontend.company.information',[$company->id,$company->slug])}}">--}}
                            {{--                                                            <h5 class="lo-name font-bold mb-0">{{$company['company_name']}}</h5>--}}
                            {{--                                                        </a>--}}
                            {{--                                                    </div>--}}
                            {{--                                                    <div class="d-flex mt-2 align-items-center">--}}
                            {{--                                                        <svg class="icon-20 me-1 gray-clr">--}}
                            {{--                                                            <use xlink:href="#ic_map_pin"></use>--}}
                            {{--                                                        </svg>--}}
                            {{--                                                        <p class="gray-clr mb-0 font-15 truncate-1">{{ $company->address }}</p>--}}
                            {{--                                                    </div>--}}
                            {{--                                                    <ul class="d-flex list-unstyled rating-view mt-2 mb-0">--}}
                            {{--                                                        @for($i=0;$i<rating($company->id);$i++)--}}
                            {{--                                                            <svg class="star-fill icon me-1">--}}
                            {{--                                                                <use xlink:href="#ic_star"></use>--}}
                            {{--                                                            </svg>--}}
                            {{--                                                        @endfor--}}
                            {{--                                                        @for($i=0;$i<(5-rating($company->id));$i++)--}}
                            {{--                                                            <svg class="star icon me-1">--}}
                            {{--                                                                <use xlink:href="#ic_star"></use>--}}
                            {{--                                                            </svg>--}}
                            {{--                                                        @endfor--}}
                            {{--                                                    </ul>--}}
                            {{--                                                </div>--}}
                            {{--                                                <!-- card body end -->--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                    <!--col-end-->--}}
                            {{--                                @endforeach--}}
                            {{--                            </div>--}}

                            {{--                            {{ $companies->links() }}--}}
                        </div>


                    </div>
                </div>
            </div>
        </section>

        <!-- <div class="main-content"></div> -->
    </main>
@stop

@push('js')

    <script>
        var xhr = new XMLHttpRequest();

        function faceted(page) {
            {{--var csrf = "{{ csrf_token() }}";--}}
            var search = $("#search").val();
            var categories = [];
            var cantons = [];
            var image = $("#image").is(':checked');
            var updated = $("#updated").is(':checked');
            var jobs = $("#jobs").is(':checked');
            var active = $("#active").is(':checked');
            var open = $("#open").is(':checked');
            var offer = $("#offer").is(':checked');
            var min = $("#min-value").val();
            var max = $("#max-value").val();
            var sorting = $("#sorting").val();
            var direction = $("#direction").val();
            var qty = $("#qty").val();

            var categoryName = [];
            var cantonName = [];

            $(".category:checked").each(function () {
                categories.push($(this).val());
                categoryName.push(this.name);
                $("#filter-item-category").html('<b>Category: </b>' + categoryName);
            });

            $(".canton:checked").each(function () {
                cantons.push($(this).val());
                cantonName.push(this.name);
                $("#filter-item-canton").html('<b>Canton: </b>' + cantonName);
            });

            if (categories.length == 0) {
                $("#filter-item-category").html('')
            }

            if (cantons.length == 0) {
                $("#filter-item-canton").html('')
            }

            if (xhr !== 'undefined') {
                xhr.abort(); //stop existing ajax request if new request has been sent to server
            }

            xhr = $.ajax({
                url: "{{ url('companies/search') }}",
                data: {
                    // _token: csrf,
                    search: search,
                    categories: categories,
                    cantons: cantons,
                    image: image,
                    updated: updated,
                    offer: offer,
                    jobs: jobs,
                    active: active,
                    open: open,
                    min: min,
                    max: max,
                    sorting: sorting,
                    direction: direction,
                    page: page,
                    qty: qty
                },
                type: 'get',
                beforeSend: function () {
                    $("#result").html('<img src="{{ asset('assets/images/spinner.gif') }}" class="loading_site" alt=""/>')
                }
            }).done(function (e,xhr,settings) {
                $data = $(e);
                //console.log(settings.url);
                $("#result").html($data);
            });
        }

        $( document ).ajaxComplete(function( event, request, settings ) {
            window.history.pushState("", "", settings.url);
        });
    </script>

    <script>
        $("#search").keyup(function () {
            faceted();
        })
    </script>

    <script>
        $(".category,.canton,#image,#updated,#jobs,#active,#open,#offer").on('click', function () {
            faceted();
        })
    </script>

    <script>
        function resetFilter(){
            $("#search").val('');
            $(".category").prop('checked',false);
            $(".canton").prop('checked',false);
            $("#image").prop('checked',false);
            $("#updated").prop('checked',false);
            $("#jobs").prop('checked',false);
            $("#active").prop('checked',false);
            $("#open").prop('checked',false);
            $("#offer").prop('checked',false);
            $("#min-value").val(0);
            $("#max-value").val(5);
            $(".noUi-connect").css('left','0%');
            $(".noUi-base .noUi-background").css('left','100%');
            $("#slider-range-value1").text(0);
            $("#slider-range-value2").text(5);
            faceted();
        }
    </script>

    <script>
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var page = url.split('page=')[1];
            window.history.pushState("", "", url);
            faceted(page);
        })
    </script>

@endpush
