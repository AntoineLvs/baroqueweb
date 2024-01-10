<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('project_types')->delete();
        DB::table('project_types')->insert([
            [
                'id' => '1',
                'name' => 'E-Fuel Project',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '2',
                'name' => 'Investment',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '5',
                'name' => 'Other',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ]);

        Schema::enableForeignKeyConstraints();
    }
}
