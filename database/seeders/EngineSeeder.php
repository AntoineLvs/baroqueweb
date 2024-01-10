<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('engines')->delete();
        DB::table('engines')->insert([
            [
                'id' => '1',
                'manufacturer_id' => '9',
                'name' => 'V6 TDI',
                'power_kw' => '210',
                'power_ps' => '286',
                'built_from' => '02.2022',
                'built_to' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '2',
                'manufacturer_id' => '9',
                'name' => 'V6 TDI',
                'power_kw' => '180',
                'power_ps' => '245',
                'built_from' => '03.2022',
                'built_to' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '3',
                'manufacturer_id' => '9',
                'name' => '4 Z TDI',
                'power_kw' => '150',
                'power_ps' => '204',
                'built_from' => '06.2021',
                'built_to' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],


        ]);
        Schema::enableForeignKeyConstraints();
    }
}
