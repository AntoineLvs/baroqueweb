<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('settings')->delete();
        DB::table('settings')->insert([
            [
                'id' => '1',
                'invoice_number_prefix' => '2400',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ]);
    }
}
