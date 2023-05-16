@extends('backend.layouts.app')

@section('title', __('labels.tags.edit_field'))

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
                    <h4 class="mb-sm-0 font-size-18">{{ __('labels.tags.edit_field') }}</h4>
                    <x-utils.link class="card-header-action" :href="route('admin.tags.index')" :text="'Back'" />
                </div>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.tags.index') }}">{{ __('labels.tags.management') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('labels.tags.edit_field') }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <x-forms.patch :action="route('admin.tags.update',$tag)" enctype="multipart/form-data" class="custom-validation outer-repeater1" novalidate>
        <x-backend.card>
            <x-slot name="body">
                <div data-repeater-list="outer-group" class="outer">
                    <div data-repeater-item class="outer">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('labels.tags.name') }}<span
                                            class="error">*</span></label>
                                    <input type="text" name="value" class="form-control" value="{{ old('value',$tag->value) }}"
                                        required />
                                </div>
                                <div class="mb-3">

                                    <label for="title" class="form-label">{{ __('labels.tags.image') }}</label><br>

                                    <input type="file" name="image" id="image" class="form-control">

{{--                                   <!--   @if (!empty($tag->image))--}}
{{--                                        @if (Storage::disk('public')->exists($tag->image))--}}
{{--                                            <img alt="no data" src="{{ url('storage/' . $tag->image) }}" height="60px">--}}
{{--                                        @endif--}}
{{--                                    @endif -->--}}
{{--                                    <!-- <input type="file" name="image" id="image" class="form-control"> -->--}}

{{--                                    <div class="slim" data-force-size="100,100" data-did-remove="setImageDeleted"--}}
{{--                                            data-meta='{"type":"image","field":"image"}'>--}}
{{--                                            <input type="file" name="image">--}}
{{--                                            @if (!empty($tag->image))--}}
{{--                                                @if (Storage::disk('public')->exists($tag->image))--}}
{{--                                                    <img class="personal_logo" alt="no data" src="{{ url('storage/' . $tag->image) }}">--}}
{{--                                                @endif--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
                                    <input type="hidden" name="company_logo_deleted">

                                </div>

                            </div>

                            <div class="col-lg-6">
                                {{-- <div class="mb-3">
                                    <label for="title" class="form-label">{{ __('labels.tags.category') }}</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">{{ __('labels.tags.select_category') }}</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}" {{ old('category_id',$tag->category_id) == $item->id ? 'selected' : '' }}>{{ $item->value }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                <div class="mb-3">
                                    <label for="title" class="form-label">{{ __('labels.tags.description') }}</label>
									<textarea name="description" id="description" class="form-control" cols="30" rows="3">{{old('description',$tag->description)}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-primary float-right" type="submit">{{ __('labels.tags.update_field') }}</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
@push('after-scripts')
    <script src="{{ URL::asset('assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/js/scripts/forms/validation/form-validation.js')}}"></script> --}}

    <script src="{{ URL::asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-repeater.int.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js') }}"></script> --}}

    <script>
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
            row.remove('slow');
        });
	</script>
@endpush
