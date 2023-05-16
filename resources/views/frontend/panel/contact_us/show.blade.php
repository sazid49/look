@extends('frontend.layouts.legacy.panel')

@section('title', __('labels.contact_us.detail'))

@section('page-title', __('labels.contact_us.detail'))

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-20">@lang(__('labels.contact_us.detail'))</h4>
                    <x-utils.link class="card-header-action" :href="route('frontend.panel.contactus.index')" :text="'Back'" />
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12 mt-3">
            <x-backend.card>
                <x-slot name="body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <tr>
                                    <th>{{ __('labels.contact_us.company_name') }}</th>
                                    <td>{{ $contact->company->company_name }}</td>
                                </tr>
                                
                                <tr>
                                    <th>{{ __('labels.contact_us.title') }}</th>
                                    <td>{{ $contact->gen_salutation }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.contact_us.firstname') }}</th>
                                    <td>{{ $contact->gen_firstname }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.contact_us.lastname') }}</th>
                                    <td>{{ $contact->gen_lastname }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.contact_us.email') }}</th>
                                    <td>{{ $contact->gen_email }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.contact_us.phone') }}</th>
                                    <td>{{ $contact->gen_phone }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.contact_us.postcode') }}</th>
                                    <td>{{ $contact->gen_postcode }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.contact_us.city') }}</th>
                                    <td>{{ $contact->gen_city }}</td>
                                </tr>
                                
								<tr>
                                    <th>{{ __('labels.contact_us.message') }}</th>
                                    <td>{{ $contact->message }}</td>
                                </tr>
								
                            </table>
                        </div>

                    </div>
                </x-slot>
            </x-backend.card>
        </div>
    </div>
@endsection
