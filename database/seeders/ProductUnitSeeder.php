<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('product_units')->delete();
        DB::table('product_units')->insert([
            // [
            //     'id' => '3',
            //     'name' => 'Gramm',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],

            // [
            //     'id' => '2',
            //     'name' => 'Kilogramm',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],

            [
                'id' => '1',
                'name' => 'Liter',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            // [
            //     'id' => '4',
            //     'name' => 'Kiste',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],

            // [
            //     'id' => '5',
            //     'name' => 'Sack',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],

            // [
            //     'id' => '6',
            //     'name' => 'Dose / Glas',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],

            // [
            //     'id' => '7',
            //     'name' => 'Andere',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],

        ]);

        Schema::enableForeignKeyConstraints();
    }
}
