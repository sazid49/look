@extends('frontend.layouts.legacy.panel')

@section('title', __('labels.review.tab_title'))

@section('page-title', __('labels.review.tab_title'))

@section('content')
<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
			<div class="col-md-6">
				<h4 class="mb-sm-0 font-size-20">@lang(__('labels.review.tab_title'))</h4>
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
					$xcrud->table('company_reviews');
					$xcrud->join('company_reviews.company_id', 'companies', 'id');
					// $xcrud->where('deleted_at','=',NULL);
					$xcrud->language(app()->getLocale());
					$xcrud->columns('id,companies.company_name,firstname,lastname,email,city');
					$xcrud->fields('id,companies.company_name,firstname,lastname,email,postcode,city,review');
					$xcrud->label(['id' => 'Id',  'companies.company_name' => __('labels.review.company_name'), 'firstname' => __('labels.review.firstname'), 'lastname' => __('labels.review.lastname'), 'email' => __('labels.review.email'),'city'=>__('labels.review.city')], false);
					$xcrud->button(env('APP_URL') . '/panel/reviews/{id}/show', __('View'), 'fa fa-search', ''); //,array('target'=>'_blank')
					// $xcrud->button(env('APP_URL') . '/panel/reviews/{id}', __('Delete'), 'fa fa-trash', 'btn-danger', array('data-method'=>"delete"));
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
