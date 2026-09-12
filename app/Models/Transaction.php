<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function flat(): BelongsTo {
        return $this->belongsTo(Flat::class, 'flat_id', 'flat_id');
    }
}
