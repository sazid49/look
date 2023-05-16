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
				<h4 class="mb-sm-0 font-size-20">@lang(__('labels.company.company_managements'))</h4>
				<x-utils.link :href="route('admin.company.create')" class="btn btn-primary btn-sm" icon="fa fa-plus" :text="__('Add')" />
			</div>

		</div>
	</div>
</div>
<!-- end page title -->

<div class="row">
	<div class="col-12 mt-3">
	<b>Active</b>: wenn eine Firma aktiv (am leben) ist und nicht konkurs gegangen ist. Wenn es konkurs geht (nicht existiert), dann ist sie nicht mehr aktiv.
	<br><b>Published</b>: ob der Eintrag online soll sein oder nicht. Wenn Published = Nein, dann kann man nicht mehr auf das Listing zugreifen.
	</div>
	<div class="col-12 mt-3">
		<x-backend.card>

			<x-slot name="body"> 
				@php
					$xcrud = \Xcrud::get_instance();
					$xcrud->table('companies');
					$xcrud->language(app()->getLocale());
					$xcrud->columns('id,company_name,postcode,city,phone_1,phone_2,mobile,active,notes', false);
					$xcrud->fields_inline('phone_1');
					$xcrud->fields_inline('phone_2');
					$xcrud->fields_inline('mobile');
					$xcrud->fields_inline('active');
					$xcrud->highlight_row('active','=','0','#FFE6E6');
					$xcrud->fields_inline('notes');
					$xcrud->no_editor('notes');
            		$xcrud->button(env('APP_URL').'/admin/company/{id}/information',__('Edit'),'fa fa-edit','');//,array('target'=>'_blank')
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
