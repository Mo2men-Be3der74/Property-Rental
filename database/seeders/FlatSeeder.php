<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlatSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $flats = [
            [
                'flat_id' => 1,
                'owner_id' => 2,
                'category' => 'Penthouse',
                'size' => 150.00,
                'price_per_month' => 4800.00,
                'location' => 'Manhattan, New York',
                'img' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=800&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flat_id' => 2,
                'owner_id' => 3,
                'category' => 'Studio',
                'size' => 45.50,
                'price_per_month' => 1200.00,
                'location' => 'Downtown, New York',
                'img' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&fit=crop&w=800&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flat_id' => 3,
                'owner_id' => 2,
                'category' => '2-Bedroom',
                'size' => 88.25,
                'price_per_month' => 2300.00,
                'location' => 'Midtown, New York',
                'img' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=800&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flat_id' => 4,
                'owner_id' => 1,
                'category' => 'Villa',
                'size' => 240.00,
                'price_per_month' => 6500.00,
                'location' => 'Palm Jumeirah, Dubai',
                'img' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=800&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flat_id' => 5,
                'owner_id' => 4,
                'category' => '1-Bedroom',
                'size' => 65.00,
                'price_per_month' => 1650.00,
                'location' => 'Brooklyn, New York',
                'img' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=800&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flat_id' => 6,
                'owner_id' => 5,
                'category' => 'Duplex',
                'size' => 135.50,
                'price_per_month' => 3600.00,
                'location' => 'Jersey City, New Jersey',
                'img' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=800&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flat_id' => 7,
                'owner_id' => 3,
                'category' => 'Studio',
                'size' => 40.00,
                'price_per_month' => 950.00,
                'location' => 'Queens, New York',
                'img' => 'https://images.unsplash.com/photo-1536376072261-38c75010e6c9?auto=format&fit=crop&w=800&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flat_id' => 8,
                'owner_id' => 4,
                'category' => '3-Bedroom',
                'size' => 120.75,
                'price_per_month' => 3100.00,
                'location' => 'Hoboken, New Jersey',
                'img' => 'https://images.unsplash.com/photo-1484154218962-a197022b5858?auto=format&fit=crop&w=800&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flat_id' => 9,
                'owner_id' => 1,
                'category' => '2-Bedroom',
                'size' => 92.00,
                'price_per_month' => 2550.00,
                'location' => 'Williamsburg, New York',
                'img' => 'https://images.unsplash.com/photo-1540518614846-7ede433c4ef2?auto=format&fit=crop&w=800&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flat_id' => 10,
                'owner_id' => 5,
                'category' => '1-Bedroom',
                'size' => 58.00,
                'price_per_month' => 1400.00,
                'location' => 'Astoria, New York',
                'img' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=800&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($flats as $flat) {
            DB::table('flats')->updateOrInsert(
                ['flat_id' => $flat['flat_id']],
                $flat
            );
        }
    }
}
