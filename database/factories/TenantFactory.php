<?php

namespace Database\Factories;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        // multi tenant

        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),

            'street' => $this->faker->address(),

        ];
    }
}
