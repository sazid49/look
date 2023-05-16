@extends('frontend.layouts.master')

@section('title')
    Company - @yield("title")
@endsection

@section('content')
    <main class="fixheight pt-0">
    

        <section class="d-flex align-items-center listing-profile-header">
        
            <div class="container-fluid container-xl">
                <div class="row">
                @include('frontend.includes.company.include.breadcrumb')
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-name">
                            <a href="#">
                                <img src="{{ url('storage/'. $company->logo) }}" alt="" class="listing-logo me-3">
                                {{-- <img src="{{ asset('storage') }}/{{ $company->logo }}" alt="" class="listing-logo me-3"> --}}
                            </a>
                            <div class="d-sm-flex align-items-center flex-grow-1">
                                <div>
                                    <div class="d-flex">
                                        <h1 class="md-font font-semibold xs2-font mb-1 me-3">{{ $company->company_name }}</h1>
                                        <div class="d-flex d-sm-none ms-auto">
                                        <span class="d-flex mb-2 ms-1 mt-1">
                                            @if($company->ReviewRating->sum('rating') > 0)
                                                @for($i=0;$i<rating($company->id);$i++)
                                                    <svg class="icon-14 star-fill me-1">
                                                        <use xlink:href="#ic_star"></use>
                                                    </svg>
                                                @endfor
                                                @for($i=0;$i<(5-rating($company->id));$i++)
                                                    <svg class="icon-14 star me-1">
                                                        <use xlink:href="#ic_star"></use>
                                                    </svg>
                                                @endfor
                                            @else
                                                <svg class="icon-14 star me-1">
                                                    <use xlink:href="#ic_star"></use>
                                                </svg>
                                            @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-0 d-flex flex-wrap align-items-center gray-clr">
                                        <div class="mb-2 mb-md-0">
                                            <svg class="icon-20 me-1">
                                                <use xlink:href="#ic_map_pin"></use>
                                            </svg>
                                            <span
                                                class="font-14 me-3">{{ $company->address }}, {{  $company->postcode }} {{ $company->city }}</span>
                                        </div>
                                    </div>
                                    <div class="d-none d-sm-flex">
                                    <span class="d-flex mb-1 mt-2 ms-1">
{{--                                        @php--}}
                                        {{--                                            $reviewCount = $company->ReviewRating->count();--}}
                                        {{--                                            $reviewRating = $company->ReviewRating->sum('rating');--}}
                                        {{--                                            $rating = $reviewCount > 0 ? ceil($reviewRating / $reviewCount) : 0;--}}
                                        {{--                                        @endphp--}}
                                        @if($company->ReviewRating->sum('rating') > 0)
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
                                        @else
                                            @for($i=0;$i<5;$i++)
                                                <svg class="star icon me-1">
                                                    <use xlink:href="#ic_star"></use>
                                                </svg>
                                            @endfor
                                        @endif
                                    </span>
                                    </div>
                                </div>
                                <div class="ms-auto gray-clr text-end">
                                    <div class="d-flex justify-content-md-end">
                                        <div class="mb-2 mb-md-2 mt-md-0">
                                            @foreach(explode(',',$company->keywords) as $keyword)
                                                <span class="badge bg-secondary">{{ $keyword }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-md-end">
                                        <div class="mb-2 mb-md-2 mt-md-0">
                                            <svg class="icon-20 me-1">
                                                <use xlink:href="#ic_eye"></use>
                                            </svg>
                                            <span class="font-14">{{ $company->hits }}</span>
                                            {{--                                            <span class="d-none">{{ $company->increment('hits') }}</span>--}}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-md-end">
                                        <div class="mb-2 mb-md-2 mt-md-0">
                                            <svg class="icon-20 me-1">
                                                <use xlink:href="#ic_date"></use>
                                            </svg>
                                            <span
                                                class="font-14">{{ __('Last Updated') }}: {{ $company->updated_at->format('d.m.Y') }}</span>
                                        </div>
                                    </div>

                                    <div class="mb-3 d-flex align-items-center font-14  justify-content-md-end">
                                        <svg class="icon-20 me-1">
                                            <use xlink:href="#ic_filepencil"></use>
                                        </svg>
                                        <span>
                                            @if($company->claimed == 1)
                                                {{ __('labels.company.listing_managed_by_company') }}
                                            @else
                                                {{ __('labels.company.listing_managed_by_lookon') }}
                                            @endif
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
        @include('frontend.includes.company.include.tab_menu')
        <!-- Tab Menu End -->

        <!-- quick links header -->
        @include('frontend.includes.company.include.quick_links')
        <!-- quick links header end -->

        <section class="list-detail">
            <div class="container-fluid container-xl">
                <div class="tab-content py-4">
                    @yield('tabcontent')
                </div>
            </div>
        </section>
    </main>
@endsection
