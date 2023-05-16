<?php
namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanyTabs.
 */
class CompanyTabs extends Model
{
    use SoftDeletes;

	//protected $table = "company_tabs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'show_register',
		'show_interraction',
		'show_contactform',
		'show_rating',
		'show_pricelist',
		'show_team',
		'show_news',
		'show_gallery',
		'show_jobs',
        'show_review'
    ];

}
