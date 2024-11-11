<?php

namespace Database\Factories;

use App\Models\Tenant;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    public function definition(): array
    {
        $startDate = Carbon::now()->startOfYear();
        $endDate = Carbon::now()->endOfYear();

        $paymentDetails = [
            [
                'name' => 'water',
                'amount' => (string) $this->faker->numberBetween(50, 500)
            ],
            [
                'name' => 'electricity',
                'amount' => (string) $this->faker->numberBetween(50, 500)
            ]
        ];

        return [
            'tenant_id' => $this->faker->randomElement(Tenant::pluck('id')),
            'unit_number' => $this->faker->randomElement(Unit::pluck('unit_number')),
            'amount' => collect($paymentDetails)->sum(fn($item) => (int) $item['amount']),
            'payment_details' => json_encode($paymentDetails),
            'payment_method' => $this->faker->randomElement(['maya', 'gcash']),
            'payment_status' => $this->faker->randomElement(['paid', 'unpaid', 'overdue', 'pending']),
            'payment_type' => $this->faker->randomElement(['cash', 'e-wallet']),
            'created_at' => $this->faker->dateTimeBetween($startDate, $endDate),
        ];
    }
}