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
                @if (Auth()->user()->roles[0]->name == 'Administrator'
                    || Auth()->user()->roles[0]->name == 'user_private'
                    || Auth()->user()->roles[0]->name == 'user_company')
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
            {{--            <span class="text-center text-success listing-alert"></span>--}}
            @include('backend.company.includes.tab-activation')
        </x-slot>
    </x-backend.card>

    <x-forms.patch :action="route('admin.company.update_team', $company)" enctype="multipart/form-data" class="custom-validation" novalidate>

        <x-backend.card>
            <x-slot name="body">

                @include('backend.company.includes.nav')

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
                                {{--                                <div class="row">--}}
                                {{--                                    <label for="name" class="form-label col-md-2">{{ __('labels.company.formular_anzeigen') }}</label>--}}
                                {{--                                    <div class="col-md-3">--}}
                                {{--                                        <div class="row">--}}
                                {{--                                            <div class="form-check col-md-6">--}}
                                {{--                                                <input class="form-check-input" type="radio" name="show_team" id="show_team_yes" value="1" {{ old('show_team', $company->companytabs->show_team ?? '') == '1' ? 'checked' : '' }}>--}}
                                {{--                                                <label class="form-check-label" for="show_team_yes">--}}
                                {{--                                                    {{ __('labels.general.yes') }}--}}
                                {{--                                                </label>--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="form-check col-md-6 ">--}}
                                {{--                                                <input class="form-check-input" type="radio" name="show_team" id="show_team_no" value="0" {{ old('show_team', $company->companytabs->show_team ?? '') == '0' || old('show_team', $company->companytabs->show_team ?? '') == '' ? 'checked' : '' }}>--}}
                                {{--                                                <label class="form-check-label" for="show_team_no">--}}
                                {{--                                                    {{ __('labels.general.no') }}--}}
                                {{--                                                </label>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col-md-1">&nbsp;</div>--}}
                                {{--                                </div>--}}
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
                                            @if(!empty($company->teams))
                                                @php
                                                    $i=1;
                                                @endphp
                                                @foreach($company->teams as $key => $team)
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
                                                            <a class="btn btn-primary btn-sm btn-icon ml-auto1 waves-effect waves-light" href="{{route('admin.company.team.edit',[$company,$team])}}">
                                                                <i class="fas fa-pencil-alt"></i>
                                                                {{__('labels.general.edit')}}
                                                            </a>
                                                            <button type="button" class="btn btn-info btn-sm btn-icon ml-auto1 waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-popup-modal-lg" data-url="{{route('admin.company.team.show',[$company,$team])}}" onclick='show_modal(this)'>
                                                                <i class="fas fa-eye"></i>
                                                                {{__('labels.general.view')}}
                                                            </button>
                                                            <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Warning" data-trans-text="Are you sure you want to delete this item?" href="{{ route('admin.company.team.destroy',[$company,$team]) }}" class="btn btn-danger btn-sm btn-icon ml-auto1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')">
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
                <x-forms.post :action="route('admin.company.team.store',[$company])" enctype="multipart/form-data" class="custom-validation" novalidate>
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
                                            <div class="slim"
                                                 data-did-remove="setImageDeleted"
                                                 data-meta='{"type":"company_logo","field":"image"}'
                                                 data-ratio="1:1">
                                                <input type="file" name="slim[]">
                                            </div>
                                        </div>
                                        <div class="row col-md-8">
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="control-label"><b>{{ __('labels.company.name') }}</b></label>
                                                <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                                            </div>
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="control-label"><b>{{ __('labels.company.designation') }}</b></label>
                                                <input type="text" name="designation" class="form-control" value="{{old('designation')}}">
                                            </div>
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="control-label"><b>{{ __('labels.company.email') }}</b></label>
                                                <input type="text" id="email" name="email" class="form-control" value="{{old('email')}}">
                                            </div>
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="control-label"><b>{{ __('labels.company.telephone') }}</b></label>
                                                <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                                            </div>
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="control-label"><b>{{ __('labels.company.twitter') }}</b></label>
                                                <input type="text" name="twitter" class="form-control" value="{{old('twitter')}}">
                                            </div>
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="control-label"><b>{{ __('labels.company.linkedin') }}</b></label>
                                                <input type="text" name="linkedin" class="form-control" value="{{old('linkedin')}}">
                                            </div>
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="control-label"><b>{{ __('labels.company.xing') }}</b></label>
                                                <input type="text" name="xing" class="form-control" value="{{old('xing')}}">
                                            </div>
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

            // $(".add-pricing-item").click(function() {
            //     var clone = $(".item_title:first").clone();
            //     var cat_count = $("#cat_count").val();
            //
            //     $(clone).find('.title_txt').attr('name', 'title_' + cat_count);
            //     $(clone).find('.description_txt').attr('name', 'description_' + cat_count);
            //     $(clone).find('.price_txt').attr('name', 'price_' + cat_count);
            //     $(clone).find('.item_title_action').removeClass('d-none');
            //     $(".prising_div").append(clone);
            //     cat_count++;
            //     $("#cat_count").val(cat_count);
            // });
            // $(".add-pricing-category").click(function() {
            //     var cat_count = $("#cat_count").val();
            //     var clone = $(".category_title:first").clone();
            //     $(clone).find('.category_title_txt').attr('name', 'category_title_' + cat_count);
            //
            //     $(clone).find('.category_title_action').removeClass('d-none');
            //     $(".prising_div").append(clone);
            //     cat_count++;
            //     $("#cat_count").val(cat_count);
            // });

            // $(".add-team-item").click(function() {
            //     var clone = $(".team_title:first").clone();
            //     $(clone).find('.team_title_action').removeClass('d-none');
            //     $(clone).find('input[name="profile_photo[]"]').val('');
            //     $(clone).find('.team_img').attr('src','');
            //     $(clone).find('.team_img').addClass('d-none');
            //     $(clone).find('input[name="profile_photo_hidden[]"]').val('');
            //     $(clone).find('input[name="team_name[]"]').val('');
            //     $(clone).find('input[name="designation[]"]').val('');
            //     $(".team_div").append(clone);
            // });

            // $(".add-gallery-item").click(function() {
            //     var clone = $(".gallery:last").clone();
            //     $(clone).find('.gallery_action').removeClass('d-none');
            //     $(clone).find('input[name="image[]"]').val('');
            //     $(clone).find('input[name="image_hidden[]"]').val('');
            //     $(clone).find('input[name="show_on_frontside[]"]').prop('checked', false);
            //     $(".gallery_div").append(clone);
            // });

            // $(document).on('click', 'input[name="show_on_frontside[]"]', function() {
            //     //check "select all" if all checkbox items are checked
            //     if ($('input[name="show_on_frontside[]"]:checked').length >= 6) {
            //         alert('You can not select more then 5 images')
            //         $(this).prop('checked', false);
            //     }
            // });
            //



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

        })
    </script>
@endpush
