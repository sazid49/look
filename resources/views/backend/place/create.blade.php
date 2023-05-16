@extends('backend.layouts.app')

@section('title', __('labels.place.create_place'))

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
                    <h4 class="mb-sm-0 font-size-18">{{ __('labels.place.create_place') }}</h4>
                    <x-utils.link class="card-header-action" :href="route('admin.places.index')" :text="'Back'" />
                </div>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.places.index') }}">{{ __('labels.place.place_managements') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('labels.place.create_place') }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <x-forms.post :action="route('admin.places.store')" enctype="multipart/form-data" class="custom-validation" novalidate>
        <x-backend.card>
            <x-slot name="body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <label for="name"
                                class="form-label col-md-6">{{ __('labels.place.listing_active') }}</label>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="radio" name="active" id="active_yes"
                                            value="1" {{ old('active') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="active_yes">
                                            {{ __('labels.general.yes') }}
                                        </label>
                                    </div>
                                    <div class="form-check col-md-6 ">
                                        <input class="form-check-input" type="radio" name="active" id="active_no"
                                            value="0"
                                            {{ old('active') == '0' || old('active') == '' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="active_no">
                                            {{ __('labels.general.no') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <label for="name" class="form-label col-md-6">{{ __('labels.company.published') }}</label>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="radio" name="published" id="published_yes"
                                            value="1"
                                            {{ old('published') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="published_yes">
                                            {{ __('labels.general.yes') }}
                                        </label>
                                    </div>
                                    <div class="form-check col-md-6 ">
                                        <input class="form-check-input" type="radio" name="published" id="published_no"
                                            value="0"
                                            {{ old('published') == '0' || old('published') == '' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="published_no">
                                            {{ __('labels.general.no') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Nav tabs -->
                        <ul class="float-end nav nav-tabs nav-tabs-custom nav-justified1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#informationen" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">{{ __('labels.place.informationen') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" data-bs-toggle="tab" href="#galerie" role="tab"
                                    aria-disabled="true">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">{{ __('labels.place.galerie') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" data-bs-toggle="tab" href="#kontaktformular" role="tab"
                                    aria-disabled="true">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">{{ __('labels.place.kontaktformular') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" data-bs-toggle="tab" href="#seo" role="tab"
                                    aria-disabled="true">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">{{ __('labels.place.seo') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </x-slot>
        </x-backend.card>

        <x-backend.card>
            <x-slot name="body">
                <!-- Tab panes -->
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="informationen" role="tabpanel">
                        <section>
                            <!-- Generelle Informationen ************************************* -->
                            <div class="card card-body pb-0">
                                <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                    {{ __('labels.place.general_information') }}
                                </h4>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group mb-3">
                                            <label class="control-label">{{ __('labels.place.kategorie') }}<span
                                                    class="text-danger">*</span>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="Der Leiter ist eine Person, welche eine Gruppe an Agenten leitet / managet.">
                                                </i>
                                            </label>

                                            <select id="category_id" name="category_id"
                                                class="form-control form-control-chosen" required>
                                                <option value="">{{ __('labels.general.choose')}}</option>
                                                @foreach ($category as $select)
                                                    <option value="{{ $select->id }}"
                                                        {{ old('category_id') == $select['id'] ? 'selected' : '' }}>
                                                        <?php echo "{$select->id} - {$select->value}"; ?>
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6 form-group mb-3">
                                        <label class="control-label">{{ __('labels.place.logo') }}</label>
                                        <div class="slim" data-did-remove="setImageDeleted"
                                            data-meta='{"type":"image_logo","field":"image_logo"}'>
                                            <input type="file" name="image_logo">
                                        </div>
                                        <input type="hidden" name="image_logo_deleted">
                                    </div>

                                    <!-- place Name / Firmenname -->
                                    <div class="col-md-6 form-group mb-3">
                                        <div class="form-group mb-3">
                                            <div class="d-sm-flex justify-content-between row">
                                                <div class="col-md-12">
                                                    <label
                                                        class="control-label label-place">{{ __('labels.place.place_name') }}<span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" id="place_name_german" name="place_name"
                                                        class="form-control" value="{{ old('place_name') }}" required>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Contact Person Firstname  -->
                                    <div class="col-md-6 form-group mb-3">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.place.firstname'); ?><span
                                                    class="text-danger">*</span>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="Kontaktperson"></i></label>
                                            <input type="text" id="firstname" name="firstname" class="form-control"
                                                value="{{ old('firstname') }}">
                                        </div>
                                    </div>
                                    <!-- Contact Person Lastname  -->
                                    <div class="col-md-6 form-group mb-3">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.place.lastname'); ?><span
                                                    class="text-danger">*</span>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="Kontaktperson"></i></label>
                                            <input type="text" id="lastname" name="lastname" class="form-control"
                                                value="{{ old('lastname') }}">
                                        </div>
                                    </div>
                                </div>
                                <!-- Basic contact_informations *************************************************************************************-->
                                <div class="row justify-content-between">
                                    <!-- Address / Adresse -->
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.place.address'); ?></label>
                                            <input type="text" id="address" name="address" class="form-control"
                                                value="{{ old('address') }}">
                                        </div>
                                    </div>
                                    <!-- Postcode / PLZ -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.place.postcode'); ?></label>
                                            <input type="number" id="postcode" name="postcode" class="form-control"
                                                value="{{ old('postcode') }}">
                                        </div>
                                    </div>
                                    <!-- City / Ort -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.place.city'); ?></label>
                                            <input type="text" id="city" name="city" class="form-control"
                                                value="{{ old('city') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.place.longitude'); ?><span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="longitude" name="longitude" class="form-control"
                                                value="{{ old('longitude') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.place.latitude'); ?><span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="latitude" name="latitude" class="form-control"
                                                value="{{ old('latitude') }}">
                                        </div>
                                    </div>
                                    <!-- Email Address -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.place.email'); ?><span
                                                    class="text-danger">*</span></label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                value="{{ old('email') }}" required>
                                        </div>
                                    </div>
                                    <!-- Phone 1 -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.place.phone_1'); ?><span
                                                    class="text-danger">*</span>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="Diese Nummer wird auf der Seite angezeigt"></i></label>
                                            <input type="text" id="phone_1" name="phone_1" class="form-control"
                                                value="{{ old('phone_1') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="phone_2" class="control-label"><?php echo __('labels.place.phone_2'); ?>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="Falls weitere Telefonnummer vorhanden"></i></label>
                                            <input type="text" id="phone_2" name="phone_2" class="form-control"
                                                value="{{ old('phone_2') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="phone_3" class="control-label"><?php echo __('labels.place.phone_3'); ?>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="Falls weitere Telefonnummer vorhanden"></i></label>
                                            <input type="text" id="phone_3" name="phone_3" class="form-control"
                                                value="{{ old('phone_3') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="mobile" class="control-label"><?php echo __('labels.place.mobile'); ?>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="Falls weitere Mobilenummer vorhanden"></i></label>
                                            <input type="text" id="mobile" name="mobile" class="form-control"
                                                value="{{ old('mobile') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- general information card end -->
                        </section>
                        <section>
                            <!-- Opening Hours ************************************* -->
                            <div class="card card-body pb-0">
                                <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                    {{ __('labels.place.opening_hours') }}</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php foreach ($open_hours_select['days_of_week'] as $day_of_week) : ?>
                                        <?php $day_of_week_selects = $open_hours_select['selects'][$day_of_week]; ?>
                                        <div class="row open_hours_row">
                                            <div class="col-md-6">
                                                <div class="row time_selector_switch_group">
                                                    <div class="col-md-4 col-auto switch-col">
                                                        <label class="control-label"><?php echo __(ucfirst($day_of_week)); ?></label>
                                                        <div class="">
                                                            <div class="form-check form-switch form-switch-lg mb-3 switch open_close"
                                                                dir="ltr">
                                                                <input class="form-check-input asp_open" type="checkbox"
                                                                    id="dow-is_open-<?php echo $day_of_week; ?>"
                                                                    name="dow-is_open-<?php echo $day_of_week; ?>"
                                                                    <?php echo $day_of_week_selects['is_open_switch']; ?>>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-8 col-xl-8 col-sm-12 time_selector_group time_selector_group_morning ">
                                                        <label class="control-label"><?php echo __('Morning'); ?></label>
                                                        <div class="form-row row">
                                                            <div
                                                                class="col-6 col-md-12 col-xs-6 col-xl-6 time_selector_morning_open form-group">
                                                                <?php echo $day_of_week_selects['morning_from']; ?>
                                                            </div>
                                                            <div
                                                                class="col-6 col-md-12 col-xs-6 col-xl-6 time_selector_morning_close form-group">
                                                                <?php echo $day_of_week_selects['morning_to']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row time_selector_switch_group ">
                                                    <div class="col-md-4 col-auto switch-col">
                                                        <label class="control-label"><?php echo __('Split Hours'); ?></label>
                                                        <div class="form-check form-switch form-switch-lg mb-3 switch split_hours"
                                                            dir="ltr">
                                                            <input class="form-check-input success" type="checkbox"
                                                                id="dow-is_extended-<?php echo $day_of_week; ?>"
                                                                name="dow-is_extended-<?php echo $day_of_week; ?>"
                                                                <?php echo $day_of_week_selects['is_split_switch_checked']; ?> disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-xl-8 col-sm-12 time_selector_group time_selector_group_afternoon"
                                                        <?php echo empty($day_of_week_selects['is_split_switch_checked']) ? 'style="display:none;"' : ''; ?>>
                                                        <label class="control-label"><?php echo __('Afternoon'); ?></label>
                                                        <div class="form-row row">
                                                            <div
                                                                class="col-6 col-md-12 col-xs-6 col-xl-6 time_selector_afternoon_open form-group">
                                                                <?php echo $day_of_week_selects['afternoon_from']; ?>
                                                            </div>
                                                            <div
                                                                class="col-6 col-md-12 col-xs-6 col-xl-6 time_selector_afternoon_close form-group">
                                                                <?php echo $day_of_week_selects['afternoon_to']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class=" border-bottom form-group"></div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section>
                            <!-- Other Information ************************************* -->
                            <div class="card card-body pb-0">
                                <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                    {{ __('labels.place.andere_informationen') }}
                                </h4>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="name"
                                                class="form-label">{{ __('labels.place.website') }}</label>
                                            <input type="text" name="website" class="form-control"
                                                placeholder="{{ __('labels.place.website') }}" value="{{ old('website') }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="name"
                                                class="form-label">{{ __('labels.place.facebook') }}</label>
                                            <input type="text" name="facebook" class="form-control"
                                                placeholder="{{ __('labels.place.facebook') }}"
                                                value="{{ old('facebook') }}" />
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="name"
                                                class="form-label">{{ __('labels.place.twitter') }}</label>
                                            <input type="text" name="twitter" class="form-control"
                                                placeholder="{{ __('labels.place.twitter') }}"
                                                value="{{ old('twitter') }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="name"
                                                class="form-label">{{ __('labels.place.instagram') }}</label>
                                            <input type="text" name="instagram" class="form-control"
                                                placeholder="{{ __('labels.place.instagram') }}"
                                                value="{{ old('instagram') }}" />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 col-xl-12">
                                        <div class="form-group mb-3">
                                            <div class="d-sm-flex row">
                                                <div class="col-md-4">
                                                    <label
                                                        class="control-label label-company mt-4">{{ __('labels.place.content_text') }}</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-bs-toggle="tab"
                                                                href="#listing_text_de" role="tab">
                                                                <img src="{{ asset('/assets/images/flags/de.jpg') }}"
                                                                    class="mr-md-2 flag_img" height="15px" />
                                                                <span class="d-none d-sm-block">German</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#listing_text_fr" role="tab">
                                                                <img src="{{ asset('/assets/images/flags/fr.jpg') }}"
                                                                    class="mr-md-2 flag_img" height="15px" />
                                                                <span class="d-none d-sm-block">French</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#listing_text_en" role="tab">
                                                                <img src="{{ asset('/assets/images/flags/en.jpg') }}"
                                                                    class="mr-md-2 flag_img" height="15px" />
                                                                <span class="d-none d-sm-block">English</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#listing_text_it" role="tab">
                                                                <img src="{{ asset('/assets/images/flags/it.jpg') }}"
                                                                    class="mr-md-2 flag_img" height="15px" />
                                                                <span class="d-none d-sm-block">Italian</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Tab panes -->
                                            <div class="tab-content p-3 text-muted">
                                                <div class="tab-pane active" id="listing_text_de" role="tabpanel">
                                                    <textarea id="description_de" name="description_de">{{ old('description_de') }}</textarea>
                                                </div>
                                                <div class="tab-pane" id="listing_text_fr" role="tabpanel">
                                                    <textarea id="description_fr" name="description_fr">{{ old('description_fr') }}</textarea>
                                                </div>
                                                <div class="tab-pane" id="listing_text_en" role="tabpanel">
                                                    <textarea id="description_en" name="description_en">{{ old('description_en') }}</textarea>
                                                </div>
                                                <div class="tab-pane" id="listing_text_it" role="tabpanel">
                                                    <textarea id="description_it" name="description_it">{{ old('description_it') }}</textarea>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <?php if ($role != 'user_private' && $role != 'user_company') { ?>
								<br>
                                <div class="row">
                                    <div class="col-md-12 col-xl-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">{{ __('labels.place.notes') }}</label>
                                            <textarea name="notes" id="notes" class="form-control" rows="10">{{ old('notes') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </section>
                    </div>
                </div>

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-primary float-right"
                    type="submit">{{ __('labels.general.buttons.save') }}</button>
            </x-slot>
        </x-backend.card>

    </x-forms.post>
@endsection
@push('after-scripts')
    <script src="{{ URL::asset('assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ URL::asset('assets/js/scripts/forms/validation/form-validation.js') }}"></script>

    <!--tinymce js-->
    <script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

    <script>
        $(document).ready(function() {
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
@endpush
