<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ElectricSensor;
class ElectricSensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ElectricSensor::factory()->count(50)->create();  // Generates 50 entries
    }
}
