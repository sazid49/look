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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('labels.company.company_managements') }}</a></li>
                    <li class="breadcrumb-item active">{{__('labels.company.update_company')}}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<x-forms.patch :action="route('frontend.panel.company.team.update_team', $company)" enctype="multipart/form-data" class="custom-validation" novalidate>
    <x-backend.card>
        <x-slot name="body">

            <!-- Nav tabs -->
            @include('frontend.panel.company.includes.tab')

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="team" role="tabpanel">
                    <section>
                        <div class="card card-body ">
							<div class="row">
                                <div class="col-6">
									<h2 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.team') }}</h2>
                                </div>
                                <div class="col-6">
                                    <!-- Large modal button -->
                                    <button type="button" class="btn btn-primary waves-effect float-end" data-bs-toggle="modal" data-bs-target=".bs-team-modal-lg">{{__('labels.company.add_team')}}</button>
                                </div>
                            </div>
							<div class="row">
                                <label for="name" class="form-label col-md-2">{{ __('labels.company.formular_anzeigen') }}</label>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="form-check col-md-6">
                                            <input class="form-check-input" type="radio" name="show_team" id="show_team_yes" value="1" {{ old('show_team', $company->companytabs->show_team ?? '') == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_team_yes">
                                                {{ __('labels.general.yes') }}
                                            </label>
                                        </div>
                                        <div class="form-check col-md-6 ">
                                            <input class="form-check-input" type="radio" name="show_team" id="show_team_no" value="0" {{ old('show_team', $company->companytabs->show_team ?? '') == '0' || old('show_team', $company->companytabs->show_team ?? '') == '' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_team_no">
                                                {{ __('labels.general.no') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">&nbsp;</div>
                            </div>
							<div class="row mt-4">
                                <div class="col-md-12">
                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('labels.company.profile_picture') }}</th>
                                                <th>{{ __('labels.company.name') }}</th>
                                                <th>{{ __('labels.company.designation') }}</th>
                                                <th>{{ __('labels.general.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($company->team))
                                            @php
                                            $i=1;
                                            @endphp
                                            @foreach($company->team as $key=>$team)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>
                                                    @if (!empty($team['profile_photo']))
														@if (Storage::disk('public')->exists($team['profile_photo']))
															<img class="personal_logo" alt="no data" src="{{url('storage/' . $team['profile_photo'])}}" width="80px" height="auto" class="user-profile-image">
														@else
															<img src="{{ URL::asset('/assets/images/no_image.png') }}" alt="" class="personal_logo" height="60px">
														@endif
                                                    @else
                                                    	<img src="{{ URL::asset('/assets/images/no_image.png') }}" alt="" class="personal_logo" height="60px">
                                                    @endif
                                                </td>
                                                <td>{{$team['name']}}</td>
                                                <td>{{$team['designation']}}</td>
                                                <td>
                                                    {{-- <button type="button" class="btn btn-primary btn-sm btn-icon ml-auto1 waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-popup-modal-lg" data-url="{{route('frontend.panel.company.team.edit',[$company,$team])}}" onclick='show_modal(this)'>
                                                        <i class="fas fa-pencil-alt"></i>
                                                        {{__('labels.general.edit')}}
                                                    </button> --}}
													<a class="btn btn-primary btn-sm btn-icon ml-auto1 waves-effect waves-light" href="{{route('frontend.panel.company.team.edit',[$company,$team])}}">
														<i class="fas fa-pencil-alt"></i>
														{{__('labels.general.edit')}}
													</a>
													<button type="button" class="btn btn-info btn-sm btn-icon ml-auto1 waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-popup-modal-lg" data-url="{{route('frontend.panel.company.team.show',[$company,$team])}}" onclick='show_modal(this)'>
														<i class="fas fa-eye"></i>
														{{__('labels.general.view')}}
													</button>
                                                    <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Warning" data-trans-text="Are you sure you want to delete this item?" href="{{ route('frontend.panel.company.team.destroy',[$company,$team]) }}" class="btn btn-danger btn-sm btn-icon ml-auto1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>&nbsp;
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="team_div mt-4">
                                @if(!$company->team->isEmpty())
									@foreach($company->team as $key=>$team)
									<div class="row team_title">
										<div class="col-md-11 col-xl-11">
											<div class="row">
												<div class="form-group mb-3 col-md-2">
													@if (!empty($team->profile_photo))
														@if (Storage::disk('public')->exists($team->profile_photo))
															<img class="personal_logo team_img" height="100px" alt="no data" src="{{url('storage/' . $team->profile_photo)}}">
														@endif
													@endif
												</div>
												<div class="form-group mb-3 col-md-3">
													<label class="control-label"><b>{{ __('labels.company.profile_picture') }}</b></label>
													<input type="file" name="profile_photo[]" class="form-control">
													<input type="hidden" name="profile_photo_hidden[]" value="{{$team->profile_photo}}">
												</div>
												<div class="form-group mb-3 col-md-3">
													<label class="control-label"><b>{{ __('labels.company.name') }}</b></label>
													<input type="text" id="team_name" name="team_name[]" class="form-control" value="{{$team->name}}">
												</div>
												<div class="form-group mb-3 col-md-4">
													<label class="control-label"><b>{{ __('labels.company.designation') }}</b></label>
													<input type="text" name="designation[]" class="form-control" value="{{$team->designation}}">
												</div>
											</div>
										</div>
										<div class="col-md-1 col-xl-1 team_title_action ">
											<div class="form-group mb-3">
												<label class="control-label">&nbsp;</label>
												<br>
												<a href="javascript:void(0)" class="rem_cat_title_row text-danger"><i class="fa fa-times"></i></a>
											</div>
										</div>
									</div>
									@endforeach
                                @else
                                <div class="row team_title">
                                    <div class="col-md-11 col-xl-11">
                                        <div class="row">
                                            <div class="form-group mb-3 col-md-2">
                                                 
                                            </div>
                                            <div class="form-group mb-3 col-md-3">
                                                <label class="control-label"><b>{{ __('labels.company.profile_picture') }}</b></label>
                                                <input type="file" name="profile_photo[]" class="form-control" value="">
                                                <input type="hidden" name="profile_photo_hidden[]" value="">
                                            </div>
                                            <div class="form-group mb-3 col-md-3">
                                                <label class="control-label"><b>{{ __('labels.company.name') }}</b></label>
                                                <input type="text" id="team_name" name="team_name[]" class="form-control" value="">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.designation') }}</b></label>
                                                <input type="text" name="designation[]" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xl-1 team_title_action d-none">
                                        <div class="form-group mb-3">
                                            <label class="control-label">&nbsp;</label>
                                            <br>
                                            <a href="javascript:void(0)" class="rem_cat_title_row text-danger"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <a href="javascript:void(0);" class="add-team-item btn-sm btn btn-primary">{{__('labels.company.add_team')}}</a>
                                </div>
                            </div> --}}
                        </div>
                    </section>
                </div>				
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-primary float-right" type="submit">{{__('labels.general.buttons.save')}}</button>
        </x-slot>

    </x-backend.card>
</x-forms.patch>

<!--  Large modal team -->
<div class="modal fade bs-team-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <x-forms.post :action="route('frontend.panel.company.team.store',[$company])" enctype="multipart/form-data" class="custom-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">{{ __('labels.company.add_team') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="news_div">
                        <div class="row news_title">
                            <div class="col-md-12 ">
                                <div class="row">
                                    <div class="form-group mb-3 col-md-4">
										<label class="control-label"><b>{{ __('labels.company.profile_picture') }}</b></label>
										<div class="slim" data-did-remove="setImageDeleted" data-meta='{"type":"company_logo","field":"image"}'>
											<input type="file" name="profile_photo">
										</div>
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.name') }}</b></label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.designation') }}</b></label>
                                        <input type="text" name="designation" class="form-control" value="{{old('designation')}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.email') }}</b></label>
                                        <input type="text" id="email" name="email" class="form-control" value="{{old('email')}}">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.telephone') }}</b></label>
                                        <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.twitter') }}</b></label>
                                        <input type="text" name="twitter" class="form-control" value="{{old('twitter')}}">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.linkedin') }}</b></label>
                                        <input type="text" name="linkedin" class="form-control" value="{{old('linkedin')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 col-xl-1 news_title_action d-none">
                                <div class="form-group mb-3">
                                    <label class="control-label">&nbsp;</label>
                                    <br>
                                    <a href="javascript:void(0)" class="rem_cat_title_row text-danger"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="{{__('labels.general.buttons.save')}}">
                </div>
            </x-forms.post>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--  Large modal example -->
<div class="modal fade bs-popup-modal-lg" id="bs-popup-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
            $(clone).find('.team_img').attr('src','');
            $(clone).find('.team_img').addClass('d-none');
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
@endpush