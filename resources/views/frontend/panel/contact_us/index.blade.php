@extends('frontend.layouts.legacy.panel')

@section('title', __('labels.contact_us.management'))

@section('page-title', __('labels.contact_us.management'))

@section('content')
<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
			<div class="col-md-6">
				<h4 class="mb-sm-0 font-size-20">@lang(__('labels.contact_us.management'))</h4>
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
					$xcrud->table('company_contacts');
					// join companies table and disable create and deletion from companies
					$xcrud->join('company_id', 'companies', 'id', FALSE, TRUE);
					$xcrud->language(app()->getLocale());
					$xcrud->columns('id,companies.company_name,gen_firstname,gen_lastname,gen_email,gen_phone', false);
					$xcrud->fields('id,companies.company_name,gen_firstname,gen_lastname,gen_postcode,gen_city,gen_email,gen_phone,message,actual_link,created_at');
			
					$xcrud->unset_csv();
					$xcrud->unset_print();
					$xcrud->unset_edit();
					
					$xcrud->unset_remove();

					$xcrud->set_logging(true);

					// $xcrud->label(['id' => 'Id',  'companies.company_name' => __('labels.contact_us.company_name'), 'gen_firstname' => __('labels.contact_us.firstname'), 'gen_lastname' => __('labels.contact_us.lastname'), 'gen_email' => __('labels.contact_us.email'),'gen_phone'=>__('labels.contact_us.phone')], false);
					// $xcrud->button(env('APP_URL') . '/panel/contactus/{id}/show', __('View'), 'fa fa-search', ''); //,array('target'=>'_blank')
					// $xcrud->button(env('APP_URL') . '/panel/contactus/{id}', __('Delete'), 'fa fa-trash', 'btn-danger',array('data-method'=>"delete"));
					$xcrud->unset_add();
					// $xcrud->unset_view();
					// $xcrud->where('deleted_at','=','NULL');
					echo $xcrud->render();

				@endphp		
			</x-slot>
		</x-backend.card>
	</div>
</div>
@endsection