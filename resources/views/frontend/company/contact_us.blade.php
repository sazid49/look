@extends('frontend.layouts.legacy.app')

@section('title', __('labels.company.contact_tab_title'))

@section('style')
@stop
@section('content')
    <div class="content">
        <div class="container1">
            @include('frontend.company.include.breadcrumb')
            <div class="row">
                <div class="col-md-12">
                    <div class="company-headerbar">
                        @php
                            $address_encode = urlencode($company->address);
                            $full_address_encoded = $address_encode . '%2C' . $company->postcode . '%20' . $company->city . '%2C' . 'Schweiz';
                        @endphp
                        @include('frontend.company.include.head')
                        <br>
                        <div class="row">
                            <div class="col-md-8">

                                <div class="card">
                                    <div class="card-body">
                                        <h4>{{ __('labels.company.contact_us') . ' ' . $company->company_name }}</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <x-utils.alert type="info" class="header-message">
                                                    {{ __('alerts.company.contact_form.note', ['company' => $company->company_name]) }}
                                                </x-utils.alert>
                                            </div>
                                            <div class="col-md-12">
                                                <x-forms.post
                                                        :action="route('frontend.company.create_contact_us',$company)">
                                                    <div class="form-group">
                                                        @lang('labels.contact_us.private_person')&nbsp;&nbsp;
                                                        <label for="gen_private_person_yes" class="col-form-label">
                                                            <input type="radio" name="private_person"
                                                                   id="gen_private_person_yes" value="1"
                                                                    {{ old('private_person') == '1' ? 'checked' : '' }} />
                                                            {{ __('labels.general.yes') }}&nbsp;&nbsp;
                                                        </label>
                                                        <label for="gen_private_person_no" class="col-form-label">
                                                            <input type="radio" name="private_person"
                                                                   id="gen_private_person_no" value="0"
                                                                    {{ (old('private_person') == '0' || old('private_person') == '') ? 'checked' : '' }} />
                                                            {{ __('labels.general.no') }}
                                                        </label>
                                                    </div>
                                                    <div class="form-group row company_name">
                                                        <div class="col-md-12">
                                                            <label for="company_name"
                                                                   class="col-form-label">@lang('labels.contact_us.company_name')</label>
                                                            <input type="text" name="company_name" class="form-control"
                                                                   id="company_name" value="{{ old('company_name') }}">
                                                        </div>
                                                    </div>
                                                    <!--form-group-->
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="title"
                                                                   class="col-form-label">@lang('labels.contact_us.title')</label>
                                                            <select name="title" id="title" class="form-control">
                                                                <option value=""></option>
                                                                <option value="Herr" {{ old('title') == 'Herr' ? 'selected' : '' }}>@lang('labels.offer.herr')</option>
                                                                <option value="Frau" {{ old('title') == 'Frau' ? 'selected' : '' }}>@lang('labels.offer.frau')</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="firstname"
                                                                   class="col-form-label">@lang('labels.contact_us.firstname')</label>
                                                            <input type="text" name="firstname" class="form-control"
                                                                   id="firstname"
                                                                   value="{{ old('firstname',$logged_in_user->userdetails->firstname ?? "") }}">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="lastname"
                                                                   class="col-form-label">@lang('labels.contact_us.lastname')</label>
                                                            <input type="text" name="lastname" class="form-control"
                                                                   id="lastname"
                                                                   value="{{ old('lastname',$logged_in_user->userdetails->lastname ?? "") }}">
                                                        </div>
                                                    </div>
                                                    <!--form-group-->


                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="postcode"
                                                                   class="col-form-label">@lang('labels.contact_us.postcode')</label>
                                                            <input type="number" name="postcode" class="form-control"
                                                                   id="postcode"
                                                                   value="{{ old('postcode',$logged_in_user->userdetails->postcode ?? "") }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="city"
                                                                   class="col-form-label">@lang('labels.contact_us.city')</label>
                                                            <input type="text" name="city" class="form-control"
                                                                   id="city"
                                                                   value="{{ old('city',$logged_in_user->userdetails->city ?? "") }}">
                                                        </div>
                                                    </div>
                                                    <!--form-group-->
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="gen_email"
                                                                   class="col-form-label">@lang('labels.contact_us.email')</label>
                                                            <input type="email" name="gen_email" class="form-control"
                                                                   id="gen_email"
                                                                   value="{{ old('gen_email',$logged_in_user->email ?? "") }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="phone"
                                                                   class="col-form-label">@lang('labels.contact_us.phone')</label>
                                                            <input type="text" name="phone" class="form-control"
                                                                   id="phone"
                                                                   value="{{ old('phone',$logged_in_user->userdetails->phone ?? "") }}">
                                                        </div>
                                                    </div>
                                                    <!--form-group-->
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label for="email"
                                                                   class="col-form-label">@lang('labels.contact_us.message')</label>
                                                            <textarea name="message" id="message" rows="5"
                                                                      class="form-control">{{ old('message') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <!--form-group-->

                                                    <!--form-group-->
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label for="agb" class="col-form-label">
                                                                <input type="checkbox" name="term_condition"
                                                                       id="term_condition"
                                                                       value="1" {{(old('term_condition') == 1) ? "checked" : ""}}>
                                                                @lang('labels.contact_us.term_&_condition_note')
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!--form-group-->

                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-8">
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fa fa-send"></i>
                                                                @lang('Nachricht senden')
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!--form-group-->

                                                </x-forms.post>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                @include('frontend.company.include.right')
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@stop
@section('script')
    <script>
        $(document).ready(function () {
            $("#share").click(function () {
                $("#share_div").toggle();
            })

            $('input[name="private_person"]').change(function () {
                if ($(this).val() == 0) {
                    $(".company_name").css('display', 'block')
                } else {
                    $(".company_name").css('display', 'none')
                }
            });
        });
    </script>
@stop
