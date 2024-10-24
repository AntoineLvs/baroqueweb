<?php

namespace Database\Factories;

use App\Models\Register;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegisterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Register::class;

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
