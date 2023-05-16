<?php
namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Recommendation.
 */
class Recommendation extends Model
{
    use SoftDeletes;

	protected $table = "company_recommendations";

	public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'listing_type',
        'company_name',
        'contact_name',
        'relationship',
        'phone'
    ];

}
