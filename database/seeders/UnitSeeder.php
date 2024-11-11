<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::create([
            'name' => 'Unit 1',
            'unit_number' => rand(1, 10),
            'status' => 'available',
            'price' => rand(1000, 10000),
            'deposit' => rand(1, 10),
            'address' => 'Unit 1 description',
            'image' => 'https://placehold.co/600x400',
            'lease_term' => rand(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
