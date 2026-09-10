<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reciept extends Model
{
    protected $primaryKey = 'reciept_id';

    protected $fillable = [
        'transaction_id',
        'amount_paid',
        'date',
    ];
}
