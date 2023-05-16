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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('labels.company.company_managements') }}</a></li>
                    <li class="breadcrumb-item active">{{__('labels.company.update_company')}}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
    <x-backend.card>
        <x-slot name="body">
            <span id="finance">
            @if (Auth()->user()->roles[0]->name == 'Administrator' || Auth()->user()->roles[0]->name == 'user_private' || Auth()->user()->roles[0]->name == 'user_company')
           @include('backend.company.includes.finance')
                @endif
            </span>
        </x-slot>
    </x-backend.card>

    <x-backend.card>
        <x-slot name="body">
            <span class="text-center text-success listing-alert"></span>
            @include('backend.company.includes.listing')
        </x-slot>
    </x-backend.card>

<x-backend.card>
    <x-slot name="header"><h5>{{ __('Tab Activation') }}</h5></x-slot>
    <x-slot name="body">
        @include('backend.company.includes.tab-activation')
    </x-slot>
</x-backend.card>

<x-forms.patch :action="route('admin.company.update_job', $company)" enctype="multipart/form-data" class="custom-validation" novalidate>

    <x-backend.card>
        <x-slot name="body">

         @include('backend.company.includes.nav')

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="bewerbung" role="tabpanel">
                    <section>
                        <div class="card card-body ">
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.job_application') }}</h2>
                                </div>
                                <div class="col-6">
                                    <!-- Large modal button -->
                                    <button type="button" class="btn btn-primary waves-effect float-end" data-bs-toggle="modal" data-bs-target=".bs-job-modal-lg">{{__('labels.company.add_job')}}</button>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('labels.company.title') }}</th>
                                                <th>{{ __('labels.company.location') }}</th>
                                                <th>{{ __('labels.company.published') }}</th>
                                                <th>{{ __('labels.general.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($company->job))
                                            @php
                                            $i=1;
                                            @endphp
                                            @foreach($company->job as $key=>$job)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$job['title']}}</td>
                                                <td>{{$job['location']}}</td>
                                                <td>
                                                    @if($job['active'] == 1)
                                                    {{__('labels.company.ja')}}
                                                    @else
                                                    {{__('labels.company.nein')}}
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm btn-icon ml-auto1 waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-popup-modal-lg" data-url="{{route('admin.company.job_application.edit',[$company,$job])}}" onclick='show_modal(this)'>
                                                        <i class="fas fa-pencil-alt"></i>
                                                        {{__('labels.general.edit')}}
                                                    </button>
                                                    <button type="button" class="btn btn-info btn-sm btn-icon ml-auto1 waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-popup-modal-lg" data-url="{{route('admin.company.job_application.show',[$company,$job])}}" onclick='show_modal(this)'>
                                                        <i class="fas fa-search"></i>
                                                        {{__('labels.general.show')}}
                                                    </button>
                                                    <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Warning" data-trans-text="Are you sure you want to delete this item?" href="{{ route('admin.company.job_application.destroy',[$company,$job]) }}" class="btn btn-danger btn-sm btn-icon ml-auto1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')">
                                                        <i class="fas fa-trash"></i> {{__('labels.general.delete')}}
                                                    </a>&nbsp;
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </x-slot>

{{--        <x-slot name="footer">--}}
{{--            <button class="btn btn-primary float-right" type="submit">{{__('labels.general.buttons.save')}}</button>--}}
{{--        </x-slot>--}}
    </x-backend.card>

</x-forms.patch>

<!--  Large modal example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <x-forms.post :action="route('admin.company.job_application.store',[$company])" enctype="multipart/form-data" class="custom-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">{{ __('labels.company.add_news') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="news_div">
                        <div class="row news_chcekbox">
                            <div class="col-md-11 col-xl-11">
                                <div class="form-group mb-3">
                                    <label class="control-label"><b>{{ __('labels.company.published') }} ?</b></label>
                                    <input type="radio" class="switch-input" id="show_jobs_yes" name="show_jobs" value="1">
                                    <label class="control-label"><b>{{ __('labels.company.ja') }}</b></label>
                                    <input type="radio" class="switch-input" id="show_jobs_no" name="show_jobs" value="0" checked="">
                                    <label class="control-label"><b>{{ __('labels.company.nein') }}</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="row news_title">
                            <div class="col-md-12 ">
                                <div class="row">
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.image') }}</b></label>
                                        <input type="file" name="news_image" class="form-control" value="">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.title') }}</b></label>
                                        <input type="text" id="news_title" name="news_title" class="form-control" value="">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.author') }}</b></label>
                                        <input type="text" name="news_author" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row news_description">
                                <div class="col-md-12">
                                    <div class="form-group mb-3 col-md-12 ">
                                        <label class="control-label"><b>{{ __('labels.company.description') }}</b></label><br>
                                        <textarea name="news_description" id="news_description" class="form-control" rows="5"></textarea>
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
<div class="modal fade bs-job-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabelJob" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <x-forms.post :action="route('admin.company.job_application.store',[$company])" enctype="multipart/form-data" class="custom-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabelJob">{{ __('labels.company.add_job') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            <label class="control-label"><b>{{ __('labels.company.title') }}</b></label>
                            <input type="text" id="job_title" name="job_title" class="form-control" value="">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="control-label"><b>{{ __('labels.company.location') }}</b></label>
                            <input type="text" name="job_location" class="form-control" value="">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="control-label"><b>{{ __('labels.company.label') }}</b></label><br>
                            <select name="job_position" id="job_position" class="form-control">
                                <option value="Intermediate">Intermediate</option>
                                <option value="Mid Label">Mid Label</option>
                                <option value="Expert">Expert</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="control-label"><b>{{ __('labels.company.skill') }}</b></label><br>
                            <input type="text" name="job_skill" class="form-control" data-role="tagsinput">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="control-label"><b>{{ __('labels.company.start_date') }}</b></label>
                            <input type="date" name="job_start_date" class="form-control" value="">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="control-label"><b>{{ __('labels.company.expire_date') }}</b></label>
                            <input type="date" name="job_expire_date" class="form-control" value="">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="control-label"><b>{{ __('labels.company.job_type') }}</b></label>
                            <input type="radio" class="switch-input" id="job_type_yes" name="job_type" value="PartTime">
                            <label class="control-label"><b>{{ __('labels.company.parttime') }}</b></label>
                            <input type="radio" class="switch-input" id="job_type_no" name="job_type" value="FullTime" checked="">
                            <label class="control-label"><b>{{ __('labels.company.fulltime') }}</b></label>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="control-label"><b>{{ __('labels.company.published') }} ?</b></label>
                            <input type="radio" class="switch-input" id="show_job_yes" name="active" value="1">
                            <label class="control-label"><b>{{ __('labels.company.ja') }}</b></label>
                            <input type="radio" class="switch-input" id="show_job_no" name="active" value="0" checked="">
                            <label class="control-label"><b>{{ __('labels.company.nein') }}</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3 col-md-12 ">
                                <label class="control-label"><b>{{ __('labels.company.description') }}</b></label><br>
                                <textarea name="job_description" id="job_description" class="form-control" rows="5"></textarea>
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

        0 < $("#job_description").length && tinymce.init({
            selector: "textarea#job_description",
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
