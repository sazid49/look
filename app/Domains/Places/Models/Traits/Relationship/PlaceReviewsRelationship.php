<?php

namespace App\Domains\Places\Models\Traits\Relationship;

use App\Domains\Auth\Models\User;
use App\Domains\Places\Models\Place;
use App\Domains\Places\Models\PlaceReviewReply;
use App\Models\ReviewRating;

/**
 * Trait PlaceReviewsRelationship.
 */
trait PlaceReviewsRelationship
{
	public function ReviewRating()
	{
		return $this->hasMany(ReviewRating::class,'review_id');
	}

	public function ReviewReply()
	{
		return $this->hasOne(PlaceReviewReply::class,'review_id');
	}
	
	public function User()
	{
		return $this->hasOne(User::class,'id','user_id');
	}
	
	public function place()
	{
		return $this->hasOne(Place::class,'id','place_id');
	}
	
	

}
