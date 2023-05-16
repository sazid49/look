<?php

namespace App\Domains\Company\Models\Traits\Relationship;

use App\Domains\Auth\Models\User;
use App\Domains\Company\Models\Company;
use App\Domains\Company\Models\ReviewReply;
use App\Models\ReviewRating;

/**
 * Trait ReviewsRelationship.
 */
trait ReviewsRelationship
{
	public function ReviewRating()
	{
		return $this->hasMany(ReviewRating::class,'review_id');
	}

	public function ReviewReply()
	{
		return $this->hasOne(ReviewReply::class,'review_id');
	}
	
	public function User()
	{
		return $this->hasOne(User::class,'id','user_id');
	}
	
	public function company()
	{
		return $this->hasOne(Company::class,'id','company_id');
	}
	
	

}
