<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('order_statuses')->delete();
        DB::table('order_statuses')->insert([

            [
                'id' => '1',
                'name' => "Anfrage erstellt",

                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '2',
                'name' => "Anfrage bearbeitet",

                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


            [
                'id' => '20',
                'name' => "Angebot erstellt",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '21',
                'name' => "Angebot abgelehnt",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '30',
                'name' => "Bestellung ausgelöst",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '39',
                'name' => "Bestellung abgeschlossen",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


        ]);

        Schema::enableForeignKeyConstraints();
    }
}
