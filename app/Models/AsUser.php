<?php

namespace App\Models;

use App\Domains\Auth\Models\UserDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsUser extends Model
{
    use HasFactory;

    protected $dates = ['last_login_at'];

    public function details()
    {
        return $this->hasOne(UserDetails::class,'user_id');
    }
}
