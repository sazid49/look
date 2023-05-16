@extends('backend.layouts.app')

@section('title', __('labels.company.create_company'))

@push('after-styles')
    <link href="{{ URL::asset('assets/css/plugins/forms/validation/form-validation.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
@endpush

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-18">{{ __('labels.company.create_company') }}</h4>
                    <x-utils.link class="card-header-action" :href="route('admin.company.index')" :text="'Back'" />
                </div>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
							<a href="{{ route('admin.company.index') }}">{{ __('labels.company.company_managements') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('labels.company.create_company') }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <x-forms.post :action="route('admin.company.store')" enctype="multipart/form-data" class="custom-validation" novalidate>
        <!-- Financial Information Start -->
        <x-backend.card>
            <x-slot name="header"><h5>{{ __('Finance') }}</h5></x-slot>
            <x-slot name="body">
                @if (Auth()->user()->roles[0]->name == 'Administrator' || Auth()->user()->roles[0]->name == 'user_private' || Auth()->user()->roles[0]->name == 'user_company')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3 row">
                                <label for="name" class="form-label col-md-4">{{ __('labels.company.counter') }}</label>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="radio" name="payer" id="payer_yes" value="1" {{ old('payer') == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="payer_yes">
                                                {{ __('labels.general.yes') }}
                                            </label>
                                        </div>

                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="radio" name="payer" id="payer_no" value="0" {{ old('payer') == '0' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="payer_no">
                                                {{ __('labels.general.no') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input type="text" name="not_payer_reason" class="form-control" placeholder="{{ __('labels.company.state_reason') }}" value="{{ old('not_payer_reason') }}"/>
                                @error('not_payer_reason')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('labels.company.contract_price') }}</label>
                                <input type="text" name="price_contract" class="form-control" value="{{ old('price_contract') }}"/>
                                @error('price_contract')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('labels.company.current_price') }}</label>
                                <input type="text" name="price_actual" class="form-control" value="{{ old('price_actual') }}"/>
                                @error('price_actual')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                    </div>
                @endif
            </x-slot>
        </x-backend.card>
        <!-- Financial Information End -->

        <!-- Listing Start -->
        <x-backend.card>
            <x-slot name="header"><h5>{{ __('Listing') }}</h5></x-slot>
            <x-slot name="body">
                <span class="text-center text-success listing-alert"></span>
                <div class="row text-center">
                    <div class="col">
                        <label for="name" class="form-label">{{ __('labels.company.listing_active') }}</label>
                        <div class="form-check form-switch text-center">
                            <input name="active_yes" class="form-check-input float-none" type="checkbox" role="switch" id="company_active" value="1" {{ old('active') == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="col">
                        <label for="name" class="form-label">{{ __('labels.company.published') }}</label>
                        <div class="form-check form-switch text-center">
                            <input name="published" class="form-check-input float-none" type="checkbox" role="switch" id="company_publish" value="1" {{ old('published') == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="col">
                        <label for="name" class="form-label">{{ __('labels.company.taken_over') }}</label>
                        <select name="claimed_by" id="claimed_by" class="form-control">
                            <option value="">{{ __('NO') }}</option>
                            @foreach ($allUsers1 as $row)
                                <option value="{{ $row->id }}" {{ old('claimed_by') == $row->id ? 'selected' : '' }}>
                                    {{ $row->id . ' - ' . $row->userdetails->firstname . $row->userdetails->lastname }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="name" class="form-label">{{ __('Show in Frontend') }}</label>
                        <div class="form-check form-switch text-center">
                            <input name="show_frontpage" class="form-check-input float-none" type="checkbox" role="switch" id="company_show_frontpage" value="1" {{ old('show_frontpage') == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="col">
                        <label for="name" class="form-label">{{ __('labels.company.show_tabs') }}</label>
                        <div class="form-check form-switch text-center">
                            <input name="show_tabs" class="form-check-input float-none" type="checkbox" role="switch" id="company_show_tabs" value="1" {{ old('show_tabs') == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-backend.card>
        <!-- Listing End -->

        <!-- Tab Activation Start -->
        <x-backend.card>
            <x-slot name="header"><h5>{{ __('Tab Activation') }}</h5></x-slot>
            <x-slot name="body">
                <div class="row text-center">
                    <div class="col">
                        <label for="offer_tab" class="form-label">{{ __('labels.company.offer') }}</label>
                        <div class="form-check form-switch text-center">
                            <input name="show_interraction" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_interraction" value="1">
                        </div>
                    </div>
                    <div class="col">
                        <label for="show_contactform" class="form-label">{{ __('labels.company.kontaktformular') }}</label>
                        <div class="form-check form-switch text-center">
                            <input name="show_contactform" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_contactform" value="1">
                        </div>
                    </div>
                    <div class="col">
                        <label for="show_pricelist" class="form-label">{{ __('labels.company.pricelist') }}</label>
                        <div class="form-check form-switch text-center">
                            <input name="show_pricelist" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_pricelist" value="1">
                        </div>
                    </div>
                    <div class="col">
                        <label for="show_review" class="form-label">{{ __('labels.company.review') }}</label>
                        <div class="form-check form-switch text-center">
                            <input name="show_review" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_review" value="1">
                        </div>
                    </div>
                    <div class="col">
                        <label for="show_team" class="form-label">{{ __('labels.company.team') }}</label>
                        <div class="form-check form-switch text-center">
                            <input name="show_team" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_team" value="1">
                        </div>
                    </div>
                    <div class="col">
                        <label for="show_news" class="form-label">{{ __('labels.company.news') }}</label>
                        <div class="form-check form-switch text-center">
                            <input name="show_news" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_news" value="1">
                        </div>
                    </div>
                    <div class="col">
                        <label for="show_gallery" class="form-label">{{ __('labels.company.galerie') }}</label>
                        <div class="form-check form-switch text-center">
                            <input name="show_gallery" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_gallery" value="1">
                        </div>
                    </div>
                    <div class="col">
                        <label for="show_jobs" class="form-label">{{ __('labels.company.job') }}</label>
                        <div class="form-check form-switch text-center">
                            <input name="show_jobs" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_jobs" value="1">
                        </div>
                    </div>
                    <div class="col">
                        <label for="show_register" class="form-label">{{ __('labels.company.register') }}</label>
                        <div class="form-check form-switch text-center">
                            <input name="show_jobs" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_register" value="1">
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-backend.card>
        <!-- Tab Activation End -->

        <x-backend.card>
            <x-slot name="body">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#informationen" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.informationen') }}</span>
                        </a>
                    </li>
					<li class="nav-item">
						<a class="nav-link disabled" href="javascript:void(0)" role="tab" aria-disabled="true">
							<span class="d-block d-sm-none"><i class="far fa-user"></i></span>
							<span class="d-none d-sm-block">{{ __('labels.company.register') }}</span>
						</a>
					</li>
                    <li class="nav-item">
                        <a class="nav-link disabled" data-bs-toggle="tab" href="#interraktion" role="tab"
                            aria-disabled="true">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.interraktion') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" data-bs-toggle="tab" href="#bewertung" role="tab" aria-disabled="true">
                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.bewertung') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" data-bs-toggle="tab" href="#kontaktformular" role="tab"
                            aria-disabled="true">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.kontaktformular') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" data-bs-toggle="tab" href="#empfehlungen" role="tab"
                            aria-disabled="true">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.empfehlungen') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" data-bs-toggle="tab" href="#preisliste" role="tab"
                            aria-disabled="true">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.preisliste') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" data-bs-toggle="tab" href="#team" role="tab" aria-disabled="true">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.team') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" data-bs-toggle="tab" href="#news" role="tab" aria-disabled="true">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.news') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" data-bs-toggle="tab" href="#galerie" role="tab" aria-disabled="true">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.galerie') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" data-bs-toggle="tab" href="#bewerbung" role="tab"
                            aria-disabled="true">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.bewerbung') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" data-bs-toggle="tab" href="#seo" role="tab" aria-disabled="true">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.seo') }}</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="informationen" role="tabpanel">
                        <section>
                            <!-- Generale Information -->
                            <div class="card card-body pb-0">
                                <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                    {{ __('labels.company.general_information') }}</h4>
                                <div class="row">

                                    <div class="col-md-3 form-group mb-3">
                                        <label class="control-label">{{ __('labels.company.logo') }}</label>
                                        <div class="slim"
                                             data-meta-name="logo"
                                             data-ratio="1:1"
                                             data-size="150,150"
                                             data-max-file-size="2">
                                            <input type="file" name="slim[]"/>
                                        </div>
                                        <input type="hidden" name="company_logo_deleted">
                                    </div>
                                    <div class="col-md-3 form-group mb-3">
                                        <label class="control-label">{{ __('labels.company.thumbnail') }}</label>
                                        <div class="slim"
                                             data-meta-name="thumbnail"
                                             data-ratio="1:1"
                                             data-force-size="260,200"
                                             data-max-file-size="2">
                                            <input type="file" name="slim[]"/>
                                        </div>
                                    </div>

                                    <!-- Company Name / Firmenname -->
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <div class="d-sm-flex justify-content-between row">
                                                <div class="col-md-12">
                                                    <label class="control-label label-company">{{ __('labels.company.company_name') }}<span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-12">
													<input type="text" id="company_name_german" name="company_name" class="form-control" value="{{old('company_name')}}" required>
@error('company_name') <small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label">{{ __('labels.company.kategorie') }}<span class="text-danger">*</span>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top" title="{{ __('labels.company.kategorie') }}"></i>
                                            </label>

                                            <select id="category_id" name="category_id"
                                                class="form-control form-control-chosen">
                                                <option value="">{{ __('labels.general.choose') }}</option>
                                                @foreach ($category as $select)
                                                    <option value="{{$select->id}}" {{ (old('category_id')==$select['id']) ? "selected" : "" }}>
                                                        <?php echo "{$select->id} - {$select->value}"; ?>
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id') <small class="text-danger">{{ $message }}</small>@enderror
                                        </div>
                                    </div>

                                    @if($role != 'user_private' && $role != 'user_company')
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label">
                                                {{ __('labels.company.leiter') }}
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('labels.company.leiter') }}">
                                                </i>
                                            </label>
                                            <select id="team_leader" name="team_leader"
                                                class="form-control form-control-chosen">
                                                <option value="">{{ __('labels.general.choose') }}</option>
                                                @if ($allUsers1)
                                                    {{-- user_role 1 = user_private --}}
                                                    {{-- user_role 2 = user_company --}}
                                                    @foreach ($allUsers1 as $row)
                                                        <option value="{{ $row->id }}" {{ (old('team_leader')== $row->id) ? "selected" : "" }}>
                                                            {{ $row->id . ' - ' . $row->userdetails->firstname . $row->userdetails->lastname }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label">
                                                {{ __('labels.company.agent') . '/' . __('labels.company.aussendienst') }}
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('labels.company.agent') . '/' . __('labels.company.aussendienst') }}">
                                                </i>
                                            </label>
                                            <select id="agent" name="agent" class="form-control form-control-chosen">
                                                <option value="">{{ __('labels.general.choose') }}</option>
                                                @if ($allUsers1)
                                                    {{-- user_role 1 = user_private --}}
                                                    {{-- user_role 2 = user_company --}}
                                                    @foreach ($allUsers1 as $row)
                                                        <option value="{{ $row->id }}" {{ (old('agent')== $row->id) ? "selected" : "" }}>
                                                            {{ $row->id . ' - ' . $row->userdetails->firstname . $row->userdetails->lastname }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label">{{ __('labels.company.administration') }}
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top" title="{{ __('labels.company.administration') }}">
                                                </i>
                                            </label>
                                            <select id="assigned_to" name="assigned_to"
                                                class="form-control form-control-chosen">
                                                <option value="">{{ __('labels.general.choose') }}</option>
                                                @if ($allUsers1)
                                                    {{-- user_role 1 = user_private --}}
                                                    {{-- user_role 2 = user_company --}}
                                                    @foreach ($allUsers1 as $row)
                                                        <option value="{{ $row->id }}" {{ (old('assigned_to') == $row->id) ? "selected" : "" }}>
                                                            {{ $row->id . ' - ' . $row->userdetails->firstname . $row->userdetails->lastname }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    <!-- Contact Person Firstname  -->
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.company.firstname'); ?><span class="text-danger">*</span>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="Kontaktperson"></i></label>
                                            <input type="text" id="firstname" name="firstname" class="form-control" value="{{old('firstname')}}" required>
                                            @error('firstname')<small class="text-danger">{{ $message }}</small>@enderror
                                        </div>
                                    </div>
                                    <!-- Contact Person Lastname  -->
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label"><?php echo __('labels.company.lastname'); ?>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="Kontaktperson"></i></label>
                                            <input type="text" id="lastname" name="lastname" class="form-control" value="{{old('lastname')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group mb-3">
                                        <label class="control-label">{{ __('labels.company.canton') }}<span class="text-danger">*</span>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('labels.company.canton') }}">
                                                </i>
                                            </label>

                                            <select id="canton" name="canton"
                                                class="form-control form-control-chosen">
                                                <option value=""><?php echo __('labels.general.choose'); ?></option>
                                                @foreach ($cantonData as $select)
                                                    <option value="{{$select->name}}" {{ (old('canton')==$select['name']) ? "selected" : "" }}>
                                                        <?php echo "{$select->id} - {$select->value}"; ?>
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Basic contact_information -->
                                <div class="row justify-content-between">
                                    <!-- Address / Adresse -->
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label class="control-label">{{ __('labels.company.address') }}</label>
                                            <input type="text" id="address" name="address" class="form-control" value="{{old('address')}}">
                                        </div>
                                    </div>
                                    <!-- Postcode / PLZ -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label">{{ __('labels.company.postcode') }}</label>
                                            <input type="number" id="postcode" name="postcode" class="form-control"
                                                value="{{old('postcode')}}">
                                        </div>
                                    </div>
                                    <!-- City / Ort -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label">{{ __('labels.company.city') }}</label>
                                            <input type="text" id="city" name="city" class="form-control" value="{{old('city')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label">{{ __('labels.company.longitude') }}</label>
                                            <input type="text" id="longitude" name="longitude" class="form-control" value="{{old('longitude')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label">{{ __('labels.company.latitude') }}</label>
                                            <input type="text" id="latitude" name="latitude" class="form-control" value="{{old('latitude')}}">
                                        </div>
                                    </div>
                                    <!-- Email Address -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label">{{ __('labels.company.email') }}<span class="text-danger">*</span></label>
                                            <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" required>
                                            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                                        </div>
                                    </div>
                                    <!-- Phone 1 -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label">{{ __('labels.company.phone_1') }}<span class="text-danger">*</span>
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="Diese Nummer wird auf der Seite angezeigt"></i></label>
                                            <input type="text" id="phone_1" name="phone_1" class="form-control" value="{{old('phone_1')}}" required>
                                            @error('phone_1')<small class="text-danger">{{ $message }}</small>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="phone_2" class="control-label">{{ __('labels.company.phone_2') }}
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('labels.company.phone_2') }}"></i></label>
                                            <input type="text" id="phone_2" name="phone_2" class="form-control" value="{{old('phone_2')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="phone_3" class="control-label">{{ __('labels.company.phone_3') }}
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('labels.company.phone_3') }}"></i></label>
                                            <input type="text" id="phone_3" name="phone_3" class="form-control" value="{{old('phone_3')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="mobile" class="control-label">{{ __('labels.company.mobile') }}
                                                <i class="tip ml-1" data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('labels.company.mobile') }}"></i></label>
                                            <input type="text" id="mobile" name="mobile" class="form-control" value="{{old('mobile')}}">
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="mobile" class="control-label">{{ __('labels.company.keyword') }}</label>
											<br>
											<input type="text" name="keywords" id="keywords" class="form-control" style="width: 100% !important" value="{{old('keywords')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- general information card end -->
                        </section>
                    </div>
                </div>

            </x-slot>

        </x-backend.card>

        <x-backend.card>
            <x-slot name="body">
                <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.opening_hours') }}</h4>
                <div class="row">
                    <div class="col-md-12">
                        @for($i=0;$i<7;$i++)
                            @php
                                $day = strtolower(jddayofweek($i,1));
                                $time = $company->opening_hours->$day ?? null;
                            @endphp
                            <div class="row open_hours_row">
                                <div class="col-md-6">
                                    <div class="row time_selector_switch_group">
                                        <div class="col-md-4 col-auto switch-col">
                                            <label class="control-label">{{ jddayofweek($i,1) }}</label>
                                            <div class="">
                                                <div class="form-check form-switch form-switch-lg mb-3 switch open_close" dir="ltr">
                                                    <input class="form-check-input asp_open" type="checkbox" id="dow-is_open-{{$day}}" name="dow-is_open-{{$day}}" {{ (!empty($time->morning_from) && !empty($time->morning_to)) ? 'checked' : '' }}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-xl-8 col-sm-12 time_selector_group time_selector_group_morning ">
                                            <label class="control-label">{{ __('Morning') }}</label>
                                            <div class="form-row row">
                                                <div class="col-6 col-md-12 col-xs-6 col-xl-6 time_selector_morning_open form-group">
                                                    <select name="opening_hours[{{$day}}][morning_from]" class="form-select form-select-sm" {{ (!empty($time->morning_from) && !empty($time->morning_to)) ? 'checked' : 'disabled' }}>
                                                        @foreach($timeIntervals as $timeVal)
                                                            <option value="{{ $timeVal }}" {{ ($time->morning_from ?? '') == $timeVal ? 'selected' : '' }}>{{ $timeVal }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-6 col-md-12 col-xs-6 col-xl-6 time_selector_morning_close form-group">
                                                    <select name="opening_hours[{{$day}}][morning_to]" class="form-select form-select-sm" {{ (!empty($time->morning_from) && !empty($time->morning_to)) ? 'checked' : 'disabled' }}>
                                                        @foreach($timeIntervals as $timeVal)
                                                            <option value="{{ $timeVal }}" {{ ($time->morning_to ?? '') == $timeVal ? 'selected' : '' }}>{{ $timeVal }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row time_selector_switch_group ">
                                        <div class="col-md-4 col-auto switch-col">
                                            <label class="control-label">{{ __('Split Hours') }}</label>
                                            <div class="form-check form-switch form-switch-lg mb-3 switch split_hours"
                                                 dir="ltr">
                                                <input class="form-check-input success" type="checkbox" id="dow-is_extended-{{$day}}" name="dow-is_extended-{{$day}}" {{ (!empty($time->afternoon_from) && !empty($time->afternoon_to)) ? 'checked' : 'disabled' }}>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-xl-8 col-sm-12 time_selector_group time_selector_group_afternoon" >
                                            <label class="control-label">{{ __('Afternoon') }}</label>
                                            <div class="form-row row">
                                                <div class="col-6 col-md-12 col-xs-6 col-xl-6 time_selector_afternoon_open form-group">
                                                    <select name="opening_hours[{{$day}}][afternoon_from]" class="form-select form-select-sm" {{ (!empty($time->afternoon_from) && !empty($time->afternoon_to)) ? 'checked' : 'disabled' }}>
                                                        @foreach($timeIntervals as $timeVal)
                                                            <option value="{{ $timeVal }}" {{ ($time->afternoon_from ?? '') == $timeVal ? 'selected' : '' }}>{{ $timeVal }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div
                                                    class="col-6 col-md-12 col-xs-6 col-xl-6 time_selector_afternoon_close form-group">
                                                    <select name="opening_hours[{{$day}}][afternoon_to]" class="form-select form-select-sm" {{ (!empty($time->afternoon_from) && !empty($time->afternoon_to)) ? 'checked' : 'disabled' }}>
                                                        @foreach($timeIntervals as $timeVal)
                                                            <option value="{{ $timeVal }}" {{ ($time->afternoon_to ?? '') == $timeVal ? 'selected' : '' }}>{{ $timeVal }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class=" border-bottom form-group"></div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </x-slot>
        </x-backend.card>

        <x-backend.card>
            <x-slot name="body">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                            {{ __('labels.company.andere_informationen') }}
                        </h4>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('labels.company.website') }}</label>
                            <input type="text" name="website" class="form-control"
                                placeholder="{{ __('labels.company.website') }}" value="{{ old('website') }}" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('labels.company.founding_year') }}</label>
                            <input type="text" name="founding_year" class="form-control"
                                placeholder="{{ __('labels.company.founding_year') }}"
                                value="{{ old('founding_year') }}"  />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('labels.company.facebook') }}</label>
                            <input type="text" name="facebook" class="form-control"
                                placeholder="{{ __('labels.company.facebook') }}" value="{{ old('facebook') }}" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('labels.company.youtube') }}</label>
                            <input type="text" name="youtube" class="form-control"
                                placeholder="{{ __('labels.company.youtube') }}" value="{{ old('youtube') }}" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('labels.company.youtube_video') }}</label>
                            <input type="text" name="youtube_video" class="form-control"
                                placeholder="{{ __('labels.company.youtube_video') }}" value="{{ old('youtube_video') }}" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('labels.company.twitter') }}</label>
                            <input type="text" name="twitter" class="form-control"
                                placeholder="{{ __('labels.company.twitter') }}" value="{{ old('twitter') }}"  />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('labels.company.instagram') }}</label>
                            <input type="text" name="instagram" class="form-control"
                                placeholder="{{ __('labels.company.instagram') }}" value="{{ old('instagram') }}" />
                        </div>
                    </div>
					<div class="col-lg-4">
						<div class="mb-3">
							<label for="name" class="form-label">{{ __('labels.company.tiktok') }}</label>
							<input type="text" name="tiktok" class="form-control" placeholder="{{ __('labels.company.tiktok') }}" value="{{ old('tiktok') }}"/>
						</div>
					</div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="show_watermark" class="form-label">{{ __('labels.company.watermark') }}</label>
                            <select name="show_watermark" id="show_watermark" class="form-control">
                                <option value="0">{{ __('labels.general.no') }}</option>
                                <option value="1" selected>{{ __('labels.general.yes') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="form-group mb-3">
                            <div class="d-sm-flex justify-content-between row">
                                <div class="col-md-4">
                                    <label
                                        class="control-label label-company"><b>{{ __('labels.company.listing_text') }}</b></label>
                                </div>
                                <div class="col-md-8">
                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#listing_text_de"
                                                role="tab">
                                                <img src="{{ asset('/assets/images/flags/de.jpg') }}"
                                                    class="mr-md-2 flag_img" height="15px" />
                                                <span class="d-none d-sm-block">German</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#listing_text_fr"
                                                role="tab">
                                                <img src="{{ asset('/assets/images/flags/fr.jpg') }}"
                                                    class="mr-md-2 flag_img" height="15px" />
                                                <span class="d-none d-sm-block">French</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#listing_text_en"
                                                role="tab">
                                                <img src="{{ asset('/assets/images/flags/en.jpg') }}"
                                                    class="mr-md-2 flag_img" height="15px" />
                                                <span class="d-none d-sm-block">English</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#listing_text_it"
                                                role="tab">
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
                                    <textarea id="description_de" name="description_de">{{old('description_de')}}</textarea>
                                </div>
                                <div class="tab-pane" id="listing_text_fr" role="tabpanel">
                                    <textarea id="description_fr" name="description_fr">{{old('description_fr')}}</textarea>
                                </div>
                                <div class="tab-pane" id="listing_text_en" role="tabpanel">
                                    <textarea id="description_en" name="description_en">{{old('description_en')}}</textarea>
                                </div>
                                <div class="tab-pane" id="listing_text_it" role="tabpanel">
                                    <textarea id="description_it" name="description_it">{{old('description_it')}}</textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                @if($role != 'user_private' && $role != 'user_company' )
                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">{{ __('labels.company.notes') }}</label>
                            <textarea name="notes" id="notes" class="form-control" rows="10">{{old('notes')}}</textarea>
                        </div>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label"><strong>{{ __('labels.company.tags') }}</strong></label>
							<div class="row">
								@foreach ($tags as $item)
									<label class="col-md-2" for="{{'tags_'.$item->id}}">
										<input type="checkbox" name="tags[]" id="{{'tags_'.$item->id}}" value="{{$item->id}}" {{(old('tags') && in_array($item->id,old('tags'))) ? "checked" : ""}}> {{$item->value}}
									</label>
								@endforeach
							</div>
                        </div>
                    </div>
                </div>
            </x-slot>

			<x-slot name="footer">
				<button class="btn btn-sm btn-primary float-right" type="submit">{{__('labels.general.buttons.save')}}</button>
			</x-slot>
        </x-backend.card>

    </x-forms.post>
@endsection
@push('after-scripts')
    <script src="{{ URL::asset('assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ URL::asset('assets/js/scripts/forms/validation/form-validation.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--tinymce js-->
    <script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/bootstrap-tagsinput.min.js') }}"></script>

    <script>
        $("input[name='claimed']").change(function () {
				if($("input[name='claimed']:checked").val() == 1) {
					$(".claimed_by").removeClass('d-none');
				} else {
					$(".claimed_by").addClass('d-none');
					$("#claimed_by").val('');
				}
			});
        $(document).ready(function() {
			$("#keywords").tagsinput({
				maxTags: 3
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

            $('#slug').on('keypress', function(e) {
                if (e.which == 32){
                    console.log('Space Detected');
                    return false;
                }
            });
        });
    </script>
<script>
    //@ sourceURL=listings/listing/company/openHours.js
    $(function(){
        function conditionNotMatch(e,m){
            isValid = false;
            let miac = 'bounceInUp';
            e.addClass('input-error');
            e.after('<span class="errors animated '+ miac +'">' + m + ' </span>');
        }

        function conditionMatch(e){
            e.removeClass('input-error');
            e.parent().find('.errors').remove();
        }


        $('.open_hours_row').each(function() {
            let container = this;

            $(container).find('.switch.open_close input').each(function() {

                $(this).on('change', function(event) {

                    if($(this).is(':checked')){
                        $(container).find('.time_selector_group_morning select').each(function() {
                            $(this).removeAttr('disabled');
                            $(container).find('.split_hours input').removeAttr('disabled');
                        });
                    }else{
                        $(container).find('.time_selector_group_morning select').each(function() {
                            $(this).attr('disabled', true);
                        })
                        $(container).find('.split_hours input').prop('checked',false).prop('disabled','disabled');
                        $(container).find('.time_selector_group_afternoon select').prop('disabled','disabled')
                    }

                });
            });

            $(container).find('.switch.split_hours input').each(function() {
                $(this).on('change', function(event) {
                    if($(this).is(':checked')){
                        $(container).find('.time_selector_group_afternoon select').removeAttr('disabled');
                    }else{
                        $(container).find('.time_selector_group_afternoon select').prop('disabled','disabled')
                    }
                    //$(container).find('.time_selector_group_afternoon').toggle();
                    //conditionMatch($(container).find('.time_selector_group_afternoon'));
                });
            });

            // $(container).find('.time_selector_group_afternoon').find('select').each(function() {
            //     $(this).on('change', function(event) {
            //         conditionMatch($(container).find('.time_selector_group_afternoon'));
            //     });
            // })
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
