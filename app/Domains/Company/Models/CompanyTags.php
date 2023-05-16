<?php
namespace App\Domains\Company\Models;

use App\Models\Tags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanyTags.
 */
class CompanyTags extends Model
{
    //protected $table = "company_tags";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'company_id',
        'tag_id'
    ];

    public function tag()
    {
        return $this->belongsTo(Tags::class,'tag_id');
    }

}
