<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make('password123');
        $now = now();

        $users = [
            ['user_id' => 3,   'name' => 'John Tenant',   'email' => 'tenant3@example.com',     'ssn' => 'SSN-TENANT-3', 'phone' => '01012345678'],
            ['user_id' => 101, 'name' => 'Sarah Connor',  'email' => 'landlord101@example.com', 'ssn' => 'SSN-LL-101',   'phone' => '01011111101'],
            ['user_id' => 102, 'name' => 'Michael Scott', 'email' => 'landlord102@example.com', 'ssn' => 'SSN-LL-102',   'phone' => '01011111102'],
            ['user_id' => 103, 'name' => 'Emma Watson',   'email' => 'landlord103@example.com', 'ssn' => 'SSN-LL-103',   'phone' => '01011111103'],
            ['user_id' => 104, 'name' => 'David Beckham', 'email' => 'landlord104@example.com', 'ssn' => 'SSN-LL-104',   'phone' => '01011111104'],
            ['user_id' => 105, 'name' => 'Jessica Alba',  'email' => 'landlord105@example.com', 'ssn' => 'SSN-LL-105',   'phone' => '01011111105'],
            ['user_id' => 106, 'name' => 'Robert Downey', 'email' => 'landlord106@example.com', 'ssn' => 'SSN-LL-106',   'phone' => '01011111106'],
            ['user_id' => 107, 'name' => 'Scarlett J.',   'email' => 'landlord107@example.com', 'ssn' => 'SSN-LL-107',   'phone' => '01011111107'],
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['user_id' => $user['user_id']],
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => $password,
                    'ssn' => $user['ssn'],
                    'phone' => $user['phone'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
