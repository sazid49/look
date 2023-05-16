@extends('frontend.pages.company')

@section('title', __('labels.offer.tab_title'))

@section('tabcontent')
    <div class="tab-pane-defeated" id="offer" role="tabpanel" aria-labelledby="offer-tab">
        <div class="row">
            <div class="col-md-7">
                <div class="card mb-4">
                    <div class="card-header bg-white pb-0">
                        <h4 class="s-font mb-0">
                            {{ __('labels.offer.heading_title') }}
                        </h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <x-forms.post :action="route('frontend.company.create_offer',$company)">
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="form-check form-switch mb-3 ps-0 isprivate">
                                        <label class="form-check-label me-2" for="flexSwitchCheckDefault">{{__('labels.offer.private_person')}}</label>
                                        <input class="form-check-input float-none ms-0 " name="private_person" type="checkbox" role="switch" id="gen_private_person_yes" value="1"
                                            {{ (old('private_person') || auth()->check() ? $logged_in_user->userdetails->company_name : 0) == '1' ? 'checked' : '' }} {{ auth()->check() ? 'disabled' : '' }}>
                                    </div>
                                    <div class="notprivateperson">
                                        <label class="form-label">{{ __('labels.offer.company_name') }}:</label>
                                        @auth()
                                            <span class="text-primary fw-bold">{{ auth()->user()->userdetails->company_name ?? "" }}</span>
                                            <input type="hidden" name="company_name" value="{{ auth()->user()->userdetails->company_name }}">
                                        @else
                                            <input type="text" name="company_name" class="form-control" id="company_name" value="{{ old('company_name') }}"/>
                                        @endauth
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.offer.firstname'):</label>
                                            @auth()
                                                <b>{{auth()->user()->userdetails->firstname ?? ""}}</b>
                                                <input type="hidden" name="firstname" value="{{ auth()->user()->userdetails->firstname }}">
                                            @else
                                                <input type="text" name="firstname" class="form-control" id="firstname"
                                                       value="{{ old('firstname') }}">
                                            @endauth

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.offer.lastname'):</label>
                                            @auth()
                                                <b>{{auth()->user()->userdetails->lastname ?? ""}}</b>
                                                <input type="hidden" name="lastname" value="{{ auth()->user()->userdetails->lastname }}">
                                            @else
                                                <input type="text" name="lastname" class="form-control"
                                                       id="lastname"
                                                       value="{{ old('lastname') }}">
                                            @endauth
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.offer.email'):</label>
                                            @auth()
                                                <span class="text-primary"><b>{{auth()->user()->email ?? ""}}</b></span>
                                                <input type="hidden" name="gen_email" value="{{ auth()->user()->email }}">
                                            @else
                                                <input type="email" name="gen_email" class="form-control email" id="gen_email" value="{{ old('gen_email') }}">
                                            @endauth
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.offer.phone'):</label>
                                           @auth()
                                                <span class="text-primary fw-bold">{{auth()->user()->userdetails->phone ?? ""}}</span>
                                                <input type="hidden" name="phone" value="{{ auth()->user()->userdetails->phone }}">
                                            @else
                                                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                                            @endauth
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.offer.postcode'):</label>
                                            @auth()
                                                <span class="text-primary fw-bold">{{auth()->user()->userdetails->postcode ?? ""}}</span>
                                                <input type="hidden" name="postcode" value="{{ auth()->user()->userdetails->postcode }}">
                                            @else
                                                <input type="number" name="postcode" class="form-control" id="postcode" value="{{ old('postcode') }}">
                                            @endauth
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.offer.city'):</label>
                                            @auth()
                                                <span class="text-info fw-bold">{{auth()->user()->userdetails->city ?? ""}}</span>
                                                <input type="hidden" name="city" value="{{ auth()->user()->userdetails->city }}">
                                            @else
                                                <input type="text" name="city" class="form-control"
                                                       id="city"
                                                       value="{{ old('city') }}">
                                            @endauth
                                        </div>
                                    </div>
                                    @foreach ($offerfield as $item)
                                        @if($item->type == "text")
                                            <div class="col-sm-6">
                                                <label class="form-label">{{ $item->field->label }}</label>
                                                <input type="text"
                                                       name="{{'offerfield_'.$item->id}}"
                                                       class="form-control"
                                                       value="{{old('offerfield_'.$item->id)}}" {{($item->is_required) ? 'required' : ''}}>
                                            </div>


                                        @elseif($item->type == "textarea")
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{ $item->field->label }}</label>
                                                    <textarea name="{{'offerfield_'.$item->id}}"
                                                              class="form-control" data-gramm="false" wt-ignore-input="true" {{($item->is_required) ? 'required' : ''}}>{{old('offerfield_'.$item->id)}}</textarea>
                                                </div>
                                            </div>



                                        @elseif($item->type == "checkbox")
                                            <div class="col-sm-12">
                                                <hr class="bg-light opacity-100 mt-0">
                                                <h6 class="body-font mb-3 mt-4">{{ $item->field->label }}</h6>

                                                <div class="row form-group">

                                                    <div class="col-sm-6">


                                                        @php
                                                            $option = json_decode($item->field->option);
                                                        @endphp
                                                        @foreach ($option as $op)
                                                            @if($op != "")
                                                                <div class="form-check ps-0 mb-2">
                                                                    <input type="{{$item->type}}"
                                                                           name="{{'offerfield_'.$item->id.'[]'}}"
                                                                           id="{{$op}}"
                                                                           class="form-check-input"
                                                                           value="{{$op}}" {{($item->is_required) ? 'required' : ''}}>
                                                                    <label class="form-check-label" for="{{$op}}">{{$op}}
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-title="Krankenkasse, Unfallversicherung, Taggeldversicherung, Todesfall usw." class="ms-auto">
                                                                            <svg class="icon ms-1 gray-clr">
                                                                                <use xlink:href="#ic_info"></use>
                                                                            </svg>
                                                                        </a>
                                                                    </label>
                                                                </div>
                                                            @endif
                                                        @endforeach

                                                    </div>

                                                </div>

                                            </div>


                                        @elseif($item->type == "radio")
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{ $item->field->label }}</label>
                                                    <div>
                                                        @php
                                                            $option = json_decode($item->field->option);
                                                        @endphp
                                                        @foreach ($option as $op)
                                                            @if($op != "")
                                                                <div class="form-check ps-0 form-check-inline">
                                                                    <input type="{{$item->type}}"
                                                                           name="{{'offerfield_'.$item->id.'[]'}}"
                                                                           id="{{$op}}"
                                                                           class="form-check-input"
                                                                           value="{{$op}}" {{($item->is_required) ? 'required' : ''}}>
                                                                    <label class="form-check-label" for="{{$op}}">{{$op}}</label>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>




                                        @elseif($item->type == "dropdown")

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{ $item->field->label }}</label>
                                                    <br>
                                                    @php
                                                        $option = json_decode($item->field->option);
                                                    @endphp
                                                    <select name="{{'offerfield_'.$item->id}}"
                                                            id="{{'offerfield_'.$item->id}}"
                                                            class="form-control js-select-single" {{($item->is_required) ? 'required' : ''}}>
                                                        @foreach ($option as $op)
                                                            @if($op != "")
                                                                <option value="{{$op}}">{{$op}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        @endif
                                    @endforeach









                                    <!--
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">How many floors?</label>
                                            <select class="form-control js-select-single">
                                                <option hidden="" selected="">Select</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Tool available?</label>
                                            <div>
                                                <div class="form-check ps-0 form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tools" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check ps-0 form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tools" id="flexRadioDefault2" checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <hr class="bg-light opacity-100 mt-0">
                                        <h6 class="body-font mb-3 mt-4">Dein Beratungsbedarf</h6>
                                        <div class="row form-group">
                                            <div class="col-sm-6">
                                                <div class="form-check ps-0 mb-2">
                                                    <input class="form-check-input" type="checkbox" name="insurance_personal" id="insurance_personal">
                                                    <label class="form-check-label" for="insurance_personal">
                                                        Personenversicherung
                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-title="Krankenkasse, Unfallversicherung, Taggeldversicherung, Todesfall usw." class="ms-auto">
                                                            <svg class="icon ms-1 gray-clr">
                                                                <use xlink:href="#ic_info"></use>
                                                            </svg>
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="form-check ps-0 mb-2">
                                                    <input class="form-check-input" type="checkbox" name="insurance_property" id="insurance_property">
                                                    <label class="form-check-label" for="insurance_property">
                                                        Sachversicherungen
                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-title="Motorrfahrzeuge, Haftpflicht, Rechtsschutz, Reiseversicherung, Gebäudeversicherung, Hausrat usw." class="ms-auto">
                                                            <svg class="icon ms-1 gray-clr">
                                                                <use xlink:href="#ic_info"></use>
                                                            </svg>
                                                        </a>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check ps-0 mb-2">
                                                    <input class="form-check-input" type="checkbox" name="insurance_prevention" id="insurance_prevention">
                                                    <label class="form-check-label" for="insurance_prevention">
                                                        Vorsorge
                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-title="3. Säule, Gebunden -und Ungebundene Vorsorge, Bank -und Versicherungen" class="ms-auto">
                                                            <svg class="icon ms-1 gray-clr">
                                                                <use xlink:href="#ic_info"></use>
                                                            </svg>
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="form-check ps-0 mb-2">
                                                    <input class="form-check-input" type="checkbox" name="insurance_financing" id="insurance_financing">
                                                    <label class="form-check-label" for="insurance_financing">
                                                        Finanzierungen
                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-title="Privatkredit, Unternehmenskredit, Kreditkarten, Hypothek, Leasing usw." class="ms-auto">
                                                            <svg class="icon ms-1 gray-clr">
                                                                <use xlink:href="#ic_info"></use>
                                                            </svg>
                                                        </a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <hr class="bg-light opacity-100 mt-0">
                                        <h6 class="body-font mb-3 mt-4">Dein Beratungstermin</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">Date </label>
                                                    <input type="text" class="form-control datepick" name="date">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">Time</label>
                                                    <input type="text" class="form-control timepick" name="time">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    -->


                                    <div class="col-sm-12 mt-3">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.offer.message')</label>
                                            <textarea name="message" id="message" rows="5" class="form-control" data-gramm="false" wt-ignore-input="true">{{ old('message') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="term_condition"
                                                       id="term_condition"
                                                       value="1" {{(old('term_condition') == 1) ? "checked" : ""}}>
                                                <label class="form-check-label" for="terms">
                                                    @lang('labels.general.term_&_condition_note_1')
                                                    <a href="/pages/datenschutzerklarung" target="_blank" class="text-underline theme-hover">@lang('labels.general.term_&_condition_note_2')</a>
                                                    @lang('labels.general.term_&_condition_note_3')
                                                    <a href="/pages/allgemeine-geschaftsbedingungen" target="_blank" class="text-underline theme-hover">@lang('labels.general.term_&_condition_note_4')</a>
                                                    @lang('labels.general.term_&_condition_note_5')
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-theme">@lang('labels.offer.submit_btn')</button>
                            </div>
                        </x-forms.post>
                    </div>
                </div>
            </div>
            @include('frontend.includes.company.include.right')
        </div>
    </div>
@endsection
