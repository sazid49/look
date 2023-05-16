<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
	use HasFactory;

	protected $table = "tags";

	public $timestamps = false;

    protected $fillable = [
        //'category_id',
        'value',
        'image',
        'description',
    ];

	public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}
