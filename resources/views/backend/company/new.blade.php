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
                    <h4 class="mb-sm-0 font-size-20">@lang(__('labels.company.new_companies'))</h4>
                    <x-utils.link :href="route('admin.company.create')" class="btn btn-primary btn-sm" icon="fa fa-plus" :text="__('Add')" />
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
						$xcrud->table('companies');
                        // Welche Spalten sollen angezeigt werden auf der Hauptliste
                        $xcrud->columns('id,company_name,address,postcode,city,canton,created_at', false);
                        $xcrud->label('company_name', 'Firma');
                        $xcrud->label('firstname', 'Vorname');
                        $xcrud->label('lastname', 'Nachname');
                        $xcrud->label('address', 'Adrese');
                        $xcrud->label('postcode', 'PLZ');
                        $xcrud->label('city', 'Ort');
                        $xcrud->label('canton', 'Kanton');

                        // $xcrud->button('?page=company&id={id}', 'Edit', 'far fa-edit', '', ['target' => '_blank']);
                        $xcrud->order_by('created_at', 'desc');
                        $xcrud->where('active=', '1');
                        $xcrud->where('created_at>', '2023-01-01');
                        /* $xcrud->change_type('publications', 'textarea');*/
                        $xcrud->where("publications NOT LIKE '%aenderungorgane%'");
                        $xcrud->where("publications LIKE '%status.neu%'");

                        // Französischsprechende ausschliessen
                        $xcrud->where("publications NOT LIKE '%Nouvelle%'");
                        $xcrud->where("canton in ('BE','FR','SO')"); 
			
                        
			            // $xcrud->change_type('created_at', 'timestamp');



			            // $xcrud->change_type('kommentar_termin', 'textarea');
                        // $xcrud->change_type('angerufen','select','Non','Choisir,Non,Oui on a parlé,N\'a pas répondu,Le numéro est faux,Le numéro n\'est pas valable,Le numéro était occupé');

                        // Übersetzungen von den Spaltennamen
                        // $xcrud->column_tooltip('sprache','Sprache, welches der Kunde spricht');

                        // Lasse nicht zu, das Zeilen gelöscht werden können
                        $xcrud->unset_remove();
                        // $xcrud->unset_csv();
                        $xcrud->unset_print();
                        $xcrud->unset_edit();

                        // if ($role == 'user_private' or $role == 'user_company') {
                        //     $xcrud->where('inserted_by=', $userId);
                        // }

                        // id 50 = cimistyle
                        // Andere dürfen nicht exportieren, da der Export die gesamte Datenbank exporiteren kann.

                        echo $xcrud->render();

                        // Wenn Termin auf Ja, dann wird es grün
                        //$xcrud->highlight_row('termin','=','Ja','#f7d5d5'); // When aktiv = Nein, wird die Zeile rot
                        // $xcrud->label('kommentare','Comaintere');
                        //$xcrud->change_type('kommentare', 'textarea');
                        //$xcrud->change_type('bereits_angerufen','select','Non','Non,Oui on a parlé,N\'a pas répondu,Le numéro est faux,Le numéro n\'est pas valable,Le numéro était occupé');
                        //$xcrud->change_type('interessiert','radio','Oui','Oui,Non');
                        //$xcrud->columns('datum_eingang,vorname,nachname,ort,telefon,arbeitsort,bereits_angerufen,interessiert,kommentare', false);
                        //$xcrud->highlight_row('interessiert','=','Non','#f7d5d5'); // When aktiv = Nein, wird die Zeile rot
                        // Where bedingung $xcrud->where('aktiv=','Oui');

                    @endphp
                </x-slot>
            </x-backend.card>
        </div>
    </div>
@endsection
