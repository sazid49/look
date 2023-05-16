@extends('frontend.layouts.panel')

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
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
            <div class="col-md-6">
                <h4 class="mb-sm-0 font-size-18">{{__('labels.company.update_company')}}</h4>
                <x-utils.link class="card-header-action" :href="route('frontend.panel.company.index')" :text="'Back'" />&nbsp;|&nbsp;
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
<x-forms.patch :action="route('frontend.panel.company.update_seo', $company)" enctype="multipart/form-data" class="custom-validation" novalidate>

    <x-backend.card>
        <x-slot name="body">

            <!-- Nav tabs -->
            @include('frontend.panel.company.includes.tab')

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
																	<input type="text" id="information_metatitle_de" name="information_metatitle_de" class="form-control" value="{{ $seo->information_metatitle_de ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="information_metadescription_de" cols="30" rows="2" id="information_metadescription_fr" spellcheck="true">{{$seo->information_metadescription_de ?? "" }}</textarea>
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
																	<input type="text" id="information_metatitle_ft" name="information_metatitle_ft" class="form-control" value="{{ $seo->information_metatitle_ft ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="information_metadescription_ft" cols="30" rows="2" id="information_metadescription_fr" spellcheck="true">{{$seo->information_metadescription_ft ?? "" }}</textarea>
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
																	<input type="text" id="information_metatitle_en" name="information_metatitle_en" class="form-control" value="{{ $seo->information_metatitle_en ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="information_metadescription_en" cols="30" rows="2" id="information_metadescription_en" spellcheck="true">{{$seo->information_metadescription_en ?? "" }}</textarea>
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
																	<input type="text" id="information_metatitle_it" name="information_metatitle_it" class="form-control" value="{{ $seo->information_metatitle_it ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="information_metadescription_it" cols="30" rows="2" id="information_metadescription_it" spellcheck="true">{{$seo->information_metadescription_it ?? "" }}</textarea>
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
																	<input type="text" id="interraction_metatitle_de" name="interraction_metatitle_de" class="form-control" value="{{ $seo->interraction_metatitle_de ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="interraction_metadescription_de" cols="30" rows="2" id="interraction_metadescription_fr" spellcheck="true">{{$seo->interraction_metadescription_de ?? "" }}</textarea>
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
																	<input type="text" id="interraction_metatitle_ft" name="interraction_metatitle_ft" class="form-control" value="{{ $seo->interraction_metatitle_ft ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="interraction_metadescription_ft" cols="30" rows="2" id="interraction_metadescription_fr" spellcheck="true">{{$seo->interraction_metadescription_ft ?? "" }}</textarea>
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
																	<input type="text" id="interraction_metatitle_en" name="interraction_metatitle_en" class="form-control" value="{{ $seo->interraction_metatitle_en ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="interraction_metadescription_en" cols="30" rows="2" id="interraction_metadescription_en" spellcheck="true">{{$seo->interraction_metadescription_en ?? "" }}</textarea>
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
																	<input type="text" id="interraction_metatitle_it" name="interraction_metatitle_it" class="form-control" value="{{ $seo->interraction_metatitle_it ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="interraction_metadescription_it" cols="30" rows="2" id="interraction_metadescription_it" spellcheck="true">{{$seo->interraction_metadescription_it ?? "" }}</textarea>
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
																	<input type="text" id="job_metatitle_de" name="job_metatitle_de" class="form-control" value="{{ $seo->job_metatitle_de ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="job_metadescription_de" cols="30" rows="2" id="job_metadescription_fr" spellcheck="true">{{$seo->job_metadescription_de ?? "" }}</textarea>
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
																	<input type="text" id="job_metatitle_ft" name="job_metatitle_ft" class="form-control" value="{{ $seo->job_metatitle_ft ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="job_metadescription_ft" cols="30" rows="2" id="job_metadescription_fr" spellcheck="true">{{$seo->job_metadescription_ft ?? "" }}</textarea>
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
																	<input type="text" id="job_metatitle_en" name="job_metatitle_en" class="form-control" value="{{ $seo->job_metatitle_en ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="job_metadescription_en" cols="30" rows="2" id="job_metadescription_en" spellcheck="true">{{$seo->job_metadescription_en ?? "" }}</textarea>
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
																	<input type="text" id="job_metatitle_it" name="job_metatitle_it" class="form-control" value="{{ $seo->job_metatitle_it ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="job_metadescription_it" cols="30" rows="2" id="job_metadescription_it" spellcheck="true">{{$seo->job_metadescription_it ?? "" }}</textarea>
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
																	<input type="text" id="kontaktformular_metatitle_de" name="kontaktformular_metatitle_de" class="form-control" value="{{ $seo->kontaktformular_metatitle_de ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="kontaktformular_metadescription_de" cols="30" rows="2" id="kontaktformular_metadescription_fr" spellcheck="true">{{$seo->kontaktformular_metadescription_de ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="kontaktformular_fr" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="kontaktformular_metadataid_ft" name="kontaktformular_metadataid_ft" value="">
																	<input type="text" id="kontaktformular_metatitle_ft" name="kontaktformular_metatitle_ft" class="form-control" value="{{ $seo->kontaktformular_metatitle_ft ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="kontaktformular_metadescription_ft" cols="30" rows="2" id="kontaktformular_metadescription_fr" spellcheck="true">{{$seo->kontaktformular_metadescription_ft ?? "" }}</textarea>
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
																	<input type="text" id="kontaktformular_metatitle_en" name="kontaktformular_metatitle_en" class="form-control" value="{{ $seo->kontaktformular_metatitle_en ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="kontaktformular_metadescription_en" cols="30" rows="2" id="kontaktformular_metadescription_en" spellcheck="true">{{$seo->kontaktformular_metadescription_en ?? "" }}</textarea>
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
																	<input type="text" id="kontaktformular_metatitle_it" name="kontaktformular_metatitle_it" class="form-control" value="{{ $seo->kontaktformular_metatitle_it ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="kontaktformular_metadescription_it" cols="30" rows="2" id="kontaktformular_metadescription_it" spellcheck="true">{{$seo->kontaktformular_metadescription_it ?? "" }}</textarea>
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
																	<input type="text" id="empfehlungen_metatitle_de" name="empfehlungen_metatitle_de" class="form-control" value="{{ $seo->empfehlungen_metatitle_de ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="empfehlungen_metadescription_de" cols="30" rows="2" id="empfehlungen_metadescription_fr" spellcheck="true">{{$seo->empfehlungen_metadescription_de ?? "" }}</textarea>
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
																	<input type="text" id="empfehlungen_metatitle_ft" name="empfehlungen_metatitle_ft" class="form-control" value="{{ $seo->empfehlungen_metatitle_ft ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="empfehlungen_metadescription_ft" cols="30" rows="2" id="empfehlungen_metadescription_fr" spellcheck="true">{{$seo->empfehlungen_metadescription_ft ?? "" }}</textarea>
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
																	<input type="text" id="empfehlungen_metatitle_en" name="empfehlungen_metatitle_en" class="form-control" value="{{ $seo->empfehlungen_metatitle_en ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="empfehlungen_metadescription_en" cols="30" rows="2" id="empfehlungen_metadescription_en" spellcheck="true">{{$seo->empfehlungen_metadescription_en ?? "" }}</textarea>
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
																	<input type="text" id="empfehlungen_metatitle_it" name="empfehlungen_metatitle_it" class="form-control" value="{{ $seo->empfehlungen_metatitle_it ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="empfehlungen_metadescription_it" cols="30" rows="2" id="empfehlungen_metadescription_it" spellcheck="true">{{$seo->empfehlungen_metadescription_it ?? "" }}</textarea>
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
																	<input type="text" id="preisliste_metatitle_de" name="preisliste_metatitle_de" class="form-control" value="{{ $seo->preisliste_metatitle_de ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="preisliste_metadescription_de" cols="30" rows="2" id="preisliste_metadescription_fr" spellcheck="true">{{$seo->preisliste_metadescription_de ?? "" }}</textarea>
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
																	<input type="text" id="preisliste_metatitle_ft" name="preisliste_metatitle_ft" class="form-control" value="{{ $seo->preisliste_metatitle_ft ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="preisliste_metadescription_ft" cols="30" rows="2" id="preisliste_metadescription_fr" spellcheck="true">{{$seo->preisliste_metadescription_ft ?? "" }}</textarea>
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
																	<input type="text" id="preisliste_metatitle_en" name="preisliste_metatitle_en" class="form-control" value="{{ $seo->preisliste_metatitle_en ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="preisliste_metadescription_en" cols="30" rows="2" id="preisliste_metadescription_en" spellcheck="true">{{$seo->preisliste_metadescription_en ?? "" }}</textarea>
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
																	<input type="text" id="preisliste_metatitle_it" name="preisliste_metatitle_it" class="form-control" value="{{ $seo->preisliste_metatitle_it ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="preisliste_metadescription_it" cols="30" rows="2" id="preisliste_metadescription_it" spellcheck="true">{{$seo->preisliste_metadescription_it ?? "" }}</textarea>
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
																	<input type="text" id="team_metatitle_de" name="team_metatitle_de" class="form-control" value="{{ $seo->team_metatitle_de ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="team_metadescription_de" cols="30" rows="2" id="team_metadescription_fr" spellcheck="true">{{$seo->team_metadescription_de ?? ''}}</textarea>
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
																	<input type="text" id="team_metatitle_ft" name="team_metatitle_ft" class="form-control" value="{{ $seo->team_metatitle_ft ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="team_metadescription_ft" cols="30" rows="2" id="team_metadescription_fr" spellcheck="true">{{$seo->team_metadescription_ft ?? ''}}</textarea>
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
																	<input type="text" id="team_metatitle_en" name="team_metatitle_en" class="form-control" value="{{ $seo->team_metatitle_en ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="team_metadescription_en" cols="30" rows="2" id="team_metadescription_en" spellcheck="true">{{$seo->team_metadescription_en ?? ''}}</textarea>
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
																	<input type="text" id="team_metatitle_it" name="team_metatitle_it" class="form-control" value="{{ $seo->team_metatitle_it ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="team_metadescription_it" cols="30" rows="2" id="team_metadescription_it" spellcheck="true">{{$seo->team_metadescription_it ?? ''}}</textarea>
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
																	<input type="text" id="news_metatitle_de" name="news_metatitle_de" class="form-control" value="{{ $seo->news_metatitle_de ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="news_metadescription_de" cols="30" rows="2" id="news_metadescription_fr" spellcheck="true">{{$seo->news_metadescription_de ?? ''}}</textarea>
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
																	<input type="text" id="news_metatitle_ft" name="news_metatitle_ft" class="form-control" value="{{ $seo->news_metatitle_ft ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="news_metadescription_ft" cols="30" rows="2" id="news_metadescription_fr" spellcheck="true">{{$seo->news_metadescription_ft ?? ''}}</textarea>
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
																	<input type="text" id="news_metatitle_en" name="news_metatitle_en" class="form-control" value="{{ $seo->news_metatitle_en ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="news_metadescription_en" cols="30" rows="2" id="news_metadescription_en" spellcheck="true">{{$seo->news_metadescription_en ?? ''}}</textarea>
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
																	<input type="text" id="news_metatitle_it" name="news_metatitle_it" class="form-control" value="{{ $seo->news_metatitle_it ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="news_metadescription_it" cols="30" rows="2" id="news_metadescription_it" spellcheck="true">{{$seo->news_metadescription_it ?? ''}}</textarea>
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
																	<input type="text" id="galerie_metatitle_de" name="galerie_metatitle_de" class="form-control" value="{{ $seo->galerie_metatitle_de ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="galerie_metadescription_de" cols="30" rows="2" id="galerie_metadescription_fr" spellcheck="true">{{$seo->galerie_metadescription_de ?? ''}}</textarea>
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
																	<input type="text" id="galerie_metatitle_ft" name="galerie_metatitle_ft" class="form-control" value="{{ $seo->galerie_metatitle_ft ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="galerie_metadescription_ft" cols="30" rows="2" id="galerie_metadescription_fr" spellcheck="true">{{$seo->galerie_metadescription_ft ?? ''}}</textarea>
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
																	<input type="text" id="galerie_metatitle_en" name="galerie_metatitle_en" class="form-control" value="{{ $seo->galerie_metatitle_en ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="galerie_metadescription_en" cols="30" rows="2" id="galerie_metadescription_en" spellcheck="true">{{$seo->galerie_metadescription_en ?? ''}}</textarea>
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
																	<input type="text" id="galerie_metatitle_it" name="galerie_metatitle_it" class="form-control" value="{{ $seo->galerie_metatitle_it ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="galerie_metadescription_it" cols="30" rows="2" id="galerie_metadescription_it" spellcheck="true">{{$seo->galerie_metadescription_it ?? ''}}</textarea>
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
																<a class="nav-link active" data-bs-toggle="tab" href="#rating_de" role="tab">
																	<img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">German</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#rating_fr" role="tab">
																	<img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">French</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#rating_en" role="tab">
																	<img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">English</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#rating_it" role="tab">
																	<img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">Italian</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
												<!-- Tab panes -->
												<div class="tab-content text-muted">
													<div class="tab-pane active" id="rating_de" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="rating_metadataid_de" name="rating_metadataid_de" value="">
																	<input type="text" id="rating_metatitle_de" name="rating_metatitle_de" class="form-control" value="{{ $seo->rating_metatitle_de ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="rating_metadescription_de" cols="30" rows="2" id="rating_metadescription_fr" spellcheck="true">{{$seo->rating_metadescription_de ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="rating_fr" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="rating_metadataid_ft" name="rating_metadataid_ft" value="">
																	<input type="text" id="rating_metatitle_ft" name="rating_metatitle_ft" class="form-control" value="{{ $seo->rating_metatitle_ft ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="rating_metadescription_ft" cols="30" rows="2" id="rating_metadescription_fr" spellcheck="true">{{$seo->rating_metadescription_ft ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="rating_en" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="rating_metadataid_en" name="rating_metadataid_en" value="">
																	<input type="text" id="rating_metatitle_en" name="rating_metatitle_en" class="form-control" value="{{ $seo->rating_metatitle_en ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="rating_metadescription_en" cols="30" rows="2" id="rating_metadescription_en" spellcheck="true">{{$seo->rating_metadescription_en ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="rating_it" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="rating_metadataid_it" name="rating_metadataid_it" value="">
																	<input type="text" id="rating_metatitle_it" name="rating_metatitle_it" class="form-control" value="{{ $seo->rating_metatitle_it ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="rating_metadescription_it" cols="30" rows="2" id="rating_metadescription_it" spellcheck="true">{{$seo->rating_metadescription_it ?? ''}}</textarea>
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
		$("input[name='claimed']").change(function () {
				if($("input[name='claimed']:checked").val() == 1) {
					$(".claimed_by").removeClass('d-none');
				} else {
					$(".claimed_by").addClass('d-none');
					$("#claimed_by").val('');
				}
			});

        $(".add-pricing-item").click(function() {
            var clone = $(".item_title:first").clone();
            var cat_count = $("#cat_count").val();

            $(clone).find('.title_txt').attr('name', 'title_' + cat_count);
            $(clone).find('.description_txt').attr('name', 'description_' + cat_count);
            $(clone).find('.price_txt').attr('name', 'price_' + cat_count);
            $(clone).find('.item_title_action').removeClass('d-none');
            $(".prising_div").append(clone);
            cat_count++;
            $("#cat_count").val(cat_count);
        });
        $(".add-pricing-category").click(function() {
            var cat_count = $("#cat_count").val();
            var clone = $(".category_title:first").clone();
            $(clone).find('.category_title_txt').attr('name', 'category_title_' + cat_count);

            $(clone).find('.category_title_action').removeClass('d-none');
            $(".prising_div").append(clone);
            cat_count++;
            $("#cat_count").val(cat_count);
        });

        $(".add-team-item").click(function() {
            var clone = $(".team_title:first").clone();
            $(clone).find('.team_title_action').removeClass('d-none');
            $(clone).find('input[name="profile_photo[]"]').val('');
            $(clone).find('input[name="profile_photo_hidden[]"]').val('');
            $(clone).find('input[name="team_name[]"]').val('');
            $(clone).find('input[name="designation[]"]').val('');
            $(".team_div").append(clone);
        });

        $(".add-gallery-item").click(function() {
            var clone = $(".gallery:last").clone();
            $(clone).find('.gallery_action').removeClass('d-none');
            $(clone).find('input[name="image[]"]').val('');
            $(clone).find('input[name="image_hidden[]"]').val('');
            $(clone).find('input[name="show_on_frontside[]"]').prop('checked', false);
            $(".gallery_div").append(clone);
        });

        $(document).on('click', 'input[name="show_on_frontside[]"]', function() {
            //check "select all" if all checkbox items are checked
            if ($('input[name="show_on_frontside[]"]:checked').length >= 6) {
                alert('You can not select more then 5 images')
                $(this).prop('checked', false);
            }
        });

        $(document).on('click', ".rem_cat_title_row", function() {
            var row = $(this).closest('.row');
            row.remove();
        });

        0 < $("#description_de").length && tinymce.init({
            selector: "textarea#description_de",
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [{
                title: "Bold text",
                inline: "b"
            }, {
                title: "Red text",
                inline: "span",
                styles: {
                    color: "#ff0000"
                }
            }, {
                title: "Red header",
                block: "h1",
                styles: {
                    color: "#ff0000"
                }
            }, {
                title: "Example 1",
                inline: "span",
                classes: "example1"
            }, {
                title: "Example 2",
                inline: "span",
                classes: "example2"
            }, {
                title: "Table styles"
            }, {
                title: "Table row 1",
                selector: "tr",
                classes: "tablerow1"
            }]
        });
        0 < $("#description_fr").length && tinymce.init({
            selector: "textarea#description_fr",
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [{
                title: "Bold text",
                inline: "b"
            }, {
                title: "Red text",
                inline: "span",
                styles: {
                    color: "#ff0000"
                }
            }, {
                title: "Red header",
                block: "h1",
                styles: {
                    color: "#ff0000"
                }
            }, {
                title: "Example 1",
                inline: "span",
                classes: "example1"
            }, {
                title: "Example 2",
                inline: "span",
                classes: "example2"
            }, {
                title: "Table styles"
            }, {
                title: "Table row 1",
                selector: "tr",
                classes: "tablerow1"
            }]
        })
        0 < $("#description_en").length && tinymce.init({
            selector: "textarea#description_en",
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [{
                title: "Bold text",
                inline: "b"
            }, {
                title: "Red text",
                inline: "span",
                styles: {
                    color: "#ff0000"
                }
            }, {
                title: "Red header",
                block: "h1",
                styles: {
                    color: "#ff0000"
                }
            }, {
                title: "Example 1",
                inline: "span",
                classes: "example1"
            }, {
                title: "Example 2",
                inline: "span",
                classes: "example2"
            }, {
                title: "Table styles"
            }, {
                title: "Table row 1",
                selector: "tr",
                classes: "tablerow1"
            }]
        })
        0 < $("#description_it").length && tinymce.init({
            selector: "textarea#description_it",
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [{
                title: "Bold text",
                inline: "b"
            }, {
                title: "Red text",
                inline: "span",
                styles: {
                    color: "#ff0000"
                }
            }, {
                title: "Red header",
                block: "h1",
                styles: {
                    color: "#ff0000"
                }
            }, {
                title: "Example 1",
                inline: "span",
                classes: "example1"
            }, {
                title: "Example 2",
                inline: "span",
                classes: "example2"
            }, {
                title: "Table styles"
            }, {
                title: "Table row 1",
                selector: "tr",
                classes: "tablerow1"
            }]
        })



    });

    $(function() {
        $('input')
            .on('change', function(event) {
                var $element = $(event.target);
                var $container = $element.closest('.example');

                if (!$element.data('tagsinput')) return;

                var val = $element.val();
                if (val === null) val = 'null';
                var items = $element.tagsinput('items');

                $('code', $('pre.val', $container)).html(
                    $.isArray(val) ?
                    JSON.stringify(val) :
                    '"' + val.replace('"', '\\"') + '"'
                );
                $('code', $('pre.items', $container)).html(
                    JSON.stringify($element.tagsinput('items'))
                );
            })
            .trigger('change');
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

<script>
    //@ sourceURL=listings/listing/company/openHours.js
    $(function() {
        function conditionNotMatch(e, m) {
            isValid = false;
            let miac = 'bounceInUp';
            e.addClass('input-error');
            e.after('<span class="errors animated ' + miac + '">' + m + ' </span>');
        }

        function conditionMatch(e) {
            e.removeClass('input-error');
            e.parent().find('.errors').remove();
        }

        /* document.querySelector("#admin_listing_form").addEventListener("submit", function(e){
            if(!checkopenhours()){
                e.preventDefault();    //stop form from submitting
                alert("Not valid!");
            }
        }); */

        $('.open_hours_row').each(function() {
            let container = this;

            $(container).find('.switch.open_close input').each(function() {

                $(this).on('change', function(event) {

                    //toggle enabled on split_hours
                    $(container).find('.switch.split_hours input').prop('disabled',
                        function(i, v) {
                            return !v;
                        });


                    $(container).find('select').each(function() {
                        let is_disabled = $(this).attr('disabled');

                        if (is_disabled)
                            $(this).removeAttr('disabled');
                        else {
                            $(this).attr('disabled', true);
                        }
                    });

                });
            });

            $(container).find('.switch.split_hours input').each(function() {
                $(this).on('change', function(event) {
                    $(container).find('.time_selector_group_afternoon').toggle();
                    conditionMatch($(container).find('.time_selector_group_afternoon'));
                });
            });

            $(container).find('.time_selector_group_afternoon').find('select').each(function() {
                $(this).on('change', function(event) {
                    conditionMatch($(container).find('.time_selector_group_afternoon'));
                });
            })
        });
    });

    function checkopenhours() {

        var isValid = true;

        $('.open_hours_row').each(function() {
            let container = this;
            let is_open = $(this).find('.switch.open_close input').first().prop('checked');
            let split_hours = $(this).find('.switch.split_hours input').first().prop('checked');

            let time_selector_group_morning = $(this).find('.time_selector_group_morning').first();
            let time_selector_morning_open = $(this).find('.time_selector_morning_open select ').first();
            let time_selector_morning_close = $(this).find('.time_selector_morning_close select ').first();

            let time_selector_group_afternoon_valid = true;

            let time_selector_group_afternoon = $(this).find('.time_selector_group_afternoon').first();
            let time_selector_afternoon_open = $(this).find('.time_selector_afternoon_open select ').first();
            let time_selector_afternoon_close = $(this).find('.time_selector_afternoon_close select ').first();

            function conditionNotMatch(e, m) {
                isValid = false;
                let miac = 'bounceInUp';
                e.addClass('input-error');
                e.after('<span class="errors animated ' + miac + '">' + m + ' </span>');
            }

            function conditionMatch(e) {
                e.removeClass('input-error');
                e.parent().find('.errors').remove();
            }

            if (is_open) {

                //var selm = $("#"+ oelm +' '+ cws +'.time_selector_morning');
                //console.log(selm);
                if (
                    !(time_selector_morning_open.val()) ||
                    !(time_selector_morning_close.val())
                    //||
                    //(
                    //!( parseInt( time_selector_morning_open.val() ) < parseInt( time_selector_morning_close.val() ) )
                    //&&
                    //!( parseInt( time_selector_morning_close.val() ) == 0 )
                    //)
                ) {
                    //show error
                    let m = 'open must come before close on same day';
                    conditionNotMatch(time_selector_group_morning, m);
                } else {
                    //clear field
                    conditionMatch(time_selector_group_morning);
                }

                //var selm = $("#"+ oelm +' '+ cws +'.time_selector_morning');

                if (split_hours) {
                    if (!(parseFloat(time_selector_morning_close.val()) < parseFloat(
                            time_selector_afternoon_open.val()))) {
                        //show error
                        let m = 'afternoon open must come after morning close';
                        conditionNotMatch(time_selector_group_afternoon, m);
                        time_selector_group_afternoon_valid = false;
                    } else {
                        //clear field
                        conditionMatch(time_selector_group_afternoon);
                    }

                    if (0 && (!(parseFloat(time_selector_afternoon_open.val()) < parseFloat(
                            time_selector_afternoon_close.val()))) && (0 != parseFloat(
                            time_selector_afternoon_close.val()))) {
                        //show error
                        let m = 'afternoon open must be before afternoon close';
                        conditionNotMatch(time_selector_group_afternoon, m);
                    } else {
                        if (time_selector_group_afternoon_valid)
                            //clear field
                            conditionMatch(time_selector_group_afternoon);
                    }
                } else { //clear afternoon values before sending

                    time_selector_afternoon_open.val(null);
                    conditionMatch(time_selector_afternoon_open);

                    time_selector_afternoon_close.val(null);
                    conditionMatch(time_selector_afternoon_close);
                }
            } else {
                let time_selector_group_morning = $(this).find('.time_selector_group_morning').first();
                conditionMatch(time_selector_group_morning);

                let time_selector_morning_open = $(this).find('.time_selector_morning_open select ').first();
                time_selector_morning_open.val('');
                conditionMatch(time_selector_morning_open);

                let time_selector_morning_close = $(this).find('.time_selector_morning_close select ').first();
                time_selector_morning_close.val('');
                conditionMatch(time_selector_morning_close);

                let time_selector_group_afternoon = $(this).find('.time_selector_group_afternoon').first();
                conditionMatch(time_selector_group_afternoon);

                let time_selector_afternoon_open = $(this).find('.time_selector_afternoon_open select ').first()
                    .val('');
                time_selector_afternoon_open.val('');
                conditionMatch(time_selector_afternoon_open);

                let time_selector_afternoon_close = $(this).find('.time_selector_afternoon_close select ')
                    .first().val('');
                time_selector_afternoon_close.val('');
                conditionMatch(time_selector_afternoon_close);
            }
        });

        return isValid;
    }
</script>
<script>
    //@ sourceURL=listings/listing/company/slim_image.js
    // load this code when the document has loaded
    /* document.addEventListener('DOMContentLoaded', function() {

        // get a reference to the remove button
        var button = document.querySelector('#remove-button');

        // listen to clicks on the remove button
        button.addEventListener('click', function() {

            // get the element with id 'my-cropper'
            var element = document.querySelector('#my-cropper');

            // find the cropper attached to the element
            var cropper = Slim.find(element);

            // call the remove method on the cropper
            cropper.remove();

        });

    }); */
</script>
@endpush