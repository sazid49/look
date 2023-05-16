<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfferField extends Model
{
	use HasFactory,SoftDeletes;

	protected $table = "offer_fields";

    protected $fillable = [
        'group_id',
        'label',
        'option',
        'language',
        'active',
        'is_deleted',
    ];

//	public function setOptionAttribute($value){
//		$this->attributes['option'] = serialize($value);
//    }

//    public function getOptionAttribute($value){
//		return $this->attributes['option'] = unserialize($value);
//    }

}
