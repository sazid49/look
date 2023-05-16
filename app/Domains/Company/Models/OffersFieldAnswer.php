<?php
namespace App\Domains\Company\Models;

use App\Models\OfferField;
use App\Models\OfferFieldGroup;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OffersFieldAnswer.
 */
class OffersFieldAnswer extends Model
{

	protected $table = "company_offers_field_answer";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'company_offer_id',
        'offerfield_id',
        'answer',
    ];

	public function question()
	{
		return $this->hasOne(OfferField::class,'id','offerfield_id');
	}

	public function question_show()
	{
		return $this->hasOne(OfferField::class,'id','offerfield_id')->withTrashed();
	}

    public function questionGroup()
    {
        return $this->belongsTo(OfferFieldGroup::class,'offerfield_id');
    }
}
