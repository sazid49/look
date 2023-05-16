@extends('frontend.layouts.legacy.panel')

@section('title', __('labels.offers.management'))

@section('page-title', __('labels.offers.management'))

@section('content')
<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
			<div class="col-md-6">
				<h4 class="mb-sm-0 font-size-20">@lang(__('labels.offers.management'))</h4>
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
					$xcrud->table('company_offers');
					$xcrud->join('company_offers.company_id', 'companies', 'id');
					// $xcrud->where('deleted_at','=',NULL);
					$xcrud->language(app()->getLocale());
					$xcrud->columns(['id', 'companies.company_name', 'gen_company_name', 'gen_firstname', 'gen_lastname', 'gen_email', 'gen_phone']);
					$xcrud->label(['id' => 'Id', 'companies.company_name' => __('labels.offer.company_name'), 'gen_company_name' => __('labels.offer.offer_company_name'), 'gen_firstname' => __('labels.offer.firstname'), 'gen_lastname' => __('labels.offer.lastname'), 'gen_email' => __('labels.offer.email'), 'gen_phone'=> __('labels.offer.phone')], false);
					$xcrud->button(env('APP_URL') . '/panel/offers/{id}/show', __('View'), 'fa fa-search', ''); //,array('target'=>'_blank')
					$xcrud->button(env('APP_URL') . '/panel/offers/{id}', __('Delete'), 'fa fa-trash', 'btn-danger',array('data-method'=>"delete"));
					$xcrud->unset_csv();
					$xcrud->unset_print();
					$xcrud->unset_edit();
					$xcrud->unset_add();
					$xcrud->unset_view();
					$xcrud->unset_remove();
					echo $xcrud->render();
				@endphp		
			</x-slot>
		</x-backend.card>
	</div>
</div>
@endsection