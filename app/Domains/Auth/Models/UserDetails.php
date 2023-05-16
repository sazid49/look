<?php

namespace App\Domains\Auth\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetails extends Model
{
	use HasFactory,
		SoftDeletes;

	protected $table = "as_user_details";

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'company_name',
		'firstname',
		'lastname',
		'address',
		'postcode',
		'city',
		'phone',
		'birthday'
	];

	/**
	 * Accessor for Age.
	 */
	public function age()
	{
		return Carbon::parse($this->attributes['birthday'])->age;
	}
}
