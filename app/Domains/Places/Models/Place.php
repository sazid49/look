<?php
namespace App\Domains\Places\Models;

use App\Domains\Places\Models\Traits\Attribute\PlaceAttribute;
use App\Domains\Places\Models\Traits\Relationship\PlaceRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Place.
 */
class Place extends Model
{
	use PlaceAttribute,PlaceRelationship;

	protected $table = "places";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

			'category_id',
			'place_name',
			'firstname',
			'lastname',
			'address',
			'post_office_box',
			'postcode',
			'city',
			'canton',
			'country',
			'latitude',
			'longitude',
			'phone_1',
			'phone_2',
			'phone_3',
			'mobile',
			'email',
			'website',
			'description_de',
			'description_fr',
			'description_it',
			'description_en',
			'tags',
			'facebook',
			'twitter',
			'instagram',
			'meta_title_de',
			'meta_description_de',
			'meta_title_fr',
			'meta_description_fr',
			'meta_title_en',
			'meta_description_en',
			'meta_title_it',
			'meta_description_it',
			'image1',
			'image2',
			'image3',
			'image4',
			'image5',
			'payer',
			'not_payer_reason',
			'price_contract',
			'price_actual',
			'notes',
			'team_leader',
			'agent',
			'assigned_to',
			'active',
			'info_1',
			'insert_date',
			'update_date',
			'listing_id',
			'image_logo',
			'updated_by',
			'inserted_by',
			'show_interraction',
			'user_id',
			'opening_hours',
			'slug',
			'show_kontaktenformular',
			'show_jobs',
			'hits',
			'published',
    ];

}
