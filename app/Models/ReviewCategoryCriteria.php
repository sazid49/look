<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewCategoryCriteria extends Model
{
    use HasFactory;

	protected $table = "review_category_criteria";

	 public function review_criteria()
     {
         return $this->belongsTo(ReviewCriteria::class);
     }


}
