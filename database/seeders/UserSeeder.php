<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id'            => 'US001',
            'name'          => 'owner',
            'email'         => 'owner@gmail.com',
            'password'      => Hash::make('owner'),
            'role'          => 'owner'
        ]);

        User::create([
            'id'            => 'US002',
            'name'          => 'employee',
            'email'         => 'employee@gmail.com',
            'password'      => Hash::make('employee'),
            'role'          => 'employee'
        ]);
    }
}
