<?php

namespace Database\Seeders;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the table safely
        DB::table('vehicles')->truncate();

        // Enable foreign key checks back
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insert dummy data
        $vehicles = [
            ['name' => 'Avanza', 'license_plate' => 'B 1234 ABC', 'type' => 'toyota'],
            ['name' => 'Mobilio', 'license_plate' => 'D 5678 DEF', 'type' => 'honda'],
            ['name' => 'Ertiga', 'license_plate' => 'E 9012 GHI', 'type' => 'suzuki'],
            ['name' => 'Xpander', 'license_plate' => 'F 3456 JKL', 'type' => 'mitsubishi']
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::create($vehicle);
        }
    }
}
