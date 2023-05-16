<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Company\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CompanyTable extends DataTableComponent
{

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $query =  Company::query();
        return $query;
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make("ID",'id')
                ->searchable()
                ->sortable(),
            Column::make("Company Name",'company_name')
                ->searchable()
                ->sortable(),
            Column::make("Postcode",'postcode')
                ->searchable()
                ->sortable(),
			Column::make("City",'city')
                ->searchable()
                ->sortable(),
			Column::make("Phone 1",'phone_1')
                ->searchable()
                ->sortable(),
			Column::make("Mobile",'mobile')
                ->searchable()
                ->sortable(),
			Column::make("Active",'active')
                ->searchable()
                ->sortable(),

            Column::make(__('Actions'))
                ->format(function($value, $column, $row){
                    return view('backend.company.includes.actions', ['row' => $row]);
                })
        ];
    }

}
