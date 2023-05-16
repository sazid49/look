<?php
namespace App\Domains\Company\Models;

use App\Domains\Company\Models\Traits\Attribute\CompanyAttribute;
use App\Domains\Company\Models\Traits\Relationship\CompanyRelationship;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company.
 */
class Company extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'publications',
        'category_id',
        'company_name',
        'company_name_api',
        'logo',
        'thumbnail',
        'firstname',
        'lastname',
        'address',
        'post_office_box',
        'postcode',
        'city',
        'longitude',
        'latitude',
        'canton',
        'phone_1',
        'phone_2',
        'phone_3',
        'mobile',
        'email',
        'website',
        'purpose',
        'notes',
        'keywords',
        'youtube_video',
        'foundingyear',
        'team_leader',
        'agent',
        'assigned_to',
        'show_tabs',
        'show_frontpage',
        'show_watermark',
        'opening_hours',
        'slug',
        'hits',
        'active',
        'claimed',
        'claimed_by',
        'published',
        'claimed_on',
        'api_sync',
        'inserted_by',
        'updated_by',
    ];

    use HasFactory,CompanyAttribute,CompanyRelationship;

}
