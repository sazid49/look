<section class="section-padding slider-section pt-0">
    <div class="container-fluid container-xl">
        <div class="list-top-bar d-flex justify-content-between align-items-center border-bottom">
            <h3 class="font-semibold section-title mb-3">{{ __('labels.company.latest_reviews') }}</h3>
            <a href="{{ route('frontend.reviews') }}" class="theme-clr xs-font text-uppercase font-medium ms-3 mb-3 view-all">{{ __('labels.company.view_all') }}</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 px-md-0">
                <div class="testimonial_slick ">
                    @foreach($reviews as $review)
                        <div>
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
        </div>
    </div>
</section>
