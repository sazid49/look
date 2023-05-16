<?php
namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact.
 */
class Contact extends Model
{
    use SoftDeletes;

	protected $table = "company_contacts";
	// public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'gen_private_person',
		'company_id',
		'gen_company_name',
		'gen_salutation',
		'gen_firstname',
		'gen_lastname',
		'gen_postcode',
		'gen_city',
		'gen_email',
		'gen_phone',
		'message',
		'agb'
    ];

	public function company()
	{
		return $this->hasOne(Company::class,'id','company_id');
	}

}
