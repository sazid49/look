<?php
namespace App\Domains\Company\Models;

use App\Domains\Company\Models\Traits\Attribute\CompanyAttribute;
use App\Domains\Company\Models\Traits\Relationship\CompanyRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company.
 */
class Offers extends Model
{
	use CompanyAttribute,CompanyRelationship,SoftDeletes;

	protected $table = "company_offers";

    // public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'company_id',
        'gen_privateperson',
        'gen_company_name',
        'gen_salutation',
        'gen_firstname',
        'gen_lastname',
        'gen_postcode',
        'gen_city',
        'gen_email',
        'gen_phone',
        'it_offer_newwebsite',
        'it_offer_redesign',
        'it_offer_newfunctions',
        'it_offer_mobileapp',
        'it_offer_onlineshop',
        'it_offer_graphics',
        'it_offer_printmedia',
        'it_offer_consultation',
        'it_manage',
        'it_hosting',
        'it_texts',
        'it_images',
        'it_completion',
        'phone_3',
        'message',
        'agb',
        'actual_link',
//		'insert_date',
//		'update_date',

    ];

	public function company()
	{
		return $this->hasOne(Company::class,'id','company_id');
	}

	public function offerfieldanswer()
	{
		return $this->hasMany(OffersFieldAnswer::class,'company_offer_id');
	}
}
