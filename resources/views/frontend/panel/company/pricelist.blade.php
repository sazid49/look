@extends('frontend.layouts.panel')

@section('title', __('labels.company.update_company'))

@push('after-styles')
<!-- DataTables -->
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
@endpush

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
            <div class="col-md-6">
                <h4 class="mb-sm-0 font-size-18">{{ __('labels.company.update_company') }}</h4>
                <x-utils.link class="card-header-action" :href="route('frontend.panel.company.index')" :text="'Back'" />&nbsp;|&nbsp;
					<a href="{{route('frontend.company.information',[$company,$company->slug])}}" target="_blank">{{__('labels.company.view_previw')}}</a>
            </div>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('labels.company.company_managements') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('labels.company.update_company') }}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<x-forms.patch :action="route('frontend.panel.company.update_pricelist', $company)" enctype="multipart/form-data" class="custom-validation" novalidate>

    <x-backend.card>
        <x-slot name="body">

            <!-- Nav tabs -->
            @include('frontend.panel.company.includes.tab')

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="preisliste" role="tabpanel">
                    <section>
                        <div class="card card-body ">
                            <h2 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.preisliste') }}
                            </h2>
                            <div class="row">
                                <label for="name" class="form-label col-md-2">{{ __('labels.company.formular_anzeigen') }}</label>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="form-check col-md-6">
                                            <input class="form-check-input" type="radio" name="show_pricelist" id="show_pricelist_yes" value="1" {{ old('show_pricelist', $company->companytabs->show_pricelist ?? '') == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_pricelist_yes">
                                                {{ __('labels.general.yes') }}
                                            </label>
                                        </div>
                                        <div class="form-check col-md-6 ">
                                            <input class="form-check-input" type="radio" name="show_pricelist" id="show_pricelist_no" value="0" {{ old('show_pricelist', $company->companytabs->show_pricelist ?? '') == '0' || old('show_pricelist', $company->companytabs->show_pricelist ?? '') == '' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_pricelist_no">
                                                {{ __('labels.general.no') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">&nbsp;</div>
                            </div>
                            <div class="prising_div mt-4">
                                @php
                                $cat_count = 1;
                                $title = 0;
                                @endphp

                                @if (!$company->pricing->isEmpty())
                                @foreach ($company->pricing as $pricing)
                                @if ($pricing->parent_id == null)
                                <div class="row category_title">
                                    <div class="col-md-11 col-xl-11">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><b>{{ __('labels.company.category_title') }}</b></label>
                                            <input type="text" name="category_title_{{ $cat_count }}" class="form-control category_title_txt" value="{{ $pricing->title }}">
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xl-1 category_title_action {{ $cat_count == 1 ? 'd-none' : '' }}">
                                        <div class="form-group mb-3">
                                            <label class="control-label">&nbsp;</label>
                                            <br>
                                            <a href="javascript:void(0)" class="rem_cat_title_row text-danger"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @else
                                @php
                                $title++;
                                @endphp
                                <div class="row item_title">
                                    <div class="col-md-11 col-xl-11">
                                        <div class="row">
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.title') }}</b></label>
                                                <input type="text" name="title_{{ $cat_count }}" class="form-control title_txt" value="{{ $pricing->title }}">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.description') }}</b></label>
                                                <input type="text" name="description_{{ $cat_count }}" class="form-control description_txt" value="{{ $pricing->description }}">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.price') }}</b></label>
                                                <input type="text" name="price_{{ $cat_count }}" class="form-control price_txt" data-parsley-pattern="^[0-9]{1,}\.?[0-9]{0,2}$" value="{{ $pricing->price }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xl-1 item_title_action {{ $cat_count == 2 ? 'd-none' : '' }}">
                                        <div class="form-group mb-3">
                                            <label class="control-label">&nbsp;</label>
                                            <br>
                                            <a href="javascript:void(0)" class="rem_cat_title_row text-danger"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @php
                                $cat_count++;
                                @endphp
                                @endforeach
                                @else
                                <div class="row category_title">
                                    <div class="col-md-11 col-xl-11">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><b>{{ __('labels.company.category_title') }}</b></label>
                                            <input type="text" name="category_title_{{ $cat_count }}" class="form-control category_title_txt" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xl-1 category_title_action d-none">
                                        <div class="form-group mb-3">
                                            <label class="control-label">&nbsp;</label>
                                            <br>
                                            <a href="javascript:void(0)" class="rem_cat_title_row text-danger"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @php
                                $cat_count++;
                                $title++;
                                @endphp
                                <div class="row item_title">
                                    <div class="col-md-11 col-xl-11">
                                        <div class="row">
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.title') }}</b></label>
                                                <input type="text" name="title_{{ $cat_count }}" class="form-control title_txt" value="">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.description') }}</b></label>
                                                <input type="text" name="description_{{ $cat_count }}" class="form-control description_txt" value="">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.price') }}</b></label>
                                                <input type="text" name="price_{{ $cat_count }}" class="form-control price_txt" data-parsley-pattern="^[0-9]{1,}\.?[0-9]{0,2}$" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xl-1 item_title_action d-none">
                                        <div class="form-group mb-3">
                                            <label class="control-label">&nbsp;</label>
                                            <br>
                                            <a href="javascript:void(0)" class="rem_cat_title_row text-danger"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @php
                                $cat_count++;
                                @endphp
                                @endif

                                @if($title == 0)
                                <div class="row item_title">
                                    <div class="col-md-11 col-xl-11">
                                        <div class="row">
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.title') }}</b></label>
                                                <input type="text" name="title_{{ $cat_count }}" class="form-control title_txt" value="">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.description') }}</b></label>
                                                <input type="text" name="description_{{ $cat_count }}" class="form-control description_txt" value="">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.price') }}</b></label>
                                                <input type="text" name="price_{{ $cat_count }}" class="form-control price_txt" data-parsley-pattern="^[0-9]{1,}\.?[0-9]{0,2}$" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xl-1 item_title_action d-none">
                                        <div class="form-group mb-3">
                                            <label class="control-label">&nbsp;</label>
                                            <br>
                                            <a href="javascript:void(0)" class="rem_cat_title_row text-danger"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <input type="hidden" id="cat_count" name="cat_count" value="{{ $cat_count }}">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="javascript:void(0);" class="add-pricing-item btn-sm btn btn-primary">Add
                                        Item</a>
                                    <a href="javascript:void(0);" class=" add-pricing-category btn-sm btn btn-secondary">Add Category</a>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-primary float-right" type="submit">{{ __('labels.general.buttons.save') }}</button>
        </x-slot>
    </x-backend.card>

</x-forms.patch>

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
<script src="{{ URL::asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ URL::asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".datatable").DataTable();
        $(".add-pricing-item").click(function() {
            var clone = $(".item_title:first").clone();
            var cat_count = $("#cat_count").val();

            $(clone).find('.title_txt').val('');
            $(clone).find('.description_txt').val('');
            $(clone).find('.price_txt').val('');

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
            $(clone).find('.category_title_txt').val('');
            $(clone).find('.category_title_txt').attr('name', 'category_title_' + cat_count);

            $(clone).find('.category_title_action').removeClass('d-none');
            $(".prising_div").append(clone);
            cat_count++;
            $("#cat_count").val(cat_count);
        });

        $(document).on('click', ".rem_cat_title_row", function() {
            var row = $(this).closest('.row');
            row.remove();
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

    function show_modal(obj) {
        var modal_id = $(obj).attr('data-bs-target');
        var content = $(modal_id).children('div.modal-dialog').children('div.modal-content');
        var data_url = $(obj).attr('data-url');
        $(content).html(
            '<div class="alert alert-info fade in cust_rem_padd"><i class="icon-info-sign" data-dismiss="alert"></i> <strong>Loading...</strong></div>'
        );
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