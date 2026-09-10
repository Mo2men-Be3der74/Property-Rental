<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        // Create the design-prototype property first (id=1)
        Property::factory()->willowResidence()->create();

        // Create a handful of random properties
        Property::factory()->count(9)->create();
    }
}
