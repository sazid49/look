<div class="row">
    <div class="col-md-12">
        <div class="card text-center">
            <div class="card-body">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <x-utils.link class="nav-link" :href="route('frontend.company.information', [$company, 'slug' => $company->slug])" :active="activeClass(Route::is('frontend.company.information'), 'active')" :text="__('labels.company.information')" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ !empty($company->companytabs) && $company->companytabs->show_interraction == 1 && $company->active == 1 && $company->published == 1 && $company->show_tabs == 1 ? '' : 'disabled' }}"
                            :href="route('frontend.company.offer', [$company, 'slug' => $company->slug])" :active="activeClass(Route::is('frontend.company.offer'), 'active')" :text="__('labels.company.offer')" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ !empty($company->companytabs) && $company->companytabs->show_review == 1 && $company->active == 1 && $company->published == 1 ? '' : 'disabled' }}"
                            :href="route('frontend.company.reviews', [$company, 'slug' => $company->slug])" :active="activeClass(Route::is('frontend.company.reviews'), 'active')" :text="__('labels.company.reviews')" />
                    </li>

                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ !empty($company->companytabs) && $company->companytabs->show_gallery == 1 && $company->active == 1 && $company->published == 1 && $company->show_tabs == 1 ? '' : 'disabled' }}"
                            :href="route('frontend.company.gallery', [$company, 'slug' => $company->slug])" :active="activeClass(Route::is('frontend.company.gallery'), 'active')" :text="__('labels.company.galerie')" />
                    </li>

                    <li class="nav-item">
                        @php
                            $is_active = activeClass(Route::is('frontend.company.job-application'), 'active');
                            if ($is_active == '') {
                                $is_active = activeClass(Route::is('frontend.company.job_detail'), 'active');
                            }
                            if ($is_active == '') {
                                $is_active = activeClass(Route::is('frontend.company.apply_job'), 'active');
                            }
                        @endphp
                        <x-utils.link
                            class="nav-link {{ !empty($company->companytabs) && $company->companytabs->show_jobs == 1 && $company->active == 1 && $company->published == 1 && $company->show_tabs == 1 ? '' : 'disabled' }}"
                            :href="route('frontend.company.job-application', [$company, 'slug' => $company->slug])" :active="$is_active" :text="__('labels.company.job_application')" />
                    </li>

                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ !empty($company->companytabs) && $company->companytabs->show_team == 1 && $company->active == 1 && $company->published == 1 && $company->show_tabs == 1 ? '' : 'disabled' }}"
                            :href="route('frontend.company.team', [$company, 'slug' => $company->slug])" :active="activeClass(Route::is('frontend.company.team'), 'active')" :text="__('labels.company.team')" />
                    </li>

                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ !empty($company->companytabs) && $company->companytabs->show_pricelist == 1 && $company->active == 1 && $company->published == 1 && $company->show_tabs == 1 ? '' : 'disabled' }}"
                            :href="route('frontend.company.price_list', [$company, 'slug' => $company->slug])" :active="activeClass(Route::is('frontend.company.price_list'), 'active')" :text="__('labels.company.price_list')" />
                    </li>

                    <li class="nav-item">
                        @php
                            $is_active = activeClass(Route::is('frontend.company.news'), 'active');
                            if ($is_active == '') {
                                $is_active = activeClass(Route::is('frontend.company.news_detail'), 'active');
                            }
                        @endphp
                        <x-utils.link
                            class="nav-link {{ !empty($company->companytabs) && $company->companytabs->show_news == 1 && $company->active == 1 && $company->published == 1 && $company->show_tabs == 1 ? '' : 'disabled' }}"
                            :href="route('frontend.company.news', [$company, 'slug' => $company->slug])" :active="$is_active" :text="__('labels.company.news')" />
                    </li>

                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ !empty($company->companytabs) && $company->companytabs->show_register == 1 && $company->active == 1 && $company->published == 1 ? '' : 'disabled' }}"
                            :href="route('frontend.company.register', [$company, 'slug' => $company->slug])" :active="activeClass(Route::is('frontend.company.register'), 'active')" :text="__('labels.company.register')" />
                    </li>

                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ !empty($company->companytabs) && $company->companytabs->show_contactform == 1 && $company->active == 1 && $company->published == 1 && $company->show_tabs == 1 ? '' : 'disabled' }}"
                            :href="route('frontend.company.contact_us', [$company, 'slug' => $company->slug])" :active="activeClass(Route::is('frontend.company.contact_us'), 'active')" :text="__('labels.company.contact_us')" />
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
                    $update_at = $company->updated_at;
                    $someDate = new \DateTime($update_at);
                    $now = new \DateTime();
                @endphp
                <div class="pull-right pull-down">
                    <i class="fa fa-refresh" data-toggle="tooltip"
                       title="{{ __('alerts.company.head.refresh_notify') }}"
                       style="color: {{ $someDate->diff($now)->days <= 30 ? 'GREEN' : 'GREY' }}; font-size: 18px !important"></i>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="pull-right">
                    <i class="fa fa-edit" data-toggle="tooltip" title="{{ __('alerts.company.head.claimed_notify') }}"
                       style="color: {{ $company->claimed == 1 || $company->claimed == true ? 'GREEN' : 'GREY' }}; font-size: 18px !important"></i>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="pull-right">
                    @if ($company->active == '1' || $company->active == true)
                        <i class="fa fa-check" data-toggle="tooltip"
                           title="{{ __('alerts.company.head.active_notify') }}"
                           style="color: GREEN; font-size: 18px !important"></i>&nbsp;&nbsp;&nbsp;
                    @else
                        <i class="fa fa-times" data-toggle="tooltip"
                           title="{{ __('alerts.company.head.active_notify') }}"
                           style="color: GREY;font-size: 18px !important"></i>&nbsp;&nbsp;&nbsp;
                    @endif
                </div>
            </div>
            <div class="card-body h-100 position-relative row">

                <div class="d-flex align-items-center col-md-9">

                    <div class="rounded-circle border company-logo">
                        @if (!empty($company->company_logo))
                            @if (Storage::disk('public')->exists($company->company_logo))
                                <img class="personal_logo" alt="no data"
                                     src="{{ url('storage/' . $company->company_logo) }}" class='rounded-circle'
                                     height="100px">
                            @else
                                <img src="https://via.placeholder.com/110/cbe2f3/00c8fa" class="rounded-circle">
                            @endif
                        @else
                            <img src="https://via.placeholder.com/110/cbe2f3/00c8fa" class="rounded-circle">
                        @endif
                    </div>

                    <div class="ml-3  company-info">
                        @if ($company->published == 0)
                            <h6>
                                {{ __('alerts.company.information.not_publish_warning') }}
                            </h6>
                        @endif
                        <h2 class="company-title mb-0">{{ $company->company_name }}</h2>
                        @if ($company->published == 1)
                            <div class="company-address ">
                                @if (!empty($company->address) && !empty($company->postcode) && !empty($company->city))
                                        <?php echo "<a href='https://www.google.com/maps/dir/?api=1&destination={$full_address_encoded}&travelmode=driving' class='text-muted'>"; ?>
                                        <?php echo "<span> {$company->address}, {$company->postcode} {$company->city} </span>"; ?>
                                        <?php echo ' </a>'; ?>
                                @endif
                            </div>
                        @endif
                        <b>{{ $company->keyword }}</b>
                    </div>
                </div>
                <div class="col-md-3">
                    @if ($company->published == 1)
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
                    {{-- <br>
                    <div class="company_tag position-absolute1">
                        <span class="tag"><i class="fa fa-tag"></i></span>
                        <div class="tag_div p-1 ">
                            <div class="row">
                                @foreach ($company->companytags as $item)
                                    <div class="col-md-6 mb-2 m-0">
                                        @if (!empty($item->tag->image))
                                            @if (Storage::disk('public')->exists($item->tag->image))
                                                <img alt="no data" src="{{ url('storage/' . $item->tag->image) }}"
                                                    class='rounded-circle' height="30px">
                                            @else
                                                <img src="https://via.placeholder.com/110/cbe2f3/00c8fa"
                                                    class="rounded-circle" height="30px">
                                            @endif
                                        @else
                                            <img src="https://via.placeholder.com/110/cbe2f3/00c8fa"
                                                class="rounded-circle" height="30px">
                                        @endif
                                        {{ $item->tag->name }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            @if ($company->published == 1)
                    <?php if (!empty($company->phone) || !empty($company->email) || !empty($company->website)) : ?>
                <div class="pt-2 pb-2 px-4 d-sm-flex company-contact-info border-top border-muted">
                        <?php if (!empty($company->phone_1)) : ?>
                    <div class="mr-3">
                            <?php echo "<a href='tel:{$company->phone_1}'>
                                                                                                                                                                            																																																																									<i class='fa fa-phone'></i><span> {$company->phone_1} </span></a>"; ?>
                    </div>
                    <?php endif; ?>
                        <?php if (!empty($company->website)) :
                        $website_link = $company->website;
                        if (!str_contains($company->website, 'http')) {
                            $website_link = "http://" . $company->website;
                        }
                        $website = $company->website;
                        $website = str_replace('http//', '', str_replace('https//', '', $website));
                        ?>
                    <div class="mr-3">
                            <?php echo "<a href='{$website_link}' target='_blank'><i class='fa fa-globe'></i><span> {$website}</span></a>"; ?>
                    </div>
                    <?php endif; ?>
                        <?php if (!empty($company->email)) : ?>
                    <div class="mr-3">
                        <a href="mailto:{{ $company->email }}"><i
                                class="fa fa-envelope"></i>{{ $company->email }}</a>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            @endif
        </div>
    </div>
    <!-- col-7 end -->

    <div class="col-md-4">
        @if ($company->published == 1)
            <div class="card h-100">
                <div class="card-header subtitle border-bottom pb-3 d-flex justify-content-between align-items-center">
                    <h5>{{ __('labels.company.reviews') }}</h5>
                    <div>
                        <div class="star-rating" data-rating="0">
                            @for ($i = 1; $i <= round($company->average_rating); $i++)
                                @if ($i <= $company->average_rating)
                                    <span class="star"></span>
                                @else
                                    <span class="star half"></span>
                                @endif
                            @endfor
                            @for ($j = $i; $j <= 5; $j++)
                                <span class="star empty"></span>
                            @endfor
                        </div>
                        {{ $company->average_rating }}
                    </div>
                </div>
                <div class=" card-body  align-items-center flex-row">
                    <div class="d-md-flex align-items-center rating_review_card w-100">
                        <div class="rating-review-info justify-content-center d-flex d-md-block pr-0 pr-md-3">
                            <a class="d-flex text-center flex-column mb-3 mr-4 mr-sm-0"
                               href="{{ route('frontend.company.reviews', $company) }}">
                                <span class="rating_count mb-1">{{ $company->CompanyReview->count() }}</span>
                                <span class="text-muted">{{ __('labels.company.reviews') }} </span>
                            </a>

                            <a style="pointer-events: none; cursor: default;" class=" d-flex text-center flex-column"
                               href="javascript:void(0)">
                                <span class="view_count mb-1">{{ $company->hits }}</span>
                                <span class="text-muted">{{ __('labels.company.total_views') }}</span>
                            </a>
                        </div>

                        <!---testimonial---->
                        @php
                            $ReviewSummaries = $company->CompanyReview;
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
                            @if (!empty($company->companytabs) &&
                                $company->companytabs->show_review == 1 &&
                                $company->active == 1 &&
                                $company->published == 1 &&
                                $company->show_tabs == 1)
                                <a href="{{ route('frontend.company.reviews', [$company, $company->slug]) }}"
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
