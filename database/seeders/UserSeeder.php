<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Change this for security
            'role' => 'admin', // Assuming your user table has a 'role' column
        ]);

        // Create an approver
        User::create([
            'name' => 'Approver Joko',
            'email' => 'joko@example.com',
            'password' => Hash::make('password'),
            'role' => 'approver',
        ]);

        // Create a driver
        User::create([
            'name' => 'Driver Budi',
            'email' => 'budi@example.com',
            'password' => Hash::make('password'),
            'role' => 'driver',
        ]);
    }
}
