<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { {
            Schema::disableForeignKeyConstraints();

            DB::table('products')->delete();
            DB::table('products')->insert([

                [
                    'tenant_id' => '1',
                    'id' => '1',
                    'name' => "HVO100",
                    'data' => "HVO 100",
                    'product_type_id' => "1",
                    'base_product_id' => "1",
                    'product_unit_id' => "1",
                    'active' => '1',
                    'blend_percent' => NULL,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],

                [
                    'tenant_id' => '1',
                    'id' => '2',
                    'name' => "KlimaDiesel 90",
                    'data' => "HVO 100",
                    'product_type_id' => "1",
                    'base_product_id' => "1",
                    'product_unit_id' => "1",
                    'active' => '1',
                    'blend_percent' => NULL,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],

                [
                    'tenant_id' => '1',
                    'id' => '3',
                    'name' => "NesteMY",
                    'data' => "HVO 100",
                    'product_type_id' => "1",
                    'base_product_id' => "1",
                    'product_unit_id' => "1",
                    'active' => '1',
                    'blend_percent' => NULL,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],

                [
                    'tenant_id' => '1',
                    'id' => '4',
                    'name' => "Fuelmotion H",
                    'data' => "HVO 100",
                    'product_type_id' => "1",
                    'base_product_id' => "1",
                    'product_unit_id' => "1",
                    'active' => '1',
                    'blend_percent' => NULL,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],


                [
                    'tenant_id' => '1',
                    'id' => '5',
                    'name' => "C.A.R.E Diesel",
                    'data' => "HVO 100",
                    'product_type_id' => "1",
                    'base_product_id' => "1",
                    'product_unit_id' => "1",
                    'active' => '1',
                    'blend_percent' => NULL,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],

                [
                    'tenant_id' => '1',
                    'id' => '6',
                    'name' => "ROTH HVO100 Diesel",
                    'data' => "HVO 100",
                    'product_type_id' => "1",
                    'base_product_id' => "1",
                    'product_unit_id' => "1",
                    'active' => '1',
                    'blend_percent' => NULL,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],






                // [
                //     'tenant_id' => '1',
                //     'id' => '1',
                //     'name' => "TOTAL HVO 60 BLEND",
                //     'data' => "Lorem ipsum data description",
                //     'product_type_id' => "1",
                //     'base_product_id' => "18",
                //     'product_unit_id' => "1",
                //     'active' => '1',
                //     'blend_percent' => "60",
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],

                // [
                //     'tenant_id' => '1',
                //     'id' => '2',
                //     'name' => "TOTAL HVO 75 BLEND",
                //     'data' => "Lorem ipsum data description",
                //     'product_type_id' => "1",
                //     'base_product_id' => "21",
                //     'product_unit_id' => "4",
                //     'active' => '1',
                //     'blend_percent' => "75",
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],

                // [
                //     'tenant_id' => '1',
                //     'id' => '3',
                //     'name' => "TOTAL INDIVIDUAL HVO",
                //     'data' => "Lorem ipsum data description",
                //     'product_type_id' => "1",
                //     'base_product_id' => "1",
                //     'product_unit_id' => "2",
                //     'active' => '1',
                //     'blend_percent' => "88",
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],

                // [
                //     'tenant_id' => '1',
                //     'id' => '4',
                //     'name' => "Shell E-fuel Standard",
                //     'data' => "Lorem ipsum data description",
                //     'product_type_id' => "2",
                //     'base_product_id' => "4",
                //     'product_unit_id' => "5",
                //     'active' => '1',
                //     'blend_percent' => NULL,
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],

                // [
                //     'tenant_id' => '1',
                //     'id' => '5',
                //     'name' => "Shell GTL Standard",
                //     'data' => "Lorem ipsum data description",
                //     'product_type_id' => "3",
                //     'base_product_id' => "6",
                //     'product_unit_id' => "4",
                //     'active' => '1',
                //     'blend_percent' => NULL,
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],

                // [
                //     'tenant_id' => '1',
                //     'id' => '6',
                //     'name' => "Total GTL Standard",
                //     'data' => "Lorem ipsum data description",
                //     'product_type_id' => "3",
                //     'base_product_id' => "6",
                //     'product_unit_id' => "5",
                //     'active' => '1',
                //     'blend_percent' => NULL,
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],

            ]);

            Schema::enableForeignKeyConstraints();
        }
    }
}
