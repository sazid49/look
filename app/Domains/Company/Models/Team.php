<?php
namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Team.
 */
class Team extends Model
{
    use SoftDeletes;

	protected $table = "company_teams";
	// public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'company_id',
        'profile_photo',
        'name',
        'designation',
        'email',
        'phone',
        'twitter',
        'linkedin',
        'xing'
    ];

}
