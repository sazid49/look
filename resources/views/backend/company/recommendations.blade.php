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
            {{--            <span class="text-center text-success listing-alert"></span>--}}
            @include('backend.company.includes.tab-activation')
        </x-slot>
    </x-backend.card>

    <x-backend.card>
        <x-slot name="body">

            @include('backend.company.includes.nav')

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="empfehlungen" role="tabpanel">
                    <section>
                        <!-- Generelle Informationen -->
                        <div class="card card-body pb-0">
                            <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                {{ __('labels.company.empfehlungen') }}
                            </h4>


                            @php
                                $xcrud = \Xcrud::get_instance();
                                $xcrud->table('company_recommendations');
                                // $xcrud->join('id', 'companies', 'id');
                                $xcrud->where('company_id=',$company->id);
                                $xcrud->language(app()->getLocale());
                                $xcrud->columns('company_id,company_name, contact_name, relationship,phone,email,status,comment', false);//'category.value',
                                $xcrud->fields('company_id,company_name, contact_name, relationship,phone,email,status,comment');
                                $xcrud->label(['id' => 'Id',  'contact_name' => 'Name'], false); //'category.value' => 'Category'

                                $xcrud->readonly('company_id');

                                $xcrud->change_type('status','select','Neu1','Neu,In Bearbeitung,Geschlossen');

                                $xcrud->no_editor('comment');


                                $xcrud->pass_default('company_id',$company->id); // Pass the actual company id to recommendation table
                                $xcrud->pass_var('created_at', date('Y-m-d H:i:s'), 'create');


                                $xcrud->unset_csv();
                                $xcrud->unset_print();
                                // $xcrud->unset_edit();
                                // $xcrud->unset_add();
                                $xcrud->unset_remove();
                                // $xcrud->unset_view();
                                $xcrud->set_logging(true);


                                // $xcrud->unset_edit(true,'username','=','admin'); // 'admin' row can't be editable, for users table
                                // $xcrud->pass_var('created', date('Y-m-d H:i:s'), 'create'); when creating, send the values
                                // $xcrud->pass_var('company_id', '{id}'); //when creating, send the values


                                echo $xcrud->render();

                                // echo {$id};

                                // $xcrud2 = Xcrud::get_instance();

                            @endphp







                                <!--
                            <div class="row">
                                <h5 class="title-h2 lg-font mb-2 mt-4">1. {{ __('labels.company.empfehlung') }}</h5>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.company_name') }}</b></label>
                                        <input type="text" name="recommendations[0][company_name]" class="form-control" value="{{$company->recommendation[0]->company_name ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.contact_name') }}</b></label>
                                        <input type="text" name="recommendations[0][contact_name]" class="form-control" value="{{$company->recommendation[0]->contact_name ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.relation') }}</b></label>
                                        <input type="text" name="recommendations[0][relationship]" class="form-control" value="{{$company->recommendation[0]->relationship ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.telephone') }}</b></label>
                                        <input type="text" name="recommendations[0][phone]" class="form-control" value="{{$company->recommendation[0]->phone ?? ''}}">
                                    </div>
                                </div>
                            </div>
                            -->




                        </div>
                    </section>
                </div>
            </div>

        </x-slot>

    </x-backend.card>



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
