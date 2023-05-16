<?php

namespace App\Http\Livewire\Backend;

use App\Models\OfferField;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class OfferfieldTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $query =  OfferField::query();
        return $query;
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('labels.offer_field.label'),'label')
                ->searchable()
                ->sortable(),
            Column::make(__('labels.offer_field.category'),'category')
                ->searchable()
                ->sortable(),
            Column::make(__('labels.offer_field.type'),'type')
                ->searchable()
                ->sortable(),
            Column::make(__('labels.offer_field.require'),'is_required')
                ->searchable()
                ->sortable(),
            Column::make(__('labels.offer_field.option'),'option')
                ->searchable()
                ->sortable(),
            // Column::make("Company Name",'company_name')
            //     ->searchable()
            //     ->sortable(),
            // Column::make("Postcode",'postcode')
            //     ->searchable()
            //     ->sortable(),
			// Column::make("City",'city')
            //     ->searchable()
            //     ->sortable(),
			// Column::make("Phone 1",'phone_1')
            //     ->searchable()
            //     ->sortable(),
			// Column::make("Mobile",'mobile')
            //     ->searchable()
            //     ->sortable(),
			// Column::make("Active",'active')
            //     ->searchable()
            //     ->sortable(),

            // Column::make(__('Actions'))
            //     ->format(function($value, $column, $row){
            //         return view('backend.company.includes.actions', ['row' => $row]);
            //     })
        ];
    }
}
