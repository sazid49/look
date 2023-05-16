<?php
namespace App\Domains\Company\Models;

use App\Domains\Company\Models\Traits\Attribute\ReviewsAttribute;
use App\Domains\Company\Models\Traits\Relationship\ReviewsRelationship;
use App\Models\ReviewRating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reviews.
 */
class Reviews extends Model
{
	use ReviewsRelationship,
		ReviewsAttribute,
        SoftDeletes;

	protected $table = "company_reviews";
	// public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'company_id',
        'user_id',
        'firstname',
        'lastname',
        'email',
        'review',
        'image',
        'postcode',
        'city'
    ];


    public function reviewRatting()
    {
        return $this->morphMany(ReviewRating::class,'listable','review_rating','listing_id','listing_type');
    }


}
