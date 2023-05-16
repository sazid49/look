<?php
namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Socialmedia.
 */
class Socialmedia extends Model
{
    use SoftDeletes;

    protected $table = "company_socialmedia";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'platform',
        'url',
        'icon',
        'active',
    ];

}
