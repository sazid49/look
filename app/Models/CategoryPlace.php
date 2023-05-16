<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPlace extends Model
{
	use HasFactory;

	protected $table = "category_place_data";

    public function reviewCriteria()
    {
        return $this->morphToMany(ReviewCriteria::class,'review_criteria','review_category_criteria');
    }

}
