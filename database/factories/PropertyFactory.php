<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Property>
 */
class PropertyFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['Villa', 'Apartment', 'Studio', 'Penthouse', 'Townhouse'];
        $locations = ['Palm Jumeirah, Dubai', 'Downtown Dubai', 'Marina Walk, Dubai', 'Jumeirah Beach, Dubai', 'Business Bay, Dubai'];
        $images = [
            'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=600&q=85',
            'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=600&q=85',
            'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=600&q=85',
            'https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=600&q=85',
        ];

        $pricePerMonth = $this->faker->numberBetween(2000, 8000);
        $serviceFee = (int) round($pricePerMonth * 0.03);
        $taxes = (int) round($pricePerMonth * 0.05);

        return [
            'name' => $this->faker->words(3, true).' Residence',
            'type' => $this->faker->randomElement($types),
            'location' => $this->faker->randomElement($locations),
            'image_url' => $this->faker->randomElement($images),
            'price_per_month' => $pricePerMonth,
            'service_fee' => $serviceFee,
            'taxes' => $taxes,
            'beds' => $this->faker->numberBetween(1, 5),
            'baths' => $this->faker->numberBetween(1, 4),
            'area' => $this->faker->numberBetween(600, 3500).' sq ft',
            'rating' => $this->faker->randomFloat(1, 4.0, 5.0),
            'reviews_count' => $this->faker->numberBetween(10, 300),
            'checkin_time' => '3:00 PM',
            'checkout_time' => '11:00 AM',
            'cancellation_policy' => 'Free cancellation until 7 days before move-in. Cancel before move-in to receive a full refund. After that, the first month rent is non-refundable.',
        ];
    }

    /**
     * Pre-defined Willow Residence state (matches the design prototype).
     */
    public function willowResidence(): static
    {
        return $this->state([
            'name' => 'The Willow Residence',
            'type' => 'Villa',
            'location' => 'Palm Jumeirah, Dubai',
            'image_url' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=600&q=85',
            'price_per_month' => 4200.00,
            'service_fee' => 126.00,
            'taxes' => 216.00,
            'beds' => 4,
            'baths' => 3,
            'area' => '2,450 sq ft',
            'rating' => 4.9,
            'reviews_count' => 124,
        ]);
    }
}
