<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    protected $primaryKey = 'flat_id';

    protected $fillable = [
        'owner_id',
        'category',
        'size',
        'price_per_month',
        'location',
        'img',
    ];
    // public function owner()
    // {
    //     return $this->belongsTo(User::class, 'owner_id', 'user_id');
    // }
}
