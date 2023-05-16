@extends('backend.layouts.app')

@section('title', __('labels.company.company_managements'))

@section('page-title', __('labels.company.company_managements'))
{{-- @section('page-sub-title', __('All unapproved inquiries list.')) --}}

@section('content')
<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
			<div class="col-md-6">
				<h4 class="mb-sm-0 font-size-20">@lang(__('labels.place.place_managements'))</h4>
				<x-utils.link :href="route('admin.places.create')" class="btn btn-primary btn-sm" icon="fa fa-plus" :text="__('Add')" />
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
					$xcrud->table('places');
					$xcrud->language(app()->getLocale());
					$xcrud->columns('id,place_name,description_de,country,meta_title_de,meta_description_de', false);
            		$xcrud->button(env('APP_URL').'/admin/places/{id}/information',__('Edit'),'fa fa-edit','');//,array('target'=>'_blank')
					$xcrud->unset_csv();
					$xcrud->unset_print();
					$xcrud->unset_edit();
					$xcrud->unset_add();
					// if($role == 'user_private' OR $role == 'user_company') {
						// $xcrud->where('inserted_by=', $userId);
					// }
					echo $xcrud->render();
				@endphp
			</x-slot>
		</x-backend.card>
	</div>
</div>
@endsection
