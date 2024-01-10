<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('manufacturers')->delete();
        DB::table('manufacturers')->insert([
            [
                'id' => '1',
                'name' => 'Abarth',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '2',
                'name' => 'Aiways',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '3',
                'name' => 'Aixam',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '4',
                'name' => 'Alfa Romeo',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '5',
                'name' => 'ALPINA',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '6',
                'name' => 'Alpine',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '7',
                'name' => 'ARI Motors',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '8',
                'name' => 'Aston Martin',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '9',
                'name' => 'Audi',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '10',
                'name' => 'Bentley',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '11',
                'name' => 'BMW',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '12',
                'name' => 'Bugatti',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '13',
                'name' => 'BYD',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '14',
                'name' => 'Cadillac',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '15',
                'name' => 'Casalini',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '16',
                'name' => 'Chevrolet',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '17',
                'name' => 'Chrysler',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '18',
                'name' => 'Citroen',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '19',
                'name' => 'CUPRA',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '20',
                'name' => 'Dacia',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '21',
                'name' => 'Daihatsu',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '22',
                'name' => 'Dodge',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '23',
                'name' => 'DS Automobiles',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '24',
                'name' => 'Ferrari',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '25',
                'name' => 'Fiat',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '26',
                'name' => 'Ford',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '27',
                'name' => 'Genesis',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '28',
                'name' => 'GWM',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '29',
                'name' => 'Honda',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '30',
                'name' => 'Hyundai',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '31',
                'name' => 'Infiniti',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '32',
                'name' => 'Isuzu',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '33',
                'name' => 'Jaguar',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '34',
                'name' => 'Jeep',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '35',
                'name' => 'Kia',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '36',
                'name' => 'Lada',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '37',
                'name' => 'Lamborghini',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '38',
                'name' => 'Lancia',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '39',
                'name' => 'Land Rover',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '40',
                'name' => 'Lexus',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '41',
                'name' => 'Ligier',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '42',
                'name' => 'Lotus',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '43',
                'name' => 'Maserati',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '44',
                'name' => 'Mazda',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '45',
                'name' => 'McLaren',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '46',
                'name' => 'Mercedes-Benz',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '47',
                'name' => 'MG',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '48',
                'name' => 'Microcar',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '49',
                'name' => 'MINI',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '50',
                'name' => 'Mitsubishi',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '51',
                'name' => 'Morgan',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '52',
                'name' => 'Nissan',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '53',
                'name' => 'Opel',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '54',
                'name' => 'Peugeot',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '55',
                'name' => 'Porsche',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '56',
                'name' => 'Renault',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '57',
                'name' => 'Rolls-Royce',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '58',
                'name' => 'SEAT',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '59',
                'name' => 'Skoda',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '60',
                'name' => 'smart',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '61',
                'name' => 'SsangYong',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '62',
                'name' => 'Subaru',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '63',
                'name' => 'Suzuki',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '64',
                'name' => 'Toyota',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '65',
                'name' => 'Volvo',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '66',
                'name' => 'Volkswagen (VW)',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '67',
                'name' => 'WEY',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ]);
        Schema::enableForeignKeyConstraints();
    }
}
