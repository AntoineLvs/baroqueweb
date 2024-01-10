<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        // multi tenant
        return [
            'tenant_id' => Tenant::factory(),
        ];
    }
}
