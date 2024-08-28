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

        Tenant::factory()->create([
            'id' => 1,
            'tenant_type_id' => 1,
            'name' => 'refuelOS',
            'email' => 'mail@refuelos.com',
            'street' => $faker->address(),
        ]);

         Tenant::factory()->create([
            'id' => 2,
            'name' => 'bft e.V.',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);

         Tenant::factory()->create([
            'id' => 3,
            'name' => 'Sprint Tank',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);

        Tenant::factory()->create([
            'id' => 4,
            'name' => 'team Energie',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);

        Tenant::factory()->create([
            'id' => 5,
            'name' => 'Classic Oil',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);

        Tenant::factory()->create([
            'id' => 6,
            'name' => 'EDi',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);

        Tenant::factory()->create([
            'id' => 7,
            'name' => 'ROTH',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);

        Tenant::factory()->create([
            'id' => 8,
            'name' => 'Anton Willer',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);

        Tenant::factory()->create([
            'id' => 9,
            'name' => 'RHV',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);
        Tenant::factory()->create([
            'id' => 10,
            'name' => 'Stoffmehl Tankstelle',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);
        Tenant::factory()->create([
            'id' => 11,
            'name' => 'Rosa Heizöl GmbH',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);
        Tenant::factory()->create([
            'id' => 12,
            'name' => 'Wirtz Energie',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);
        Tenant::factory()->create([
            'id' => 13,
            'name' => 'Tramin',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);

        Tenant::factory()->create([
            'id' => 14,
            'name' => 'Takstelle Ahlert',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);

        Tenant::factory()->create([
            'id' => 15,
            'name' => 'Zieglmeier Tankstellen',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);

        Tenant::factory()->create([
            'id' => 16,
            'name' => 'Kuster Energy',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);

        Tenant::factory()->create([
            'id' => 17,
            'name' => 'Rosa Heizöl GmbH',
            'tenant_type_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'street' => $faker->address(),
        ]);



    }
}
