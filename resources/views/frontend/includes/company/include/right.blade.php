@php
    $address_encode = urlencode($company->address);
    $full_address_encoded = $address_encode . '%2C' . $company->postcode . '%20' . $company->city . '%2C' . 'Schweiz';
@endphp
@if ($company->published == 1)
    <div class="col-md-5 col-lg-5 position-sticky top-70 align-self-start">
        <!-- Company Schedule -->
        <div class="card bg-white">
            <div class="card-header bg-white status-toggle" data-bs-toggle="collapse" data-bs-target="#open-hours">
                <div class="d-sm-flex align-content-center">
                    <h5 class="font-18 mb-0 open-status work-hours-status">
                        <svg class="icon me-1 {{ isOpen($company->id) ? 'green-clr' : 'red-clr' }}">
                            <use xlink:href="#ic_alarm"></use>
                        </svg>
                        @if(isOpen($company->id))
                            <span class="green-clr">{{ __('labels.company.open') }}</span>
                        @else
                            <span class="text-danger">{{ __('labels.company.closed') }}</span>
                        @endif
                    </h5>
                    <!-- <h5 class="body-font mb-0 closed-status work-hours-status d-none">
                  <svg class="icon me-1 text-danger">
                    <use xlink:href="#ic_alarm"></use>
                  </svg><span class="text-danger">Closed</span>
                </h5> -->
                    <div class="d-flex justify-content-start mt-2 mt-sm-0 ms-sm-auto">
                        <div class="timing-today ms-sm-auto">
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
                                $today = today()->format('l') == ucfirst($day);
                            @endphp
                            <li class="{{ $today ? 'blue-clr' : '' }}">
                                <div class="day font-15 mb-0">
                                    @if($time)
                                        @if(!$time->morning_from && !$time->morning_to && !$time->afternoon_from && !$time->afternoon_to)
                                            <em class="text-danger">{{ jddayofweek($i,1) }}</em>
                                        @else
                                            {{ jddayofweek($i,1) }}
                                        @endif
                                    @else
                                        <em class="text-danger">{{ jddayofweek($i,1) }}</em>
                                    @endif
                                </div>
                                <div>
                                    @if($time)
                                        @if($time->morning_from)
                                            @if(is_numeric($time->morning_from))
                                                {{ \Carbon\Carbon::createFromTimestamp($time->morning_from)->format('H:i') }}
                                            @else
                                                {{ \Carbon\Carbon::parse($time->morning_from)->format('H:i') }}
                                            @endif
                                        @endif
                                        @if($time->morning_to)
                                            @if(is_numeric($time->morning_to))
                                                - {{ \Carbon\Carbon::createFromTimestamp($time->morning_to)->format('H:i') }}
                                            @else
                                                - {{ \Carbon\Carbon::parse($time->morning_to)->format('H:i') }}
                                            @endif
                                        @endif
                                        @if(!empty($time->afternoon_from))
                                            <br>
                                            @if(is_numeric($time->afternoon_from))
                                                {{ \Carbon\Carbon::createFromTimestamp($time->afternoon_from)->format('H:i') }}
                                            @else
                                                {{ \Carbon\Carbon::parse($time->afternoon_from)->format('H:i') }}
                                            @endif
                                        @endif
                                        @if(!empty($time->afternoon_to))
                                            @if(is_numeric($time->afternoon_to))
                                                - {{ \Carbon\Carbon::createFromTimestamp('H:i') }}
                                            @else
                                                - {{ \Carbon\Carbon::parse($time->afternoon_to)->format('H:i') }}
                                            @endif
                                        @endif

                                        @if(!$time->morning_from && !$time->morning_to && !$time->afternoon_from && !$time->afternoon_to)
                                            <em class="text-danger">{{ __('labels.company.closed') }}</em>
                                        @endif
                                    @else
                                        <em class="text-danger">{{ __('labels.company.closed') }}</em>
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
                        <iframe width="100%" height="350" frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCxYGPwCo6IpUNcSuiTY1rJWjVtFRg4jkU&q={{$full_address_encoded}}" allowfullscreen> </iframe>
                        </div>
                    </div>
                    <div class="map-block-address mt-3">
                        <ul class="list-unstyled mb-0">
                            <li class="d-sm-flex align-items-center justify-content-between">
                                <p class="mb-0">{{ $company->address }}, {{ $company->postcode }} {{ $company->city }}</p>
                                <div class="location-address text-sm-end mt-sm-0 mt-2">
                                    <a target="_blank" class="btn btn-border-theme btn-sm"
                                    href="http://maps.google.com/?q={{$full_address_encoded}}">{{__('labels.company.get_direction')}}</a>
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
        @endif
        <!-- social media end -->

{{--        @if($company->companytabs)--}}
{{--            @if($company->companytabs->show_interraction == 1)--}}
{{--                <!-- Kostenlose Offerte -->--}}
{{--                <div class="card mb-4 bg-white mt-4">--}}
{{--                    <div class="card-header bg-white">--}}
{{--                        <h5 class="s-font mb-0">{{__('labels.offre_gratuite.title')}}</h5>--}}
{{--                    </div>--}}
{{--                    <div class="card-body pt-0">--}}
{{--                        <form id="lookon_module_review">--}}
{{--                            <div class="row margin-top-0">--}}

{{--                                <div class="col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="lookon_module_review_first_name"--}}
{{--                                               class="form-label"> {{__('labels.offre_gratuite.firstname')}}</label>--}}

{{--                                        <input type="text" id="lookon_module_review_first_name" name="general_firstname"--}}
{{--                                               class="form-control" value="" required>--}}
{{--                                        <div class="invalid-feedback"> Bitte geben Sie Ihren Vornamen ein</div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="lookon_module_review_last_name"--}}
{{--                                               class="form-label"> {{__('labels.offre_gratuite.nom')}}</label>--}}

{{--                                        <input type="text" id="lookon_module_review_last_name" name="general_lastname"--}}
{{--                                               class="form-control" value="" required>--}}
{{--                                        <div class="invalid-feedback"> Bitte Nachname eingeben</div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="lookon_module_review_email"--}}
{{--                                               class="form-label"> {{__('labels.offre_gratuite.e_mail')}}</label>--}}

{{--                                        <input type="email" id="lookon_module_review_email" name="email"--}}
{{--                                               class="form-control" value="" required>--}}

{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <button type="submit" class="btn btn-theme">Absenden</button>--}}
{{--                        </form>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        @endif--}}


        <!-- Claim -->
        @if ($company->claimed == 0)
            <div class="card mb-4 bg-white mt-4">
                <div class="card-header bg-white">
                    <h5 class="s-font mb-0">{{__('labels.claim.tab_title')}}</h5>
                </div>
                <div class="card-body pt-0">
                    <form id="lookon_module_review">
                        <div class="row margin-top-0">

                            <a href="{{route('frontend.claim.basic',$company)}}"
                               class="btn btn-primary col-md-12 text-center">
                                <i class="fa fa-send"></i>
                                {{__('labels.company.claim')}}
                            </a>

                        </div>
                    </form>

                </div>
            </div>
        @endif
    </div>
@endif
