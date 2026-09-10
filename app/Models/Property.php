<?php

namespace App\Models;

use Database\Factories\PropertyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /** @use HasFactory<PropertyFactory> */
    use HasFactory;

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

    protected $casts = [
        'price_per_month' => 'decimal:2',
        'service_fee' => 'decimal:2',
        'taxes' => 'decimal:2',
        'rating' => 'decimal:1',
    ];

    /**
     * Total price (rent + service fee + taxes).
     */
    public function getTotalAttribute(): string
    {
        return number_format((float) $this->price_per_month + (float) $this->service_fee + (float) $this->taxes, 2);
    }
}
