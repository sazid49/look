<?php


namespace App\Repositories;


use App\Brand;

use App\Color;
use App\Models\Category;
use App\Offer;
use App\Type;
use Illuminate\Support\Collection;

class FacetedRepository
{
    /**
     * Return a collection of Category Name from storage
     * @return Collection
     */
    public function categories(): Collection
    {
        return Category::all()->sortBy('value')->take(5)->pluck('value','id');
    }

    /**
     * Return a collection of Type Name from storage
     * @return Collection
     */
    public function types(): Collection
    {
        return Type::all()->sortBy('name')->take(5)->pluck('name','id');
    }

    /**
     * Return a collection of Brand Name from storage
     * @return Collection
     */
    public function brands(): Collection
    {
        return Brand::all()->sortBy('name')->take(5)->pluck('name','id');
    }

    /**
     * Return a collection of Color name from storage
     * @return Collection
     */
    public function colors(): Collection
    {
        return Color::all()->sortBy('name')->take(5)->pluck('name','id');
    }

    /**
     * Return a collection of Offers from storage
     * @return Collection
     */
    public function offers(): Collection
    {
        return Offer::all()->sortBy('name')->take(5)->pluck('name','id');
    }

    /**
     * Options for sort the search result
     * @return array
     */
    public function sorting(): array
    {
        return [
            // 'brand_id' => 'Brand',
            'category_id' => 'Category',
            'company_name' => 'Company Name',
            // 'type_id' => 'Type',
            // 'color_id' => 'Color',
            // 'price' => 'Price'
        ];
    }

    public function placesorting(): array
    {
        return [
            // 'brand_id' => 'Brand',
            'category_id' => 'Category',
            'place_name' => 'Place Name',
            // 'type_id' => 'Type',
            // 'color_id' => 'Color',
            // 'price' => 'Price'
        ];
    }

    /**
     * Options for sort the search result by direction
     * @return array
     */
    public function direction(): array
    {
        return [
            'asc' => 'Ascending',
            'desc' => 'Descending'
        ];
    }
}
