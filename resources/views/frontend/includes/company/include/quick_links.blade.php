<div class="quick-links bg-light-gray pt-1 pt-md-2 pb-md-2">
            <div class="container-fluid container-xl">
                <div class="row">
                    <div class="col-12">
                        <ul class="d-flex nav quick-nav justify-content-lg-center list-unstyled cts-carousel">
                            <li class="nav-item">
                                <a href="tel:{{$company->phone_1}}" class="nav-link d-flex align-items-center">
                                    <svg class="icon-18 me-2">
                                        <use xlink:href="#ic_call"></use>
                                    </svg>
                                    <span>
                                        {{__('labels.quick_nav.call_now')}}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="mailto:{{ $company->email }}" class="nav-link d-flex align-items-center">
                                    <svg class="icon-18 me-2">
                                        <use xlink:href="#ic_mail"></use>
                                    </svg>
                                    <span>
                                    {{__('labels.company.email')}}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                @if(str_starts_with($company->website,'http'))
                                <a href="{{ $company->website }}" target="_blank" class="nav-link d-flex align-items-center">
                                    <svg class="icon-18 me-2">
                                        <use xlink:href="#ic_world"></use>
                                    </svg>
                                    <span>
                                    {{__('labels.company.website')}}
                                    </span>
                                </a>
                                @else
                                    <a href="//{{ $company->website }}" target="_blank" class="nav-link d-flex align-items-center">
                                        <svg class="icon-18 me-2">
                                            <use xlink:href="#ic_world"></use>
                                        </svg>
                                        <span>
                                    {{__('labels.company.website')}}
                                    </span>
                                    </a>
                                @endif
                            </li>
                            <li class="nav-item">
                                <a href="https://maps.google.com/?q={{$company->latitude}},{{$company->longitude}}" class="nav-link d-flex align-items-center" target="_blank">
                                    <svg class="icon-18 me-2">
                                        <use xlink:href="#ic_map_pin"></use>
                                    </svg>
                                    <span>
                                    {{__('labels.company.get_direction')}}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown dropdown-animate py-1 share-nav" data-bs-toggle="hover">
                                    <div class="d-flex align-items-center nav-link" data-bs-toggle="dropdown" data-bs-offset="10,20">
                                        <svg class="icon-18 me-2">
                                            <use xlink:href="#ic_share"></use>
                                        </svg>
                                        <span>
                                        {{__('labels.quick_nav.share')}}
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
{{--                            <li class="nav-item">--}}
{{--                                <a href="javascript:void(0)" class="nav-link d-flex align-items-center">--}}
{{--                                    <svg class="icon-18 me-2">--}}
{{--                                        <use xlink:href="#ic_bookmark"></use>--}}
{{--                                    </svg>--}}
{{--                                    <span>--}}
{{--                                        Bookmark--}}
{{--                                    </span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            <li class="nav-item">
                                <a href="{{ route('frontend.company.reviews', [$company, 'slug' => $company->slug]) }}" class="nav-link d-flex align-items-center">
                                    <svg class="icon-18 me-2">
                                        <use xlink:href="#ic_star_line"></use>
                                    </svg>
                                    <span>
                                    {{__('labels.review.submit_review')}}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
