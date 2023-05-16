<div class="row">
    <div class="col-md-12">
        <div class="card text-center">
            <div class="card-body">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <x-utils.link class="nav-link" :href="route('frontend.places.information', [$place, 'slug' => $place->slug])" :active="activeClass(Route::is('frontend.places.information'), 'active')" :text="__('labels.company.information')" />
                    </li>

                    <li class="nav-item">
                        <x-utils.link class="nav-link {{ $place->active == 'yes' && $place->published == 1 ? '' : 'disabled'  }}"
                            :href="route('frontend.places.gallery', [$place, 'slug' => $place->slug])" :active="activeClass(Route::is('frontend.places.gallery'), 'active')" :text="__('labels.company.galerie')" />
                    </li>

                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ $place->active == 'yes' && $place->published == 1 ? '' : 'disabled'  }}"
                            :href="route('frontend.places.reviews', [$place, 'slug' => $place->slug])" :active="activeClass(Route::is('frontend.places.reviews'), 'active')" :text="__('labels.company.reviews')" />
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">

    <div class="col-md-8 mb-3 mb-md-0">
        <div class="card h-100">
            <div>
                <br>
                @php
                    $update_at = $place->updated_at;
                    $someDate = new \DateTime($update_at);
                    $now = new \DateTime();
                @endphp
             <div class="pull-right pull-down">
                    <i class="fa fa-refresh" data-toggle="tooltip"
                        title="{{ __('alerts.company.head.refresh_notify') }}"
                        style="color: {{ $someDate->diff($now)->days <= 30 ? 'GREEN' : 'GREY' }}; font-size: 18px !important"></i>&nbsp;&nbsp;&nbsp;
                </div>

            </div>
            <div class="card-body h-100 position-relative row">

                <div class="d-flex align-items-center col-md-9">

                    <div class="rounded-circle border company-logo">
                        @if (!empty($place->image_logo))
                            @if (Storage::disk('public')->exists($place->image_logo))
                                <img class="personal_logo" alt="no data"
                                    src="{{ url('storage/' . $place->image_logo) }}" class='rounded-circle'
                                    height="100px">
                            @else
                                <img src="https://via.placeholder.com/110/cbe2f3/00c8fa" class="rounded-circle">
                            @endif
                        @else
                            <img src="https://via.placeholder.com/110/cbe2f3/00c8fa" class="rounded-circle">
                        @endif
                    </div>

                    <div class="ml-3  company-info">
                        @if ($place->published == 0)
                            <h6>
                                {{ __('alerts.company.information.not_publish_warning') }}
                            </h6>
                        @endif
                        <h2 class="company-title mb-0">{{ $place->place_name }}</h2>
                        @if ($place->published == 1)
                            <div class="company-address ">
                                @if (!empty($place->address) && !empty($place->postcode) && !empty($place->city))
                                    <?php echo "<a href='https://www.google.com/maps/dir/?api=1&destination={$full_address_encoded}&travelmode=driving' class='text-muted'>"; ?>
                                    <?php echo "<span> {$place->address}, {$place->postcode} {$place->city} </span>"; ?>
                                    <?php echo ' </a>'; ?>
                                @endif
                            </div>
                        @endif
                        <b>{{ $place->keyword }}</b>
                    </div>
                </div>
                <div class="col-md-3">
                    @if ($place->published == 1)
                        <div class="social_share position-absolute1">
                            <div class="dropdown  dropdown-hover" style="width: fit-content">
                                <button class="btn btn-rounded dropdown-toggle" type="button" id="share"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="background-color: #efefef">
                                    <i class="fa fa-share-alt"></i>
                                </button>
                                <div class="dropdown-menu pt-0" aria-labelledby="share" id="share_div"
                                    style="min-width: 60px !important;background: #efefef;">
                                    <a class="dropdown-item"
                                        href="https://www.facebook.com/sharer/sharer.php?u=lookon.biz" target="_blank">
                                        {{-- <img src="/assets/images/facebook.svg" height="30" width="30"/> --}}
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a class="dropdown-item" href="https://twitter.com/intent/tweet?text=lookon.biz"
                                        target="_blank">
                                        {{-- <img src="/assets/images/twitter.svg" height="30" width="30"/> --}}
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a class="dropdown-item" href="#" target="_blank">
                                        {{-- <img src="/assets/images/whatsapp.svg" height="30" width="30"/> --}}
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                    <!-- <a class="dropdown-item" href="https://twitter.com/intent/tweet?text=lookon.biz" target="_blank"><img src="/assets/images/instagram.svg" height="30" width="30"/></a> -->
                                    {{-- <a class="dropdown-item" href="#" target="_blank">
								{{-- <img src="/assets/images/viber.svg" height="30" width="30"/> --}}
                                    {{-- <i class="fa fa-whatsapp"></i> --}}
                                    {{-- </a> --}}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="d-flex align-items-center">
                            <div class="alert alert-danger mr-5">
                                <div class="text-uppercase" style="font-size: 100%;">
                                    <strong><?php echo trans('inactive'); ?></strong>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            @if ($place->published == 1)
                <?php if (!empty($place->phone) || !empty($place->email) || !empty($place->website)) : ?>
                <div class="pt-2 pb-2 px-4 d-sm-flex company-contact-info border-top border-muted">
                    <?php if (!empty($place->phone_1)) : ?>
                    <div class="mr-3">

                       <a href='tel:{!! $place->phone_1 !!}'> <i class='fa fa-phone'></i><span> {!!$place->phone_1!!} </span></a>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($place->website)) :
                        $website_link = $place->website;
                        if (!str_contains($place->website, 'http')) {
                            $website_link = "http://" . $place->website;
                        }
                        $website = $place->website;
                        $website = str_replace('http//', '', str_replace('https//', '', $website));
                    ?>
                    <div class="mr-3">
                        <?php echo "<a href='{$website_link}' target='_blank'><i class='fa fa-globe'></i><span> {$website}</span></a>"; ?>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($place->email)) : ?>
                    <div class="mr-3">
                        <a href="mailto:{{ $place->email }}"><i
                                class="fa fa-envelope"></i>{{ $place->email }}</a>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            @endif
        </div>
    </div>
    <!-- col-7 end -->

    <div class="col-md-4">
        @if ($place->published == 1)
            <div class="card h-100">
                <div class="card-header subtitle border-bottom pb-3 d-flex justify-content-between align-items-center">
                    <h5>{{ __('labels.company.reviews') }}</h5>
                    <div>
                        <div class="star-rating" data-rating="0">
                            @for ($i = 1; $i <= round($place->average_rating); $i++)
                                @if ($i <= $place->average_rating)
                                    <span class="star"></span>
                                @else
                                    <span class="star half"></span>
                                @endif
                            @endfor
                            @for ($j = $i; $j <= 5; $j++)
                                <span class="star empty"></span>
                            @endfor
                        </div>
                        {{ $place->average_rating }}
                    </div>
                </div>
                <div class=" card-body  align-items-center flex-row">
                    <div class="d-md-flex align-items-center rating_review_card w-100">
                        <div class="rating-review-info justify-content-center d-flex d-md-block pr-0 pr-md-3">
                            <a class="d-flex text-center flex-column mb-3 mr-4 mr-sm-0"
                                href="{{ route('frontend.places.reviews', $place) }}">
                                <span class="rating_count mb-1">{{ $place->PlaceReview->count() }}</span>
                                <span class="text-muted">{{ __('labels.company.reviews') }} </span>
                            </a>

                            <a style="pointer-events: none; cursor: default;" class=" d-flex text-center flex-column"
                                href="javascript:void(0)">
                                <span class="view_count mb-1">{{ $place->hits }}</span>
                                <span class="text-muted">{{ __('labels.company.total_views') }}</span>
                            </a>
                        </div>

                        <!---testimonial---->
                        @php
                            $ReviewSummaries = $place->PlaceReview;
                        @endphp
                        @if (count($ReviewSummaries))
                            <div class="ml-3" id="testimonial">
                                <div id="carouseltestimonial" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($ReviewSummaries as $index => $reviewSummary)
                                            <div class="carousel-item <?php echo $index == 0 ? 'active' : ''; ?>">
                                                <div class="">
                                                    <div class="text-muted exclaim">
                                                        <div class="d-flex justify-content-between flex-wrap">
                                                            <div>
                                                                By
                                                                <span class="testimonial-owner ml-1 mr-2">
                                                                    {{ $reviewSummary->firstname . ' ' . $reviewSummary->lastname }}
                                                                </span>
                                                            </div>
                                                            <div class="star-rating pull-right"
                                                                data-rating="{{ round($reviewSummary->rating) }}"
                                                                style="font-size: 14px;">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mt-1 review-person-address">
                                                            <span
                                                                class="testimonial-city">{{ !empty($reviewSummary->city) ? '' . trans('aus') . ' ' . $reviewSummary->city . ' ' : '' }}</span>
                                                            <span class="mx-2 text-secondary"
                                                                style="opacity: 0.6">|</span>
                                                            <span
                                                                class="testimonial-date">({{ !empty($reviewSummary->created_at) ? '' . date_format(date_create($reviewSummary->created_at), 'd.m.Y') : '' }})</span>
                                                        </div>
                                                    </div>
                                                    <div class="star-rating" data-rating="0">
                                                        @for ($i = 1; $i <= round($reviewSummary->average_rating); $i++)
                                                            @if ($i <= $reviewSummary->average_rating)
                                                                <span class="star"></span>
                                                            @else
                                                                <span class="star half"></span>
                                                            @endif
                                                        @endfor
                                                        @for ($j = $i; $j <= 5; $j++)
                                                            <span class="star empty"></span>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            @if ($place->active == 'yes' &&
                                $place->published == 1)
                                <a href="{{ route('frontend.places.reviews', [$place, $place->slug]) }}"
                                    class="btn btn-primary ml-3 text-center">
                                    {{ __('labels.company.submit_rating') }}
                                </a>
                            @endif
                        @endif
                    </div>
                    <!---//testimonial---->
                </div>
            </div>
            <!-- card end -->
        @endif
    </div>
    <!-- col-5 end -->

</div>
