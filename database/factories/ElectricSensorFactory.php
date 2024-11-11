<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ElectricSensor;
use App\Models\Tenant;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ElectricSensor>
 */
class ElectricSensorFactory extends Factory
{
    protected $model = ElectricSensor::class;

    public function definition()
    {
        // Ensure there are tenants in the database
        if (Tenant::count() == 0) {
            throw new \Exception('No tenants available in the database.');
        }

        return [
            'volts_amperes' => $this->faker->randomFloat(2, 220, 240),
            'watts_hours' => $this->faker->randomFloat(2, 0.1, 5.0),
            'consumption' => $this->faker->randomFloat(2, 0.1, 5.0),
            'tenant_id' => Tenant::inRandomOrder()->first()->id, // Fetches a random tenant ID
        ];
    }
}