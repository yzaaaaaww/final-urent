<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tenant::create([
            'tenant_id' => User::select('id')->inRandomOrder()->first()->id,
            'unit_id' => Unit::select('id')->inRandomOrder()->first()->id,
            'owner_id' => User::select('id')->inRandomOrder()->first()->id,
            'lease_start' => now(),
            'lease_end' => now()->addYear(),
            'lease_term' => 1,
            'lease_status' => 'active',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
