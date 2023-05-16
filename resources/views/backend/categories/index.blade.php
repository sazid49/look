@extends('backend.layouts.app')

@section('title', __('labels.category.management'))

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-18">{{ __('labels.category.management') }}</h4>                
                </div>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">{{ __('labels.category.management') }}</li>
                    </ol>
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
                        $db = Xcrud_db::get_instance();

                            // $db->query("SELECT max(category_id)+1 FROM `category_company_data`"); // executes query, returns count of affected rows
                            //$db->show_primary_ai_field(false);
                            //$db->result(); // loads results as list of arrays
                            //$db->row(); // loads one result row as associative array

                            $xcrud = \Xcrud::get_instance();
                            $xcrud->table('category_company_data');
                            // $xcrud->join('tags.category_id', 'category', 'id');
                            // $xcrud->where('tags.is_deleted',0);
                            $xcrud->language(app()->getLocale());
                            $xcrud->columns('category_id,value,language,featured,icon', false);//'category.value',
                            $xcrud->fields('category_id,value,language,featured,icon');
                            $xcrud->change_type('language','select','de','de,fr,it,en');
                            // $xcrud->change_type('category_id','select',false,$db->result());
                            $xcrud->label(['id' => 'Id',  'value' => 'value'], false); //'category.value' => 'Category',
                            // $xcrud->button(env('APP_URL') . '/admin/tags/{id}/edit', __('Edit'), 'fa fa-edit', ''); //,array('target'=>'_blank')
                            // $xcrud->button(env('APP_URL') . '/admin/tags/{id}/show', __('Show'), 'fa fa-eye', 'btn-info'); //,array('target'=>'_blank')
                            // $xcrud->button(env('APP_URL') . '/admin/tags/{id}', __('Delete'), 'fa fa-trash', 'btn-danger',array('data-method'=>"delete")); //,array('target'=>'_blank')
                            $xcrud->unset_csv();
                            $xcrud->unset_print();
                            // $xcrud->unset_edit();
                            // $xcrud->unset_add();
                            $xcrud->unset_remove();
                            $xcrud->unset_view();

                            $xcrud->set_logging(true);

                            // $xcrud->change_type('image', 'image', false);
                            $xcrud->change_type('image', 'image', false, array(
                                'width' => 500,
                                'path' => ('../../storage/tags_image')));




                            // $xcrud->unset_edit(true,'username','=','admin'); // 'admin' row can't be editable, for users table
                            // $xcrud->pass_var('created', date('Y-m-d H:i:s'), 'create'); when creating, send the values

                            echo $xcrud->render();





                    @endphp
                </x-slot>
            </x-backend.card>
        </div>
    </div>
@endsection
