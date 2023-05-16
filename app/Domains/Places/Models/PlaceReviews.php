<?php
namespace App\Domains\Places\Models;

use App\Domains\Places\Models\Traits\Attribute\PlaceReviewsAttribute;
use App\Domains\Places\Models\Traits\Relationship\PlaceReviewsRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PlaceReviews.
 */
class PlaceReviews extends Model
{
	use PlaceReviewsRelationship,
		PlaceReviewsAttribute;

	protected $table = "place_review";
	// public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'place_id',
        'user_id',
        'firstname',
        'lastname',
        'email',
        'review',
        'image',
        'postcode',
        'age',
        'start_date_of',
        'until_date',
        'city'
    ];


}
