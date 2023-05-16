@extends('frontend.layouts.legacy.panel')

@section('title', __('labels.job_application.detail'))

@section('page-title', __('labels.job_application.detail'))

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-20">@lang(__('labels.job_application.detail'))</h4>
                    <x-utils.link class="card-header-action" :href="route('frontend.panel.job_application.index')" :text="'Back'" />
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
                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tr>
                                    <th>{{ __('labels.job.company_name') }}</th>
                                    <td>{{ $application->company->company_name }}</td>
                                </tr>

								<tr>
                                    <th>{{ __('labels.job.job_title') }}</th>
                                    <td>{{ $application->job->title }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.job.title') }}</th>
                                    <td>{{ $application->title }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.job.firstname') }}</th>
                                    <td>{{ $application->firstname }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.job.lastname') }}</th>
                                    <td>{{ $application->lastname }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.job.email') }}</th>
                                    <td>{{ $application->email }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.job.phone') }}</th>
                                    <td>{{ $application->phone }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.job.postcode') }}</th>
                                    <td>{{ $application->postcode }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.job.city') }}</th>
                                    <td>{{ $application->city }}</td>
                                </tr>

								<tr>
                                    <th>{{ __('labels.job.date_of_birth') }}</th>
                                    <td>{{ $application->date_of_birth }}</td>
                                </tr>

								<tr>
                                    <th>{{ __('labels.job.civil_status') }}</th>
                                    <td>{{ $application->civil_status }}</td>
                                </tr>

                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-hover">
								<tr>
                                    <th>{{ __('labels.job.message') }}</th>
                                    <td>{{ $application->message }}</td>
                                </tr>

								<tr>
                                    <th>{{ __('labels.job.motivation_letter') }}</th>
                                    <td>
										<a href="{{ url('storage/' .$application->motivation_letter) }}" download>{{__('labels.general.download')}}</a>
									</td>
                                </tr>

								<tr>
                                    <th>{{ __('labels.job.cv') }}</th>
                                    <td>
										<a href="{{ url('storage/' .$application->CV) }}" download>{{__('labels.general.download')}}</a>
									</td>
                                </tr>

								<tr>
                                    <th>{{ __('labels.job.certificate_of_employment') }}</th>
                                    <td>
										<a href="{{ url('storage/' .$application->certificate_of_employment) }}" download>{{__('labels.general.download')}}</a>
									</td>
                                </tr>

								<tr>
                                    <th>{{ __('labels.job.diplomas_and_certificates') }}</th>
                                    <td>
										<a href="{{ url('storage/' .$application->diplomas_and_certificates) }}" download>{{__('labels.general.download')}}</a>
									</td>
                                </tr>

                            </table>
                        </div>

                    </div>
                </x-slot>
            </x-backend.card>
        </div>
    </div>
@endsection
