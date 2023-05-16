<?php
namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pricing.
 */
class Pricing extends Model
{
    use SoftDeletes;

	protected $table = "company_pricing";
	// public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'company_id',
        'parent_id',
        'title',
        'description',
        'price',
        'image'
    ];

    /**
     * A pricing category has many items
     *
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(Pricing::class,'parent_id');
    }

    /**
     * A pricing is belongs to a company
     *
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

}
