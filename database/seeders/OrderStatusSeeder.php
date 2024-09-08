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
                'color' => "orange",

                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'id' => '2',
                'name' => "Anfrage bearbeitet",
                'color' => "yellow",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'id' => '3',
                'name' => "Anfrage abgelehent",
                'color' => "red",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


            [
                'id' => '20',
                'name' => "Angebot angelegt",
                'color' => "yellow",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '21',
                'name' => "Angebot gesendet",
                'color' => "blue",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],



            [
                'id' => '22',
                'name' => "Angebot abgelehnt",
                'color' => "red",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


            [
                'id' => '30',
                'name' => "Bestellung angelegt",
                'color' => "yellow",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


            [
                'id' => '31',
                'name' => "Bestellung bestätigt",
                'color' => "green",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'id' => '32',
                'name' => "Bestellung storniert",
                'color' => "green",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


            [
                'id' => '39',
                'name' => "Bestellung abgeschlossen",
                'color' => "green",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'id' => '40',
                'name' => "Lieferauftrag erstellt",
                'color' => "yellow",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'id' => '41',
                'name' => "Lieferauftrag bestätigt",
                'color' => "green",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


            [
                'id' => '42',
                'name' => "Lieferung durchgeführt",
                'color' => "green",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],




        ]);

        Schema::enableForeignKeyConstraints();
    }
}
