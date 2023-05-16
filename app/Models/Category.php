<?php

namespace App\Models;

use App\Domains\Places\Models\Place;
use App\Domains\Company\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
	use HasFactory;

	protected $table = "category_company_data";


	/**
     * A category has many companies
     * @return HasMany
     */
    public function companies(): HasMany
    {
        return $this->hasMany(Company::class,'category_id','category_id');
    }

	public function reviewcategorycriteria()
    {
        return $this->hasMany(ReviewCategoryCriteria::class,'category_id');
    }

    /**
     * A category has many offer field group
     *
     * @return HasMany
     */
	public function offerfield(): HasMany
    {
        return $this->hasMany(OfferFieldGroup::class,'category_id');
    }

    public function places()
    {
        return $this->hasMany(Place::class,'category_id');
    }

    // public function reviewCriteria()
    // {
    //     return $this->morphToMany(ReviewCriteria::class,'review_category_criterias');
    // }

    public function criteria()
    {
        return $this->morphToMany(ReviewCriteria::class,'category','review_category_criteria','category_id','review_criteria_id','category_id');
    }
}
