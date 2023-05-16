<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CantonData extends Model
{
	use HasFactory;

	protected $table = "canton_data";

	public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    /**
     * A canton has many companies
     *
     * @return HasMany
     */
    public function companies(): HasMany
    {
        return $this->hasMany(Company::class,'canton','iso');
    }

}
