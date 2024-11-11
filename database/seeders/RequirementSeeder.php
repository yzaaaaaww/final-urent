<?php

namespace Database\Seeders;

use App\Models\Requirement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requirements = [
            ['name' => 'Proof of Billing (in the name of application)'],
            ['name' => 'Business Application Fee (PHP 150.00)'],
        ];

        foreach ($requirements as $requirement) {
            Requirement::create($requirement);
        }
    }
}
