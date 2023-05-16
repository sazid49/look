<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OfferFieldGroup extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','type','is_required','active'];

    /** A group has many fields
     *
     * @return HasMany
     */
    public function offerFields(): HasMany
    {
        return $this->hasMany(OfferField::class,'group_id');
    }

    /**
     * A group has one field for one language
     *
     * @return HasOne
     */
    public function field(): HasOne
    {
        return $this->hasOne(OfferField::class,'group_id')
            ->where('language',app()->getLocale());
    }
}
