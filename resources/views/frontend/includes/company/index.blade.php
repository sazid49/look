@extends('frontend.layouts.legacy.app')

@section('title', __('labels.search.list_company'))

@section('style')
    <style>
        .pagination > li > a {
            cursor: pointer;
        }

        .pagination > li {
            list-style-type: none;
        }

        ul > li {
            list-style-type: none;
        }

        ul > li > label {
            padding-left: 5px;
            vertical-align: middle;
        }

        .price {
            font-size: 20px;
        }
    </style>
@stop

@section('content')
    {{-- <div class="row"> --}}
    {{-- <div class="section"> --}}
    <div class="row">
        <!-- Filter Panel -->
        <div class="col-md-3 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>Filter</h3>
                </div>
                <div class="card-body">

                    {{ Form::open(['route' => 'frontend.list.filter', 'method' => 'get', 'class' => 'form']) }}
                    <p class="filter-title">{{ __('Current Filter') }}</p>
                    <p id="filter-item-category"></p>
                    <p id="filter-item-type"></p>
                    <p id="filter-item-brand"></p>
                    <p id="filter-item-color"></p>
                    <p id="filter-item-offer"></p>
                    <p class="filter-title">{{ __('Search') }}</p>
                    <p>{{ Form::text('search', $search_word, ['id' => 'search', 'class' => 'form-control', 'placeholder' => 'Name or Description']) }}
                    </p>
                    <p class="filter-title"><a data-toggle="collapse" href="#collapseCat" aria-expanded="false"
                                               aria-controls="collapseExample">{{ __('Product Category') }}</a></p>
                    <ul class="filter-cat collapse show" id="collapseCat">
                        @foreach ($repository->categories() as $id => $category)
                            <li>
                                {{ Form::checkbox($category, $id, FALSE, ['class' => 'category']) }}
                                {{ Form::label($category, $category) }}
                                <span>({{ \App\Models\Category::query()->findOrFail($id)->companies->count() }})</span>
                            </li>
                        @endforeach
                        <li><a id="loadCat" style="color:blue;text-decoration: underline;cursor: pointer;">Load More
                                >>></a></li>
                    </ul>
                    <br>
                    <p class="filter-title">
                        <label for="only_with_image">
                            <input type="checkbox" name="only_with_image" id="only_with_image" value="1">
                            &nbsp; Only with Image
                        </label><br>
                    </p>
                    <p class="filter-title">
                        <label for="upto_date">
                            <input type="checkbox" name="upto_date" id="upto_date" value="1">
                            &nbsp; Updated in last 30 days
                        </label><br>
                    </p>
                    <p class="filter-title">
                        <label for="free_jobs">
                            <input type="checkbox" name="free_jobs" id="free_jobs" value="1">
                            &nbsp; Free Jobs
                        </label><br>
                    </p>
                    <p class="filter-title">
                        <label for="quotation_form">
                            <input type="checkbox" name="quotation_form" id="quotation_form" value="1">
                            &nbsp; Quotation form
                        </label><br>
                    </p>
                    <p class="filter-title">
                        <label for="has_in_canton">
                            <input type="checkbox" name="has_in_canton" id="has_in_canton" value="1">
                            &nbsp; Canton
                        </label><br>
                    </p>
                    <p class="filter-title">
                        <label for="status">Status:</label><br>
                    </p>
                    <select name="status" id="status" class="form-control">
                        <option value="">Select</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <br>
                    <p class="filter-title">
                        <label for="current_status">Opening Status:</label><br>
                    </p>
                    <select name="current_status" id="current_status" class="form-control">
                        <option value="">Select</option>
                        <option value="Open">Open</option>
                        <option value="Closed">Closed</option>
                    </select>
                    <br>
                    <p class="filter-title">
                        <label for="amount">Price range:</label>
                        {{-- <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;"> --}}
                    </p>
                    <input type="text" class="js-range-slider" id="amount" name="my_range" value=""/>
                    {{-- <div id="slider-range"></div> --}}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <!-- /Filter Panel -->
        <!-- Search Result -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Result</h3>
                </div>
                <div class="card-body">
                    <div>
                        <div class="form-group row">
                            {{ Form::label('sorting', 'Sort By:', ['class' => 'col-form-label col-sm-2 text-right']) }}
                            <div class="col-sm-3">
                                {{ Form::select('sorting', $repository->sorting(), NULL, ['class' => 'form-control', 'id' => 'sorting', 'placeholder' => 'Select for sorting']) }}
                            </div>
                            <div class="col-sm-3">
                                {{ Form::select('direction', $repository->direction(), NULL, ['class' => 'form-control', 'id' => 'direction']) }}
                            </div>
                            {{ Form::label('qty', 'Display:', ['class' => 'col-form-label col-sm-2 text-right']) }}
                            <div class="col-sm-2">
                                {{ Form::select('qty', [3 => 3, 6 => 6, 9 => 9], 6, ['class' => 'form-control', 'id' => 'qty']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body" id="result">
                    <!-- Search result will appeared here -->
                    @include('frontend.company.company')
                </div>
                <!-- Pagination -->
                <div class="text-center">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center" id="pagination">

                        </ul>
                    </nav>
                </div>
                <!-- /Pagination -->
            </div>
        </div>
        <!-- /Search Result -->
    </div>
    {{-- </div> --}}
    {{-- </div> --}}
@stop

@section('script')

    <script>
        var xhr = new XMLHttpRequest();

        function faceted(page) {
            var csrf = "{{ csrf_token() }}";
            var search = $("#search").val();

            var status = $("#status").val();
            var current_status = $("#current_status").val();
            var only_with_image = $("#only_with_image:checked").val();
            var upto_date = $("#upto_date:checked").val();
            var quotation_form = $("#quotation_form:checked").val();
            var free_jobs = $("#free_jobs:checked").val();
            var has_in_canton = $("#has_in_canton:checked").val();

            var categories = [];
            var types = [];
            var brands = [];
            var colors = [];
            var offers = [];
            var price = $("#amount").val();
            var sorting = $("#sorting").val();
            var direction = $("#direction").val();
            var qty = $("#qty").val();
            var categoryName = [];
            var typeName = [];
            var brandName = [];
            var colorName = [];
            var offerName = [];
            $(".category:checked").each(function () {
                categories.push($(this).val());
                categoryName.push(this.name);
                $("#filter-item-category").html('<b>Category: </b>' + categoryName);
            });

            if (categories.length == 0) {
                $("#filter-item-category").html('')
            }

            if (xhr !== 'undefined') {
                xhr.abort(); //stop existing ajax request if new request has been sent to server
            }
            xhr = $.ajax({
                url: 'filter',
                data: {
                    _token: csrf,
                    search: search,
                    categories: categories,
                    status: status,
                    current_status: current_status,
                    only_with_image: only_with_image,
                    upto_date: upto_date,
                    quotation_form: quotation_form,
                    free_jobs: free_jobs,
                    has_in_canton: has_in_canton,
                    // brands: brands,
                    // colors: colors,
                    // types: types,
                    // offers: offers,
                    price: price,
                    sorting: sorting,
                    direction: direction,
                    page: page,
                    qty: qty
                },
                type: 'post',
                beforeSend: function () {
                    $("#result").html('<img src="{{ asset('frontend/image/spinner.png') }}" alt=""/>')
                }
            }).done(function (e) {
                $data = $(e);
                $("#result").html($data);
            });
        }
    </script>
    <script>
        @if ($search_word != '')
        faceted();
        @endif
        $("#search").keyup(function () {
            faceted();
        })
        $(".category").on('click', function () {
            faceted();
        })
        $(".type,.brand,.color,.offer").on("click", function () {
            faceted();
        });
        $("#sorting,#direction,#qty,#status,#current_status,#only_with_image,#upto_date,#quotation_form,#free_jobs,#has_in_canton").on('change', function () {
            faceted();
        });

        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var page = url.split('page=')[1];
            window.history.pushState("", "", url);
            faceted(page);
        })
    </script>
    <script>
        $(".js-range-slider").ionRangeSlider({
            type: "double",
            min: 0,
            max: 1000,
            from: 0,
            to: 1000,
            grid: true,
            onChange: function (data) {
                console.dir(data);
                console.log("$" + data.from + " - $" + data.to);
                $("#amount").val("$" + data.from + ";$" + data.to);
                faceted();
            }
        });
    </script>
    <script>
        /** load more categories */
        $("#loadCat").click(function () {
            var categories = $(".category").length;
            var csrf = "{{ csrf_token() }}";
            $.ajax({
                url: 'load-cat',
                data: {
                    _token: csrf,
                    categories: categories
                },
                type: 'post',
                beforeSend: function () {
                    $("#collapseBrand").addClass('loading');
                }
            }).done(function (e) {
                //$("#collapseCat #loadCat").before(e);
                $("#collapseCat li").last().before(e);
                $("#collapseCat").removeClass('loading');
                $(".category").is("#last-cat") ? $("#loadCat").remove() : '';
                $(".category").click(function () {
                    faceted();
                });
            })
        });
        /** load more brands */
        $("#loadBrand").click(function () {
            var brands = $(".brand").length;
            var csrf = "{{ csrf_token() }}";
            $.ajax({
                url: 'load-brand',
                data: {
                    _token: csrf,
                    brands: brands
                },
                type: 'post',
                beforeSend: function () {
                    $("#collapseBrand").addClass('loading');
                }
            }).done(function (e) {
                $("#collapseBrand #loadBrand").before(e);
                $("#collapseBrand").removeClass('loading');
                $(".brand").is("#last-brand") ? $("#loadBrand").remove() : '';
                $(".brand").click(function () {
                    faceted();
                });
            })
        });
        /** load more types */
        $("#loadType").click(function () {
            var types = $(".type").length;
            var csrf = "{{ csrf_token() }}";
            $.ajax({
                url: 'load-type',
                data: {
                    _token: csrf,
                    types: types
                },
                type: 'post',
                beforeSend: function () {
                    $("#collapseType").addClass('loading');
                }
            }).done(function (e) {
                $("#collapseType #loadType").before(e);
                $("#collapseType").removeClass('loading');
                $(".type").is("#last-type") ? $("#loadtype").remove() : '';
                $(".type").click(function () {
                    faceted();
                });
            })
        });
        /** load more colors */
        $("#loadColor").click(function () {
            var colors = $(".color").length;
            var csrf = "{{ csrf_token() }}";
            $.ajax({
                url: 'load-color',
                data: {
                    _token: csrf,
                    colors: colors
                },
                type: 'post',
                beforeSend: function () {
                    $("#collapseColor").addClass('loading');
                }
            }).done(function (e) {
                $("#collapseColor #loadColor").before(e);
                $("#collapseColor").removeClass('loading');
                $(".color").is("#last-color") ? $("#loadColor").remove() : '';
                $(".color").click(function () {
                    faceted();
                });
            })
        });
        /** load more offers */
        $("#loadOffer").click(function () {
            var offers = $(".offer").length;
            var csrf = "{{ csrf_token() }}";
            $.ajax({
                url: 'load-offer',
                data: {
                    _token: csrf,
                    offers: offers
                },
                type: 'post',
                beforeSend: function () {
                    $("#collapseOffer").addClass('loading');
                }
            }).done(function (e) {
                $("#collapseOffer #loadOffer").before(e);
                $("#collapseOffer").removeClass('loading');
                $(".offer").is("#last-offer") ? $("#loadOffer").remove() : '';
                $(".offer").click(function () {
                    faceted();
                });
            })
        });
    </script>

@stop
