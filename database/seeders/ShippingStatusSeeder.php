<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ShippingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('shipping_statuses')->delete();
        DB::table('shipping_statuses')->insert([

            [
                'id' => '1',
                'name' => "Shipping angefragt",
                'color' => "orange",

                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'id' => '2',
                'name' => "Shipping bearbeitet",
                'color' => "yellow",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'id' => '3',
                'name' => "Shipping bestätigt",
                'color' => "red",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


            [
                'id' => '4',
                'name' => "Shipping durchgeführt",
                'color' => "red",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],



        ]);

        Schema::enableForeignKeyConstraints();
    }
}
