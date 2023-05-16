<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class ReviewCriteria extends Model
{
    use HasFactory;

	protected $table = "review_criteria";

	public function allreview()
    {
        return $this->hasMany(ReviewRating::class,'review_criteria_id');
    }

    // public function category()
    // {
    //     return $this->morphToMany(Category::class,'review_category_criterias');
    // }

    /**
     * @return MorphToMany
     */

    public function categories(): MorphToMany
    {
        return $this->morphedByMany(Category::class,'category','review_category_criteria','review_criteria_id','category_id');
    }

    /**
     * A criteria has many rating
     *
     * @return HasMany
     */
    public function ratings(): HasMany
    {
        return $this->hasMany(ReviewRating::class);
    }

}
