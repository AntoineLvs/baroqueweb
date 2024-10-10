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
        
            [
                'id' => '1',
                'name' => 'Liter',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '2',
                'name' => 'Kanister (20L)',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'name' => 'Drum (60L)',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '4',
                'name' => 'Drum (120L)',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '5',
                'name' => 'IBC Container (1000L)',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '6',
                'name' => 'TKW  (20.000L)',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
    
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
