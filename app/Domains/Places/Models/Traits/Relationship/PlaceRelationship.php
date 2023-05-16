<?php

namespace App\Domains\Places\Models\Traits\Relationship;

use App\Domains\Places\Models\PlaceGallery;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Domains\Places\Models\PlaceReviews;
use App\Models\ReviewRating;

/**
 * Trait PlaceRelationship.
 */
trait PlaceRelationship
{

    public function gallery()
	{
		return $this->hasMany(PlaceGallery::class,'place_id')->orderBy('id','ASC');
	}

	public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // public function companytags()
    // {
    //     return $this->hasMany(CompanyTags::class,'company_id');
    // }

    public function PlaceReview()
    {
        return $this->hasMany(PlaceReviews::class,'place_id');
    }

    public function ReviewRating()
    {
        return $this->hasMany(ReviewRating::class,'listing_id');
    }

    public function gallery_show()
    {
        return $this->hasMany(PlaceGallery::class,'place_id')->where('show_on_frontside',1);
    }

}
