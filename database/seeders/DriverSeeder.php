<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->where('role', 'driver')->delete(); // Remove existing drivers

        $drivers = [
            ['name' => 'John Doe', 'email' => 'john.doe@example.com', 'password' => Hash::make('password123'), 'role' => 'driver'],
            ['name' => 'Jane Smith', 'email' => 'jane.smith@example.com', 'password' => Hash::make('password123'), 'role' => 'driver'],
            ['name' => 'Michael Jordan', 'email' => 'michael.jordan@example.com', 'password' => Hash::make('password123'), 'role' => 'driver']
        ];

        foreach ($drivers as $driver) {
            User::create($driver);
        }
    }
}
