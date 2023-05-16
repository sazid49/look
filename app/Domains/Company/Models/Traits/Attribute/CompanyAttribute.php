<?php

namespace App\Domains\Company\Models\Traits\Attribute;

/**
 * Trait CompanyAttribute.
 */
trait CompanyAttribute
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
//		if($this->ReviewRating->count() != 0) {
//			return number_format($this->ReviewRating->sum('rating')/$this->ReviewRating->count(),2);
//		} else {
//			return 0;
//		}

        $count = $this->ReviewRating->count();
        $sum = $this->ReviewRating->sum('rating');

        return $count > 0 ? round($sum / $count) : 0;

	}
}
