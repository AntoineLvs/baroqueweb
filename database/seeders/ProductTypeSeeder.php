<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('product_types')->delete();
        DB::table('product_types')->insert([
            [
                'id' => '1',
                'name' => "HVO-Diesel",
                'active' => '1',
                'tenant_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
        
                [
                  'id' => '2',
                  'name' => "HVO-Petrol",
                  'active' => '1',
                  'tenant_id' => '1',
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
        
                [
                  'id' => '3',
                  'name' => "Regular-Diesel",
                  'active' => '1',
                  'tenant_id' => '1',
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
        
                [
                  'id' => '4',
                  'name' => "Regular-Petrol",
                  'active' => '1',
                  'tenant_id' => '1',
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                 
                [
                'id' => '5',
                'name' => "E-Fuel (PtL)",
                'active' => '1',
                'tenant_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
        
                [
                'id' => '6',
                'name' => "GtL Fuel",
                'active' => '1',
                'tenant_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
        
                [
                'id' => '7',
                'name' => "BtL (Biomass)",
                'active' => '0',
                'tenant_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
        
                [
                'id' => '8',
                'name' => "XtL (Other)",
                'active' => '0',
                'tenant_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
        

        ]);

        Schema::enableForeignKeyConstraints();
    }
}
