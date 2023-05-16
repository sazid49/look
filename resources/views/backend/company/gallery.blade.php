@extends('backend.layouts.app')

@section('title', 'Gallery')

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
        <x-slot name="header"><h5>{{ __('Finance') }}</h5></x-slot> <x-slot name="body">
            <span id="finance">
            @if (Auth()->user()->roles[0]->name == 'Administrator' || Auth()->user()->roles[0]->name == 'user_private' || Auth()->user()->roles[0]->name == 'user_company')
                    @include('backend.company.includes.finance')
                @endif
            </span>
        </x-slot>
    </x-backend.card>

    <x-backend.card>
        <x-slot name="header"><h5>{{ __('Listing') }}</h5></x-slot>   <x-slot name="body">
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

    <x-backend.card>
        <x-slot name="body">

            @include('backend.company.includes.nav')

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="galerie" role="tabpanel">
                    <section>
                        <div class="card card-body ">
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.galerie') }}</h2>
                                </div>
                                <div class="col-6">
                                    <!-- Large modal button -->
                                    <button type="button" class="btn btn-primary waves-effect float-end" data-bs-toggle="modal" data-bs-target=".bs-gallary-modal-lg">{{__('labels.company.add_gallery')}}</button>
                                </div>
                            </div>
                            {{--                                <div class="row">--}}
                            {{--                                    <label for="name" class="form-label col-md-2">{{ __('labels.company.formular_anzeigen') }}</label>--}}
                            {{--                                    <div class="col-md-3">--}}
                            {{--                                        <div class="row">--}}
                            {{--                                            <div class="form-check col-md-6">--}}
                            {{--                                                <input class="form-check-input" type="radio" name="show_gallery" id="show_gallery_yes" value="1" {{ old('show_gallery', $company->companytabs->show_gallery ?? '') == '1' ? 'checked' : '' }}>--}}
                            {{--                                                <label class="form-check-label" for="show_gallery_yes">--}}
                            {{--                                                    {{ __('labels.general.yes') }}--}}
                            {{--                                                </label>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="form-check col-md-6 ">--}}
                            {{--                                                <input class="form-check-input" type="radio" name="show_gallery" id="show_gallery_no" value="0" {{ old('show_gallery', $company->companytabs->show_gallery ?? '') == '0' || old('show_gallery', $company->companytabs->show_gallery ?? '') == '' ? 'checked' : '' }}>--}}
                            {{--                                                <label class="form-check-label" for="show_gallery_no">--}}
                            {{--                                                    {{ __('labels.general.no') }}--}}
                            {{--                                                </label>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="col-md-1">&nbsp;</div>--}}
                            {{--                                </div><br>--}}
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('labels.company.image') }}</th>
                                            <th>{{ __('labels.company.show_on_frontside') }}</th>
                                            <th>{{ __('labels.general.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($company->galleries))
                                            @php
                                                $i=1;
                                            @endphp
                                            @foreach($company->galleries as $key=>$gallery)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>
                                                        @if (!empty($gallery['image']))
                                                            @if (Storage::disk('public')->exists($gallery['image']))
                                                                {{--                                                                    <img class="personal_logo user-profile-image" alt="no data" src="{{url('storage/' . $gallery['image'])}}" width="80px" height="auto">--}}
                                                                <div class="slim"
                                                                     data-meta-gal = "{{ $gallery->id }}"
                                                                     data-service="{{ route('admin.company.gallery.update',$company) }}"
                                                                     data-ratio="2:1"
                                                                     data-size="968,500" {{ $company->show_watermark == 1 ? 'data-will-transform=addImageWatermark' : '' }}
                                                                     data-max-file-size="2">
                                                                    <img src="{{url('storage/' . $gallery['image'])}}" alt=""/>
                                                                    <input type="file" name="slim[]"/>
                                                                </div>
                                                            @else
                                                                <img src="{{ URL::asset('/assets/images/no_image.png') }}" alt="" class="personal_logo" height="60px">
                                                            @endif
                                                        @else
                                                            <img src="{{ URL::asset('/assets/images/no_image.png') }}" alt="" class="personal_logo" height="60px">
                                                        @endif
                                                    </td>
                                                    <td class="form-check form-switch text-center">
                                                        {{--                                                            {{($gallery['show_on_frontside'] == 1) ? __('labels.general.yes') : __('labels.general.no')}}--}}
                                                        <input name="show_on_frontside" class="switch-gallery form-check-input float-none" type="checkbox" role="switch" id="show_on_frontside" data-id="{{ $gallery->id }}" value="1" {{ $gallery->show_on_frontside == '1' ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        {{--                                                            <button type="button" class="btn btn-primary btn-sm btn-icon ml-auto1 waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-popup-modal-lg" data-url="{{route('admin.company.gallery.edit',[$company,$gallery])}}" onclick='show_modal(this)'>--}}
                                                        {{--                                                                <i class="fas fa-pencil-alt"></i>--}}
                                                        {{--                                                                {{__('labels.general.edit')}}--}}
                                                        {{--                                                            </button>--}}
                                                        <form action="{{ route('admin.company.gallery.destroy',[$company,$gallery]) }}" id="del-gallery" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="button" class="btn btn-danger btn-sm btn-del" >
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        {{--                                                            <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Warning" data-trans-text="Are you sure you want to delete this item?" href="{{ route('admin.company.gallery.destroy',[$company,$gallery]) }}" class="btn btn-danger btn-sm btn-icon ml-auto1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="{{__('buttons.general.crud.delete')}}">--}}
                                                        {{--                                                                <i class="fas fa-trash"></i> Delete--}}
                                                        {{--                                                            </a>&nbsp;--}}
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

        {{--            <x-slot name="footer">--}}
        {{--                <button class="btn btn-primary float-right" type="submit">{{__('labels.general.buttons.save')}}</button>--}}
        {{--            </x-slot>--}}
    </x-backend.card>


    <!-- Start Gallery Modal -->
    <div class="modal fade bs-gallary-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabelJob" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <x-forms.post :action="route('admin.company.gallery.store',[$company])" enctype="multipart/form-data" class="custom-validation" novalidate>
                    <div class="modal-header">
                        <h5 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.galerie') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group mb-3 row">
                                <div class="col-md-4 form-group mb-3">
                                    <label class="control-label">{{ __('labels.company.image') }}</label>
                                    {{-- <div class="slim" data-did-remove="setImageDeleted" data-meta='{"type":"company_logo","field":"image"}'>
                                        <input type="file" name="image">
                                        @if (!empty($company->image))
                                        @if (Storage::disk('public')->exists($company->image))
                                        <img class="personal_logo" alt="no data" src="{{url('storage/' . $company->image)}}">
                                        @endif
                                        @endif
                                    </div> --}}
                                    <div class="slim"
                                         data-force-size="968,500"
                                         data-ratio="2:1"
                                         data-label="Image 5"
                                         data-download="true"
                                         {{ $company->show_watermark == 1 ? 'data-will-transform=addImageWatermark' : '' }}
                                         data-did-remove="setImageDeleted"
                                         data-instant-edit="true"
                                         data-meta='{"type":"company_photo","field":"image"}'>
                                        <input type="file" name="image">
                                    </div>
                                    <input type="hidden" name="image_hidden">
                                </div>
                                <div class="form-group mb-3 col-md-5 mt-5 pt-5">
                                    <label class="control-label">
                                        <input type="checkbox" name="show_on_frontside" class="" value="1">
                                        <b>{{ __('labels.company.show_on_frontside') }}</b>
                                    </label>
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
    </div>
    <!-- End Gallary Modal -->


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
    {{--    <script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>--}}
    {{--    <script src="{{ URL::asset('assets/js/bootstrap-tagsinput.min.js') }}"></script>--}}

    <!-- Required datatable js -->
    <script src="{{ URL::asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $(".datatable").DataTable();
            $("input[name='claimed']").change(function () {
                if ($("input[name='claimed']:checked").val() == 1) {
                    $(".claimed_by").removeClass('d-none');
                } else {
                    $(".claimed_by").addClass('d-none');
                    $("#claimed_by").val('');
                }
            });

            $(".add-gallery-item").click(function () {
                var clone = $(".gallery:last").clone();
                $(clone).find('.gallery_action').removeClass('d-none');
                $(clone).find('input[name="image[]"]').val('');
                $(clone).find('input[name="image_hidden[]"]').val('');
                $(clone).find('input[name="show_on_frontside[]"]').prop('checked', false);
                $(".gallery_div").append(clone);
            });

            $(document).on('click', 'input[name="show_on_frontside[]"]', function () {
                //check "select all" if all checkbox items are checked
                if ($('input[name="show_on_frontside[]"]:checked').length >= 6) {
                    alert('You can not select more then 5 images')
                    $(this).prop('checked', false);
                }
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
                    console.log('show modal');
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
        });
    </script>
    <script>
        $(".switch-gallery").on('click',function(){

            var csrf = "{{ csrf_token() }}";
            var status = $(this).is(":checked");
            var gal = $(this).data('id')

            $.ajax({
                url : "{{ route('admin.company.gallery.update',$company) }}",
                data: {_token:csrf,status:status,gal:gal},
                type: 'POST'
            }).done(function(e){
                console.log(e);
            });
        });

    </script>
    <script>
        //@ sourceURL=listings/listing/company/slim_image.js
        // load this code when the document has loaded
        document.addEventListener('DOMContentLoaded', function() {

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

        });


        function addImageWatermark(data, ready) {

            // load the image, in this case the PQINA logo
            var watermark = new Image();
            watermark.onload = function() {

                // set watermark x and y offset to 5% of output image width
                var x = data.output.width * .84;
                var y = data.output.height * .85;

                // set watermark width to 25% of the output image width
                var width = data.output.width * .16;
                var height = width * (this.naturalHeight / this.naturalWidth);

                // get the drawing context for the output image
                var ctx = data.output.image.getContext('2d');

                // make watermark transparant
                // https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/globalAlpha
                ctx.globalAlpha = 1.00;

                // have watermark blend with background image
                // https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/globalCompositeOperation
                // ctx.globalCompositeOperation = 'multiply';

                // draw the image
                ctx.drawImage(watermark, x, y, width, height);

                // continue saving the data
                ready(data);

            }

            watermark.src = '{{url("img/lookon_logo.jpg")}}';

        }
    </script>
@endpush

@push('after-scripts')
    <script>
        $(".btn-del").click(function(){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $(this).parent("#del-gallery").submit();
                }
            })
        })
    </script>
@endpush
