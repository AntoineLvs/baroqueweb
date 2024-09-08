<?php

namespace Database\Seeders;

use App\Models\TokenType;
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
            TenantSeeder::class,
            UserSeeder::class,

            ProductTypeSeeder::class,
            ProductUnitSeeder::class,
            LocationTypeSeeder::class,
            DocumentTypeSeeder::class,
            BaseProductSeeder::class,
            ProductSeeder::class,
            ServiceSeeder::class,
            BaseServiceSeeder::class,
            // LocationSeeder::class,
            StandardSeeder::class,
            TokenTypeSeeder::class,
            OrderTypeSeeder::class,
            OrderStatusSeeder::class,
            ShippingStatusSeeder::class,
        ]);

    }
}
