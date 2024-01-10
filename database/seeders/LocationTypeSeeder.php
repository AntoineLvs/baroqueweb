<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LocationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('location_types')->delete();
        DB::table('location_types')->insert([
            [
                'id' => '1',
                'name' => "Fuel Station",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
        
                [
                'id' => '2',
                'name' => "Fuel Rafinery",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
        
                [
                'id' => '3',
                'name' => "Fuel Tank Storage",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
        
                [
                'id' => '4',
                'name' => "Other",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
        
              ]);

        Schema::enableForeignKeyConstraints();
    }
}
