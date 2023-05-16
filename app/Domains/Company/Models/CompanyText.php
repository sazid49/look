<?php
namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanyText.
 */
class CompanyText extends Model
{
    use SoftDeletes;

	protected $table = "company_text";

	public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'content',
        'language',
    ];

}
