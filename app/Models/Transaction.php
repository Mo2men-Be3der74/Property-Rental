<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'start_date',
        'end_date',
        'total_price',
        'flat_id',
        'landlord_id',
        'tenant_id',
        'status',
    ];
}
