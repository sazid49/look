@extends('backend.layouts.app')

@section('title', __('labels.place.update_place'))

@push('after-styles')
    <link href="{{ URL::asset('assets/css/plugins/forms/validation/form-validation.css') }}" id="bootstrap-style"
        rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-18">{{ __('labels.place.update_place') }}</h4>
                    <x-utils.link class="card-header-action" :href="route('admin.places.index')" :text="'Back'" />&nbsp;|&nbsp;
                    <a href="{{ route('frontend.places.information', [$place, $place->slug]) }}"
                        target="_blank">{{ __('labels.place.view_previw') }}</a>
                </div>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.places.index') }}">{{ __('labels.place.place_managements') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('labels.place.update_place') }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <x-forms.patch :action="route('admin.places.update_seo',$place)" enctype="multipart/form-data" class="custom-validation" novalidate>

        <x-backend.card>
            <x-slot name="body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <label for="name"
                                class="form-label col-md-6">{{ __('labels.place.listing_active') }}</label>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="radio" name="active" id="active_yes"
                                            value="1" {{ old('active', $place->active) == 'yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="active_yes">
                                            {{ __('labels.general.yes') }}
                                        </label>
                                    </div>
                                    <div class="form-check col-md-6 ">
                                        <input class="form-check-input" type="radio" name="active" id="active_no"
                                            value="0"
                                            {{ old('active', $place->active) == 'no' || old('active', $place->active) == '' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="active_no">
                                            {{ __('labels.general.no') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <label for="name" class="form-label col-md-6">{{ __('labels.company.published') }}</label>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="radio" name="published" id="published_yes"
                                            value="1"
                                            {{ old('published', $place->published) == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="published_yes">
                                            {{ __('labels.general.yes') }}
                                        </label>
                                    </div>
                                    <div class="form-check col-md-6 ">
                                        <input class="form-check-input" type="radio" name="published" id="published_no"
                                            value="0"
                                            {{ old('published', $place->published) == '0' || old('published', $place->published) == '' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="published_no">
                                            {{ __('labels.general.no') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Nav tabs -->
                        <ul class="float-end nav nav-tabs nav-tabs-custom nav-justified1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.places.information', $place) }}"
                                    role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">{{ __('labels.place.informationen') }}</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.places.gallery.index', $place) }}"
                                    role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">{{ __('labels.place.galerie') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.places.contact_form', $place) }}"
                                    role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">{{ __('labels.place.kontaktformular') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.places.seo', $place) }}">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">{{ __('labels.place.seo') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </x-slot>
        </x-backend.card>

        <x-backend.card>
            <x-slot name="body">
                <!-- Tab panes -->
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="seo" role="tabpanel">
						<div class="row">
							<div class="col-4">
								<h2 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.seo') }}</h2>
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
						
						<div class="row">
							<!-- Tab panes -->
							<div class="tab-content text-muted">
								<div class="tab-pane active" id="information_de" role="tabpanel">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group mb-3">
												<label class="control-label">{{__('labels.place.meta_title')}}</label>
												<input type="text" id="meta_title_de" name="meta_title_de" class="form-control" value="{{ $place->meta_title_de ?? ""  }}">
											</div>
											<div class="form-group">
												<label class="control-label">{{__('labels.place.meta_description')}}</label>
												<textarea class="form-control" name="meta_description_de" cols="30" rows="2" id="meta_description_de" spellcheck="true">{{$place->meta_description_de ?? "" }}</textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="information_fr" role="tabpanel">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group mb-3">
												<label class="control-label">{{__('labels.place.meta_title')}}</label>
												<input type="text" id="meta_title_fr" name="meta_title_fr" class="form-control" value="{{ $place->meta_title_fr ?? ""  }}">
											</div>
											<div class="form-group">
												<label class="control-label">{{__('labels.place.meta_description')}}</label>
												<textarea class="form-control" name="meta_description_fr" cols="30" rows="2" id="meta_description_fr" spellcheck="true">{{$place->meta_description_fr ?? "" }}</textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="information_en" role="tabpanel">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group mb-3">
												<label class="control-label">{{__('labels.place.meta_title')}}</label>
												<input type="text" id="meta_title_en" name="meta_title_en" class="form-control" value="{{ $place->meta_title_en ?? ""  }}">
											</div>
											<div class="form-group">
												<label class="control-label">{{__('labels.place.meta_description')}}</label>
												<textarea class="form-control" name="meta_description_en" cols="30" rows="2" id="meta_description_en" spellcheck="true">{{$place->meta_description_en ?? "" }}</textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="information_it" role="tabpanel">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group mb-3">
												<label class="control-label">{{__('labels.place.meta_title')}}</label>
												<input type="text" id="meta_title_it" name="meta_title_it" class="form-control" value="{{ $place->meta_title_it ?? ""  }}">
											</div>
											<div class="form-group">
												<label class="control-label">{{__('labels.place.meta_description')}}</label>
												<textarea class="form-control" name="meta_description_it" cols="30" rows="2" id="meta_description_it" spellcheck="true">{{$place->meta_description_it ?? "" }}</textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						  
					</div>
                </div>

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-primary float-right"
                    type="submit">{{ __('labels.general.buttons.save') }}</button>
            </x-slot>
        </x-backend.card>

    </x-forms.patch>
@endsection
@push('after-scripts')
    <script src="{{ URL::asset('assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ URL::asset('assets/js/scripts/forms/validation/form-validation.js') }}"></script>

    <!--tinymce js-->
    <script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

    <script>
        $(document).ready(function() {
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
    </script>

    <script>
        //@ sourceURL=listings/listing/place/openHours.js
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
@endpush
