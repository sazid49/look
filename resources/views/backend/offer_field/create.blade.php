@extends('backend.layouts.app')

@section('title', __('labels.offer_field.create_field'))

@push('after-styles')
    <link href="{{ URL::asset('assets/css/plugins/forms/validation/form-validation.css') }}" id="bootstrap-style"
          rel="stylesheet" type="text/css" />
    {{-- <link href="{{ URL::asset('assets/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}
@endpush

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-18">{{ __('labels.offer_field.create_field') }}</h4>
                    <x-utils.link class="card-header-action" :href="route('admin.offer_field.index')" :text="'Back'" />
                </div>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.offer_field.index') }}">{{ __('labels.offer_field.management') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('labels.offer_field.create_field') }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <x-forms.post :action="route('admin.offer_field.store')" enctype="multipart/form-data" class="custom-validation outer-repeater1" novalidate>
        <x-backend.card>
            <x-slot name="body">
                <div data-repeater-list="outer-group" class="outer">
                    <div data-repeater-item class="outer">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="label" class="form-label">{{ __('labels.offer_field.label_de') }}<span class="error">*</span></label>
                                    <input type="text" name="label[de]" class="form-control" value="{{ old('label_de') }}" required />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="label" class="form-label">{{ __('labels.offer_field.label_fr') }}<span class="error">*</span></label>
                                    <input type="text" name="label[fr]" class="form-control" value="{{ old('label_fr') }}" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="label" class="form-label">{{ __('labels.offer_field.label_it') }}<span class="error">*</span></label>
                                    <input type="text" name="label[it]" class="form-control" value="{{ old('label_it') }}" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="label" class="form-label">{{ __('labels.offer_field.label_en') }}<span class="error">*</span></label>
                                    <input type="text" name="label[en]" class="form-control" value="{{ old('label_en') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <!-- Type -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">{{ __('labels.offer_field.type') }}<span class="error">*</span></label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="">{{ __('labels.offer_field.select_type') }}</option>
                                        <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>Text</option>
                                        <option value="textarea" {{ old('type') == 'textarea' ? 'selected' : '' }}>
                                            Textarea</option>
                                        <option value="dropdown" {{ old('type') == 'dropdown' ? 'selected' : '' }}>
                                            DropDown</option>
                                        <option value="checkbox" {{ old('type') == 'checkbox' ? 'selected' : '' }}>
                                            Checkbox</option>
                                        <option value="radio" {{ old('type') == 'radio' ? 'selected' : '' }}>Radio Button</option>
                                    </select>
                                </div>


                            </div>
                            <div class="col-lg-4">
                                <!-- Category -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">{{ __('labels.offer_field.category') }}<span
                                            class="error">*</span></label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">{{ __('labels.offer_field.select_category') }}</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">

                                <!-- Field Required -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">{{ __('labels.offer_field.require') }}</label>
                                    <div class="mb-2 mt-2">
                                        <label for="is_required">
                                            <input type="radio" name="is_required" value="1"
                                                {{ old('is_required') == '1' ? 'checked' : '' }} />
                                            {{ __('labels.general.yes') }} &nbsp;&nbsp;
                                        </label>
                                        <label for="is_required">
                                            <input type="radio" name="is_required" value="0"
                                                   {{ old('is_required') != '' ? (old('is_required') == '0' ? 'checked' : '') : 'checked' }}
                                                   required /> {{ __('labels.general.no') }} &nbsp;&nbsp;
                                        </label>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <!-- Options -->
                            <div class="inner-repeater option_div d-none mb-3">
                                <div data-repeater-list="inner-group" class="inner mb-3">
                                    <label>{{ __('labels.offer_field.option') }}</label>
                                    <div class="prising_div">
                                        <div data-repeater-item class="inner mb-3 row item_title">
                                            <div class="col-md-2">
                                                <input type="text" name="option[de][]" data-role="tagsinput" class="form-control option" value="{{ old('option')[0] ?? "" }}" placeholder="German"/>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="option[fr][]" data-role="tagsinput" class="form-control option" value="{{ old('option')[0] ?? "" }}" placeholder="French"/>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="option[it][]" data-role="tagsinput" class="form-control option" value="{{ old('option')[0] ?? "" }}" placeholder="Italian"/>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="option[en][]" data-role="tagsinput" class="form-control option" value="{{ old('option')[0] ?? "" }}" placeholder="English"/>
                                            </div>
                                            <div class="col-md-2 col-4">
                                                <div class="d-grid">
                                                    <input data-repeater-delete type="button" class="btn btn-sm btn-danger inner rem_item" value="Delete"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input data-repeater-create type="button" class="btn btn-sm btn-success inner add-item" value="{{ __('labels.offer_field.add_option') }}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-primary float-right" type="submit">{{ __('labels.offer_field.create_field') }}</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
@push('after-scripts')
    <script src="{{ URL::asset('assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/js/scripts/forms/validation/form-validation.js')}}"></script> --}}

    <script src="{{ URL::asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-repeater.int.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js') }}"></script> --}}
{{--    <script>--}}
{{--        // Offer fields for german language--}}
{{--        $("#type-de").change(function() {--}}
{{--            if($(this).val() == "dropdown" || $(this).val() == "checkbox" || $(this).val() == "radio") {--}}
{{--                $(".option_div_de").removeClass('d-none');--}}
{{--            } else {--}}
{{--                $(".option_div_de").addClass('d-none');--}}
{{--            }--}}
{{--        });--}}

{{--        $(".add-item-de").click(function() {--}}
{{--            var clone = $(".item_title_de:first").clone();--}}
{{--            clone.hide();--}}
{{--            $(clone).find('.option-de').val('');--}}
{{--            $(".prising_div_de").append(clone);--}}
{{--            clone.show('slow');--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        // Offer field for French--}}
{{--        $("#type-fr").change(function() {--}}
{{--            if($(this).val() == "dropdown" || $(this).val() == "checkbox" || $(this).val() == "radio") {--}}
{{--                $(".option_div_fr").removeClass('d-none');--}}
{{--            } else {--}}
{{--                $(".option_div_fr").addClass('d-none');--}}
{{--            }--}}
{{--        });--}}

{{--        $(".add-item-fr").click(function() {--}}
{{--            var clone = $(".item_title_fr:first").clone();--}}
{{--            clone.hide();--}}
{{--            $(clone).find('.option-fr').val('');--}}
{{--            $(".prising_div_fr").append(clone);--}}
{{--            clone.show('slow');--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        // Offer field for Italian--}}
{{--        $("#type-it").change(function() {--}}
{{--            if($(this).val() == "dropdown" || $(this).val() == "checkbox" || $(this).val() == "radio") {--}}
{{--                $(".option_div_it").removeClass('d-none');--}}
{{--            } else {--}}
{{--                $(".option_div_it").addClass('d-none');--}}
{{--            }--}}
{{--        });--}}

{{--        $(".add-item-it").click(function() {--}}
{{--            var clone = $(".item_title_it:first").clone();--}}
{{--            clone.hide();--}}
{{--            $(clone).find('.option-it').val('');--}}
{{--            $(".prising_div_it").append(clone);--}}
{{--            clone.show('slow');--}}
{{--        });--}}
{{--    </script>--}}
    <script>
        // Offer fields for english
        $("#type").change(function() {
            if($(this).val() == "dropdown" || $(this).val() == "checkbox" || $(this).val() == "radio") {
                $(".option_div").removeClass('d-none');
            } else {
                $(".option_div").addClass('d-none');
            }
        });

        $(".add-item").click(function() {
            var clone = $(".item_title:first").clone();
            clone.hide();
            $(clone).find('.option').val('');
            $(".prising_div").append(clone);
            clone.show('slow');
        });

        $(document).on('click', ".rem_item", function() {
            var row = $(this).closest('.row');
            row.hide('slow');
            setTimeout(remRow, 600);
            function remRow(){
                row.remove()
            }
        });
    </script>
@endpush
