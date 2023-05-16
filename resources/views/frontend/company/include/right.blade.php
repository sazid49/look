<!-- OLD -->
@if ($company->published == 1)
    <div class="col-md-5 col-lg-5 position-sticky top-70 align-self-start">
        <!-- Company Schedule -->
        <div class="card bg-white">
            <div class="card-header bg-white status-toggle" data-bs-toggle="collapse" data-bs-target="#open-hours">
                <div class="d-sm-flex align-content-center">
                    <h5 class="font-18 mb-0 open-status work-hours-status">
                        <svg class="icon me-1 green-clr">
                            <use xlink:href="#ic_alarm"></use>
                        </svg>

                        @for($i=0;$i<7;$i++)
                            @php
                                $day = strtolower(jddayofweek($i,1));
                                $time = $company->opening_hours->$day ?? null;
                            @endphp
                            @if($time)
                                @if(jddayofweek($i,1) == now()->englishDayOfWeek)
                                    @if(now() < \Carbon\Carbon::createFromTimestamp($time->morning_to) && now() > \Carbon\Carbon::createFromTimestamp($time->morning_from))
                                        <span class="green-clr">{{ __('labels.company.open) }}</span>
                                    @else
                                        <span class="text-danger">{{ __('labels.company.closed') }}</span>
                                    @endif
                                @endif
                            @else
                                @if(ucfirst($day) == now()->englishDayOfWeek)
                                    <span class="text-danger">{{ __('labels.company.closed') }}</span>
                                @endif
                            @endif
                        @endfor

                    </h5>
                    <!-- <h5 class="body-font mb-0 labels.company.closed-status work-hours-status d-none">
                  <svg class="icon me-1 text-danger">
                    <use xlink:href="#ic_alarm"></use>
                  </svg><span class="text-danger">labels.company.closed</span>
                </h5> -->
                    <div class="d-flex justify-content-start mt-2 mt-sm-0 ms-sm-auto">
                        <div class="timing-today ms-sm-auto">{{__('labels.company.all_openhours')}}
                        </div>
                        <svg class="icon ms-1 gray-clr cursor-pointer toggle-icon">
                            <use xlink:href="#ic_down_arrow"></use>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="open-hours-wrapper card-body pt-0 collapse" id="open-hours">
                <div>
                    <ul class="day-list list-unstyled mb-0">
                        @for($i=0;$i<7;$i++)
                            @php
                                $day = strtolower(jddayofweek($i,1));
                                $time = $company->opening_hours->$day ?? null;
                            @endphp
                            <li>
                                <div class="day font-15 mb-0">
                                    @if($time)
                                        {{ jddayofweek($i,1) }}
                                    @else
                                        <em class="text-danger">{{ jddayofweek($i,1) }}</em>
                                    @endif
                                </div>
                                <div>
                                    @if($time)
                                        {{ date('H:i',$time->morning_from) }} - {{ date('H:i',$time->morning_to) }} {{ $time->afternoon_from ? date(' | H:i',$time->afternoon_from) : '' }}{{ $time->afternoon_to ? date('- H:i',$time->afternoon_to) : '' }}
                                    @else
                                        <em class="text-danger">{{ __('labels.company.closed')}}</em>
                                    @endif
                                </div>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>

        <!-- Location-->
        <div class="card mt-4">
            <div class="card-header bg-white">
                <h4 class="s-font mb-0">
                    Location
                </h4>
            </div>
            <div class="card-body pt-0">
                <div id="listing-location" class="listing-section">
                    <div class="listing-map">
                        <div class="ratio ratio-16x9">
{{--                            <iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord={{$company->longitude}}, {{$company->latitude}}&amp;q={{ urlencode($company->address) }}&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>--}}
                            <iframe src="https://maps.google.com/maps?q={{$company->latitude}}, {{$company->longitude}}&z=15&output=embed" width="360" height="270" frameborder="0" style="border:0"></iframe>
                        </div>
                    </div>
                    <div class="map-block-address  mt-3">
                        <ul class="list-unstyled mb-0">
                            <li class="d-sm-flex align-items-center justify-content-between">
                                <p class="mb-0">{{ $company->address }}</p>
                                <div class="location-address text-sm-end mt-sm-0 mt-2">
                                    <a class="btn btn-border-theme btn-sm" href="{{ urlencode($company->address) }}" target="_blank">{{ __('Get Directions') }}</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Media -->
        @if ($company->socialmedia)
            <div class="card my-4">
                <div class="card-header bg-white">
                    <h4 class="s-font mb-0">
                        Social Media
                    </h4>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-unstyled d-flex align-items-center social_icons gray-clr mb-0">
                        @foreach($company->socialmedia as $social)
                            <li>
                                <a href="{{ $social->url }}" target="_blank">
                                    <i class="{{ $social->icon }}"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- social media end -->
        @endif


        <!-- Kostenlose Offerte -->
        <div class="card mb-4 bg-white mt-4">
            <div class="card-header bg-white">
                <h5 class="s-font mb-0">{{__('labels.offre_gratuite.title')}}</h5>
            </div>
            <div class="card-body pt-0">
                <form id="lookon_module_review">
                    <div class="row margin-top-0">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="lookon_module_review_first_name" class="form-label"> {{__('labels.offre_gratuite.firstname')}}</label>

                                <input type="text" id="lookon_module_review_first_name" name="general_firstname" class="form-control" value="" required>
                                <div class="invalid-feedback"> Bitte geben Sie Ihren Vornamen ein</div>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="lookon_module_review_last_name" class="form-label"> {{__('labels.offre_gratuite.nom')}}</label>

                                <input type="text" id="lookon_module_review_last_name" name="general_lastname" class="form-control" value="" required>
                                <div class="invalid-feedback"> Bitte Nachname eingeben</div>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="lookon_module_review_email" class="form-label"> {{__('labels.offre_gratuite.e_mail')}}</label>

                                <input type="email" id="lookon_module_review_email" name="email" class="form-control" value="" required>

                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-theme">Absenden</button>
                </form>

            </div>
        </div>

test
        <!-- Firma übernehmen -->
        @if ($company->claimed == 0)
            <div class="card mb-4 bg-white mt-4">
                <div class="card-header bg-white">
                    <h5 class="s-font mb-0">{{ __('labels.offre_gratuite.title') }}</h5>
                </div>
                <div class="card-body pt-0">
                    <form id="lookon_module_review">
                        <div class="row margin-top-0">

                            <a href="{{ route('frontend.claim.basic',$company) }}" class="btn btn-primary col-md-12 text-center">
                                <i class="fa fa-send"></i>
                                {{ __('labels.company.claim') }}
                            </a>

                        </div>
                        <button type="submit" class="btn btn-theme">Absenden</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endif
