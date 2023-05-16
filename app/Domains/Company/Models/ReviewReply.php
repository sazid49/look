<?php
namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ReviewReply.
 */
class ReviewReply extends Model
{
    use SoftDeletes;
	// use ReviewsRelationship,
		// ReviewsAttribute;

	protected $table = "company_review_reply";
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
		return $this->hasOne(Review::class,'id');
	}
}
