@extends('backend.layouts.app')

@section('title', __('labels.cms.edit_cms'))

@push('after-styles')
    <link href="{{ URL::asset('assets/css/plugins/forms/validation/form-validation.css') }}" id="bootstrap-style"
        rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-18">{{ __('labels.cms.edit_cms') }}</h4>
                    <x-utils.link class="card-header-action" :href="route('admin.cms.index')" :text="'Back'" /> | <a target="_black" href="{{route('frontend.cms.pages',$cms->slug)}}" class="zoomIn animated">{{__('labels.company.view_previw')}}</a>
                </div>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
							<a href="{{ route('admin.cms.index') }}">{{ __('labels.cms.management') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('labels.cms.edit_cms') }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <!-- end page title -->
    <x-forms.patch :action="route('admin.cms.update',$cms)" enctype="multipart/form-data" class="custom-validation outer-repeater1" novalidate>
        <x-backend.card>
            <x-slot name="body">
                <div data-repeater-list="outer-group" class="outer">
                    <div data-repeater-item class="outer">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">{{ __('labels.cms.title') }}<span class="error">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title',$cms->title) }}"
                                           required />
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">{{ __('labels.cms.slug') }}<span class="error">*</span></label>
                                    <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug',$cms->slug) }}" required readonly/>
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">{{ __('labels.cms.content') }}</label>
                                    <textarea name="content" id="content" class="form-control" cols="30" rows="3">{{old('content',$cms->content)}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="meta-title" class="form-label">{{ __('labels.cms.meta-title') }}<span class="error">*</span></label>
                                    <input type="text" name="meta_title" class="form-control" id="meta-title" value="{{ old('meta_title',$cms->meta_title) }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="language" class="form-label">{{ __('labels.cms.language') }}<span class="error">*</span></label>
                                    <select name="language" id="language" class="form-select">
                                        <option value="">{{ __('Select Language') }}</option>
                                        <option value="en" {{ $cms->language == 'en' ? 'selected' : '' }}>{{ __('labels.cms.english') }}</option>
                                        <option value="de" {{ $cms->language == 'de' ? 'selected' : '' }}>{{ __('labels.cms.german') }}</option>
                                        <option value="fr" {{ $cms->language == 'fr' ? 'selected' : '' }}>{{ __('labels.cms.french') }}</option>
                                        <option value="it" {{ $cms->language == 'it' ? 'selected' : '' }}>{{ __('labels.cms.italic') }}</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="meta-description" class="form-label">{{ __('labels.cms.meta-description') }}</label>
                                    <textarea name="meta_description" id="meta-description" class="form-control" cols="30" rows="3">{{old('meta_description',$cms->meta_description)}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">{{ __('labels.cms.category') }}<span class="error">*</span></label>
                                    <select name="category" id="category" class="form-select">
                                        <option value="">{{ __('Select Category') }}</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $cms->category_id == $category->id ? 'selected' : '' }}>{{ $category->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="position" class="form-label">{{ __('labels.cms.position') }}<span class="error">*</span></label>
                                    <select name="position" id="position" class="form-select">
                                        <option value="">{{ __('Select Position') }}</option>
                                        <option value="1" {{ $cms->position == 1 ? 'selected' : '' }}>{{ __('Top') }}</option>
                                        <option value="2" {{ $cms->position == 2 ? 'selected' : '' }}>{{ __('Bottom') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    {{--                                    <input type="hidden" name="show_on_footer" value="0" class="flat-red">--}}

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="show_on_footer" value="1" id="show_on_footer" class="form-check-input" {{ $cms->show_on_footer == 0 ?: 'checked' }}>
                                        <label class="form-check-label" for="show_on_footer">{{ __('labels.cms.show-on-footer') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="active" value="1" id="active" class="form-check-input" {{ $cms->active == 0 ?: 'checked' }}>
                                        <label class="form-check-label" for="active">{{ __('labels.cms.active') }}</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-primary float-right" type="submit">{{ __('labels.general.buttons.update') }}</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
@push('after-scripts')
    <script src="{{ URL::asset('assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>

	<!--tinymce js-->
	<script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/bootstrap-tagsinput.min.js') }}"></script>

    <script src="{{ URL::asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-repeater.int.js') }}"></script>

    <script src="{{ asset('assets/js/speakingurl.min.js') }}"></script>
    <script src="{{ asset('assets/js/slugify.min.js') }}"></script>

    <script>
		$(document).ready(function() {

            $("#title").on('input',function(){
                $("#slug").slugify("#title");
                $("#meta-title").slugify("#title",{
                    separator: ' '
                });
            })

			0 < $("#content").length && tinymce.init({
                selector: "textarea#content",
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
	</script>
@endpush
