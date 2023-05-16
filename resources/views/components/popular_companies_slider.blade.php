<section class="section-padding slider-section">
    <div class="container-fluid container-xl">
        <div class="list-top-bar d-flex justify-content-between align-items-center border-bottom">
            <h3 class="font-semibold section-title mb-3">{{ __('labels.company.recently_registered_companies') }}</h3>
            <a href="{{route('frontend.companies.list')}}"
               class="theme-clr xs-font text-uppercase font-medium ms-3 mb-2 view-all">{{ __('labels.company.view_all') }}</a>
        </div>


        <div class="row justify-content-center">
          <div class="col-12 px-md-0">
          <div class="multiple_slick">
                @foreach ($latest_companies as $company)
                
                    <div>
                        <div class="lo-card-body card">
                            <div class="top-card position-relative">
                                <a href="{{route('frontend.company.information',[$company->id,$company->slug])}}">
                                    <img src="{{ asset('storage') }}/{{ $company->thumbnail ?? '' }}" class="card-img-top" alt="...">
                                </a>
                                <div class="homes-tag button alt featured f1 position-absolute text-dark bg-white">
                                    @if( isset($company['category']['value']) )
                                        <svg class="icon-18 me-1 theme-clr">
                                            <use xlink:href="#ic_playcard"></use>
                                        </svg>
                                        {{$company->category->value}}
                                    @endif
                                </div>
                                <button class="btn-icon bookmark-btn">
                                    <input type="checkbox" id="bookmark" class="d-none">
                                    <label for="bookmark" class="btn-bookmark mb-0">
                                        <svg width="20" height="20">
                                            <use xlink:href="#ic_bookmark"/>
                                        </svg>
                                    </label>
                                </button>
                                @if(isOpen($company->id))
                                    <p class="percent-off xs-font font-medium bg-green text-white position-absolute">
                                        {{__('labels.company.open')}}</p>
                                @else
                                    <p class="percent-off xs-font font-medium bg-red text-white position-absolute">
                                    {{__('labels.company.closed')}}</p>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between lo-head">
                                    <a href="{{route('frontend.company.information',[$company->id,$company->slug])}}">
                                        <h5 class="lo-name font-bold mb-0">{{$company->company_name}}</h5>
                                    </a>
                                </div>
                                <div class="d-flex mt-2 align-items-center">
                                    <svg class="icon-20 me-1 gray-clr">
                                        <use xlink:href="#ic_map_pin"></use>
                                    </svg>
                                    <p class="gray-clr mb-0 font-15 truncate-1">{{$company->address}}</p>
                                </div>
                                <ul class="d-flex list-unstyled rating-view mt-2 mb-0">
                                    @for($i=0; $i < rating($company->id);$i++)
                                        <li>
                                            <svg class="yellow-clr">
                                                <use xlink:href="#ic_star"></use>
                                            </svg>
                                        </li>
                                    @endfor
                                    @for($i=0;$i< 5-rating($company->id); $i++)
                                        <li>
                                            <svg class="light-clr">
                                                <use xlink:href="#ic_star"></use>
                                            </svg>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <!-- card body end -->
                        </div>
                    </div>
                    
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
