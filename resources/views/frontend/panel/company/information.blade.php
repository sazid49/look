@extends('frontend.layouts.legacy.panel')

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
                    <x-utils.link class="card-header-action" :href="route('frontend.panel.company.index')" :text="'Back'" />&nbsp;|&nbsp;
					<a href="{{route('frontend.company.information',[$company,$company->slug])}}" target="_blank">{{__('labels.company.view_previw')}}</a>
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
    <x-forms.patch :action="route('frontend.panel.company.update_information', $company)" id="admin_listing_form" enctype="multipart/form-data" class="custom-validation"
        novalidate>

        <x-backend.card>
            <x-slot name="body">

                @include('frontend.panel.company.includes.tab')

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="informationen" role="tabpanel">
                        <section>
                            <!-- Generelle Informationen ************************************* -->
                            <div class="card card-body pb-0">
                                <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                    {{ __('labels.company.general_information') }}
                                </h4>
                                <div class="row">


                                    <div class="col-md-4 form-group mb-3">
                                        <label class="control-label">{{ __('labels.company.logo') }}</label>
                                        {{-- <div class="slim">
                                        <input type="file" name="company_logo">
                                    </div> --}}

                                        <div class="slim" data-did-remove="setImageDeleted"
                                            data-meta='{"type":"company_logo","field":"company_logo"}'>
                                            <input type="file" name="company_logo">
                                            @if (!empty($company->company_logo))
                                                @if (Storage::disk('public')->exists($company->company_logo))
                                                    <img class="personal_logo" alt="no data"
                                                        src="{{ url('storage/' . $company->company_logo) }}">
                                                @endif
                                            @endif
                                        </div>
                                        <input type="hidden" name="company_logo_deleted">
                                    </div>

                                    <!-- Company Name / Firmenname -->
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <div class="d-sm-flex justify-content-between row">
                                                <div class="col-md-12">
                                                    <label class="control-label label-company"><b>{{ __('labels.company.company_name') }}<span
                                                                class="text-danger">*</span></label></b></label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" id="company_name_german" name="company_name"
                                                        class="form-control"
                                                        value="{{ old('company_name', $company->company_name) }}"
                                                        required>
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label
                                                class="control-label"><b>{{ __('labels.company.kategorie') }}</label></b>
                                            <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                title="Der Leiter ist eine Person, welche eine Gruppe an Agenten leitet / managet.">
                                            </i>
                                            </label>

                                            <select id="category_id" name="category_id"
                                                class="form-control form-control-chosen">
                                                <option value=""><?php echo __('labels.general.choose'); ?></option>
                                                @foreach ($category as $select)
                                                    <option value="{{ $select->id }}"
                                                        {{ old('category_id', $company->category_id) == $select['id'] ? 'selected' : '' }}>
                                                        <?php echo "{$select->id} - {$select->value}"; ?>
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <?php if ($role != 'user_private' and $role != 'user_company') { ?>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label">
                                                {{ __('labels.company.leiter') }}</label>
                                            <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                title="Der Leiter ist eine Person, welche eine Gruppe an Agenten leitet / managet.">
                                            </i>
                                            </label>
                                            <select id="team_leader" name="team_leader"
                                                class="form-control form-control-chosen">
                                                <option value=""><?php echo __('labels.general.choose'); ?></option>
                                                @if ($allUsers1)
                                                    @foreach ($allUsers1 as $row)
                                                        <option value="{{ $row->id }}"
                                                            {{ old('team_leader', $company->team_leader) == $row->id ? 'selected' : '' }}>
                                                            {{ $row->id . ' - ' . $row->userdetails->firstname . $row->userdetails->lastname }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                                <option value="Anderes"
                                                    {{ old('team_leader', $company->team_leader) == 'Anderes' ? 'selected' : '' }}>
                                                    Anderes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label">
                                                {{ __('labels.company.agent') . '/' . __('labels.company.aussendienst') }}</label>
                                            <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                title="Die Person, welche die Firma bei Lookon gebracht hat.">
                                            </i>
                                            </label>
                                            <select id="agent" name="agent"
                                                class="form-control form-control-chosen">
                                                <option value=""><?php echo __('labels.general.choose'); ?></option>
                                                @if ($allUsers1)
                                                    {{-- user_role 1 = user_private --}}
                                                    {{-- user_role 2 = user_company --}}
                                                    @foreach ($allUsers1 as $row)
                                                        <option value="{{ $row->id }}"
                                                            {{ old('agent', $company->agent) == $row->id ? 'selected' : '' }}>
                                                            {{ $row->id . ' - ' . $row->userdetails->firstname . $row->userdetails->lastname }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                                <option value="Anderes"
                                                    {{ old('agent', $company->agent) == 'Anderes' ? 'selected' : '' }}>
                                                    Anderes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label">{{ __('labels.company.administration') }}<span
                                                    class="text-danger">*</span></label>
                                            <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                title="Es kann sein, dass der Agent nicht mehr tätig ist, also wird die Firma einem anderen Agenten zugewiesen oder der Administration."></i>
                                            </label>
                                            <select id="assigned_to" name="assigned_to"
                                                class="form-control form-control-chosen">
                                                <option value=""><?php echo __('labels.general.choose'); ?></option>
                                                @if ($allUsers1)
                                                    @foreach ($allUsers1 as $row)
                                                        <option value="{{ $row->id }}"
                                                            {{ old('assigned_to', $company->assigned_to) == $row->id ? 'selected' : '' }}>
                                                            {{ $row->id . ' - ' . $row->userdetails->firstname . $row->userdetails->lastname }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                                <option value="Anderes"
                                                    {{ old('assigned_to', $company->assigned_to) == 'Anderes' ? 'selected' : '' }}>
                                                    Anderes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!-- Contact Person Firstname  -->
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.company.firstname'); ?><span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="firstname" name="firstname" class="form-control"
                                                value="{{ old('firstname', $company->firstname) }}" required>
                                        </div>
                                    </div>
                                    <!-- Contact Person Lastname  -->
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.company.lastname'); ?></label>
                                            <input type="text" id="lastname" name="lastname" class="form-control"
                                                value="{{ old('lastname', $company->lastname) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label
                                                class="control-label"><b>{{ __('labels.company.canton') }}</label></b>
                                            <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                title="Der Leiter ist eine Person, welche eine Gruppe an Agenten leitet / managet.">
                                            </i>
                                            </label>

                                            <select id="canton_name" name="canton_name"
                                                class="form-control form-control-chosen">
                                                <option value=""><?php echo __('labels.general.choose'); ?></option>
                                                @foreach ($cantonData as $select)
                                                    <option value="{{ $select->name }}"
                                                        {{ ($select->name == old('canton_name', $company->canton)) ? 'selected' : '' }}>
                                                        <?php echo "{$select->id} - {$select->name}"; ?>
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Basic contact_informations *************************************************************************************-->
                                <div class="row justify-content-between">
                                    <!-- Address / Adresse -->
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.company.address'); ?></label>
                                            <input type="text" id="address" name="address" class="form-control"
                                                value="{{ old('address', $company->address) }}">
                                        </div>
                                    </div>
                                    <!-- Postcode / PLZ -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.company.postcode'); ?></label>
                                            <input type="number" id="postcode" name="postcode" class="form-control"
                                                value="{{ old('postcode', $company->postcode) }}">
                                        </div>
                                    </div>
                                    <!-- City / Ort -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.company.city'); ?></label>
                                            <input type="text" id="city" name="city" class="form-control"
                                                value="{{ old('city', $company->city) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.company.longitude'); ?></label>
                                            <input type="text" id="longitude" name="longitude" class="form-control"
                                                value="{{ old('longitude', $company->longitude) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.company.latitude'); ?></label>
                                            <input type="text" id="latitude" name="latitude" class="form-control"
                                                value="{{ old('latitude', $company->latitude) }}">
                                        </div>
                                    </div>
                                    <!-- Email Address -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.company.email'); ?><span
                                                    class="text-danger">*</span></label></label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                value="{{ old('email', $company->email) }}" required>
                                        </div>
                                    </div>
                                    <!-- Phone 1 -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.company.phone_1'); ?><span
                                                    class="text-danger">*</span></label></label>
                                            <input type="text" id="phone_1" name="phone_1" class="form-control"
                                                value="{{ old('phone_1', $company->phone_1) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="phone_2" class="control-label"><?php echo __('labels.company.phone_2'); ?>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="Falls weitere Telefonnummer vorhanden"></i></label>
                                            <input type="text" id="phone_2" name="phone_2" class="form-control"
                                                value="{{ old('phone_2', $company->phone_2) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="phone_3" class="control-label"><?php echo __('labels.company.phone_3'); ?>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="Falls weitere Telefonnummer vorhanden"></i></label>
                                            <input type="text" id="phone_3" name="phone_3" class="form-control"
                                                value="{{ old('phone_3', $company->phone_3) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="mobile" class="control-label"><?php echo __('labels.company.mobile'); ?>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="Falls weitere Mobilenummer vorhanden"></i></label>
                                            <input type="text" id="mobile" name="mobile" class="form-control"
                                                value="{{ old('mobile', $company->mobile) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="mobile" class="control-label"><?php echo __('labels.company.keyword'); ?></label><br>
											<input type="text" name="keyword" id="keyword" class="form-control" value="{{ old('keyword',$company->keyword) }}">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="slug" class="control-label"><?php //echo __('labels.company.slug'); ?></label><br>
											<input type="text" name="slug" id="slug" class="form-control"  value="{{ old('slug',$company->slug) }}">
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- general information card end -->

                            <div class="card card-body pb-0">
                                <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                    {{ __('labels.company.opening_hours') }}
                                </h4>
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
                                                                <?php echo $day_of_week_selects['is_split_switch_checked']; ?> <?php echo empty($day_of_week_selects['is_split_switch_checked']) ? 'disabled' : ''; ?>>
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

                            <div class="card card-body pb-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                            {{ __('labels.company.andere_informationen') }}
                                        </h4>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="name"
                                                class="form-label">{{ __('labels.company.website') }}</label>
                                            <input type="text" name="website" class="form-control"
                                                placeholder="{{ __('labels.company.website') }}"
                                                value="{{ old('website', $company->website) }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="name"
                                                class="form-label">{{ __('labels.company.founding_year') }}</label>
                                            <input type="text" name="founding_year" class="form-control"
                                                placeholder="{{ __('labels.company.founding_year') }}"
                                                value="{{ old('founding_year', $company->foundingyear) }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="name"
                                                class="form-label">{{ __('labels.company.facebook') }}</label>
                                            <input type="text" name="facebook" class="form-control"
                                                placeholder="{{ __('labels.company.facebook') }}"
                                                value="{{ old('facebook', $company->socialmedia->facebook ?? '') }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="name"
                                                class="form-label">{{ __('labels.company.youtube') }}</label>
                                            <input type="text" name="youtube" class="form-control"
                                                placeholder="{{ __('labels.company.youtube') }}"
                                                value="{{ old('youtube', $company->socialmedia->youtube_profile ?? '') }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="name"
                                                class="form-label">{{ __('labels.company.youtube_video') }}</label>
                                            <input type="text" name="youtube_video" class="form-control"
                                                placeholder="{{ __('labels.company.youtube_video') }}"
                                                value="{{ old('youtube_video', $company->socialmedia->youtube_video ?? '') }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="name"
                                                class="form-label">{{ __('labels.company.twitter') }}</label>
                                            <input type="text" name="twitter" class="form-control"
                                                placeholder="{{ __('labels.company.twitter') }}"
                                                value="{{ old('twitter', $company->socialmedia->twitter ?? '') }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="name"
                                                class="form-label">{{ __('labels.company.instagram') }}</label>
                                            <input type="text" name="instagram" class="form-control"
                                                placeholder="{{ __('labels.company.instagram') }}"
                                                value="{{ old('instagram', $company->socialmedia->instagram ?? '') }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="name"
                                                class="form-label">{{ __('labels.company.tiktok') }}</label>
                                            <input type="text" name="tiktok" class="form-control"
                                                placeholder="{{ __('labels.company.tiktok') }}"
                                                value="{{ old('tiktok', $company->socialmedia->tiktok ?? '') }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-xl-12">
                                        <div class="form-group mb-3">
                                            <div class="d-sm-flex justify-content-between row">
                                                <div class="col-md-4">
                                                    <label
                                                        class="control-label label-company"><b>{{ __('labels.company.listing_text') }}*</b></label>
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
                                            <div class="tab-content text-muted">
                                                <div class="tab-pane active" id="listing_text_de" role="tabpanel">
                                                    <textarea id="description_de" name="description_de">{{ old('description_de', $company->description_de) }}</textarea>
                                                </div>
                                                <div class="tab-pane" id="listing_text_fr" role="tabpanel">
                                                    <textarea id="description_fr" name="description_fr">{{ old('description_fr', $company->description_fr) }}</textarea>
                                                </div>
                                                <div class="tab-pane" id="listing_text_en" role="tabpanel">
                                                    <textarea id="description_en" name="description_en">{{ old('description_en', $company->description_en) }}</textarea>
                                                </div>
                                                <div class="tab-pane" id="listing_text_it" role="tabpanel">
                                                    <textarea id="description_it" name="description_it">{{ old('description_it', $company->description_it) }}</textarea>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <?php if ($role != 'user_private' && $role != 'user_company') { ?>
                                <div class="row">
                                    <div class="col-md-12 col-xl-12">
                                        <div class="mb-3">
                                            <label for="name"
                                                class="form-label">{{ __('labels.company.notes') }}</label>
                                            <textarea name="notes" id="notes" class="form-control" rows="10">{{ old('notes', $company->notes) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
								<div class="row">
									<div class="col-md-12 col-xl-12">
										<div class="form-group mb-3">
											<label for="name" class="form-label"><strong>{{ __('labels.company.tags') }}</strong></label>
											<div class="row">
												@php
													$companytags = $company->companytags->pluck('tag_id')->toArray();
												@endphp
												@foreach ($tags as $item)
													<label class="col-md-2" for="{{'tags_'.$item->id}}">
														<input type="checkbox" name="tags[]" id="{{'tags_'.$item->id}}" value="{{$item->id}}" {{(old('tags',$companytags) && in_array($item->id,old('tags',$companytags))) ? "checked" : ""}}> {{$item->name}}
													</label>
												@endforeach
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
                <button class="btn btn-primary float-right"
                    type="submit">{{ __('labels.general.buttons.update') }}</button>
            </x-slot>
        </x-backend.card>

    </x-forms.patch>

    <!--  Large modal example -->
    <div class="modal fade bs-popup-modal-lg" id="bs-popup-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

@push('after-scripts')
    <script src="{{ URL::asset('assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ URL::asset('assets/js/scripts/forms/validation/form-validation.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
			$("#keyword").tagsinput({
				maxTags: 3
			});
            $('#slug').on('keypress', function(e) {
                if (e.which == 32){
                    console.log('Space Detected');
                    return false;
                }
            });
            $(".datatable").DataTable();
            $("input[name='claimed']").change(function () {
				if($("input[name='claimed']:checked").val() == 1) {
					$(".claimed_by").removeClass('d-none');
					$("#claimed_by").attr('required','required');
				} else {
					$(".claimed_by").addClass('d-none');
					$("#claimed_by").removeAttr('required');
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

            document.querySelector("#admin_listing_form").addEventListener("submit", function(e) {
                if (!checkopenhours()) {
                    e.preventDefault(); //stop form from submitting
                    alert("Not valid!");
                }
            });

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
