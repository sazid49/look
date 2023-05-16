<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRating extends Model
{
    use HasFactory;

	protected $table = "review_rating";
	
	public $timestamps = false;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'review_id',
        'review_criteria_id',
        'listing_id',
        'listing_type',
        'rating',
    ];

	public function ReviewCriteria()
	{
		return $this->hasOne(ReviewCriteria::class,'id','review_criteria_id');
	}

    public function reviewRating()
    {
        return $this->morphTo();
    }

}
