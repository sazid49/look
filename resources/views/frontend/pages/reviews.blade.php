@extends('frontend.layouts.master')

@section('title','All Jobs')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($reviews as $review)
                <div class="col-3 my-2">
                    <div class="card testimonial-card">
                        <div class="card-body p-0">
                            <div class="d-flex">
                                
                                <div class="rounded-circle position-relative">
                                            <img src="{{ asset('storage') }}/{{ $review->company->logo ?? '' }}" 
                                            alt="{{ $review->company->company_name ?? ''}}" class="ts-img img-fluid rounded-circle position-relative">
                                </div>
                                <div class="ps-3 body-font">
                                    <p class="mb-1 fw-600 text-capitalize">{{ $review->company->company_name ?? '' }}</p>
                                    <div class="xs-font mb-1 d-sm-flex gray-clr d-block">
                                        <div class="mb-1">
                                            <svg class="icon-18 me-1 gray-clr">
                                                <use xlink:href="#ic_map_pin"></use>
                                            </svg>
                                            {{ $review->company->city ?? '' }}
                                        </div>
                                        <div class="mb-1">
                                            <svg class="icon-18 me-1 gray-clr ms-sm-2">
                                                <use xlink:href="#ic_date"></use>
                                            </svg>{{ $review->created_at->format('d.m.Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tsdesc d-flex flex-column">
                                <div class="d-flex mb-1">
                                @if($review->company)
                                    @php
                                        $reviewCount = $review->company->ReviewRating->count();
                                        $reviewRating = $review->company->ReviewRating->sum('rating');
                                        $rating = $reviewCount > 0 ? ceil($reviewRating / $reviewCount) : 0;
                                    @endphp
                                    @if($review->company->ReviewRating->sum('rating') > 0)
                                        @for($i=0;$i<$rating;$i++)
                                            <svg class="icon-18 star-fill">
                                                <use xlink:href="#ic_star"></use>
                                            </svg>
                                        @endfor
                                        @for($i=0;$i<(5-$rating);$i++)
                                            <svg class="icon-18 star">
                                                <use xlink:href="#ic_star"></use>
                                            </svg>
                                        @endfor
                                    @else
                                        @for($i=0;$i<5;$i++)
                                            <svg class="icon-18 star">
                                                <use xlink:href="#ic_star"></use>
                                            </svg>
                                        @endfor
                                    @endif
                                @endif
                                </div>
                                <p class="mb-2 gray-clr truncate-4">
                                    {{ $review->review }}
                                </p>
                                <svg class="quote quote-right gray-clr mb-2 me-2">
                                    <use xlink:href="#ic_quote"></use>
                                </svg>
                            </div>
                            <div class="body-font mt-auto">
                                <p class="mb-1 fw-600 text-capitalize">{{ $review->firstname }}&nbsp;{{ $review->lastname }}</p>
                                <p class="gray-clr xs-font">{{ $review->city }} {{ $review->postcode }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@stop
