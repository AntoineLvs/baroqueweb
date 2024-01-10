<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        // 1 HVO 2 PtL 3 Gtl 4 BtL 5 XtL

        DB::table('services')->delete();
        DB::table('services')->insert([
            [
                'id' => '1',
                'base_service_id' => '1',
                'tenant_id' => '1',
                'name' => "Special Vacuum",
                'description' => "Special Vacuum cleaner to get your car cleaner",
                'active' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'id' => '2',
                'base_service_id' => '3',
                'tenant_id' => '1',
                'name' => "Turbo Pressure",
                'description' => "Special Vacuum cleaner to get your car cleaner",
                'active' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'id' => '3',
                'base_service_id' => '2',
                'tenant_id' => '1',
                'name' => "Special Wash station",
                'description' => "Special Wash station to get your car cleaner",
                'active' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'id' => '4',
                'base_service_id' => '3',
                'tenant_id' => '1',
                'name' => "Special Tire pressure",
                'description' => "Special Tire pressure description ...",
                'active' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

        ]);

        Schema::enableForeignKeyConstraints();
    }
}
