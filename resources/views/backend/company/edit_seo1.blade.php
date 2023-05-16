<x-forms.post :action="route('admin.company.seo.update',[$company, $seo])" enctype="multipart/form-data" class="custom-validation" novalidate>
    <div class="modal-header">
        <h5 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.edit_seo') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
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
                                                <input type="text" id="information_metatitle_de" name="information_metatitle_de" class="form-control" value="{{ $seo->information_metatitle_de }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="information_metadescription_de" cols="30" rows="2" id="information_metadescription_fr" spellcheck="true">{{$seo->information_metadescription_de}}</textarea>
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
                                                <input type="text" id="information_metatitle_ft" name="information_metatitle_ft" class="form-control" value="{{ $seo->information_metatitle_ft }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="information_metadescription_ft" cols="30" rows="2" id="information_metadescription_fr" spellcheck="true">{{$seo->information_metadescription_ft}}</textarea>
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
                                                <input type="text" id="information_metatitle_en" name="information_metatitle_en" class="form-control" value="{{ $seo->information_metatitle_en }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="information_metadescription_en" cols="30" rows="2" id="information_metadescription_en" spellcheck="true">{{$seo->information_metadescription_en}}</textarea>
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
                                                <input type="text" id="information_metatitle_it" name="information_metatitle_it" class="form-control" value="{{ $seo->information_metatitle_it }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="information_metadescription_it" cols="30" rows="2" id="information_metadescription_it" spellcheck="true">{{$seo->information_metadescription_it}}</textarea>
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
                                                <input type="text" id="interraction_metatitle_de" name="interraction_metatitle_de" class="form-control" value="{{ $seo->interraction_metatitle_de }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="interraction_metadescription_de" cols="30" rows="2" id="interraction_metadescription_fr" spellcheck="true">{{$seo->interraction_metadescription_de}}</textarea>
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
                                                <input type="text" id="interraction_metatitle_ft" name="interraction_metatitle_ft" class="form-control" value="{{ $seo->interraction_metatitle_ft }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="interraction_metadescription_ft" cols="30" rows="2" id="interraction_metadescription_fr" spellcheck="true">{{$seo->interraction_metadescription_ft}}</textarea>
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
                                                <input type="text" id="interraction_metatitle_en" name="interraction_metatitle_en" class="form-control" value="{{ $seo->interraction_metatitle_en }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="interraction_metadescription_en" cols="30" rows="2" id="interraction_metadescription_en" spellcheck="true">{{$seo->interraction_metadescription_en}}</textarea>
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
                                                <input type="text" id="interraction_metatitle_it" name="interraction_metatitle_it" class="form-control" value="{{ $seo->interraction_metatitle_it }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="interraction_metadescription_it" cols="30" rows="2" id="interraction_metadescription_it" spellcheck="true">{{$seo->interraction_metadescription_it}}</textarea>
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
                                                <input type="text" id="job_metatitle_de" name="job_metatitle_de" class="form-control" value="{{ $seo->job_metatitle_de }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="job_metadescription_de" cols="30" rows="2" id="job_metadescription_fr" spellcheck="true">{{$seo->job_metadescription_de}}</textarea>
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
                                                <input type="text" id="job_metatitle_ft" name="job_metatitle_ft" class="form-control" value="{{ $seo->job_metatitle_ft }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="job_metadescription_ft" cols="30" rows="2" id="job_metadescription_fr" spellcheck="true">{{$seo->job_metadescription_ft}}</textarea>
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
                                                <input type="text" id="job_metatitle_en" name="job_metatitle_en" class="form-control" value="{{ $seo->job_metatitle_en }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="job_metadescription_en" cols="30" rows="2" id="job_metadescription_en" spellcheck="true">{{$seo->job_metadescription_en}}</textarea>
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
                                                <input type="text" id="job_metatitle_it" name="job_metatitle_it" class="form-control" value="{{ $seo->job_metatitle_it }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="job_metadescription_it" cols="30" rows="2" id="job_metadescription_it" spellcheck="true">{{$seo->job_metadescription_it}}</textarea>
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
                                                <input type="text" id="kontaktformular_metatitle_de" name="kontaktformular_metatitle_de" class="form-control" value="{{ $seo->kontaktformular_metatitle_de }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="kontaktformular_metadescription_de" cols="30" rows="2" id="kontaktformular_metadescription_fr" spellcheck="true">{{$seo->kontaktformular_metadescription_de}}</textarea>
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
                                                <input type="text" id="kontaktformular_metatitle_ft" name="kontaktformular_metatitle_ft" class="form-control" value="{{ $seo->kontaktformular_metatitle_ft }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="kontaktformular_metadescription_ft" cols="30" rows="2" id="kontaktformular_metadescription_fr" spellcheck="true">{{$seo->kontaktformular_metadescription_ft}}</textarea>
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
                                                <input type="text" id="kontaktformular_metatitle_en" name="kontaktformular_metatitle_en" class="form-control" value="{{ $seo->kontaktformular_metatitle_en }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="kontaktformular_metadescription_en" cols="30" rows="2" id="kontaktformular_metadescription_en" spellcheck="true">{{$seo->kontaktformular_metadescription_en}}</textarea>
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
                                                <input type="text" id="kontaktformular_metatitle_it" name="kontaktformular_metatitle_it" class="form-control" value="{{ $seo->kontaktformular_metatitle_it }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="kontaktformular_metadescription_it" cols="30" rows="2" id="kontaktformular_metadescription_it" spellcheck="true">{{$seo->kontaktformular_metadescription_it}}</textarea>
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
                                                <input type="text" id="empfehlungen_metatitle_de" name="empfehlungen_metatitle_de" class="form-control" value="{{ $seo->empfehlungen_metatitle_de }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="empfehlungen_metadescription_de" cols="30" rows="2" id="empfehlungen_metadescription_fr" spellcheck="true">{{$seo->empfehlungen_metadescription_de}}</textarea>
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
                                                <input type="text" id="empfehlungen_metatitle_ft" name="empfehlungen_metatitle_ft" class="form-control" value="{{ $seo->empfehlungen_metatitle_ft }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="empfehlungen_metadescription_ft" cols="30" rows="2" id="empfehlungen_metadescription_fr" spellcheck="true">{{$seo->empfehlungen_metadescription_ft}}</textarea>
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
                                                <input type="text" id="empfehlungen_metatitle_en" name="empfehlungen_metatitle_en" class="form-control" value="{{ $seo->empfehlungen_metatitle_en }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="empfehlungen_metadescription_en" cols="30" rows="2" id="empfehlungen_metadescription_en" spellcheck="true">{{$seo->empfehlungen_metadescription_en}}</textarea>
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
                                                <input type="text" id="empfehlungen_metatitle_it" name="empfehlungen_metatitle_it" class="form-control" value="{{ $seo->empfehlungen_metatitle_it }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="empfehlungen_metadescription_it" cols="30" rows="2" id="empfehlungen_metadescription_it" spellcheck="true">{{$seo->empfehlungen_metadescription_it}}</textarea>
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
                                                <input type="text" id="preisliste_metatitle_de" name="preisliste_metatitle_de" class="form-control" value="{{ $seo->preisliste_metatitle_de }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="preisliste_metadescription_de" cols="30" rows="2" id="preisliste_metadescription_fr" spellcheck="true">{{$seo->preisliste_metadescription_de}}</textarea>
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
                                                <input type="text" id="preisliste_metatitle_ft" name="preisliste_metatitle_ft" class="form-control" value="{{ $seo->preisliste_metatitle_ft }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="preisliste_metadescription_ft" cols="30" rows="2" id="preisliste_metadescription_fr" spellcheck="true">{{$seo->preisliste_metadescription_ft}}</textarea>
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
                                                <input type="text" id="preisliste_metatitle_en" name="preisliste_metatitle_en" class="form-control" value="{{ $seo->preisliste_metatitle_en }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="preisliste_metadescription_en" cols="30" rows="2" id="preisliste_metadescription_en" spellcheck="true">{{$seo->preisliste_metadescription_en}}</textarea>
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
                                                <input type="text" id="preisliste_metatitle_it" name="preisliste_metatitle_it" class="form-control" value="{{ $seo->preisliste_metatitle_it }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="preisliste_metadescription_it" cols="30" rows="2" id="preisliste_metadescription_it" spellcheck="true">{{$seo->preisliste_metadescription_it}}</textarea>
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
                                                <input type="text" id="team_metatitle_de" name="team_metatitle_de" class="form-control" value="{{ $seo->team_metatitle_de }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="team_metadescription_de" cols="30" rows="2" id="team_metadescription_fr" spellcheck="true">{{$seo->team_metadescription_de}}</textarea>
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
                                                <input type="text" id="team_metatitle_ft" name="team_metatitle_ft" class="form-control" value="{{ $seo->team_metatitle_ft }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="team_metadescription_ft" cols="30" rows="2" id="team_metadescription_fr" spellcheck="true">{{$seo->team_metadescription_ft}}</textarea>
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
                                                <input type="text" id="team_metatitle_en" name="team_metatitle_en" class="form-control" value="{{ $seo->team_metatitle_en }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="team_metadescription_en" cols="30" rows="2" id="team_metadescription_en" spellcheck="true">{{$seo->team_metadescription_en}}</textarea>
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
                                                <input type="text" id="team_metatitle_it" name="team_metatitle_it" class="form-control" value="{{ $seo->team_metatitle_it }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="team_metadescription_it" cols="30" rows="2" id="team_metadescription_it" spellcheck="true">{{$seo->team_metadescription_it}}</textarea>
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
                                                <input type="text" id="news_metatitle_de" name="news_metatitle_de" class="form-control" value="{{ $seo->news_metatitle_de }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="news_metadescription_de" cols="30" rows="2" id="news_metadescription_fr" spellcheck="true">{{$seo->news_metadescription_de}}</textarea>
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
                                                <input type="text" id="news_metatitle_ft" name="news_metatitle_ft" class="form-control" value="{{ $seo->news_metatitle_ft }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="news_metadescription_ft" cols="30" rows="2" id="news_metadescription_fr" spellcheck="true">{{$seo->news_metadescription_ft}}</textarea>
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
                                                <input type="text" id="news_metatitle_en" name="news_metatitle_en" class="form-control" value="{{ $seo->news_metatitle_en }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="news_metadescription_en" cols="30" rows="2" id="news_metadescription_en" spellcheck="true">{{$seo->news_metadescription_en}}</textarea>
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
                                                <input type="text" id="news_metatitle_it" name="news_metatitle_it" class="form-control" value="{{ $seo->news_metatitle_it }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="news_metadescription_it" cols="30" rows="2" id="news_metadescription_it" spellcheck="true">{{$seo->news_metadescription_it}}</textarea>
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
                                                <input type="text" id="galerie_metatitle_de" name="galerie_metatitle_de" class="form-control" value="{{ $seo->galerie_metatitle_de }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="galerie_metadescription_de" cols="30" rows="2" id="galerie_metadescription_fr" spellcheck="true">{{$seo->galerie_metadescription_de}}</textarea>
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
                                                <input type="text" id="galerie_metatitle_ft" name="galerie_metatitle_ft" class="form-control" value="{{ $seo->galerie_metatitle_ft }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="galerie_metadescription_ft" cols="30" rows="2" id="galerie_metadescription_fr" spellcheck="true">{{$seo->galerie_metadescription_ft}}</textarea>
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
                                                <input type="text" id="galerie_metatitle_en" name="galerie_metatitle_en" class="form-control" value="{{ $seo->galerie_metatitle_en }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="galerie_metadescription_en" cols="30" rows="2" id="galerie_metadescription_en" spellcheck="true">{{$seo->galerie_metadescription_en}}</textarea>
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
                                                <input type="text" id="galerie_metatitle_it" name="galerie_metatitle_it" class="form-control" value="{{ $seo->galerie_metatitle_it }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="galerie_metadescription_it" cols="30" rows="2" id="galerie_metadescription_it" spellcheck="true">{{$seo->galerie_metadescription_it}}</textarea>
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
                                                <input type="text" id="rating_metatitle_de" name="rating_metatitle_de" class="form-control" value="{{ $seo->rating_metatitle_de }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="rating_metadescription_de" cols="30" rows="2" id="rating_metadescription_fr" spellcheck="true">{{$seo->rating_metadescription_de}}</textarea>
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
                                                <input type="text" id="rating_metatitle_ft" name="rating_metatitle_ft" class="form-control" value="{{ $seo->rating_metatitle_ft }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="rating_metadescription_ft" cols="30" rows="2" id="rating_metadescription_fr" spellcheck="true">{{$seo->rating_metadescription_ft}}</textarea>
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
                                                <input type="text" id="rating_metatitle_en" name="rating_metatitle_en" class="form-control" value="{{ $seo->rating_metatitle_en }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="rating_metadescription_en" cols="30" rows="2" id="rating_metadescription_en" spellcheck="true">{{$seo->rating_metadescription_en}}</textarea>
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
                                                <input type="text" id="rating_metatitle_it" name="rating_metatitle_it" class="form-control" value="{{ $seo->rating_metatitle_it }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                <textarea class="form-control" name="rating_metadescription_it" cols="30" rows="2" id="rating_metadescription_it" spellcheck="true">{{$seo->rating_metadescription_it}}</textarea>
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
    <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="{{__('labels.general.buttons.save')}}">
    </div>
</x-forms.post>