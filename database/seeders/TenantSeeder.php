<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        $esso = Tenant::factory()->create([
            'id' => 1,
            'name' => 'Esso',
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);

        $shell = Tenant::factory()->create([
            'id' => 2,
            'name' => 'Shell',
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);

        $totalenergies = Tenant::factory()->create([
            'id' => 3,
            'name' => 'TotalEnergies',
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);

    }
}
