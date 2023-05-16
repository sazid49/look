<?php
namespace App\Domains\Places\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Places\Models\PlaceReviews;

/**
 * Class ReviewReply.
 */
class PlaceReviewReply extends Model
{
	// use ReviewsRelationship,
		// ReviewsAttribute;

	protected $table = "place_review_reply";
	// public $timestamps = false;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'review_id',
        'replay_message',
    ];

	public function Reviews()
	{
		return $this->hasOne(PlaceReviews::class,'id');
	}
}
