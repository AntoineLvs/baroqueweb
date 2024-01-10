<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BaseServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void    {
        Schema::disableForeignKeyConstraints();
        // 1 HVO 2 PtL 3 Gtl 4 BtL 5 XtL

        DB::table('base_services')->delete();
        DB::table('base_services')->insert([
            [
                'id' => '1',
                'tenant_id' => '1',
                'name' => "Vacuum cleaner",
                'description' => "Vacuum cleaner to get your car cleaner",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'id' => '2',
                'tenant_id' => '1',
                'name' => "Wash station",
                'description' => "Wash station to get your car cleaner",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'id' => '3',
                'tenant_id' => '1',
                'name' => "Tire pressure",
                'description' => "Tire pressure description ...",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

        ]);

        Schema::enableForeignKeyConstraints();
    }
}
