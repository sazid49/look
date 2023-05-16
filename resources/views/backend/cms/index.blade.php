@extends('backend.layouts.app')

@section('title', __('labels.cms.management'))

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-18">{{ __('labels.cms.management') }}</h4>
                    <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.cms.create')" :text="__('labels.cms.create_cms')" />
                </div>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">{{ __('labels.cms.management') }}</li>
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
                        $xcrud->table('cms');
                        $xcrud->language(app()->getLocale());
                        $xcrud->columns(['id', 'title','slug','content']);
                        $xcrud->label(['id' => 'Id', 'title' => 'Title','slug' => 'Slug','content'=>'Description'], false);
                        $xcrud->button(env('APP_URL') . '/admin/cms/{id}/edit', __('Edit'), 'fa fa-edit', ''); //,array('target'=>'_blank')
                        $xcrud->button(env('APP_URL') . '/admin/cms/{id}/show', __('Show'), 'fa fa-eye', 'btn-info'); //,array('target'=>'_blank')
                        $xcrud->button(env('APP_URL') . '/admin/cms/{id}', __('Delete'), 'fa fa-trash', 'btn-danger',array('data-method'=>"delete")); //,array('target'=>'_blank')
                        $xcrud->unset_csv();
                        $xcrud->unset_print();
                        $xcrud->unset_edit();
                        $xcrud->unset_add();
                        $xcrud->unset_remove();
                        $xcrud->unset_view();
                        echo $xcrud->render();
                    @endphp
                </x-slot>
            </x-backend.card>
        </div>
    </div>
@endsection
