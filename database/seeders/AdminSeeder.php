<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'mobile_number' => '1234567890',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Assign the "user" role to the user by default
        $user->assignRole('admin');
    }
}
