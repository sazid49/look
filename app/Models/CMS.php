<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CMS extends Model
{
	use HasFactory;

	protected $table = "cms";

	public $timestamps = false;

    protected $fillable = [
        'id',
        'category_id',
        'title',
        'content',
        'language',
        'meta_title',
        'meta_description',
        'show_on_footer',
        'slug',
        'position',
        'active',
        'created_by',
        'updated_by'
    ];

}
