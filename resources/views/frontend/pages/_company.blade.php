<div class="d-flex justify-content-between align-items-center">
    <p class="gray-clr card-body px-0 xs2-font mb-0">{{ __('labels.search.page') }}
        {{ $companies->firstItem() }} {{ __('labels.search.to') }}
        {{ $companies->lastItem() }},
        <span class="fw-500 dark-clr">{{ $companies->total() }} {{ __('labels.search.companies') }}</span>
    </p>

    <div class="filters-actions ms-auto">
        <div class="filter-action-btn">
            <button class="btn filter-btn d-md-none">
                <svg class="icon me-2">
                    <use xlink:href="#ic_filter"></use>
                </svg>
                Filter
            </button>
        </div>
        <div class="d-flex align-items-center sort-group">
                                    <span class="sort-label d-none d-md-block">
                                    {{ __('labels.search.sort_by') }}:
                                    </span>
            <div class="border border-start v-seperator position-static d-none"></div>
            <select class="custom-select form-control js-select-single sort-select">
                <option hidden="" selected="">{{ __('labels.search.sort_random') }}</option>
                <option>{{ __('labels.search.sort_name_asc') }}</option>
                <option>{{ __('labels.search.sort_name_desc') }}</option>
            </select>
        </div>
    </div>
</div>

<div class="row lo-row-list">
    @foreach($companies as $company)
        <div class="col-md-6 col-lg-4 col-xl-4">
            <div class="lo-card mb-4">
                <div class="lo-card-body card">
                    <div class="top-card position-relative">
                        <a href="{{route('frontend.company.information',[$company->id,$company->slug])}}">
                            <img src="{{ asset('storage') }}/{{ $company->thumbnail ?? 'placeholder_search.png' }}"
                                 class="card-img-top" alt="...">
                        </a>
                        <div class="homes-tag button alt featured f1 position-absolute text-dark bg-white">
                            <svg class="icon-18 me-1 theme-clr">
                                <use xlink:href="#ic_playcard"></use>
                            </svg>
                            {{ $company->category->value ?? '' }}
                        </div>
                        <button class="btn-icon bookmark-btn">
                            <input type="checkbox" id="bookmark" class="d-none">
                            <label for="bookmark" class="btn-bookmark mb-0">
                                <svg width="20" height="20">
                                    <use xlink:href="#ic_save"/>
                                </svg>
                            </label>
                        </button>
                        @if(isOpen($company->id))
                            <p class="percent-off xs-font font-medium bg-green text-white position-absolute">{{ __('labels.search.open') }}</p>
                        @else
                            <p class="percent-off xs-font font-medium bg-red text-white position-absolute">{{ __('labels.search.closed') }}</p>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between lo-head">
                            <a href="{{route('frontend.company.information',[$company->id,$company->slug])}}">
                                <h5 class="lo-name font-bold mb-0">{{$company['company_name']}}</h5>
                            </a>
                        </div>
                        <div class="d-flex mt-2 align-items-center">
                            <svg class="icon-20 me-1 gray-clr">
                                <use xlink:href="#ic_map_pin"></use>
                            </svg>
                            <p class="gray-clr mb-0 font-15 truncate-1">{{ $company->address }}</p>
                        </div>
                        <ul class="d-flex list-unstyled rating-view mt-2 mb-0">
                            @for($i=0;$i<rating($company->id);$i++)
                                <svg class="star-fill icon me-1">
                                    <use xlink:href="#ic_star"></use>
                                </svg>
                            @endfor
                            @for($i=0;$i<(5-rating($company->id));$i++)
                                <svg class="star icon me-1">
                                    <use xlink:href="#ic_star"></use>
                                </svg>
                            @endfor
                        </ul>
                    </div>
                    <!-- card body end -->
                </div>
            </div>
        </div>
        <!--col-end-->
    @endforeach
</div>

{{ $companies->links() }}

@push('js')
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
