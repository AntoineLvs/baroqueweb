<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('base_products')->delete();
        DB::table('base_products')->insert([

            [
                'id' => '1',
                'name' => "HVO 100",
                'product_type_id' => '1',
                'blend_percent' => '100',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '2',
                'name' => "HVO Blend",
                'product_type_id' => '2',
                'blend_percent' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


            // [
            //     'id' => '1',
            //     'name' => "HVO Individual Blend",
            //     'product_type_id' => '1',
            //     'blend_percent' => null,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '2',
            //     'name' => "HVO Standard",
            //     'product_type_id' => '1',
            //     'blend_percent' => null,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '3',
            //     'name' => "HVO Marine",
            //     'product_type_id' => '1',
            //     'blend_percent' => null,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '4',
            //     'name' => "E-Fuel Standard",
            //     'product_type_id' => '2',
            //     'blend_percent' => null,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '5',
            //     'name' => "E-Fuel Racing",
            //     'product_type_id' => '2',
            //     'blend_percent' => null,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '6',
            //     'name' => "GtL Standard",
            //     'product_type_id' => '3',
            //     'blend_percent' => null,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '7',
            //     'name' => "HVO 5",
            //     'product_type_id' => '1',
            //     'blend_percent' => '5',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '8',
            //     'name' => "HVO 10",
            //     'product_type_id' => '1',
            //     'blend_percent' => '10',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '9',
            //     'name' => "HVO 15",
            //     'product_type_id' => '1',
            //     'blend_percent' => '15',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '10',
            //     'name' => "HVO 20",
            //     'product_type_id' => '1',
            //     'blend_percent' => '20',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '11',
            //     'name' => "HVO 25",
            //     'product_type_id' => '1',
            //     'blend_percent' => '25',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '12',
            //     'name' => "HVO 30",
            //     'product_type_id' => '1',
            //     'blend_percent' => '30',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '13',
            //     'name' => "HVO 35",
            //     'product_type_id' => '1',
            //     'blend_percent' => '35',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '14',
            //     'name' => "HVO 40",
            //     'product_type_id' => '1',
            //     'blend_percent' => '40',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '15',
            //     'name' => "HVO 45",
            //     'product_type_id' => '1',
            //     'blend_percent' => '45',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '16',
            //     'name' => "HVO 50",
            //     'product_type_id' => '1',
            //     'blend_percent' => '50',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '17',
            //     'name' => "HVO 55",
            //     'product_type_id' => '1',
            //     'blend_percent' => '55',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '18',
            //     'name' => "HVO 60",
            //     'product_type_id' => '1',
            //     'blend_percent' => '60',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '19',
            //     'name' => "HVO 65",
            //     'product_type_id' => '1',
            //     'blend_percent' => '65',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '20',
            //     'name' => "HVO 70",
            //     'product_type_id' => '1',
            //     'blend_percent' => '70',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '21',
            //     'name' => "HVO 75",
            //     'product_type_id' => '1',
            //     'blend_percent' => '75',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '22',
            //     'name' => "HVO 80",
            //     'product_type_id' => '1',
            //     'blend_percent' => '80',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '23',
            //     'name' => "HVO 85",
            //     'product_type_id' => '1',
            //     'blend_percent' => '85',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '24',
            //     'name' => "HVO 90",
            //     'product_type_id' => '1',
            //     'blend_percent' => '90',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '25',
            //     'name' => "HVO 95",
            //     'product_type_id' => '1',
            //     'blend_percent' => '95',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

            // [
            //     'id' => '26',
            //     'name' => "HVO 100",
            //     'product_type_id' => '1',
            //     'blend_percent' => '100',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],

        ]);
    }
}
