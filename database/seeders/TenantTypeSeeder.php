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
                'name' => 'Hofladen',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '2',
                'name' => 'Hobbygärtner',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '3',
                'name' => 'Konsument',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '4',
                'name' => 'Händler',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '5',
                'name' => 'Andere',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ]);

    }
}
