@extends('frontend.layouts.legacy.panel')

@section('title', __('labels.job_application.management'))

@section('page-title', __('labels.job_application.management'))

@section('content')
<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
			<div class="col-md-6">
				<h4 class="mb-sm-0 font-size-20">@lang(__('labels.job_application.management'))</h4>
			</div>

		</div>
	</div>
</div>
<!-- end page title -->
<div class="row">
	<div class="col-12 mt-3">
		<x-backend.card>

			<x-slot name="body">
				@php
					$xcrud = \Xcrud::get_instance();
					$xcrud->table('applications');
					$xcrud->join('applications.company_id', 'companies', 'id');
					$xcrud->join('applications.job_id', 'company_jobs', 'id');
					// $xcrud->where('deleted_at','=',NULL);
					$xcrud->language(app()->getLocale());
					$xcrud->columns(['id', 'companies.company_name', 'company_jobs.title',  'firstname', 'lastname', 'email', 'phone']);
					$xcrud->label(['id' => 'Id',  'company.company_name' => __('labels.job.company_name'), 'company_jobs.title' => __('labels.job.job_title'), 'firstname' => __('labels.job.firstname'), 'lastname' => __('labels.job.lastname'), 'email' => __('labels.job.email'),'phone'=>__('labels.job.phone')], false);
					$xcrud->button(env('APP_URL') . '/panel/job-application/{id}/show', __('View'), 'fa fa-search', ''); //,array('target'=>'_blank')
					$xcrud->button(env('APP_URL') . '/panel/job-application/{id}', __('Delete'), 'fa fa-trash', 'btn-danger',array('data-method'=>"delete"));
					$xcrud->unset_csv();
					$xcrud->unset_print();
					$xcrud->unset_edit();
					$xcrud->unset_add();
					$xcrud->unset_view();
					$xcrud->unset_remove();
                    $xcrud->where('companies.claimed_by=', Auth()->user()->id);
					echo $xcrud->render();
				@endphp
			</x-slot>
		</x-backend.card>
	</div>
</div>
@endsection
