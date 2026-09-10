<?php

namespace App\Models;

use Database\Factories\PropertyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name',
        'type',
        'location',
        'image_url',
        'price_per_month',
        'service_fee',
        'taxes',
        'beds',
        'baths',
        'area',
        'rating',
        'reviews_count',
        'checkin_time',
        'checkout_time',
        'cancellation_policy',
    ];

    
}
