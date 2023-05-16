<?php
namespace App\Domains\Places\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gallery.
 */
class PlaceGallery extends Model
{

	protected $table = "place_gallery";
	// public $timestamps = false;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'place_id',
        'image',
        'show_on_frontside'
    ];

}
