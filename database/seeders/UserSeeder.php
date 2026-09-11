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
<<<<<<< HEAD
            ['user_id' => 3,   'name' => 'John Tenant',   'email' => 'tenant3@example.com',     'ssn' => 'SSN-TENANT-3', 'phone' => '01012345678'],
            ['user_id' => 101, 'name' => 'Sarah Connor',  'email' => 'landlord101@example.com', 'ssn' => 'SSN-LL-101',   'phone' => '01011111101'],
            ['user_id' => 102, 'name' => 'Michael Scott', 'email' => 'landlord102@example.com', 'ssn' => 'SSN-LL-102',   'phone' => '01011111102'],
            ['user_id' => 103, 'name' => 'Emma Watson',   'email' => 'landlord103@example.com', 'ssn' => 'SSN-LL-103',   'phone' => '01011111103'],
            ['user_id' => 104, 'name' => 'David Beckham', 'email' => 'landlord104@example.com', 'ssn' => 'SSN-LL-104',   'phone' => '01011111104'],
            ['user_id' => 105, 'name' => 'Jessica Alba',  'email' => 'landlord105@example.com', 'ssn' => 'SSN-LL-105',   'phone' => '01011111105'],
            ['user_id' => 106, 'name' => 'Robert Downey', 'email' => 'landlord106@example.com', 'ssn' => 'SSN-LL-106',   'phone' => '01011111106'],
            ['user_id' => 107, 'name' => 'Scarlett J.',   'email' => 'landlord107@example.com', 'ssn' => 'SSN-LL-107',   'phone' => '01011111107'],
=======
            [
                'user_id' => 2,
                'name' => 'Sarah Connor',
                'email' => 'sarah@example.com',
                'password' => $password,
                'phone' => '01011112222',
                'img' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=256&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 3,
                'name' => 'Michael Scott',
                'email' => 'michael@example.com',
                'password' => $password,
                'phone' => '01033334444',
                'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=256&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 4,
                'name' => 'Emma Watson',
                'email' => 'emma@example.com',
                'password' => $password,
                'phone' => '01055556666',
                'img' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=256&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 5,
                'name' => 'David Beckham',
                'email' => 'david@example.com',
                'password' => $password,
                'phone' => '01077778888',
                'img' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=256&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 6,
                'name' => 'Alex Morgan',
                'email' => 'alex@example.com',
                'password' => $password,
                'phone' => '01099990000',
                'img' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=256&q=80',
                'created_at' => $now,
                'updated_at' => $now,
            ],
>>>>>>> 7adaff386bfb23d4e5fa2de7282ea1b2051cd4ad
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
<<<<<<< HEAD
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
=======
                ['email' => $user['email']],
                $user
>>>>>>> 7adaff386bfb23d4e5fa2de7282ea1b2051cd4ad
            );
        }
    }
}
