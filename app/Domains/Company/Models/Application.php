<?php
namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Application.
 */
class Application extends Model
{

	// protected $table = "company_jobs";
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'job_id',
        'title',
        'firstname',
        'lastname',
        'postcode',
        'city',
        'email',
        'phone',
        'date_of_birth',
        'civil_status',
        'motivation_letter',
        'CV',
        'certificate_of_employment',
        'diplomas_and_certificates',
        'message'
    ];
    
	public function company()
	{
		return $this->hasOne(Company::class,'id','company_id');
	}

	public function job()
	{
		return $this->hasOne(JobApplication::class,'id','job_id');
	}
}
