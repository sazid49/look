<?php
namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JobApplication.
 */
class JobApplication extends Model
{
    use SoftDeletes;

    protected $dates = ['start_date','expire_date'];

	protected $table = "company_jobs";
	// public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'company_id',
        'title',
        'location',
        'start_date',
        'expire_date',
        'type',
        'description',
        'skill',
        'position',
        'active'
    ];

    /**
     * A job is belongs to a company
     *
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

}
