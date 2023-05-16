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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('labels.general.buttons.save')}}</a></li>
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

<x-forms.patch :action="route('admin.company.update_register', $company)" enctype="multipart/form-data" class="custom-validation" novalidate>

    <x-backend.card>
        <x-slot name="body">

          @include('backend.company.includes.nav')

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="register" role="tabpanel">
                    <section>
                        <!-- Generelle Informationen -->
                        <div class="card card-body pb-0">
                            <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                {{ __('labels.company.register') }}
                            </h4>

                            <div class="row">
                                <label for="name" class="form-label col-md-2">{{ __('labels.company.formular_anzeigen') }}</label>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="form-check col-md-6">
                                            <input class="form-check-input" type="radio" name="show_register" id="show_register_yes" value="1" {{ old('show_register', $company->companytabs->show_register ?? '') == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_register_yes">
                                                {{ __('labels.general.yes') }}
                                            </label>
                                        </div>
                                        <div class="form-check col-md-6 ">
                                            <input class="form-check-input" type="radio" name="show_register" id="show_register_no" value="0" {{ old('show_register', $company->companytabs->show_register ?? '') == '0' || old('show_register', $company->companytabs->show_register ?? '') == '' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_register_no">
                                                {{ __('labels.general.no') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">&nbsp;</div>
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
        $("input[name='claimed']").change(function() {
            if ($("input[name='claimed']:checked").val() == 1) {
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
