<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TenantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('tenant_types')->delete();
        DB::table('tenant_types')->insert([
            [
                'id' => '1',
                'name' => 'Tankstelle & Handel',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '2',
                'name' => 'Hersteller',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],


            [
                'id' => '3',
                'name' => 'Sonstige',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ]);

    }
}
