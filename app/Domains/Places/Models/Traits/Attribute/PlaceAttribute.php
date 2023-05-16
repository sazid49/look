<?php

namespace App\Domains\Places\Models\Traits\Attribute;

/**
 * Trait PlaceAttribute.
 */
trait PlaceAttribute
{
    public function setOpeninghoursAttribute($value)
	{
		$this->attributes['opening_hours'] = json_encode($value);
	}

	public function getOpeninghoursAttribute($value)
	{
		return json_decode($value);
	}

	public function getAverageRatingAttribute($value)
	{
		
		if($this->ReviewRating->count() != 0) {
			return number_format($this->ReviewRating->sum('rating')/$this->ReviewRating->count(),2);
		} else {
			return 0;
		}
	}

}