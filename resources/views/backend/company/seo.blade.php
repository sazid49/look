@extends('backend.layouts.app')

@section('title', __('labels.company.update_company'))

@push('after-styles')
    <!-- DataTables -->
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
@endpush

@section('content')
    @php
        function seoval($tab,$type,$language,$companyId){
            $seo = \App\Domains\Company\Models\Seo::query()->where('company_id',$companyId)->where('tab',$tab)->where('type',$type)->where('language',$language)->first();
            //dd($seo);
            return $seo->content ?? "";
        }
    @endphp
        <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-18">{{__('labels.company.update_company')}}</h4>
                    <x-utils.link class="card-header-action" :href="route('admin.company.index')" :text="'Back'" />&nbsp;|&nbsp;
                    <a href="{{route('frontend.company.information',[$company,$company->slug])}}" target="_blank">{{__('labels.company.view_previw')}}</a>
                </div>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('labels.general.buttons.save')}}</a></li>
                        <li class="breadcrumb-item active">{{__('labels.company.update_company')}}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <x-backend.card>
        <x-slot name="header"><h5>{{ __('Finance') }}</h5></x-slot>
        <x-slot name="body">
            <span id="finance">
                @if (Auth()->user()->roles[0]->name == 'Administrator' ||
                    Auth()->user()->roles[0]->name == 'user_private' ||
                    Auth()->user()->roles[0]->name == 'user_company')
                    @include('backend.company.includes.finance')
                @endif
            </span>
        </x-slot>
    </x-backend.card>

    <x-backend.card>
        <x-slot name="header"><h5>{{ __('Listing') }}</h5></x-slot>
        <x-slot name="body">
            <span class="text-center text-success listing-alert"></span>
            @include('backend.company.includes.listing')
        </x-slot>
    </x-backend.card>

    <x-backend.card>
        <x-slot name="header"><h5>{{ __('Tab Activation') }}</h5></x-slot>
        <x-slot name="body">
            {{--            <span class="text-center text-success listing-alert"></span>--}}
            @include('backend.company.includes.tab-activation')
        </x-slot>
    </x-backend.card>

    <x-forms.patch :action="route('admin.company.update_seo', $company)" enctype="multipart/form-data" class="custom-validation" novalidate>

        <x-backend.card>
            <x-slot name="body">

                @include('backend.company.includes.nav')

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <?php $seo = $company->seo; ?>
                    <div class="tab-pane active" id="seo" role="tabpanel">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.seo') }}</h2>
                            </div>
                        </div>

                        <div class="card border border-default">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-xl-6">
                                        <div class="card border border-default">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <div class="d-sm-flex justify-content-between row">
                                                        <div class="col-md-4">
                                                            <label class="control-label label-company"><b>{{ __('labels.company.information') }}*</b></label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#information_de" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">German</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#information_fr" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">French</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#information_en" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">English</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#information_it" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">Italian</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <!-- Tab panes -->
                                                    <div class="tab-content text-muted">
                                                        <div class="tab-pane active" id="information_de" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="information_metadataid_de" name="information_metadataid_de" value="">
                                                                        <input type="text" id="information_metatitle_de" name="information_metatitle_de" class="form-control" value="{{ seoval('information','title','de',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="information_metadescription_de" cols="30" rows="2" id="information_metadescription_fr" spellcheck="true">{{ seoval('information','description','de',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="information_fr" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="information_metadataid_ft" name="information_metadataid_ft" value="">
                                                                        <input type="text" id="information_metatitle_fr" name="information_metatitle_fr" class="form-control" value="{{ seoval('information','title','fr',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="information_metadescription_fr" cols="30" rows="2" id="information_metadescription_fr" spellcheck="true">{{ seoval('information','description','fr',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="information_en" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="information_metadataid_en" name="information_metadataid_en" value="">
                                                                        <input type="text" id="information_metatitle_en" name="information_metatitle_en" class="form-control" value="{{ seoval('information','title','en',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="information_metadescription_en" cols="30" rows="2" id="information_metadescription_en" spellcheck="true">{{ seoval('information','description','en',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="information_it" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="information_metadataid_it" name="information_metadataid_it" value="">
                                                                        <input type="text" id="information_metatitle_it" name="information_metatitle_it" class="form-control" value="{{ seoval('information','title','it',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="information_metadescription_it" cols="30" rows="2" id="information_metadescription_it" spellcheck="true">{{ seoval('information','description','it',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-6">
                                        <div class="card border border-default">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <div class="d-sm-flex justify-content-between row">
                                                        <div class="col-md-4">
                                                            <label class="control-label label-company"><b>{{ __('labels.company.interraction') }}*</b></label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#interraction_de" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">German</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#interraction_fr" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">French</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#interraction_en" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">English</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#interraction_it" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">Italian</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content text-muted">
                                                        <div class="tab-pane active" id="interraction_de" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="interraction_metadataid_de" name="interraction_metadataid_de" value="">
                                                                        <input type="text" id="interraction_metatitle_de" name="interraction_metatitle_de" class="form-control" value="{{ seoval('interraction','title','de',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="interraction_metadescription_de" cols="30" rows="2" id="interraction_metadescription_de" spellcheck="true">{{ seoval('interraction','description','de',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="interraction_fr" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="interraction_metadataid_ft" name="interraction_metadataid_ft" value="">
                                                                        <input type="text" id="interraction_metatitle_fr" name="interraction_metatitle_fr" class="form-control" value="{{ seoval('interraction','title','fr',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="interraction_metadescription_fr" cols="30" rows="2" id="interraction_metadescription_fr" spellcheck="true">{{ seoval('interraction','description','fr',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="interraction_en" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="interraction_metadataid_en" name="interraction_metadataid_en" value="">
                                                                        <input type="text" id="interraction_metatitle_en" name="interraction_metatitle_en" class="form-control" value="{{ seoval('interraction','title','en',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="interraction_metadescription_en" cols="30" rows="2" id="interraction_metadescription_en" spellcheck="true">{{ seoval('interraction','description','en',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="interraction_it" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="interraction_metadataid_it" name="interraction_metadataid_it" value="">
                                                                        <input type="text" id="interraction_metatitle_it" name="interraction_metatitle_it" class="form-control" value="{{ seoval('interraction','title','it',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="interraction_metadescription_it" cols="30" rows="2" id="interraction_metadescription_it" spellcheck="true">{{ seoval('interraction','description','it',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xl-6">
                                        <div class="card border border-default">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <div class="d-sm-flex justify-content-between row">
                                                        <div class="col-md-4">
                                                            <label class="control-label label-company"><b>{{ __('labels.company.job') }}*</b></label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#job_de" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">German</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#job_fr" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">French</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#job_en" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">English</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#job_it" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">Italian</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content text-muted">
                                                        <div class="tab-pane active" id="job_de" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="job_metadataid_de" name="job_metadataid_de" value="">
                                                                        <input type="text" id="job_metatitle_de" name="job_metatitle_de" class="form-control" value="{{ seoval('job','title','de',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="job_metadescription_de" cols="30" rows="2" id="job_metadescription_fr" spellcheck="true">{{ seoval('job','description','de',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="job_fr" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="job_metadataid_ft" name="job_metadataid_ft" value="">
                                                                        <input type="text" id="job_metatitle_fr" name="job_metatitle_fr" class="form-control" value="{{ seoval('job','title','fr',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="job_metadescription_fr" cols="30" rows="2" id="job_metadescription_fr" spellcheck="true">{{ seoval('job','description','fr',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="job_en" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="job_metadataid_en" name="job_metadataid_en" value="">
                                                                        <input type="text" id="job_metatitle_en" name="job_metatitle_en" class="form-control" value="{{ seoval('job','title','en',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="job_metadescription_en" cols="30" rows="2" id="job_metadescription_en" spellcheck="true">{{ seoval('job','description','en',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="job_it" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="job_metadataid_it" name="job_metadataid_it" value="">
                                                                        <input type="text" id="job_metatitle_it" name="job_metatitle_it" class="form-control" value="{{ seoval('job','title','it',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="job_metadescription_it" cols="30" rows="2" id="job_metadescription_it" spellcheck="true">{{ seoval('job','description','it',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xl-6">
                                        <div class="card border border-default">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <div class="d-sm-flex justify-content-between row">
                                                        <div class="col-md-4">
                                                            <label class="control-label label-company"><b>{{ __('labels.company.kontaktformular') }}*</b></label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#kontaktformular_de" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">German</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#kontaktformular_fr" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">French</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#kontaktformular_en" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">English</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#kontaktformular_it" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">Italian</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content text-muted">
                                                        <div class="tab-pane active" id="kontaktformular_de" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="kontaktformular_metadataid_de" name="kontaktformular_metadataid_de" value="">
                                                                        <input type="text" id="kontaktformular_metatitle_de" name="kontaktformular_metatitle_de" class="form-control" value="{{ seoval('kontaktformular','title','de',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="kontaktformular_metadescription_de" cols="30" rows="2" id="kontaktformular_metadescription_de" spellcheck="true">{{ seoval('kontaktformular','description','de',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="kontaktformular_fr" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="kontaktformular_metadataid_fr" name="kontaktformular_metadataid_fr" value="">
                                                                        <input type="text" id="kontaktformular_metatitle_fr" name="kontaktformular_metatitle_fr" class="form-control" value="{{ seoval('kontaktformular','title','fr',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="kontaktformular_metadescription_fr" cols="30" rows="2" id="kontaktformular_metadescription_fr" spellcheck="true">{{ seoval('kontaktformular','description','fr',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="kontaktformular_en" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="kontaktformular_metadataid_en" name="kontaktformular_metadataid_en" value="">
                                                                        <input type="text" id="kontaktformular_metatitle_en" name="kontaktformular_metatitle_en" class="form-control" value="{{ seoval('kontaktformular','title','en',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="kontaktformular_metadescription_en" cols="30" rows="2" id="kontaktformular_metadescription_en" spellcheck="true">{{ seoval('kontaktformular','description','en',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="kontaktformular_it" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="kontaktformular_metadataid_it" name="kontaktformular_metadataid_it" value="">
                                                                        <input type="text" id="kontaktformular_metatitle_it" name="kontaktformular_metatitle_it" class="form-control" value="{{ seoval('kontaktformular','title','it',$company->id) ?? ""  }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="kontaktformular_metadescription_it" cols="30" rows="2" id="kontaktformular_metadescription_it" spellcheck="true">{{ seoval('kontaktformular','description','it',$company->id) ?? ""  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xl-6">
                                        <div class="card border border-default">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <div class="d-sm-flex justify-content-between row">
                                                        <div class="col-md-4">
                                                            <label class="control-label label-company"><b>{{ __('labels.company.empfehlungen') }}*</b></label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#empfehlungen_de" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">German</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#empfehlungen_fr" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">French</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#empfehlungen_en" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">English</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#empfehlungen_it" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">Italian</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content text-muted">
                                                        <div class="tab-pane active" id="empfehlungen_de" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="empfehlungen_metadataid_de" name="empfehlungen_metadataid_de" value="">
                                                                        <input type="text" id="empfehlungen_metatitle_de" name="empfehlungen_metatitle_de" class="form-control" value="{{ seoval('empfehlungen','title','de',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="empfehlungen_metadescription_de" cols="30" rows="2" id="empfehlungen_metadescription_de" spellcheck="true">{{ seoval('empfehlungen','description','de',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="empfehlungen_fr" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="empfehlungen_metadataid_ft" name="empfehlungen_metadataid_ft" value="">
                                                                        <input type="text" id="empfehlungen_metatitle_fr" name="empfehlungen_metatitle_fr" class="form-control" value="{{ seoval('empfehlungen','title','fr',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="empfehlungen_metadescription_fr" cols="30" rows="2" id="empfehlungen_metadescription_fr" spellcheck="true">{{ seoval('empfehlungen','description','fr',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="empfehlungen_en" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="empfehlungen_metadataid_en" name="empfehlungen_metadataid_en" value="">
                                                                        <input type="text" id="empfehlungen_metatitle_en" name="empfehlungen_metatitle_en" class="form-control" value="{{ seoval('empfehlungen','title','en',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="empfehlungen_metadescription_en" cols="30" rows="2" id="empfehlungen_metadescription_en" spellcheck="true">{{ seoval('empfehlungen','title','en',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="empfehlungen_it" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="empfehlungen_metadataid_it" name="empfehlungen_metadataid_it" value="">
                                                                        <input type="text" id="empfehlungen_metatitle_it" name="empfehlungen_metatitle_it" class="form-control" value="{{ seoval('empfehlungen','title','it',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="empfehlungen_metadescription_it" cols="30" rows="2" id="empfehlungen_metadescription_it" spellcheck="true">{{ seoval('empfehlungen','title','it',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xl-6">
                                        <div class="card border border-default">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <div class="d-sm-flex justify-content-between row">
                                                        <div class="col-md-4">
                                                            <label class="control-label label-company"><b>{{ __('labels.company.preisliste') }}*</b></label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#preisliste_de" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">German</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#preisliste_fr" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">French</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#preisliste_en" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">English</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#preisliste_it" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">Italian</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content text-muted">
                                                        <div class="tab-pane active" id="preisliste_de" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="preisliste_metadataid_de" name="preisliste_metadataid_de" value="">
                                                                        <input type="text" id="preisliste_metatitle_de" name="preisliste_metatitle_de" class="form-control" value="{{ seoval('preisliste','title','de',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="preisliste_metadescription_de" cols="30" rows="2" id="preisliste_metadescription_de" spellcheck="true">{{ seoval('preisliste','description','de',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="preisliste_fr" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="preisliste_metadataid_ft" name="preisliste_metadataid_ft" value="">
                                                                        <input type="text" id="preisliste_metatitle_fr" name="preisliste_metatitle_fr" class="form-control" value="{{ seoval('preisliste','title','fr',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="preisliste_metadescription_fr" cols="30" rows="2" id="preisliste_metadescription_fr" spellcheck="true">{{ seoval('preisliste','description','fr',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="preisliste_en" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="preisliste_metadataid_en" name="preisliste_metadataid_en" value="">
                                                                        <input type="text" id="preisliste_metatitle_en" name="preisliste_metatitle_en" class="form-control" value="{{ seoval('preisliste','title','en',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="preisliste_metadescription_en" cols="30" rows="2" id="preisliste_metadescription_en" spellcheck="true">{{ seoval('preisliste','description','en',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="preisliste_it" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="preisliste_metadataid_it" name="preisliste_metadataid_it" value="">
                                                                        <input type="text" id="preisliste_metatitle_it" name="preisliste_metatitle_it" class="form-control" value="{{ seoval('preisliste','title','it',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="preisliste_metadescription_it" cols="30" rows="2" id="preisliste_metadescription_it" spellcheck="true">{{ seoval('preisliste','description','it',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-xl-6">
                                        <div class="card border border-default">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <div class="d-sm-flex justify-content-between row">
                                                        <div class="col-md-4">
                                                            <label class="control-label label-company"><b>{{ __('labels.company.team') }}*</b></label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#team_de" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">German</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#team_fr" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">French</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#team_en" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">English</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#team_it" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">Italian</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content text-muted">
                                                        <div class="tab-pane active" id="team_de" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="team_metadataid_de" name="team_metadataid_de" value="">
                                                                        <input type="text" id="team_metatitle_de" name="team_metatitle_de" class="form-control" value="{{ seoval('team','title','de',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="team_metadescription_de" cols="30" rows="2" id="team_metadescription_de" spellcheck="true">{{ seoval('team','description','de',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="team_fr" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="team_metadataid_ft" name="team_metadataid_ft" value="">
                                                                        <input type="text" id="team_metatitle_fr" name="team_metatitle_fr" class="form-control" value="{{ seoval('team','title','fr',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="team_metadescription_fr" cols="30" rows="2" id="team_metadescription_fr" spellcheck="true">{{ seoval('team','description','fr',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="team_en" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="team_metadataid_en" name="team_metadataid_en" value="">
                                                                        <input type="text" id="team_metatitle_en" name="team_metatitle_en" class="form-control" value="{{ seoval('team','title','en',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="team_metadescription_en" cols="30" rows="2" id="team_metadescription_en" spellcheck="true">{{ seoval('team','description','en',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="team_it" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="team_metadataid_it" name="team_metadataid_it" value="">
                                                                        <input type="text" id="team_metatitle_it" name="team_metatitle_it" class="form-control" value="{{ seoval('team','title','it',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="team_metadescription_it" cols="30" rows="2" id="team_metadescription_it" spellcheck="true">{{ seoval('team','description','it',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-xl-6">
                                        <div class="card border border-default">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <div class="d-sm-flex justify-content-between row">
                                                        <div class="col-md-4">
                                                            <label class="control-label label-company"><b>{{ __('labels.company.news') }}*</b></label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#news_de" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">German</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#news_fr" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">French</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#news_en" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">English</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#news_it" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">Italian</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content text-muted">
                                                        <div class="tab-pane active" id="news_de" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="news_metadataid_de" name="news_metadataid_de" value="">
                                                                        <input type="text" id="news_metatitle_de" name="news_metatitle_de" class="form-control" value="{{ seoval('news','title','de',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="news_metadescription_de" cols="30" rows="2" id="news_metadescription_de" spellcheck="true">{{ seoval('news','description','de',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="news_fr" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="news_metadataid_ft" name="news_metadataid_ft" value="">
                                                                        <input type="text" id="news_metatitle_fr" name="news_metatitle_fr" class="form-control" value="{{ seoval('news','title','fr',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="news_metadescription_fr" cols="30" rows="2" id="news_metadescription_fr" spellcheck="true">{{ seoval('news','description','fr',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="news_en" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="news_metadataid_en" name="news_metadataid_en" value="">
                                                                        <input type="text" id="news_metatitle_en" name="news_metatitle_en" class="form-control" value="{{ seoval('news','title','en',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="news_metadescription_en" cols="30" rows="2" id="news_metadescription_en" spellcheck="true">{{ seoval('news','description','en',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="news_it" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="news_metadataid_it" name="news_metadataid_it" value="">
                                                                        <input type="text" id="news_metatitle_it" name="news_metatitle_it" class="form-control" value="{{ seoval('news','title','it',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="news_metadescription_it" cols="30" rows="2" id="news_metadescription_it" spellcheck="true">{{ seoval('news','description','it',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-xl-6">
                                        <div class="card border border-default">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <div class="d-sm-flex justify-content-between row">
                                                        <div class="col-md-4">
                                                            <label class="control-label label-company"><b>{{ __('labels.company.galerie') }}*</b></label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#galerie_de" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">German</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#galerie_fr" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">French</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#galerie_en" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">English</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#galerie_it" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">Italian</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content text-muted">
                                                        <div class="tab-pane active" id="galerie_de" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="galerie_metadataid_de" name="galerie_metadataid_de" value="">
                                                                        <input type="text" id="galerie_metatitle_de" name="galerie_metatitle_de" class="form-control" value="{{ seoval('galerie','title','de',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="galerie_metadescription_de" cols="30" rows="2" id="galerie_metadescription_de" spellcheck="true">{{ seoval('galerie','description','de',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="galerie_fr" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="galerie_metadataid_ft" name="galerie_metadataid_ft" value="">
                                                                        <input type="text" id="galerie_metatitle_fr" name="galerie_metatitle_fr" class="form-control" value="{{ seoval('galerie','title','fr',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="galerie_metadescription_fr" cols="30" rows="2" id="galerie_metadescription_fr" spellcheck="true">{{ seoval('galerie','description','fr',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="galerie_en" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="galerie_metadataid_en" name="galerie_metadataid_en" value="">
                                                                        <input type="text" id="galerie_metatitle_en" name="galerie_metatitle_en" class="form-control" value="{{ seoval('galerie','title','en',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="galerie_metadescription_en" cols="30" rows="2" id="galerie_metadescription_en" spellcheck="true">{{ seoval('galerie','description','en',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="galerie_it" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="galerie_metadataid_it" name="galerie_metadataid_it" value="">
                                                                        <input type="text" id="galerie_metatitle_it" name="galerie_metatitle_it" class="form-control" value="{{ seoval('galerie','title','it',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="galerie_metadescription_it" cols="30" rows="2" id="galerie_metadescription_it" spellcheck="true">{{ seoval('galerie','description','it',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-xl-6">
                                        <div class="card border border-default">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <div class="d-sm-flex justify-content-between row">
                                                        <div class="col-md-4">
                                                            <label class="control-label label-company"><b>{{ __('labels.company.rating') }}*</b></label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#review_de" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">German</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#review_fr" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">French</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#review_en" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">English</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item col-md-6">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#review_it" role="tab">
                                                                        <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                                        <span class="d-none d-sm-block">Italian</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content text-muted">
                                                        <div class="tab-pane active" id="review_de" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="review_metadataid_de" name="review_metadataid_de" value="">
                                                                        <input type="text" id="review_metatitle_de" name="review_metatitle_de" class="form-control" value="{{ seoval('review','title','de',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="review_metadescription_de" cols="30" rows="2" id="review_metadescription_fr" spellcheck="true">{{ seoval('review','description','de',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="review_fr" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="review_metadataid_ft" name="review_metadataid_ft" value="">
                                                                        <input type="text" id="review_metatitle_fr" name="review_metatitle_fr" class="form-control" value="{{ seoval('review','title','fr',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="review_metadescription_fr" cols="30" rows="2" id="review_metadescription_fr" spellcheck="true">{{ seoval('review','description','fr',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="review_en" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="review_metadataid_en" name="review_metadataid_en" value="">
                                                                        <input type="text" id="review_metatitle_en" name="review_metatitle_en" class="form-control" value="{{ seoval('review','title','en',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="review_metadescription_en" cols="30" rows="2" id="review_metadescription_en" spellcheck="true">{{ seoval('review','description','en',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="review_it" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                                        <input type="hidden" id="review_metadataid_it" name="review_metadataid_it" value="">
                                                                        <input type="text" id="review_metatitle_it" name="review_metatitle_it" class="form-control" value="{{ seoval('review','title','it',$company->id) ?? "" }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                                        <textarea class="form-control" name="review_metadescription_it" cols="30" rows="2" id="review_metadescription_it" spellcheck="true">{{ seoval('review','description','it',$company->id) ?? "" }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-primary float-right" type="submit">{{__('labels.general.buttons.save')}}</button>
                </div>

            </x-slot>
        </x-backend.card>

    </x-forms.patch>


@endsection

@push('after-scripts')
    <script src="{{ URL::asset('assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ URL::asset('assets/js/scripts/forms/validation/form-validation.js') }}"></script>

    <!--tinymce js-->
    <script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-tagsinput.min.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ URL::asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $(".datatable").DataTable();
            // $("input[name='claimed']").change(function () {
            //     if($("input[name='claimed']:checked").val() == 1) {
            //         $(".claimed_by").removeClass('d-none');
            //     } else {
            //         $(".claimed_by").addClass('d-none');
            //         $("#claimed_by").val('');
            //     }
            // });

            // 0 < $("#description_de").length && tinymce.init({
            //     selector: "textarea#description_de",
            //     height: 300,
            //     plugins: [
            //         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            //         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            //         "save table contextmenu directionality emoticons template paste textcolor"
            //     ],
            //     toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            //     style_formats: [{
            //         title: "Bold text",
            //         inline: "b"
            //     }, {
            //         title: "Red text",
            //         inline: "span",
            //         styles: {
            //             color: "#ff0000"
            //         }
            //     }, {
            //         title: "Red header",
            //         block: "h1",
            //         styles: {
            //             color: "#ff0000"
            //         }
            //     }, {
            //         title: "Example 1",
            //         inline: "span",
            //         classes: "example1"
            //     }, {
            //         title: "Example 2",
            //         inline: "span",
            //         classes: "example2"
            //     }, {
            //         title: "Table styles"
            //     }, {
            //         title: "Table row 1",
            //         selector: "tr",
            //         classes: "tablerow1"
            //     }]
            // });
            // 0 < $("#description_fr").length && tinymce.init({
            //     selector: "textarea#description_fr",
            //     height: 300,
            //     plugins: [
            //         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            //         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            //         "save table contextmenu directionality emoticons template paste textcolor"
            //     ],
            //     toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            //     style_formats: [{
            //         title: "Bold text",
            //         inline: "b"
            //     }, {
            //         title: "Red text",
            //         inline: "span",
            //         styles: {
            //             color: "#ff0000"
            //         }
            //     }, {
            //         title: "Red header",
            //         block: "h1",
            //         styles: {
            //             color: "#ff0000"
            //         }
            //     }, {
            //         title: "Example 1",
            //         inline: "span",
            //         classes: "example1"
            //     }, {
            //         title: "Example 2",
            //         inline: "span",
            //         classes: "example2"
            //     }, {
            //         title: "Table styles"
            //     }, {
            //         title: "Table row 1",
            //         selector: "tr",
            //         classes: "tablerow1"
            //     }]
            // })
            // 0 < $("#description_en").length && tinymce.init({
            //     selector: "textarea#description_en",
            //     height: 300,
            //     plugins: [
            //         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            //         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            //         "save table contextmenu directionality emoticons template paste textcolor"
            //     ],
            //     toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            //     style_formats: [{
            //         title: "Bold text",
            //         inline: "b"
            //     }, {
            //         title: "Red text",
            //         inline: "span",
            //         styles: {
            //             color: "#ff0000"
            //         }
            //     }, {
            //         title: "Red header",
            //         block: "h1",
            //         styles: {
            //             color: "#ff0000"
            //         }
            //     }, {
            //         title: "Example 1",
            //         inline: "span",
            //         classes: "example1"
            //     }, {
            //         title: "Example 2",
            //         inline: "span",
            //         classes: "example2"
            //     }, {
            //         title: "Table styles"
            //     }, {
            //         title: "Table row 1",
            //         selector: "tr",
            //         classes: "tablerow1"
            //     }]
            // })
            // 0 < $("#description_it").length && tinymce.init({
            //     selector: "textarea#description_it",
            //     height: 300,
            //     plugins: [
            //         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            //         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            //         "save table contextmenu directionality emoticons template paste textcolor"
            //     ],
            //     toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            //     style_formats: [{
            //         title: "Bold text",
            //         inline: "b"
            //     }, {
            //         title: "Red text",
            //         inline: "span",
            //         styles: {
            //             color: "#ff0000"
            //         }
            //     }, {
            //         title: "Red header",
            //         block: "h1",
            //         styles: {
            //             color: "#ff0000"
            //         }
            //     }, {
            //         title: "Example 1",
            //         inline: "span",
            //         classes: "example1"
            //     }, {
            //         title: "Example 2",
            //         inline: "span",
            //         classes: "example2"
            //     }, {
            //         title: "Table styles"
            //     }, {
            //         title: "Table row 1",
            //         selector: "tr",
            //         classes: "tablerow1"
            //     }]
            // })



        });


        function show_modal(obj) {
            var modal_id = $(obj).attr('data-bs-target');
            var content = $(modal_id).children('div.modal-dialog').children('div.modal-content');
            var data_url = $(obj).attr('data-url');
            $(content).html('<div class="alert alert-info fade in cust_rem_padd"><i class="icon-info-sign" data-dismiss="alert"></i> <strong>Loading...</strong></div>');
            $.ajax({
                url: data_url,
                dataType: "html",
                catch: false,
                success: function(data) {
                    $(content).html(data);
                },
                error: function(data) {
                    $(content).html(data);
                }
            });
        }
    </script>


@endpush
