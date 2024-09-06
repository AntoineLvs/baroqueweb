<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('order_types')->delete();
        DB::table('order_types')->insert([

            [
                'id' => '1',
                'name' => "Anfrage",
                'color' => "yellow",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '2',
                'name' => "Angebot",
                'color' => "green",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '3',
                'name' => "Bestellung",
                'color' => "blue",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


        ]);

        Schema::enableForeignKeyConstraints();
    }
}
