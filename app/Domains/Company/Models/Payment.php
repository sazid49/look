<?php

namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory,SoftDeletes;

    //protected $table = 'payments';

    protected $fillable = [
        'transaction_id',
        'company_id',
        'payment_method',
        'detail',
        'raw_data',
        'payer',
        'not_payer_reason',
        'price_contract',
        'price_actual'
    ];
}
