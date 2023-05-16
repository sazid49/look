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
                <x-utils.link class="card-header-action" :href="route('admin.company.index')" :text="'Back'" />
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
<x-forms.patch :action="route('admin.company.update', $company)" enctype="multipart/form-data" class="custom-validation" novalidate>
    <x-backend.card>
        <x-slot name="body">
            @if (Auth()->user()->roles[0]->name == 'Administrator' || Auth()->user()->roles[0]->name == 'user_private' || Auth()->user()->roles[0]->name == 'user_company')
           @include('backend.company.includes.finance')
            @endif
        </x-slot>
    </x-backend.card>

    <x-backend.card>
        <x-slot name="body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <label for="name" class="form-label col-md-6">{{ __('labels.company.listing_active') }}</label>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="radio" name="active" id="active_yes" value="1" {{ old('active', $company->active) == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active_yes">
                                        {{ __('labels.general.yes') }}
                                    </label>
                                </div>
                                <div class="form-check col-md-6 ">
                                    <input class="form-check-input" type="radio" name="active" id="active_no" value="0" {{ old('active', $company->active) == '0' || old('active', $company->active) == '' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active_no">
                                        {{ __('labels.general.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">&nbsp;</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <label for="name" class="form-label col-md-6">{{ __('labels.company.published') }}</label>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="radio" name="published" id="published_yes" value="1" {{ old('published', $company->published) == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="published_yes">
                                        {{ __('labels.general.yes') }}
                                    </label>
                                </div>
                                <div class="form-check col-md-6 ">
                                    <input class="form-check-input" type="radio" name="published" id="published_no" value="0" {{ old('published', $company->published) == '0' || old('published', $company->published) == '' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="published_no">
                                        {{ __('labels.general.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">&nbsp;</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <label for="name" class="form-label col-md-6">{{ __('labels.company.taken_over') }}</label>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="radio" name="claimed" id="claimed_yes" value="1" {{ old('claimed', $company->claimed) == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="claimed_yes">
                                        {{ __('labels.general.yes') }}
                                    </label>
                                </div>
                                <div class="form-check col-md-6 ">
                                    <input class="form-check-input" type="radio" name="claimed" id="claimed_no" value="0" {{ old('claimed', $company->claimed) == '0' || old('claimed', $company->claimed) == '' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="claimed_no">
                                        {{ __('labels.general.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">&nbsp;</div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <label for="name" class="form-label col-md-6">{{ __('labels.company.list_frontend') }}</label>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="radio" name="show_frontpage" id="show_yes" value="1" {{ old('show_frontpage', $company->show_frontpage) == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_yes">
                                        {{ __('labels.general.yes') }}
                                    </label>
                                </div>
                                <div class="form-check col-md-6 ">
                                    <input class="form-check-input" type="radio" name="show_frontpage" id="show_no" value="0" {{ old('show_frontpage', $company->show_frontpage) == '0' || old('show_frontpage', $company->show_frontpage) == '' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_no">
                                        {{ __('labels.general.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">&nbsp;</div>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-backend.card>

    <x-backend.card>
        <x-slot name="body">

          @include('backend.company.includes.nav')

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="informationen" role="tabpanel">
                    <section>
                        <!-- Generelle Informationen -->
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

                                    <div class="slim" data-did-remove="setImageDeleted" data-meta='{"type":"company_logo","field":"company_logo"}'>
                                        <input type="file" name="company_logo">
                                        @if (!empty($company->company_logo))
                                        @if (Storage::disk('public')->exists($company->company_logo))
                                        <img class="personal_logo" alt="no data" src="{{url('storage/' . $company->company_logo)}}">
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
                                                <label class="control-label label-company"><b>{{ __('labels.company.company_name') }}*</b></label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" id="company_name_german" name="company_name" class="form-control" value="{{ old('company_name', $company->company_name) }}" required>

                                                {{-- <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" data-bs-toggle="tab" href="#home1"
															role="tab">
															<img src="{{ asset('/assets/images/flags/de.jpg') }}"
                                                class="mr-md-2 flag_img" height="15px" />
                                                <span class="d-none d-sm-block">German</span>
                                                </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                                        <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img" height="15px" />
                                                        <span class="d-none d-sm-block">French</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                                        <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img" height="15px" />
                                                        <span class="d-none d-sm-block">English</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab">
                                                        <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img" height="15px" />
                                                        <span class="d-none d-sm-block">Italian</span>
                                                    </a>
                                                </li>
                                                </ul> --}}
                                            </div>
                                        </div>
                                        <!-- Tab panes -->
                                        {{-- <div class="tab-content p-3 text-muted">
											<div class="tab-pane active" id="home1" role="tabpanel">
												<input type="text" id="company_name_german" name="company_name" class="form-control" value="" required>
											</div>
											<div class="tab-pane" id="profile1" role="tabpanel">
												<input type="text" id="company_name_french" name="company_name"
													class="form-control" value="">
											</div>
											<div class="tab-pane" id="messages1" role="tabpanel">
												<input type="text" id="company_name_english" name="company_name" class="form-control" value="">
											</div>
											<div class="tab-pane" id="settings1" role="tabpanel">
												<input type="text" id="company_name_italian" name="company_name" class="form-control" value="">
											</div>
										</div> --}}

                                    </div>

                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.kategorie') }} *</b>
                                            <i class="tip ml-1" data-toggle="tooltip" data-placement="top" title="Der Leiter ist eine Person, welche eine Gruppe an Agenten leitet / managet.">
                                            </i>
                                        </label>

                                        <select id="category_id" name="category_id" class="form-control form-control-chosen">
                                            <option value=""><?php echo __('labels.general.choose'); ?></option>
                                            @foreach ($category as $select)
                                            <option value="{{ $select->id }}" {{ old('category_id', $company->id_category) == $select['id'] ? 'selected' : '' }}>
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
                                                {{ __('labels.company.leiter') }} *
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top" title="Der Leiter ist eine Person, welche eine Gruppe an Agenten leitet / managet.">
                                                </i>
                                            </label>
                                            <select id="team_leader" name="team_leader" class="form-control form-control-chosen">
                                                <option value=""><?php echo __('labels.general.choose'); ?></option>
                                                @if ($allUsers1)
                                                {{-- user_role 1 = user_private --}}
                                                {{-- user_role 2 = user_company --}}
                                                @foreach ($allUsers1 as $row)
                                                <option value="{{ $row->id }}" {{ old('team_leader', $company->team_leader) == $row->id ? 'selected' : '' }}>
                                                    {{ $row->id . ' - ' . $row->userdetails->firstname . $row->userdetails->lastname }}
                                                </option>
                                                @endforeach
                                                @endif
                                                <option value="Anderes" {{ old('team_leader', $company->team_leader) == 'Anderes' ? 'selected' : '' }}>
                                                    Anderes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label">
                                                {{ __('labels.company.agent') . '/' . __('labels.company.aussendienst') }}
                                                *
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top" title="Die Person, welche die Firma bei Lookon gebracht hat.">
                                                </i>
                                            </label>
                                            <select id="agent" name="agent" class="form-control form-control-chosen">
                                                <option value=""><?php echo __('labels.general.choose'); ?></option>
                                                @if ($allUsers1)
                                                {{-- user_role 1 = user_private --}}
                                                {{-- user_role 2 = user_company --}}
                                                @foreach ($allUsers1 as $row)
                                                <option value="{{ $row->id }}" {{ old('agent', $company->agent) == $row->id ? 'selected' : '' }}>
                                                    {{ $row->id . ' - ' . $row->userdetails->firstname . $row->userdetails->lastname }}
                                                </option>
                                                @endforeach
                                                @endif
                                                <option value="Anderes" {{ old('agent', $company->agent) == 'Anderes' ? 'selected' : '' }}>
                                                    Anderes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label">{{ __('labels.company.administration') }} *
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top" title="Es kann sein, dass der Agent nicht mehr tätig ist, also wird die Firma einem anderen Agenten zugewiesen oder der Administration."></i>
                                            </label>
                                            <select id="assigned_to" name="assigned_to" class="form-control form-control-chosen">
                                                <option value=""><?php echo __('labels.general.choose'); ?></option>
                                                @if ($allUsers1)
                                                {{-- user_role 1 = user_private --}}
                                                {{-- user_role 2 = user_company --}}
                                                @foreach ($allUsers1 as $row)
                                                <option value="{{ $row->id }}" {{ old('assigned_to', $company->assigned_to) == $row->id ? 'selected' : '' }}>
                                                    {{ $row->id . ' - ' . $row->userdetails->firstname . $row->userdetails->lastname }}
                                                </option>
                                                @endforeach
                                                @endif
                                                <option value="Anderes" {{ old('assigned_to', $company->assigned_to) == 'Anderes' ? 'selected' : '' }}>
                                                    Anderes</option>
                                            </select>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- Contact Person Firstname  -->
                                <div class="col-md-4 col-xl-4">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><?php echo __('labels.company.firstname'); ?>
                                            <i class="tip ml-1" data-toggle="tooltip" data-placement="top" title="Kontaktperson"></i></label>
                                        <input type="text" id="firstname" name="firstname" class="form-control" value="{{ old('firstname', $company->firstname) }}" required>
                                    </div>
                                </div>
                                <!-- Contact Person Lastname  -->
                                <div class="col-md-4 col-xl-4">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><?php echo __('labels.company.lastname'); ?>
                                            <i class="tip ml-1" data-toggle="tooltip" data-placement="top" title="Kontaktperson"></i></label>
                                        <input type="text" id="lastname" name="lastname" class="form-control" value="{{ old('lastname', $company->lastname) }}" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Basic contact_informations *************************************************************************************-->
                            <div class="row justify-content-between">
                                <!-- Address / Adresse -->
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><?php echo __('labels.company.address'); ?></label>
                                        <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $company->address) }}">
                                    </div>
                                </div>
                                <!-- Postcode / PLZ -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><?php echo __('labels.company.postcode'); ?></label>
                                        <input type="number" id="postcode" name="postcode" class="form-control" value="{{ old('postcode', $company->postcode) }}">
                                    </div>
                                </div>
                                <!-- City / Ort -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><?php echo __('labels.company.city'); ?></label>
                                        <input type="text" id="city" name="city" class="form-control" value="{{ old('city', $company->city) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><?php echo __('labels.company.longitude'); ?></label>
                                        <input type="text" id="longitude" name="longitude" class="form-control" value="{{ old('longitude', $company->longitude) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><?php echo __('labels.company.latitude'); ?></label>
                                        <input type="text" id="latitude" name="latitude" class="form-control" value="{{ old('latitude', $company->latitude) }}" required>
                                    </div>
                                </div>
                                <!-- Email Address -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><?php echo __('labels.company.email'); ?></label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $company->email) }}" required>
                                    </div>
                                </div>
                                <!-- Phone 1 -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><?php echo __('labels.company.phone_1'); ?>
                                            <i class="tip ml-1" data-toggle="tooltip" data-placement="top" title="Diese Nummer wird auf der Seite angezeigt"></i></label>
                                        <input type="text" id="phone_1" name="phone_1" class="form-control" value="{{ old('phone_1', $company->phone_1) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="phone_2" class="control-label"><?php echo __('labels.company.phone_2'); ?>
                                            <i class="tip ml-1" data-toggle="tooltip" data-placement="top" title="Falls weitere Telefonnummer vorhanden"></i></label>
                                        <input type="text" id="phone_2" name="phone_2" class="form-control" value="{{ old('phone_2', $company->phone_2) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="phone_3" class="control-label"><?php echo __('labels.company.phone_3'); ?>
                                            <i class="tip ml-1" data-toggle="tooltip" data-placement="top" title="Falls weitere Telefonnummer vorhanden"></i></label>
                                        <input type="text" id="phone_3" name="phone_3" class="form-control" value="{{ old('phone_3', $company->phone_3) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="mobile" class="control-label"><?php echo __('labels.company.mobile'); ?>
                                            <i class="tip ml-1" data-toggle="tooltip" data-placement="top" title="Falls weitere Mobilenummer vorhanden"></i></label>
                                        <input type="text" id="mobile" name="mobile" class="form-control" value="{{ old('mobile', $company->mobile) }}">
                                    </div>
                                </div>
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
                                                            <div class="form-check form-switch form-switch-lg mb-3 switch open_close" dir="ltr">
                                                                <input class="form-check-input asp_open" type="checkbox" id="dow-is_open-<?php echo $day_of_week; ?>" name="dow-is_open-<?php echo $day_of_week; ?>" <?php echo $day_of_week_selects['is_open_switch']; ?>>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-xl-8 col-sm-12 time_selector_group time_selector_group_morning ">
                                                        <label class="control-label"><?php echo __('Morning'); ?></label>
                                                        <div class="form-row row">
                                                            <div class="col-6 col-md-12 col-xs-6 col-xl-6 time_selector_morning_open form-group">
                                                                <?php echo $day_of_week_selects['morning_from']; ?>
                                                            </div>
                                                            <div class="col-6 col-md-12 col-xs-6 col-xl-6 time_selector_morning_close form-group">
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
                                                        <div class="form-check form-switch form-switch-lg mb-3 switch split_hours" dir="ltr">
                                                            <input class="form-check-input success" type="checkbox" id="dow-is_extended-<?php echo $day_of_week; ?>" name="dow-is_extended-<?php echo $day_of_week; ?>" <?php echo $day_of_week_selects['is_split_switch_checked']; ?> disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-xl-8 col-sm-12 time_selector_group time_selector_group_afternoon" <?php echo empty($day_of_week_selects['is_split_switch_checked']) ? 'style="display:none;"' : ''; ?>>
                                                        <label class="control-label"><?php echo __('Afternoon'); ?></label>
                                                        <div class="form-row row">
                                                            <div class="col-6 col-md-12 col-xs-6 col-xl-6 time_selector_afternoon_open form-group">
                                                                <?php echo $day_of_week_selects['afternoon_from']; ?>
                                                            </div>
                                                            <div class="col-6 col-md-12 col-xs-6 col-xl-6 time_selector_afternoon_close form-group">
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
                                        <label for="name" class="form-label">{{ __('labels.company.website') }}</label>
                                        <input type="text" name="website" class="form-control" placeholder="{{ __('labels.company.website') }}" value="{{ old('website',$company->website) }}" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('labels.company.founding_year') }}</label>
                                        <input type="text" name="founding_year" class="form-control" placeholder="{{ __('labels.company.founding_year') }}" value="{{ old('founding_year',$company->foundingyear) }}" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('labels.company.facebook') }}</label>
                                        <input type="text" name="facebook" class="form-control" placeholder="{{ __('labels.company.facebook') }}" value="{{ old('facebook',$company->facebook) }}" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('labels.company.youtube') }}</label>
                                        <input type="text" name="youtube" class="form-control" placeholder="{{ __('labels.company.youtube') }}" value="{{ old('youtube',$company->youtube) }}" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('labels.company.youtube_video') }}</label>
                                        <input type="text" name="youtube_video" class="form-control" placeholder="{{ __('labels.company.youtube_video') }}" value="{{ old('youtube_video',$company->youtube_video) }}" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('labels.company.twitter') }}</label>
                                        <input type="text" name="twitter" class="form-control" placeholder="{{ __('labels.company.twitter') }}" value="{{ old('twitter',$company->twitter) }}" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('labels.company.instagram') }}</label>
                                        <input type="text" name="instagram" class="form-control" placeholder="{{ __('labels.company.instagram') }}" value="{{ old('instagram',$company->instagram) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="form-group mb-3">
                                        <div class="d-sm-flex justify-content-between row">
                                            <div class="col-md-4">
                                                <label class="control-label label-company"><b>{{ __('labels.company.listing_text') }}*</b></label>
                                            </div>
                                            <div class="col-md-8">
                                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#listing_text_de" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img" height="15px" />
                                                            <span class="d-none d-sm-block">German</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#listing_text_fr" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img" height="15px" />
                                                            <span class="d-none d-sm-block">French</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#listing_text_en" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img" height="15px" />
                                                            <span class="d-none d-sm-block">English</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#listing_text_it" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img" height="15px" />
                                                            <span class="d-none d-sm-block">Italian</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content text-muted">
                                            <div class="tab-pane active" id="listing_text_de" role="tabpanel">
                                                <textarea id="description_de" name="description_de">{{old('description_de',$company->description_de)}}</textarea>
                                            </div>
                                            <div class="tab-pane" id="listing_text_fr" role="tabpanel">
                                                <textarea id="description_fr" name="description_fr">{{old('description_fr',$company->description_fr)}}</textarea>
                                            </div>
                                            <div class="tab-pane" id="listing_text_en" role="tabpanel">
                                                <textarea id="description_en" name="description_en">{{old('description_en',$company->description_en)}}</textarea>
                                            </div>
                                            <div class="tab-pane" id="listing_text_it" role="tabpanel">
                                                <textarea id="description_it" name="description_it">{{old('description_it',$company->description_it)}}</textarea>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <?php if ($role != 'user_private' && $role != 'user_company') { ?>
                                <div class="row">
                                    <div class="col-md-12 col-xl-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">{{ __('labels.company.notes') }}</label>
                                            <textarea name="notes" id="notes" class="form-control" rows="10">{{old('notes',$company->notes)}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </section>
                </div>
                <div class="tab-pane" id="interraktion" role="tabpanel">
                    <section>
                        <!-- Generelle Informationen ************************************* -->
                        <div class="card card-body pb-0">
                            <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                {{ __('labels.company.interraktion') }}
                            </h4>

                            <div class="row">
                                <label for="name" class="form-label col-md-2">{{ __('labels.company.formular_anzeigen') }}</label>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="form-check col-md-6">
                                            <input class="form-check-input" type="radio" name="show_interraction" id="show_interraction_yes" value="yes" {{ old('show_interraction', $company->show_interraction) == 'yes' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_interraction_yes">
                                                {{ __('labels.general.yes') }}
                                            </label>
                                        </div>
                                        <div class="form-check col-md-6 ">
                                            <input class="form-check-input" type="radio" name="show_interraction" id="show_interraction_no" value="no" {{ old('show_interraction', $company->show_interraction) == 'no' || old('show_interraction', $company->show_interraction) == '' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_interraction_no">
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
                <div class="tab-pane" id="bewertung" role="tabpanel">
                    <section>
                        <!-- Generelle Informationen ************************************* -->
                        <div class="card card-body pb-0">
                            <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                {{ __('labels.company.bewertung') }}
                            </h4>

                            <div class="row">
                                <label for="name" class="form-label col-md-2">{{ __('labels.company.formular_anzeigen') }}</label>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="form-check col-md-6">
                                            <input class="form-check-input" type="radio" name="show_rating" id="show_rating_yes" value="1" {{ old('show_rating', $company->show_rating) == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_rating_yes">
                                                {{ __('labels.general.yes') }}
                                            </label>
                                        </div>
                                        <div class="form-check col-md-6 ">
                                            <input class="form-check-input" type="radio" name="show_rating" id="show_rating_no" value="0" {{ old('show_rating', $company->show_rating) == '0' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_rating_no">
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
                <div class="tab-pane" id="kontaktformular" role="tabpanel">
                    <section>
                        <!-- Generelle Informationen ************************************* -->
                        <div class="card card-body pb-0">
                            <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                {{ __('labels.company.kontaktformular') }}
                            </h4>

                            <div class="row">
                                <label for="name" class="form-label col-md-4">{{ __('labels.company.offer_form') }}</label>
                                <div class="col-md-1">&nbsp;</div>
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="form-check col-md-6">
                                            <input class="form-check-input" type="radio" name="show_kontaktformular" id="show_kontaktformular_yes" value="1" {{ old('show_kontaktformular', $company->show_kontaktformular) == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_kontaktformular_yes">
                                                {{ __('labels.general.yes') }}
                                            </label>
                                        </div>
                                        <div class="form-check col-md-6 ">
                                            <input class="form-check-input" type="radio" name="show_kontaktformular" id="show_kontaktformular_no" value="0" {{ old('show_kontaktformular', $company->show_kontaktformular) == '0' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_kontaktformular_no">
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
                <div class="tab-pane" id="empfehlungen" role="tabpanel">
                    <section>
                        <!-- Generelle Informationen ************************************* -->
                        <div class="card card-body pb-0">
                            <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                {{ __('labels.company.empfehlungen') }}
                            </h4>

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

                            <div class="row">
                                <h5 class="title-h2 lg-font mb-2 mt-4">2. {{ __('labels.company.empfehlung') }}</h5>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.company_name') }}</b></label>
                                        <input type="text" name="recommendations[1][company_name]" class="form-control" value="{{$company->recommendation[1]->company_name ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.contact_name') }}</b></label>
                                        <input type="text" name="recommendations[1][contact_name]" class="form-control" value="{{$company->recommendation[1]->contact_name ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.relation') }}</b></label>
                                        <input type="text" name="recommendations[1][relationship]" class="form-control" value="{{$company->recommendation[1]->relationship ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.telephone') }}</b></label>
                                        <input type="text" name="recommendations[1][phone]" class="form-control" value="{{$company->recommendation[1]->phone ?? ''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <h5 class="title-h2 lg-font mb-2 mt-4">3. {{ __('labels.company.empfehlung') }}</h5>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.company_name') }}</b></label>
                                        <input type="text" name="recommendations[2][company_name]" class="form-control" value="{{$company->recommendation[2]->company_name ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.contact_name') }}</b></label>
                                        <input type="text" name="recommendations[2][contact_name]" class="form-control" value="{{$company->recommendation[2]->contact_name ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.relation') }}</b></label>
                                        <input type="text" name="recommendations[2][relationship]" class="form-control" value="{{$company->recommendation[2]->relationship ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.telephone') }}</b></label>
                                        <input type="text" name="recommendations[2][phone]" class="form-control" value="{{$company->recommendation[2]->phone ?? ''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <h5 class="title-h2 lg-font mb-2 mt-4">4. {{ __('labels.company.empfehlung') }}</h5>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.company_name') }}</b></label>
                                        <input type="text" name="recommendations[3][company_name]" class="form-control" value="{{$company->recommendation[3]->company_name ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.contact_name') }}</b></label>
                                        <input type="text" name="recommendations[3][contact_name]" class="form-control" value="{{$company->recommendation[3]->contact_name ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.relation') }}</b></label>
                                        <input type="text" name="recommendations[3][relationship]" class="form-control" value="{{$company->recommendation[3]->relationship ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><b>{{ __('labels.company.telephone') }}</b></label>
                                        <input type="text" name="recommendations[3][phone]" class="form-control" value="{{$company->recommendation[3]->phone ?? ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="tab-pane" id="preisliste" role="tabpanel">
                    <section>
                        <div class="card card-body ">
                            <h2 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.preisliste') }}</h2>
                            <div class="prising_div">
                                @php
                                $cat_count = 1;
                                @endphp
                                @if(!empty($company->pricing))
                                @foreach($company->pricing as $pricing)
                                @if($pricing->parent_id == null)
                                <div class="row category_title">
                                    <div class="col-md-11 col-xl-11">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><b>{{ __('labels.company.category_title') }}</b></label>
                                            <input type="text" name="category_title_{{$cat_count}}" class="form-control category_title_txt" value="{{$pricing->title}}">
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xl-1 category_title_action {{($cat_count == 1) ? 'd-none' : ''}}">
                                        <div class="form-group mb-3">
                                            <label class="control-label">&nbsp;</label>
                                            <br>
                                            <a href="javascript:void(0)" class="rem_cat_title_row text-danger"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="row item_title">
                                    <div class="col-md-11 col-xl-11">
                                        <div class="row">
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.title') }}</b></label>
                                                <input type="text" name="title_{{$cat_count}}" class="form-control title_txt" value="{{$pricing->title}}">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.description') }}</b></label>
                                                <input type="text" name="description_{{$cat_count}}" class="form-control description_txt" value="{{$pricing->description}}">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.price') }}</b></label>
                                                <input type="text" name="price_{{$cat_count}}" class="form-control price_txt" value="{{$pricing->price}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xl-1 item_title_action {{($cat_count == 2) ? 'd-none' : ''}}">
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
                                            <input type="text" name="category_title_{{$cat_count}}" class="form-control category_title_txt" value="">
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
                                @endphp
                                <div class="row item_title">
                                    <div class="col-md-11 col-xl-11">
                                        <div class="row">
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.title') }}</b></label>
                                                <input type="text" name="title_{{$cat_count}}" class="form-control title_txt" value="">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.description') }}</b></label>
                                                <input type="text" name="description_{{$cat_count}}" class="form-control description_txt" value="">
                                            </div>
                                            <div class="form-group mb-3 col-md-4">
                                                <label class="control-label"><b>{{ __('labels.company.price') }}</b></label>
                                                <input type="text" name="price_{{$cat_count}}" class="form-control price_txt" value="">
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
                                <input type="hidden" id="cat_count" name="cat_count" value="{{$cat_count}}">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="javascript:void(0);" class="add-pricing-item btn btn-primary">Add Item</a>
                                    <a href="javascript:void(0);" class=" add-pricing-category btn btn-secondary">Add Category</a>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
                <div class="tab-pane" id="team" role="tabpanel">
                    <section>
                        <div class="card card-body ">
                            <h2 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.team') }}</h2>
                            <div class="team_div">
                                @if(!empty($company->team))
                                @foreach($company->team as $key=>$team)
                                <div class="row team_title">
                                    <div class="col-md-11 col-xl-11">
                                        <div class="row">
                                            <div class="form-group mb-3 col-md-3">
                                                <label class="control-label"><b>{{ __('labels.company.profile_picture') }}</b></label>
                                                <input type="file" name="profile_photo[]" class="form-control">
                                                <input type="hidden" name="profile_photo_hidden[]" value="{{$team->profile_photo}}">
                                            </div>
                                            <div class="form-group mb-3 col-md-3">
                                                <label class="control-label"><b>{{ __('labels.company.name') }}</b></label>
                                                <input type="text" id="team_name" name="team_name[]" class="form-control" value="{{$team->name}}">
                                            </div>
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="control-label"><b>{{ __('labels.company.designation') }}</b></label>
                                                <input type="text" name="designation[]" class="form-control" value="{{$team->designation}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xl-1 team_title_action {{($key == 0) ? 'd-none' : ''}} ">
                                        <div class="form-group mb-3">
                                            <label class="control-label">&nbsp;</label>
                                            <br>
                                            <a href="javascript:void(0)" class="rem_cat_title_row text-danger"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="row team_title">
                                    <div class="col-md-11 col-xl-11">
                                        <div class="row">
                                            <div class="form-group mb-3 col-md-3">
                                                <label class="control-label"><b>{{ __('labels.company.profile_picture') }}</b></label>
                                                <input type="file" name="profile_photo[]" class="form-control" value="">
                                                <input type="hidden" name="profile_photo_hidden[]" value="">
                                            </div>
                                            <div class="form-group mb-3 col-md-3">
                                                <label class="control-label"><b>{{ __('labels.company.name') }}</b></label>
                                                <input type="text" id="team_name" name="team_name[]" class="form-control" value="">
                                            </div>
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="control-label"><b>{{ __('labels.company.designation') }}</b></label>
                                                <input type="text" name="designation[]" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xl-1 team_title_action d-none">
                                        <div class="form-group mb-3">
                                            <label class="control-label">&nbsp;</label>
                                            <br>
                                            <a href="javascript:void(0)" class="rem_cat_title_row text-danger"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="javascript:void(0);" class="add-team-item btn btn-primary">Add Team</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="tab-pane" id="news" role="tabpanel">
                    <section>
                        <div class="card card-body ">
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.news') }}</h2>
                                </div>
                                <div class="col-6">
                                    <!-- Large modal button -->
                                    <button type="button" class="btn btn-primary waves-effect float-end" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">{{__('labels.company.add_news')}}</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('labels.company.image') }}</th>
                                                <th>{{ __('labels.company.title') }}</th>
                                                <th>{{ __('labels.company.author') }}</th>
                                                <th>{{ __('labels.company.published') }}</th>
                                                <th>{{ __('labels.general.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($company->news))
                                            @php
                                            $i=1;
                                            @endphp
                                            @foreach($company->news as $key=>$news)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>
                                                    @if (!empty($news['picture']))
                                                    @if (Storage::disk('public')->exists($news['picture']))
                                                    <img class="personal_logo" alt="no data" src="{{url('storage/' . $news['picture'])}}" width="80px" height="auto" class="user-profile-image">
                                                    @else
                                                    <img src="{{ URL::asset('/assets/images/no_image.png') }}" alt="" class="personal_logo" height="60px">
                                                    @endif
                                                    @else
                                                    <img src="{{ URL::asset('/assets/images/no_image.png') }}" alt="" class="personal_logo" height="60px">
                                                    @endif
                                                </td>
                                                <td>{{$news['title']}}</td>
                                                <td>{{$news['author']}}</td>
                                                <td>
                                                    @if($news['published'] == 1)
                                                    {{__('labels.company.ja')}}
                                                    @else
                                                    {{__('labels.company.nein')}}
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm btn-icon ml-auto1 waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-popup-modal-lg" data-url="{{route('admin.company.news.edit',[$company,$news])}}" onclick='show_modal(this)'>
                                                        <i class="fas fa-pencil-alt"></i>
                                                        {{__('labels.general.edit')}}
                                                    </button>
                                                    <button type="button" class="btn btn-info btn-sm btn-icon ml-auto1 waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-popup-modal-lg" data-url="{{route('admin.company.news.show',[$company,$news])}}" onclick='show_modal(this)'>
                                                        <i class="fas fa-search"></i>
                                                        {{__('labels.general.show')}}
                                                    </button>
                                                    <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Warning" data-trans-text="Are you sure you want to delete this item?" href="{{ route('admin.company.news.destroy',[$company,$news]) }}" class="btn btn-danger btn-sm btn-icon ml-auto1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>&nbsp;
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
                <div class="tab-pane" id="galerie" role="tabpanel">
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
                                            @if(!empty($company->gallery))
                                            @php
                                            $i=1;
                                            @endphp
                                            @foreach($company->gallery as $key=>$gallery)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>
                                                    @if (!empty($gallery['image']))
                                                    @if (Storage::disk('public')->exists($gallery['image']))
                                                    <img class="personal_logo" alt="no data" src="{{url('storage/' . $gallery['image'])}}" width="80px" height="auto" class="user-profile-image">
                                                    @else
                                                    <img src="{{ URL::asset('/assets/images/no_image.png') }}" alt="" class="personal_logo" height="60px">
                                                    @endif
                                                    @else
                                                    <img src="{{ URL::asset('/assets/images/no_image.png') }}" alt="" class="personal_logo" height="60px">
                                                    @endif
                                                </td>
                                                <td>{{($gallery['show_on_frontside'] == 1) ? __('labels.general.yes') : __('labels.general.yes')}}</td>
                                                <td>
                                                    <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Warning" data-trans-text="Are you sure you want to delete this item?" href="{{ route('admin.company.gallery.destroy',[$company,$gallery]) }}" class="btn btn-danger btn-sm btn-icon ml-auto1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>&nbsp;
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
                <div class="tab-pane" id="bewerbung" role="tabpanel">
                    <section>
                        <div class="card card-body ">
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.job_application') }}</h2>
                                </div>
                                <div class="col-6">
                                    <!-- Large modal button -->
                                    <button type="button" class="btn btn-primary waves-effect float-end" data-bs-toggle="modal" data-bs-target=".bs-job-modal-lg">{{__('labels.company.add_job')}}</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('labels.company.title') }}</th>
                                                <th>{{ __('labels.company.location') }}</th>
                                                <th>{{ __('labels.company.published') }}</th>
                                                <th>{{ __('labels.general.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($company->job))
                                            @php
                                            $i=1;
                                            @endphp
                                            @foreach($company->job as $key=>$job)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$job['title']}}</td>
                                                <td>{{$job['location']}}</td>
                                                <td>
                                                    @if($job['active'] == 1)
                                                    {{__('labels.company.ja')}}
                                                    @else
                                                    {{__('labels.company.nein')}}
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm btn-icon ml-auto1 waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-popup-modal-lg" data-url="{{route('admin.company.job_application.edit',[$company,$job])}}" onclick='show_modal(this)'>
                                                        <i class="fas fa-pencil-alt"></i>
                                                        {{__('labels.general.edit')}}
                                                    </button>
                                                    <button type="button" class="btn btn-info btn-sm btn-icon ml-auto1 waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-popup-modal-lg" data-url="{{route('admin.company.job_application.show',[$company,$job])}}" onclick='show_modal(this)'>
                                                        <i class="fas fa-search"></i>
                                                        {{__('labels.general.show')}}
                                                    </button>
                                                    <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Warning" data-trans-text="Are you sure you want to delete this item?" href="{{ route('admin.company.job_application.destroy',[$company,$job]) }}" class="btn btn-danger btn-sm btn-icon ml-auto1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>&nbsp;
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
                <?php $seo = $company->seo; ?>
                <div class="tab-pane" id="seo" role="tabpanel">
					<div class="row">
						<div class="col-6">
							<h2 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.seo') }}</h2>
						</div>
					</div>

					<div class="card border border-default">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6 col-xl-6">
									<div class="card border border-default">
										<div class="card-body">
											<div class="form-group mb-3">
												<div class="d-sm-flex justify-content-between row">
													<div class="col-md-4">
														<label class="control-label label-company"><b>{{ __('labels.company.information') }}*</b></label>
													</div>
													<div class="col-md-8">
														<ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
															<li class="nav-item col-md-6">
																<a class="nav-link active" data-bs-toggle="tab" href="#information_de" role="tab">
																	<img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">German</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#information_fr" role="tab">
																	<img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">French</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#information_en" role="tab">
																	<img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">English</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#information_it" role="tab">
																	<img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">Italian</span>
																</a>
															</li>
														</ul>
													</div>
												</div>

												<!-- Tab panes -->
												<div class="tab-content text-muted">
													<div class="tab-pane active" id="information_de" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="information_metadataid_de" name="information_metadataid_de" value="">
																	<input type="text" id="information_metatitle_de" name="information_metatitle_de" class="form-control" value="{{ $seo->information_metatitle_de ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="information_metadescription_de" cols="30" rows="2" id="information_metadescription_fr" spellcheck="true">{{$seo->information_metadescription_de ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="information_fr" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="information_metadataid_ft" name="information_metadataid_ft" value="">
																	<input type="text" id="information_metatitle_ft" name="information_metatitle_ft" class="form-control" value="{{ $seo->information_metatitle_ft ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="information_metadescription_ft" cols="30" rows="2" id="information_metadescription_fr" spellcheck="true">{{$seo->information_metadescription_ft ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="information_en" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="information_metadataid_en" name="information_metadataid_en" value="">
																	<input type="text" id="information_metatitle_en" name="information_metatitle_en" class="form-control" value="{{ $seo->information_metatitle_en ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="information_metadescription_en" cols="30" rows="2" id="information_metadescription_en" spellcheck="true">{{$seo->information_metadescription_en ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="information_it" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="information_metadataid_it" name="information_metadataid_it" value="">
																	<input type="text" id="information_metatitle_it" name="information_metatitle_it" class="form-control" value="{{ $seo->information_metatitle_it ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="information_metadescription_it" cols="30" rows="2" id="information_metadescription_it" spellcheck="true">{{$seo->information_metadescription_it ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-xl-6">
									<div class="card border border-default">
										<div class="card-body">
											<div class="form-group mb-3">
												<div class="d-sm-flex justify-content-between row">
													<div class="col-md-4">
														<label class="control-label label-company"><b>{{ __('labels.company.interraction') }}*</b></label>
													</div>
													<div class="col-md-8">
														<ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
															<li class="nav-item col-md-6">
																<a class="nav-link active" data-bs-toggle="tab" href="#interraction_de" role="tab">
																	<img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">German</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#interraction_fr" role="tab">
																	<img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">French</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#interraction_en" role="tab">
																	<img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">English</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#interraction_it" role="tab">
																	<img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">Italian</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
												<!-- Tab panes -->
												<div class="tab-content text-muted">
													<div class="tab-pane active" id="interraction_de" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="interraction_metadataid_de" name="interraction_metadataid_de" value="">
																	<input type="text" id="interraction_metatitle_de" name="interraction_metatitle_de" class="form-control" value="{{ $seo->interraction_metatitle_de ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="interraction_metadescription_de" cols="30" rows="2" id="interraction_metadescription_fr" spellcheck="true">{{$seo->interraction_metadescription_de ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="interraction_fr" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="interraction_metadataid_ft" name="interraction_metadataid_ft" value="">
																	<input type="text" id="interraction_metatitle_ft" name="interraction_metatitle_ft" class="form-control" value="{{ $seo->interraction_metatitle_ft ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="interraction_metadescription_ft" cols="30" rows="2" id="interraction_metadescription_fr" spellcheck="true">{{$seo->interraction_metadescription_ft ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="interraction_en" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="interraction_metadataid_en" name="interraction_metadataid_en" value="">
																	<input type="text" id="interraction_metatitle_en" name="interraction_metatitle_en" class="form-control" value="{{ $seo->interraction_metatitle_en ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="interraction_metadescription_en" cols="30" rows="2" id="interraction_metadescription_en" spellcheck="true">{{$seo->interraction_metadescription_en ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="interraction_it" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="interraction_metadataid_it" name="interraction_metadataid_it" value="">
																	<input type="text" id="interraction_metatitle_it" name="interraction_metatitle_it" class="form-control" value="{{ $seo->interraction_metatitle_it ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="interraction_metadescription_it" cols="30" rows="2" id="interraction_metadescription_it" spellcheck="true">{{$seo->interraction_metadescription_it ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6 col-xl-6">
									<div class="card border border-default">
										<div class="card-body">
											<div class="form-group mb-3">
												<div class="d-sm-flex justify-content-between row">
													<div class="col-md-4">
														<label class="control-label label-company"><b>{{ __('labels.company.job') }}*</b></label>
													</div>
													<div class="col-md-8">
														<ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
															<li class="nav-item col-md-6">
																<a class="nav-link active" data-bs-toggle="tab" href="#job_de" role="tab">
																	<img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">German</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#job_fr" role="tab">
																	<img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">French</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#job_en" role="tab">
																	<img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">English</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#job_it" role="tab">
																	<img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">Italian</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
												<!-- Tab panes -->
												<div class="tab-content text-muted">
													<div class="tab-pane active" id="job_de" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="job_metadataid_de" name="job_metadataid_de" value="">
																	<input type="text" id="job_metatitle_de" name="job_metatitle_de" class="form-control" value="{{ $seo->job_metatitle_de ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="job_metadescription_de" cols="30" rows="2" id="job_metadescription_fr" spellcheck="true">{{$seo->job_metadescription_de ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="job_fr" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="job_metadataid_ft" name="job_metadataid_ft" value="">
																	<input type="text" id="job_metatitle_ft" name="job_metatitle_ft" class="form-control" value="{{ $seo->job_metatitle_ft ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="job_metadescription_ft" cols="30" rows="2" id="job_metadescription_fr" spellcheck="true">{{$seo->job_metadescription_ft ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="job_en" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="job_metadataid_en" name="job_metadataid_en" value="">
																	<input type="text" id="job_metatitle_en" name="job_metatitle_en" class="form-control" value="{{ $seo->job_metatitle_en ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="job_metadescription_en" cols="30" rows="2" id="job_metadescription_en" spellcheck="true">{{$seo->job_metadescription_en ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="job_it" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="job_metadataid_it" name="job_metadataid_it" value="">
																	<input type="text" id="job_metatitle_it" name="job_metatitle_it" class="form-control" value="{{ $seo->job_metatitle_it ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="job_metadescription_it" cols="30" rows="2" id="job_metadescription_it" spellcheck="true">{{$seo->job_metadescription_it ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6 col-xl-6">
									<div class="card border border-default">
										<div class="card-body">
											<div class="form-group mb-3">
												<div class="d-sm-flex justify-content-between row">
													<div class="col-md-4">
														<label class="control-label label-company"><b>{{ __('labels.company.kontaktformular') }}*</b></label>
													</div>
													<div class="col-md-8">
														<ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
															<li class="nav-item col-md-6">
																<a class="nav-link active" data-bs-toggle="tab" href="#kontaktformular_de" role="tab">
																	<img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">German</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#kontaktformular_fr" role="tab">
																	<img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">French</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#kontaktformular_en" role="tab">
																	<img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">English</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#kontaktformular_it" role="tab">
																	<img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">Italian</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
												<!-- Tab panes -->
												<div class="tab-content text-muted">
													<div class="tab-pane active" id="kontaktformular_de" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="kontaktformular_metadataid_de" name="kontaktformular_metadataid_de" value="">
																	<input type="text" id="kontaktformular_metatitle_de" name="kontaktformular_metatitle_de" class="form-control" value="{{ $seo->kontaktformular_metatitle_de ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="kontaktformular_metadescription_de" cols="30" rows="2" id="kontaktformular_metadescription_fr" spellcheck="true">{{$seo->kontaktformular_metadescription_de ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="kontaktformular_fr" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="kontaktformular_metadataid_ft" name="kontaktformular_metadataid_ft" value="">
																	<input type="text" id="kontaktformular_metatitle_ft" name="kontaktformular_metatitle_ft" class="form-control" value="{{ $seo->kontaktformular_metatitle_ft ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="kontaktformular_metadescription_ft" cols="30" rows="2" id="kontaktformular_metadescription_fr" spellcheck="true">{{$seo->kontaktformular_metadescription_ft ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="kontaktformular_en" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="kontaktformular_metadataid_en" name="kontaktformular_metadataid_en" value="">
																	<input type="text" id="kontaktformular_metatitle_en" name="kontaktformular_metatitle_en" class="form-control" value="{{ $seo->kontaktformular_metatitle_en ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="kontaktformular_metadescription_en" cols="30" rows="2" id="kontaktformular_metadescription_en" spellcheck="true">{{$seo->kontaktformular_metadescription_en ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="kontaktformular_it" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="kontaktformular_metadataid_it" name="kontaktformular_metadataid_it" value="">
																	<input type="text" id="kontaktformular_metatitle_it" name="kontaktformular_metatitle_it" class="form-control" value="{{ $seo->kontaktformular_metatitle_it ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="kontaktformular_metadescription_it" cols="30" rows="2" id="kontaktformular_metadescription_it" spellcheck="true">{{$seo->kontaktformular_metadescription_it ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6 col-xl-6">
									<div class="card border border-default">
										<div class="card-body">
											<div class="form-group mb-3">
												<div class="d-sm-flex justify-content-between row">
													<div class="col-md-4">
														<label class="control-label label-company"><b>{{ __('labels.company.empfehlungen') }}*</b></label>
													</div>
													<div class="col-md-8">
														<ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
															<li class="nav-item col-md-6">
																<a class="nav-link active" data-bs-toggle="tab" href="#empfehlungen_de" role="tab">
																	<img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">German</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#empfehlungen_fr" role="tab">
																	<img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">French</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#empfehlungen_en" role="tab">
																	<img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">English</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#empfehlungen_it" role="tab">
																	<img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">Italian</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
												<!-- Tab panes -->
												<div class="tab-content text-muted">
													<div class="tab-pane active" id="empfehlungen_de" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="empfehlungen_metadataid_de" name="empfehlungen_metadataid_de" value="">
																	<input type="text" id="empfehlungen_metatitle_de" name="empfehlungen_metatitle_de" class="form-control" value="{{ $seo->empfehlungen_metatitle_de ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="empfehlungen_metadescription_de" cols="30" rows="2" id="empfehlungen_metadescription_fr" spellcheck="true">{{$seo->empfehlungen_metadescription_de ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="empfehlungen_fr" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="empfehlungen_metadataid_ft" name="empfehlungen_metadataid_ft" value="">
																	<input type="text" id="empfehlungen_metatitle_ft" name="empfehlungen_metatitle_ft" class="form-control" value="{{ $seo->empfehlungen_metatitle_ft ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="empfehlungen_metadescription_ft" cols="30" rows="2" id="empfehlungen_metadescription_fr" spellcheck="true">{{$seo->empfehlungen_metadescription_ft ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="empfehlungen_en" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="empfehlungen_metadataid_en" name="empfehlungen_metadataid_en" value="">
																	<input type="text" id="empfehlungen_metatitle_en" name="empfehlungen_metatitle_en" class="form-control" value="{{ $seo->empfehlungen_metatitle_en ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="empfehlungen_metadescription_en" cols="30" rows="2" id="empfehlungen_metadescription_en" spellcheck="true">{{$seo->empfehlungen_metadescription_en ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="empfehlungen_it" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="empfehlungen_metadataid_it" name="empfehlungen_metadataid_it" value="">
																	<input type="text" id="empfehlungen_metatitle_it" name="empfehlungen_metatitle_it" class="form-control" value="{{ $seo->empfehlungen_metatitle_it ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="empfehlungen_metadescription_it" cols="30" rows="2" id="empfehlungen_metadescription_it" spellcheck="true">{{$seo->empfehlungen_metadescription_it ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6 col-xl-6">
									<div class="card border border-default">
										<div class="card-body">
											<div class="form-group mb-3">
												<div class="d-sm-flex justify-content-between row">
													<div class="col-md-4">
														<label class="control-label label-company"><b>{{ __('labels.company.preisliste') }}*</b></label>
													</div>
													<div class="col-md-8">
														<ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
															<li class="nav-item col-md-6">
																<a class="nav-link active" data-bs-toggle="tab" href="#preisliste_de" role="tab">
																	<img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">German</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#preisliste_fr" role="tab">
																	<img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">French</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#preisliste_en" role="tab">
																	<img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">English</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#preisliste_it" role="tab">
																	<img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">Italian</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
												<!-- Tab panes -->
												<div class="tab-content text-muted">
													<div class="tab-pane active" id="preisliste_de" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="preisliste_metadataid_de" name="preisliste_metadataid_de" value="">
																	<input type="text" id="preisliste_metatitle_de" name="preisliste_metatitle_de" class="form-control" value="{{ $seo->preisliste_metatitle_de ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="preisliste_metadescription_de" cols="30" rows="2" id="preisliste_metadescription_fr" spellcheck="true">{{$seo->preisliste_metadescription_de ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="preisliste_fr" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="preisliste_metadataid_ft" name="preisliste_metadataid_ft" value="">
																	<input type="text" id="preisliste_metatitle_ft" name="preisliste_metatitle_ft" class="form-control" value="{{ $seo->preisliste_metatitle_ft ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="preisliste_metadescription_ft" cols="30" rows="2" id="preisliste_metadescription_fr" spellcheck="true">{{$seo->preisliste_metadescription_ft ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="preisliste_en" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="preisliste_metadataid_en" name="preisliste_metadataid_en" value="">
																	<input type="text" id="preisliste_metatitle_en" name="preisliste_metatitle_en" class="form-control" value="{{ $seo->preisliste_metatitle_en ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="preisliste_metadescription_en" cols="30" rows="2" id="preisliste_metadescription_en" spellcheck="true">{{$seo->preisliste_metadescription_en ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="preisliste_it" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="preisliste_metadataid_it" name="preisliste_metadataid_it" value="">
																	<input type="text" id="preisliste_metatitle_it" name="preisliste_metatitle_it" class="form-control" value="{{ $seo->preisliste_metatitle_it ?? ""  }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="preisliste_metadescription_it" cols="30" rows="2" id="preisliste_metadescription_it" spellcheck="true">{{$seo->preisliste_metadescription_it ?? "" }}</textarea>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>


								<div class="col-md-6 col-xl-6">
									<div class="card border border-default">
										<div class="card-body">
											<div class="form-group mb-3">
												<div class="d-sm-flex justify-content-between row">
													<div class="col-md-4">
														<label class="control-label label-company"><b>{{ __('labels.company.team') }}*</b></label>
													</div>
													<div class="col-md-8">
														<ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
															<li class="nav-item col-md-6">
																<a class="nav-link active" data-bs-toggle="tab" href="#team_de" role="tab">
																	<img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">German</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#team_fr" role="tab">
																	<img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">French</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#team_en" role="tab">
																	<img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">English</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#team_it" role="tab">
																	<img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">Italian</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
												<!-- Tab panes -->
												<div class="tab-content text-muted">
													<div class="tab-pane active" id="team_de" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="team_metadataid_de" name="team_metadataid_de" value="">
																	<input type="text" id="team_metatitle_de" name="team_metatitle_de" class="form-control" value="{{ $seo->team_metatitle_de ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="team_metadescription_de" cols="30" rows="2" id="team_metadescription_fr" spellcheck="true">{{$seo->team_metadescription_de ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="team_fr" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="team_metadataid_ft" name="team_metadataid_ft" value="">
																	<input type="text" id="team_metatitle_ft" name="team_metatitle_ft" class="form-control" value="{{ $seo->team_metatitle_ft ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="team_metadescription_ft" cols="30" rows="2" id="team_metadescription_fr" spellcheck="true">{{$seo->team_metadescription_ft ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="team_en" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="team_metadataid_en" name="team_metadataid_en" value="">
																	<input type="text" id="team_metatitle_en" name="team_metatitle_en" class="form-control" value="{{ $seo->team_metatitle_en ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="team_metadescription_en" cols="30" rows="2" id="team_metadescription_en" spellcheck="true">{{$seo->team_metadescription_en ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="team_it" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="team_metadataid_it" name="team_metadataid_it" value="">
																	<input type="text" id="team_metatitle_it" name="team_metatitle_it" class="form-control" value="{{ $seo->team_metatitle_it ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="team_metadescription_it" cols="30" rows="2" id="team_metadescription_it" spellcheck="true">{{$seo->team_metadescription_it ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>


								<div class="col-md-6 col-xl-6">
									<div class="card border border-default">
										<div class="card-body">
											<div class="form-group mb-3">
												<div class="d-sm-flex justify-content-between row">
													<div class="col-md-4">
														<label class="control-label label-company"><b>{{ __('labels.company.news') }}*</b></label>
													</div>
													<div class="col-md-8">
														<ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
															<li class="nav-item col-md-6">
																<a class="nav-link active" data-bs-toggle="tab" href="#news_de" role="tab">
																	<img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">German</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#news_fr" role="tab">
																	<img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">French</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#news_en" role="tab">
																	<img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">English</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#news_it" role="tab">
																	<img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">Italian</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
												<!-- Tab panes -->
												<div class="tab-content text-muted">
													<div class="tab-pane active" id="news_de" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="news_metadataid_de" name="news_metadataid_de" value="">
																	<input type="text" id="news_metatitle_de" name="news_metatitle_de" class="form-control" value="{{ $seo->news_metatitle_de ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="news_metadescription_de" cols="30" rows="2" id="news_metadescription_fr" spellcheck="true">{{$seo->news_metadescription_de ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="news_fr" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="news_metadataid_ft" name="news_metadataid_ft" value="">
																	<input type="text" id="news_metatitle_ft" name="news_metatitle_ft" class="form-control" value="{{ $seo->news_metatitle_ft ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="news_metadescription_ft" cols="30" rows="2" id="news_metadescription_fr" spellcheck="true">{{$seo->news_metadescription_ft ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="news_en" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="news_metadataid_en" name="news_metadataid_en" value="">
																	<input type="text" id="news_metatitle_en" name="news_metatitle_en" class="form-control" value="{{ $seo->news_metatitle_en ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="news_metadescription_en" cols="30" rows="2" id="news_metadescription_en" spellcheck="true">{{$seo->news_metadescription_en ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="news_it" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="news_metadataid_it" name="news_metadataid_it" value="">
																	<input type="text" id="news_metatitle_it" name="news_metatitle_it" class="form-control" value="{{ $seo->news_metatitle_it ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="news_metadescription_it" cols="30" rows="2" id="news_metadescription_it" spellcheck="true">{{$seo->news_metadescription_it ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>


								<div class="col-md-6 col-xl-6">
									<div class="card border border-default">
										<div class="card-body">
											<div class="form-group mb-3">
												<div class="d-sm-flex justify-content-between row">
													<div class="col-md-4">
														<label class="control-label label-company"><b>{{ __('labels.company.galerie') }}*</b></label>
													</div>
													<div class="col-md-8">
														<ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
															<li class="nav-item col-md-6">
																<a class="nav-link active" data-bs-toggle="tab" href="#galerie_de" role="tab">
																	<img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">German</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#galerie_fr" role="tab">
																	<img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">French</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#galerie_en" role="tab">
																	<img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">English</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#galerie_it" role="tab">
																	<img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">Italian</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
												<!-- Tab panes -->
												<div class="tab-content text-muted">
													<div class="tab-pane active" id="galerie_de" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="galerie_metadataid_de" name="galerie_metadataid_de" value="">
																	<input type="text" id="galerie_metatitle_de" name="galerie_metatitle_de" class="form-control" value="{{ $seo->galerie_metatitle_de ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="galerie_metadescription_de" cols="30" rows="2" id="galerie_metadescription_fr" spellcheck="true">{{$seo->galerie_metadescription_de ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="galerie_fr" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="galerie_metadataid_ft" name="galerie_metadataid_ft" value="">
																	<input type="text" id="galerie_metatitle_ft" name="galerie_metatitle_ft" class="form-control" value="{{ $seo->galerie_metatitle_ft ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="galerie_metadescription_ft" cols="30" rows="2" id="galerie_metadescription_fr" spellcheck="true">{{$seo->galerie_metadescription_ft ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="galerie_en" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="galerie_metadataid_en" name="galerie_metadataid_en" value="">
																	<input type="text" id="galerie_metatitle_en" name="galerie_metatitle_en" class="form-control" value="{{ $seo->galerie_metatitle_en ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="galerie_metadescription_en" cols="30" rows="2" id="galerie_metadescription_en" spellcheck="true">{{$seo->galerie_metadescription_en ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="galerie_it" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="galerie_metadataid_it" name="galerie_metadataid_it" value="">
																	<input type="text" id="galerie_metatitle_it" name="galerie_metatitle_it" class="form-control" value="{{ $seo->galerie_metatitle_it ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="galerie_metadescription_it" cols="30" rows="2" id="galerie_metadescription_it" spellcheck="true">{{$seo->galerie_metadescription_it ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>


								<div class="col-md-6 col-xl-6">
									<div class="card border border-default">
										<div class="card-body">
											<div class="form-group mb-3">
												<div class="d-sm-flex justify-content-between row">
													<div class="col-md-4">
														<label class="control-label label-company"><b>{{ __('labels.company.rating') }}*</b></label>
													</div>
													<div class="col-md-8">
														<ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
															<li class="nav-item col-md-6">
																<a class="nav-link active" data-bs-toggle="tab" href="#rating_de" role="tab">
																	<img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">German</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#rating_fr" role="tab">
																	<img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">French</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#rating_en" role="tab">
																	<img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">English</span>
																</a>
															</li>
															<li class="nav-item col-md-6">
																<a class="nav-link" data-bs-toggle="tab" href="#rating_it" role="tab">
																	<img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
																	<span class="d-none d-sm-block">Italian</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
												<!-- Tab panes -->
												<div class="tab-content text-muted">
													<div class="tab-pane active" id="rating_de" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="rating_metadataid_de" name="rating_metadataid_de" value="">
																	<input type="text" id="rating_metatitle_de" name="rating_metatitle_de" class="form-control" value="{{ $seo->rating_metatitle_de ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="rating_metadescription_de" cols="30" rows="2" id="rating_metadescription_fr" spellcheck="true">{{$seo->rating_metadescription_de ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="rating_fr" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="rating_metadataid_ft" name="rating_metadataid_ft" value="">
																	<input type="text" id="rating_metatitle_ft" name="rating_metatitle_ft" class="form-control" value="{{ $seo->rating_metatitle_ft ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="rating_metadescription_ft" cols="30" rows="2" id="rating_metadescription_fr" spellcheck="true">{{$seo->rating_metadescription_ft ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="rating_en" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="rating_metadataid_en" name="rating_metadataid_en" value="">
																	<input type="text" id="rating_metatitle_en" name="rating_metatitle_en" class="form-control" value="{{ $seo->rating_metatitle_en ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="rating_metadescription_en" cols="30" rows="2" id="rating_metadescription_en" spellcheck="true">{{$seo->rating_metadescription_en ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="rating_it" role="tabpanel">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group mb-3">
																	<label class="control-label">{{__('labels.company.meta_title')}}</label>
																	<input type="hidden" id="rating_metadataid_it" name="rating_metadataid_it" value="">
																	<input type="text" id="rating_metatitle_it" name="rating_metatitle_it" class="form-control" value="{{ $seo->rating_metatitle_it ?? '' }}">
																</div>
																<div class="form-group">
																	<label class="control-label">{{__('labels.company.meta_description')}}</label>
																	<textarea class="form-control" name="rating_metadescription_it" cols="30" rows="2" id="rating_metadescription_it" spellcheck="true">{{$seo->rating_metadescription_it ?? ''}}</textarea>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Update</button>
        </x-slot>
    </x-backend.card>

</x-forms.patch>

<!--  Large modal example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <x-forms.post :action="route('admin.company.news.store',[$company])" enctype="multipart/form-data" class="custom-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">{{ __('labels.company.add_news') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="news_div">
                        <div class="row news_chcekbox">
                            <div class="col-md-11 col-xl-11">
                                <div class="form-group mb-3">
                                    <label class="control-label"><b>{{ __('labels.company.published') }} ?</b></label>
                                    <input type="radio" class="switch-input" id="show_news_yes" name="show_news" value="1">
                                    <label class="control-label"><b>{{ __('labels.company.ja') }}</b></label>
                                    <input type="radio" class="switch-input" id="show_news_no" name="show_news" value="0" checked="">
                                    <label class="control-label"><b>{{ __('labels.company.nein') }}</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="row news_title">
                            <div class="col-md-12 ">
                                <div class="row">
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.image') }}</b></label>
                                        <input type="file" name="news_image" class="form-control" value="">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.title') }}</b></label>
                                        <input type="text" id="news_title" name="news_title" class="form-control" value="">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.author') }}</b></label>
                                        <input type="text" name="news_author" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row news_description">
                                <div class="col-md-12">
                                    <div class="form-group mb-3 col-md-12 ">
                                        <label class="control-label"><b>{{ __('labels.company.description') }}</b></label><br>
                                        <textarea name="news_description" id="news_description" style="width:100%;" rows="5" height="200%"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 col-xl-1 news_title_action d-none">
                                <div class="form-group mb-3">
                                    <label class="control-label">&nbsp;</label>
                                    <br>
                                    <a href="javascript:void(0)" class="rem_cat_title_row text-danger"><i class="fa fa-times"></i></a>
                                </div>
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
</div><!-- /.modal -->

<!--  Large modal example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <x-forms.post :action="route('admin.company.job_application.store',[$company])" enctype="multipart/form-data" class="custom-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">{{ __('labels.company.add_news') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="news_div">
                        <div class="row news_chcekbox">
                            <div class="col-md-11 col-xl-11">
                                <div class="form-group mb-3">
                                    <label class="control-label"><b>{{ __('labels.company.published') }} ?</b></label>
                                    <input type="radio" class="switch-input" id="show_news_yes" name="show_news" value="1">
                                    <label class="control-label"><b>{{ __('labels.company.ja') }}</b></label>
                                    <input type="radio" class="switch-input" id="show_news_no" name="show_news" value="0" checked="">
                                    <label class="control-label"><b>{{ __('labels.company.nein') }}</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="row news_title">
                            <div class="col-md-12 ">
                                <div class="row">
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.image') }}</b></label>
                                        <input type="file" name="news_image" class="form-control" value="">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.title') }}</b></label>
                                        <input type="text" id="news_title" name="news_title" class="form-control" value="">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.author') }}</b></label>
                                        <input type="text" name="news_author" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row news_description">
                                <div class="col-md-12">
                                    <div class="form-group mb-3 col-md-12 ">
                                        <label class="control-label"><b>{{ __('labels.company.description') }}</b></label><br>
                                        <textarea name="news_description" id="news_description" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 col-xl-1 news_title_action d-none">
                                <div class="form-group mb-3">
                                    <label class="control-label">&nbsp;</label>
                                    <br>
                                    <a href="javascript:void(0)" class="rem_cat_title_row text-danger"><i class="fa fa-times"></i></a>
                                </div>
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
</div><!-- /.modal -->

<!--  Large modal example -->
<div class="modal fade bs-job-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabelJob" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <x-forms.post :action="route('admin.company.job_application.store',[$company])" enctype="multipart/form-data" class="custom-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabelJob">{{ __('labels.company.add_job') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            <label class="control-label"><b>{{ __('labels.company.title') }}</b></label>
                            <input type="text" id="job_title" name="job_title" class="form-control" value="">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="control-label"><b>{{ __('labels.company.location') }}</b></label>
                            <input type="text" name="job_location" class="form-control" value="">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="control-label"><b>{{ __('labels.company.start_date') }}</b></label>
                            <input type="date" name="job_start_date" class="form-control" value="">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="control-label"><b>{{ __('labels.company.skill') }}</b></label><br>
                            <input type="text" name="job_skill" class="form-control" data-role="tagsinput">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="control-label"><b>{{ __('labels.company.job_type') }}</b></label>
                            <input type="radio" class="switch-input" id="job_type_yes" name="job_type" value="PartTime">
                            <label class="control-label"><b>{{ __('labels.company.parttime') }}</b></label>
                            <input type="radio" class="switch-input" id="job_type_no" name="job_type" value="FullTime" checked="">
                            <label class="control-label"><b>{{ __('labels.company.fulltime') }}</b></label>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="control-label"><b>{{ __('labels.company.published') }} ?</b></label>
                            <input type="radio" class="switch-input" id="show_job_yes" name="active" value="1">
                            <label class="control-label"><b>{{ __('labels.company.ja') }}</b></label>
                            <input type="radio" class="switch-input" id="show_job_no" name="active" value="0" checked="">
                            <label class="control-label"><b>{{ __('labels.company.nein') }}</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3 col-md-12 ">
                                <label class="control-label"><b>{{ __('labels.company.description') }}</b></label><br>
                                <textarea name="job_description" id="job_description" class="form-control" rows="5"></textarea>
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
</div><!-- /.modal -->

<!-- Start Gallary Modal -->

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
                                <div class="slim" data-did-remove="setImageDeleted" data-meta='{"type":"company_logo","field":"image"}'>
                                    <input type="file" name="image">
                                    @if (!empty($company->image))
                                    @if (Storage::disk('public')->exists($company->image))
                                    <img class="personal_logo" alt="no data" src="{{url('storage/' . $company->image)}}">
                                    @endif
                                    @endif
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

<!-- Start Seo Modal -->
{{-- <div class="modal fade bs-seo-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabelJob" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <x-forms.post :action="route('admin.company.seo.store',[$company])" enctype="multipart/form-data" class="custom-validation" novalidate>
                <div class="modal-header">
                    <h5 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.add_seo') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-xl-6">
                            <div class="card border border-default">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <div class="d-sm-flex justify-content-between row">
                                            <div class="col-md-4">
                                                <label class="control-label label-company"><b>{{ __('labels.company.information') }}*</b></label>
                                            </div>
                                            <div class="col-md-8">
                                                <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#information_de" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">German</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#information_fr" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">French</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#information_en" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">English</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#information_it" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">Italian</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content text-muted">
                                            <div class="tab-pane active" id="information_de" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="information_metadataid_de" name="information_metadataid_de" value="">
                                                            <input type="text" id="information_metatitle_de" name="information_metatitle_de" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="information_metadescription_de" cols="30" rows="2" id="information_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="information_fr" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="information_metadataid_ft" name="information_metadataid_ft" value="">
                                                            <input type="text" id="information_metatitle_ft" name="information_metatitle_ft" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="information_metadescription_ft" cols="30" rows="2" id="information_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="information_en" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="information_metadataid_en" name="information_metadataid_en" value="">
                                                            <input type="text" id="information_metatitle_en" name="information_metatitle_en" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="information_metadescription_en" cols="30" rows="2" id="information_metadescription_en" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="information_it" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="information_metadataid_it" name="information_metadataid_it" value="">
                                                            <input type="text" id="information_metatitle_it" name="information_metatitle_it" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="information_metadescription_it" cols="30" rows="2" id="information_metadescription_it" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6">
                            <div class="card border border-default">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <div class="d-sm-flex justify-content-between row">
                                            <div class="col-md-4">
                                                <label class="control-label label-company"><b>{{ __('labels.company.interraction') }}*</b></label>
                                            </div>
                                            <div class="col-md-8">
                                                <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#interraction_de" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">German</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#interraction_fr" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">French</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#interraction_en" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">English</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#interraction_it" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">Italian</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content text-muted">
                                            <div class="tab-pane active" id="interraction_de" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="interraction_metadataid_de" name="interraction_metadataid_de" value="">
                                                            <input type="text" id="interraction_metatitle_de" name="interraction_metatitle_de" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="interraction_metadescription_de" cols="30" rows="2" id="interraction_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="interraction_fr" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="interraction_metadataid_ft" name="interraction_metadataid_ft" value="">
                                                            <input type="text" id="interraction_metatitle_ft" name="interraction_metatitle_ft" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="interraction_metadescription_ft" cols="30" rows="2" id="interraction_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="interraction_en" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="interraction_metadataid_en" name="interraction_metadataid_en" value="">
                                                            <input type="text" id="interraction_metatitle_en" name="interraction_metatitle_en" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="interraction_metadescription_en" cols="30" rows="2" id="interraction_metadescription_en" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="interraction_it" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="interraction_metadataid_it" name="interraction_metadataid_it" value="">
                                                            <input type="text" id="interraction_metatitle_it" name="interraction_metatitle_it" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="interraction_metadescription_it" cols="30" rows="2" id="interraction_metadescription_it" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-6">
                            <div class="card border border-default">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <div class="d-sm-flex justify-content-between row">
                                            <div class="col-md-4">
                                                <label class="control-label label-company"><b>{{ __('labels.company.job') }}*</b></label>
                                            </div>
                                            <div class="col-md-8">
                                                <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#job_de" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">German</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#job_fr" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">French</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#job_en" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">English</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#job_it" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">Italian</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content text-muted">
                                            <div class="tab-pane active" id="job_de" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="job_metadataid_de" name="job_metadataid_de" value="">
                                                            <input type="text" id="job_metatitle_de" name="job_metatitle_de" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="job_metadescription_de" cols="30" rows="2" id="job_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="job_fr" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="job_metadataid_ft" name="job_metadataid_ft" value="">
                                                            <input type="text" id="job_metatitle_ft" name="job_metatitle_ft" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="job_metadescription_ft" cols="30" rows="2" id="job_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="job_en" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="job_metadataid_en" name="job_metadataid_en" value="">
                                                            <input type="text" id="job_metatitle_en" name="job_metatitle_en" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="job_metadescription_en" cols="30" rows="2" id="job_metadescription_en" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="job_it" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="job_metadataid_it" name="job_metadataid_it" value="">
                                                            <input type="text" id="job_metatitle_it" name="job_metatitle_it" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="job_metadescription_it" cols="30" rows="2" id="job_metadescription_it" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-6">
                            <div class="card border border-default">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <div class="d-sm-flex justify-content-between row">
                                            <div class="col-md-4">
                                                <label class="control-label label-company"><b>{{ __('labels.company.kontaktformular') }}*</b></label>
                                            </div>
                                            <div class="col-md-8">
                                                <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#kontaktformular_de" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">German</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#kontaktformular_fr" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">French</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#kontaktformular_en" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">English</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#kontaktformular_it" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">Italian</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content text-muted">
                                            <div class="tab-pane active" id="kontaktformular_de" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="kontaktformular_metadataid_de" name="kontaktformular_metadataid_de" value="">
                                                            <input type="text" id="kontaktformular_metatitle_de" name="kontaktformular_metatitle_de" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="kontaktformular_metadescription_de" cols="30" rows="2" id="kontaktformular_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="kontaktformular_fr" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="kontaktformular_metadataid_ft" name="kontaktformular_metadataid_ft" value="">
                                                            <input type="text" id="kontaktformular_metatitle_ft" name="kontaktformular_metatitle_ft" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="kontaktformular_metadescription_ft" cols="30" rows="2" id="kontaktformular_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="kontaktformular_en" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="kontaktformular_metadataid_en" name="kontaktformular_metadataid_en" value="">
                                                            <input type="text" id="kontaktformular_metatitle_en" name="kontaktformular_metatitle_en" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="kontaktformular_metadescription_en" cols="30" rows="2" id="kontaktformular_metadescription_en" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="kontaktformular_it" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="kontaktformular_metadataid_it" name="kontaktformular_metadataid_it" value="">
                                                            <input type="text" id="kontaktformular_metatitle_it" name="kontaktformular_metatitle_it" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="kontaktformular_metadescription_it" cols="30" rows="2" id="kontaktformular_metadescription_it" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-6">
                            <div class="card border border-default">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <div class="d-sm-flex justify-content-between row">
                                            <div class="col-md-4">
                                                <label class="control-label label-company"><b>{{ __('labels.company.empfehlungen') }}*</b></label>
                                            </div>
                                            <div class="col-md-8">
                                                <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#empfehlungen_de" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">German</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#empfehlungen_fr" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">French</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#empfehlungen_en" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">English</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#empfehlungen_it" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">Italian</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content text-muted">
                                            <div class="tab-pane active" id="empfehlungen_de" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="empfehlungen_metadataid_de" name="empfehlungen_metadataid_de" value="">
                                                            <input type="text" id="empfehlungen_metatitle_de" name="empfehlungen_metatitle_de" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="empfehlungen_metadescription_de" cols="30" rows="2" id="empfehlungen_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="empfehlungen_fr" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="empfehlungen_metadataid_ft" name="empfehlungen_metadataid_ft" value="">
                                                            <input type="text" id="empfehlungen_metatitle_ft" name="empfehlungen_metatitle_ft" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="empfehlungen_metadescription_ft" cols="30" rows="2" id="empfehlungen_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="empfehlungen_en" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="empfehlungen_metadataid_en" name="empfehlungen_metadataid_en" value="">
                                                            <input type="text" id="empfehlungen_metatitle_en" name="empfehlungen_metatitle_en" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="empfehlungen_metadescription_en" cols="30" rows="2" id="empfehlungen_metadescription_en" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="empfehlungen_it" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="empfehlungen_metadataid_it" name="empfehlungen_metadataid_it" value="">
                                                            <input type="text" id="empfehlungen_metatitle_it" name="empfehlungen_metatitle_it" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="empfehlungen_metadescription_it" cols="30" rows="2" id="empfehlungen_metadescription_it" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-6">
                            <div class="card border border-default">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <div class="d-sm-flex justify-content-between row">
                                            <div class="col-md-4">
                                                <label class="control-label label-company"><b>{{ __('labels.company.preisliste') }}*</b></label>
                                            </div>
                                            <div class="col-md-8">
                                                <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#preisliste_de" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">German</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#preisliste_fr" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">French</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#preisliste_en" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">English</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#preisliste_it" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">Italian</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content text-muted">
                                            <div class="tab-pane active" id="preisliste_de" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="preisliste_metadataid_de" name="preisliste_metadataid_de" value="">
                                                            <input type="text" id="preisliste_metatitle_de" name="preisliste_metatitle_de" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="preisliste_metadescription_de" cols="30" rows="2" id="preisliste_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="preisliste_fr" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="preisliste_metadataid_ft" name="preisliste_metadataid_ft" value="">
                                                            <input type="text" id="preisliste_metatitle_ft" name="preisliste_metatitle_ft" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="preisliste_metadescription_ft" cols="30" rows="2" id="preisliste_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="preisliste_en" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="preisliste_metadataid_en" name="preisliste_metadataid_en" value="">
                                                            <input type="text" id="preisliste_metatitle_en" name="preisliste_metatitle_en" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="preisliste_metadescription_en" cols="30" rows="2" id="preisliste_metadescription_en" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="preisliste_it" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="preisliste_metadataid_it" name="preisliste_metadataid_it" value="">
                                                            <input type="text" id="preisliste_metatitle_it" name="preisliste_metatitle_it" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="preisliste_metadescription_it" cols="30" rows="2" id="preisliste_metadescription_it" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-xl-6">
                            <div class="card border border-default">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <div class="d-sm-flex justify-content-between row">
                                            <div class="col-md-4">
                                                <label class="control-label label-company"><b>{{ __('labels.company.team') }}*</b></label>
                                            </div>
                                            <div class="col-md-8">
                                                <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#team_de" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">German</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#team_fr" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">French</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#team_en" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">English</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#team_it" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">Italian</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content text-muted">
                                            <div class="tab-pane active" id="team_de" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="team_metadataid_de" name="team_metadataid_de" value="">
                                                            <input type="text" id="team_metatitle_de" name="team_metatitle_de" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="team_metadescription_de" cols="30" rows="2" id="team_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="team_fr" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="team_metadataid_ft" name="team_metadataid_ft" value="">
                                                            <input type="text" id="team_metatitle_ft" name="team_metatitle_ft" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="team_metadescription_ft" cols="30" rows="2" id="team_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="team_en" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="team_metadataid_en" name="team_metadataid_en" value="">
                                                            <input type="text" id="team_metatitle_en" name="team_metatitle_en" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="team_metadescription_en" cols="30" rows="2" id="team_metadescription_en" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="team_it" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="team_metadataid_it" name="team_metadataid_it" value="">
                                                            <input type="text" id="team_metatitle_it" name="team_metatitle_it" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="team_metadescription_it" cols="30" rows="2" id="team_metadescription_it" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-xl-6">
                            <div class="card border border-default">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <div class="d-sm-flex justify-content-between row">
                                            <div class="col-md-4">
                                                <label class="control-label label-company"><b>{{ __('labels.company.news') }}*</b></label>
                                            </div>
                                            <div class="col-md-8">
                                                <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#news_de" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">German</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#news_fr" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">French</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#news_en" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">English</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#news_it" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">Italian</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content text-muted">
                                            <div class="tab-pane active" id="news_de" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="news_metadataid_de" name="news_metadataid_de" value="">
                                                            <input type="text" id="news_metatitle_de" name="news_metatitle_de" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="news_metadescription_de" cols="30" rows="2" id="news_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="news_fr" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="news_metadataid_ft" name="news_metadataid_ft" value="">
                                                            <input type="text" id="news_metatitle_ft" name="news_metatitle_ft" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="news_metadescription_ft" cols="30" rows="2" id="news_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="news_en" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="news_metadataid_en" name="news_metadataid_en" value="">
                                                            <input type="text" id="news_metatitle_en" name="news_metatitle_en" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="news_metadescription_en" cols="30" rows="2" id="news_metadescription_en" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="news_it" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="news_metadataid_it" name="news_metadataid_it" value="">
                                                            <input type="text" id="news_metatitle_it" name="news_metatitle_it" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="news_metadescription_it" cols="30" rows="2" id="news_metadescription_it" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-xl-6">
                            <div class="card border border-default">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <div class="d-sm-flex justify-content-between row">
                                            <div class="col-md-4">
                                                <label class="control-label label-company"><b>{{ __('labels.company.galerie') }}*</b></label>
                                            </div>
                                            <div class="col-md-8">
                                                <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#galerie_de" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">German</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#galerie_fr" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">French</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#galerie_en" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">English</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#galerie_it" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">Italian</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content text-muted">
                                            <div class="tab-pane active" id="galerie_de" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="galerie_metadataid_de" name="galerie_metadataid_de" value="">
                                                            <input type="text" id="galerie_metatitle_de" name="galerie_metatitle_de" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="galerie_metadescription_de" cols="30" rows="2" id="galerie_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="galerie_fr" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="galerie_metadataid_ft" name="galerie_metadataid_ft" value="">
                                                            <input type="text" id="galerie_metatitle_ft" name="galerie_metatitle_ft" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="galerie_metadescription_ft" cols="30" rows="2" id="galerie_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="galerie_en" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="galerie_metadataid_en" name="galerie_metadataid_en" value="">
                                                            <input type="text" id="galerie_metatitle_en" name="galerie_metatitle_en" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="galerie_metadescription_en" cols="30" rows="2" id="galerie_metadescription_en" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="galerie_it" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="galerie_metadataid_it" name="galerie_metadataid_it" value="">
                                                            <input type="text" id="galerie_metatitle_it" name="galerie_metatitle_it" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="galerie_metadescription_it" cols="30" rows="2" id="galerie_metadescription_it" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-xl-6">
                            <div class="card border border-default">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <div class="d-sm-flex justify-content-between row">
                                            <div class="col-md-4">
                                                <label class="control-label label-company"><b>{{ __('labels.company.rating') }}*</b></label>
                                            </div>
                                            <div class="col-md-8">
                                                <ul class="nav nav-tabs nav-tabs-custom nav-justified row" role="tablist">
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#rating_de" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/de.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">German</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#rating_fr" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/fr.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">French</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#rating_en" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/en.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">English</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-md-6">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#rating_it" role="tab">
                                                            <img src="{{ asset('/assets/images/flags/it.jpg') }}" class="mr-md-2 flag_img float-start" height="15px" />
                                                            <span class="d-none d-sm-block">Italian</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content text-muted">
                                            <div class="tab-pane active" id="rating_de" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="rating_metadataid_de" name="rating_metadataid_de" value="">
                                                            <input type="text" id="rating_metatitle_de" name="rating_metatitle_de" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="rating_metadescription_de" cols="30" rows="2" id="rating_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="rating_fr" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="rating_metadataid_ft" name="rating_metadataid_ft" value="">
                                                            <input type="text" id="rating_metatitle_ft" name="rating_metatitle_ft" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="rating_metadescription_ft" cols="30" rows="2" id="rating_metadescription_fr" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="rating_en" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="rating_metadataid_en" name="rating_metadataid_en" value="">
                                                            <input type="text" id="rating_metatitle_en" name="rating_metatitle_en" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="rating_metadescription_en" cols="30" rows="2" id="rating_metadescription_en" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="rating_it" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="control-label">{{__('labels.company.meta_title')}}</label>
                                                            <input type="hidden" id="rating_metadataid_it" name="rating_metadataid_it" value="">
                                                            <input type="text" id="rating_metatitle_it" name="rating_metatitle_it" class="form-control" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{__('labels.company.meta_description')}}</label>
                                                            <textarea class="form-control" name="rating_metadescription_it" cols="30" rows="2" id="rating_metadescription_it" spellcheck="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
</div> --}}
<!-- End Seo Modal -->

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
