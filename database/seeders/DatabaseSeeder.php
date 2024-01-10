<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([

            ManufacturerSeeder::class,
            EngineSeeder::class,
            VehicleSeeder::class,
            TenantTypeSeeder::class,
            UserSeeder::class,
            ProjectTypeSeeder::class,
            ProductTypeSeeder::class,
            ProductUnitSeeder::class,
            LocationTypeSeeder::class,
            DocumentTypeSeeder::class,
            BaseProductSeeder::class,
            ProductSeeder::class,
            ServiceSeeder::class,
            BaseServiceSeeder::class,
            LocationSeeder::class,
            StandardSeeder::class,
        ]);

    }
}
