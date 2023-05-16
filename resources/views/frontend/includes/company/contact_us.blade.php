@extends('frontend.pages.company')

@section('title', __('labels.company.contact_tab_title'))

@section('tabcontent')
    <div class="tab-pane-defeated" id="kontaktformular" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
            <div class="col-md-7">
                <div class="card mb-4">
                    <div class="card-header bg-white pb-0">
                        <h4 class="s-font mb-0">
                            {{ __('labels.company.contact_us') . ' ' . $company->company_name }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="alert looking-alert p-3 mb-3">
                            {{ __('alerts.company.contact_form.note', ['company' => $company->company_name]) }}
                        </div>
                        <x-forms.post :action="route('frontend.company.create_contact_us',$company)">
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="form-check form-switch mb-3 ps-0 isprivate">
                                        <label class="form-check-label me-2" for="gen_private_person_yes">@lang('labels.contact_us.private_person')</label>
                                        <input  name="gen_private_person"
                                                class="form-check-input float-none ms-0"
                                                type="checkbox"
                                                role="switch"
                                                id="gen_private_person_yes"
                                                value="1" {{ old('gen_private_person') == '1' ? 'checked' : '' }} />
                                        {{ __('labels.general.yes') }}
                                    </div>
                                    <div class="notprivateperson">
                                        <label class="form-label">@lang('labels.contact_us.company_name')</label>
                                        @auth()
                                            <br>
                                            {{$logged_in_user->userdetails->company_name ?? ""}}
                                        @else
                                        <input type="text" name="company_name" class="form-control"
                                               id="company_name" value="{{ old('company_name') }}">
                                        @endauth
                                        @error('company_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.contact_us.firstname')</label>
                                            @auth()
                                                <br>
                                                {{auth()->user()->userdetails->firstname ?? ""}}
                                            @else
                                            <input type="text" class="form-control" name="firstname" id="firstname" value="{{ old('firstname',auth()->user()->userdetails->firstname ?? "") }}">
                                            @endauth
                                            @error('firstname')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.contact_us.lastname')</label>
                                            @auth()
                                                <br>
                                                {{auth()->user()->userdetails->lastname ?? ""}}
                                            @else
                                            <input type="text" class="form-control" name="lastname" id="lastname" value="{{ old('lastname',auth()->user()->userdetails->lastname ?? "") }}">
                                            @endauth
                                            @error('lastname')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.contact_us.postcode')</label>
                                            @auth()
                                                <br>
                                                {{auth()->user()->userdetails->postcode ?? ""}}
                                            @else
                                            <input type="text" name="postcode" class="form-control"
                                                   id="postcode"
                                                   value="{{ old('postcode',auth()->user()->userdetails->postcode ?? "") }}">
                                            @endauth
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.contact_us.city')</label>
                                            @auth()
                                                <br>
                                                {{auth()->user()->userdetails->city ?? ""}}
                                            @else
                                            <input type="text" name="city" class="form-control"
                                                   id="city"
                                                   value="{{ old('city',auth()->user()->userdetails->city ?? "") }}">
                                            @endauth
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.contact_us.email')</label>
                                            @auth()
                                                <br>
                                                {{auth()->user()->email ?? ""}}
                                            @else
                                            <input type="email" class="form-control email" name="gen_email"
                                                   id="gen_email"
                                                   value="{{ old('gen_email',auth()->user()->email ?? "") }}">
                                            @endauth
                                            @error('gen_email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.contact_us.phone')</label>
                                            @auth()
                                                <br>
                                                {{auth()->user()->userdetails->phone ?? ""}}
                                            @else
                                            <input type="number" name="phone" class="form-control"
                                                   id="phone"
                                                   value="{{ old('phone',auth()->user()->userdetails->phone ?? "") }}">
                                            @endauth
                                            @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.contact_us.message')</label>
                                            <textarea name="message" id="message" rows="5" class="form-control" data-gramm="false" wt-ignore-input="true">{{ old('message') }}</textarea>
                                            @error('message')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                       name="term_condition" id="term_condition"
                                                       value="1" {{(old('term_condition') == 1) ? "checked" : ""}}>
                                                <label class="form-check-label" for="term_condition">
                                                    @lang('labels.general.term_&_condition_note_1')
                                                    <a href="/pages/datenschutzerklarung" target="_blank" class="text-underline theme-hover">@lang('labels.general.term_&_condition_note_2')</a>
                                                    @lang('labels.general.term_&_condition_note_3')
                                                    <a href="/pages/allgemeine-geschaftsbedingungen" target="_blank" class="text-underline theme-hover">@lang('labels.general.term_&_condition_note_4')</a>
                                                    @lang('labels.general.term_&_condition_note_5')
                                                </label>
                                                @error('term_condition')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-theme" type="submit">@lang('labels.contact_us.contact_request_btn')</button>
                            </div>
                        </x-forms.post>
                    </div>
                </div>

            </div>
            @include('frontend.includes.company.include.right')
        </div>
    </div>
@endsection
