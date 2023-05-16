@extends('backend.layouts.app')

@section('title', __('labels.offer_field.management'))

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <h4 class="mb-sm-0 font-size-18">{{ __('labels.offer_field.management') }}</h4>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.offer_field.create')" :text="__('labels.offer_field.create_field')" />
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">{{ __('labels.offer_field.management') }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12 mt-3">
            <x-backend.card>
                {{-- <x-slot name="body">
				<livewire:backend.offerfield-table />
			</x-slot> --}}
                <x-slot name="body">
                    @php
                        $xcrud = \Xcrud::get_instance();
                        $xcrud->table('offer_field_groups');
                        $xcrud->join('offer_field_groups.category_id', 'category_company_data', 'id');
                        //$xcrud->join('offer_fields.group_id', 'offer_fields', 'id');
			            //$xcrud->where('offer_fields.is_deleted',0);
                        $xcrud->language(app()->getLocale());
			            //$xcrud->column_callback('option','unserialize_option_field');
                        $xcrud->columns(['id','category_company_data.value', 'type', 'is_required']);
                        $xcrud->label(['id' => 'Id','category_company_data.value' => 'Category','type' => 'Type', 'is_required' => 'Is Required', 'option' => 'Options'], false);
                        $xcrud->button(env('APP_URL') . '/admin/offer-field/{id}/edit', __('Edit'), 'fa fa-edit', ''); //,array('target'=>'_blank')
                        $xcrud->button(env('APP_URL') . '/admin/offer-field/{id}', __('Delete'), 'fa fa-trash', 'btn-danger',array('data-method'=>"delete")); //,array('target'=>'_blank')
                        $xcrud->unset_csv();
                        $xcrud->unset_print();
                        $xcrud->unset_edit();
                        $xcrud->unset_add();
                        $xcrud->unset_remove();
                        echo $xcrud->render();


                    @endphp
                </x-slot>
            </x-backend.card>
        </div>
    </div>
@endsection
