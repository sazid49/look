<?php

namespace App\Domains\Places\Models\Traits\Attribute;

/**
 * Trait ReviewsAttribute.
 */
trait PlaceReviewsAttribute
{
	
	public function getAverageRatingAttribute($value)
	{
		if($this->ReviewRating->count() != 0) {
			return number_format($this->ReviewRating->sum('rating')/$this->ReviewRating->count(),2);
		} else {
			return 0;
		}
	}
}