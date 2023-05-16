@extends('frontend.layouts.legacy.app')

@section('title', __('labels.company.apply_job_tab_title'))

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
                                        <div class="row">
                                            <div class="col-8">
                                                <h4>{{ __('labels.job.heading_title').": ".$job->title}}</h4>
                                            </div>
                                            <div class="col-4">
                                                <a href="{{route('frontend.company.job-application',[$company,$company->slug])}}"
                                                   class="btn mr-1 float-right btn-sm btn-primary">{{__('labels.general.back')}}</a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            {{-- <div class="col-md-12">
												<div class="alert alert-info">{!!__('alerts.company.job.note',['company'=>$company->company_name,'job_title'=>$job->title])!!}</div>
                                            </div> --}}
                                            <div class="col-md-12">
                                                <x-forms.post
                                                        :action="route('frontend.company.create_apply_job',[$company,$job])"
                                                        enctype="multipart/form-data" class="custom-validation"
                                                        novalidate>
                                                    <!--form-group-->
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="title"
                                                                   class="col-form-label">@lang('labels.job.title')</label>
                                                            <select name="title" id="title" class="form-control">
                                                                <option value=""></option>
                                                                <option value="Herr" {{ old('title') == 'Herr' ? 'selected' : '' }}>@lang('labels.job.herr')</option>
                                                                <option value="Frau" {{ old('title') == 'Frau' ? 'selected' : '' }}>@lang('labels.job.frau')</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="firstname"
                                                                   class="col-form-label">@lang('labels.job.firstname')</label>
                                                            <input type="text" name="firstname" class="form-control"
                                                                   id="firstname"
                                                                   value="{{ old('firstname',$logged_in_user->userdetails->firstname ?? "") }}">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="lastname"
                                                                   class="col-form-label">@lang('labels.job.lastname')</label>
                                                            <input type="text" name="lastname" class="form-control"
                                                                   id="lastname"
                                                                   value="{{ old('lastname',$logged_in_user->userdetails->lastname ?? "") }}">
                                                        </div>
                                                    </div>
                                                    <!--form-group-->


                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="postcode"
                                                                   class="col-form-label">@lang('labels.job.postcode')</label>
                                                            <input type="number" name="postcode" class="form-control"
                                                                   id="postcode"
                                                                   value="{{ old('postcode',$logged_in_user->userdetails->postcode ?? "") }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="city"
                                                                   class="col-form-label">@lang('labels.job.city')</label>
                                                            <input type="text" name="city" class="form-control"
                                                                   id="city"
                                                                   value="{{ old('city',$logged_in_user->userdetails->city ?? "") }}">
                                                        </div>
                                                    </div>
                                                    <!--form-group-->
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="email"
                                                                   class="col-form-label">@lang('labels.job.email')</label>
                                                            <input type="email" name="email" class="form-control"
                                                                   id="email"
                                                                   value="{{ old('email',$logged_in_user->email ?? "") }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="phone"
                                                                   class="col-form-label">@lang('labels.job.phone')</label>
                                                            <input type="text" name="phone" class="form-control"
                                                                   id="phone"
                                                                   value="{{ old('phone',$logged_in_user->userdetails->phone ?? "") }}">
                                                        </div>
                                                    </div>

                                                    <!--form-group-->
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="date_of_birth"
                                                                   class="col-form-label">@lang('labels.job.date_of_birth')</label>
                                                            <input type="date" name="date_of_birth" class="form-control"
                                                                   id="date_of_birth"
                                                                   value="{{ old('date_of_birth',$logged_in_user->userdetails->birthday ?? "") }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="civil_status"
                                                                   class="col-form-label">@lang('labels.job.civil_status')</label>
                                                            <input type="text" name="civil_status" class="form-control"
                                                                   id="civil_status" value="{{ old('civil_status') }}">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <!--form-group-->
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <h5>{{__('labels.job.upload_files')}}</h5>
                                                            <p>{{__('labels.job.upload_files_note')}}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="motivation_letter"
                                                                   class="col-form-label">@lang('labels.job.motivation_letter')</label>
                                                            <input type="file" accept=".pdf,.doc,.docx,.zip"
                                                                   name="motivation_letter" class="form-control btn-sm">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="CV"
                                                                   class="col-form-label">@lang('labels.job.cv')</label>
                                                            <input type="file" accept=".pdf,.doc,.docx,.zip" name="CV"
                                                                   class="form-control btn-sm">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="certificate_of_employment"
                                                                   class="col-form-label">@lang('labels.job.certificate_of_employment')</label>
                                                            <input type="file" accept=".pdf,.doc,.docx,.zip"
                                                                   name="certificate_of_employment"
                                                                   class="form-control btn-sm">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="diplomas_and_certificates"
                                                                   class="col-form-label">@lang('labels.job.diplomas_and_certificates')</label>
                                                            <input type="file" accept=".pdf,.doc,.docx,.zip"
                                                                   name="diplomas_and_certificates"
                                                                   class="form-control btn-sm">
                                                        </div>
                                                    </div>

                                                    <!--form-group-->
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label for="email"
                                                                   class="col-form-label">@lang('labels.job.message')</label>
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
                                                                @lang('labels.job.term_&_condition_note')
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!--form-group-->

                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-8">
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fa fa-send"></i>
                                                                @lang('labels.job.submit_btn')
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
