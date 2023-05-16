@extends('backend.layouts.app')

@section('title', __('labels.company.update_company'))

@push('after-styles')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css" />

    <link href="{{ asset('assets/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-18">{{ __('labels.company.update_company') }}</h4>
                    <x-utils.link class="card-header-action" :href="route('admin.company.index')" :text="'Back'" />&nbsp;|&nbsp;
                    <a href="{{ route('frontend.company.information', [$company,$company->slug]) }}"
                       target="_blank">{{ __('labels.company.view_previw') }}</a>
                </div>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="javascript: void(0);">{{ __('labels.company.company_managements') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('labels.company.update_company') }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <x-backend.card>
        <x-slot name="body">
            @if (Auth()->user()->roles[0]->name == 'Administrator' ||
                Auth()->user()->roles[0]->name == 'user_private' ||
                Auth()->user()->roles[0]->name == 'user_company')
                @include('backend.company.includes.finance')
            @endif
        </x-slot>
    </x-backend.card>

    <x-backend.card>
        <x-slot name="body">
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

    <x-forms.patch :action="route('admin.company.team.update',[$company,$team])" enctype="multipart/form-data" class="custom-validation" novalidate>

        <x-backend.card>
            <x-slot name="body">

                @include('backend.company.includes.nav')

                <!-- Tab panes -->
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="team" role="tabpanel">
                        <section>
                            <div class="card card-body ">
                                <div class="row">
                                    <div class="col-6">
                                        <h2 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                            {{ __('labels.company.edit_news') }}</h2>
                                    </div>
                                    <div class="col-6">
                                        <!-- Large modal button -->
                                        {{-- <a href="{{ route('admin.company.team.index', $company) }}"
                                            class="btn btn-primary waves-effect float-end">{{ __('labels.general.back') }}</a> --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><b>{{ __('labels.company.image') }}</b></label>
                                            {{-- <input type="file" name="profile_photo" class="form-control" value=""> --}}
                                            {{-- <div class="slim" data-did-remove="setImageDeleted" data-meta='{"type":"company_logo","field":"image"}'>
                                                    <input type="file" name="profile_photo">
                                                </div> --}}
                                            <div class="slim"
                                                 data-did-remove="setImageDeleted"
                                                 data-meta='{"type":"profile_photo","field":"profile_photo"}'
                                                 data-ratio="1:1">
                                                <input type="file" name="slim[]">
                                                @if (!empty($team->profile_photo))
                                                    @if (Storage::disk('public')->exists($team->profile_photo))
                                                        <img class="personal_logo" alt="no data"
                                                             src="{{ url('storage/' . $team->profile_photo) }}">
                                                    @endif
                                                @endif
                                            </div>
                                            <input type="hidden" name="profile_photo_deleted">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.name') }}</b></label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                       value="{{ old('name', $team->name) }}">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.designation') }}</b></label>
                                                <input type="text" name="designation" class="form-control"
                                                       value="{{ old('designation', $team->designation) }}">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.email') }}</b></label>
                                                <input type="text" id="email" name="email" class="form-control" value="{{old('email',$team->email)}}">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.telephone') }}</b></label>
                                                <input type="text" name="phone" class="form-control" value="{{old('phone',$team->phone)}}">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.twitter') }}</b></label>
                                                <input type="text" name="twitter" class="form-control" value="{{old('twitter',$team->twitter)}}">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.linkedin') }}</b></label>
                                                <input type="text" name="linkedin" class="form-control" value="{{old('linkedin',$team->linkedin)}}">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.xing') }}</b></label>
                                                <input type="text" name="xing" class="form-control" value="{{old('xing',$team->xing)}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <input type="submit" class="btn btn-primary" value="{{ __('labels.general.buttons.update') }}">
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
    <script src="{{ URL::asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".datatable").DataTable();
            $("input[name='claimed']").change(function() {
                if ($("input[name='claimed']:checked").val() == 1) {
                    $(".claimed_by").removeClass('d-none');
                } else {
                    $(".claimed_by").addClass('d-none');
                    $("#claimed_by").val('');
                }
            });

            $(".add-team-item").click(function() {
                var clone = $(".team_title:first").clone();
                $(clone).find('.team_title_action').removeClass('d-none');
                $(clone).find('input[name="profile_photo[]"]').val('');
                $(clone).find('.team_img').attr('src', '');
                $(clone).find('.team_img').addClass('d-none');
                $(clone).find('input[name="profile_photo_hidden[]"]').val('');
                $(clone).find('input[name="team_name[]"]').val('');
                $(clone).find('input[name="designation[]"]').val('');
                $(".team_div").append(clone);
            });

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


        });

    </script>
@endpush
