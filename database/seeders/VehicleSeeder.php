<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('vehicles')->delete();
        DB::table('vehicles')->insert([
            [
                'id' => '1',
                'engine_id' => '1',
                'manufacturer_id' => '9',
                'name' => 'A5',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '2',
                'engine_id' => '1',
                'manufacturer_id' => '9',
                'name' => 'A6',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '3',
                'engine_id' => '1',
                'manufacturer_id' => '9',
                'name' => 'A7',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '4',
                'engine_id' => '1',
                'manufacturer_id' => '9',
                'name' => 'A8',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '5',
                'engine_id' => '1',
                'manufacturer_id' => '9',
                'name' => 'Q7',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '6',
                'engine_id' => '1',
                'manufacturer_id' => '9',
                'name' => 'Q8',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],


        ]);
        Schema::enableForeignKeyConstraints();
    }
}
