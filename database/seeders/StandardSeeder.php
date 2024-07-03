<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StandardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('standards')->delete();
        DB::table('standards')->insert([
            [
                'id' => '1',
                'name' => 'DIN EN 15940',
                'url' => "test",
                'product_type_id' => "1",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            // [
            //     'id' => '1',
            //     'name' => 'DIN EN 590',
            //     'url' => "test",
            //     'product_type_id' => "1",
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],

            // [
            //     'id' => '2',
            //     'name' => 'DIN EN 15940 (XTL)',
            //     'url' => "test",
            //     'product_type_id' => "2",
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],F

        ]);
        Schema::enableForeignKeyConstraints();
    }
}
