<?php
namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class News.
 */
class News extends Model
{
    use SoftDeletes;

	protected $table = "company_news";

    protected $dates = ['published_at'];
	// public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'company_id',
        'image',
        'title',
        'author',
        'description',
        'published_at',
        'active'
    ];

    /**
     * News is belongs to a company
     *
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

}
