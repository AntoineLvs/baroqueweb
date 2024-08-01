<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class LocationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Schema::disableForeignKeyConstraints();


    $faker = Faker::create();

    $stations = ['Esso', 'Shell', 'TotalEnergies', 'Aral', 'Avia'];
    $areas = [
      ['name' => 'Altona', 'lat' => 53.55, 'lng' => 9.93],
      ['name' => 'Bahrenfeld', 'lat' => 53.56, 'lng' => 9.89],
      ['name' => 'Eimsbüttel', 'lat' => 53.57, 'lng' => 9.96],
      ['name' => 'St. Pauli', 'lat' => 53.55, 'lng' => 9.97],
      ['name' => 'Hammerbrook', 'lat' => 53.54, 'lng' => 10.02],
      ['name' => 'Harburg', 'lat' => 53.46, 'lng' => 9.98],
      ['name' => 'Bergedorf', 'lat' => 53.48, 'lng' => 10.21],
      ['name' => 'Niendorf', 'lat' => 53.63, 'lng' => 9.95],
      ['name' => 'Rahlstedt', 'lat' => 53.61, 'lng' => 10.15],
      ['name' => 'Wilhelmsburg', 'lat' => 53.51, 'lng' => 9.99],
    ];

    for ($i = 0; $i < 50; $i++) {
      $station = $stations[array_rand($stations)];
      $area = $areas[array_rand($areas)];

      Location::factory()->create([
        'tenant_id' => rand(1, 3),
        'name' => $station . ' ' . $area['name'],
        'address' => $area['name'] . ' Street ' . rand(1, 100),
        'description' => $station . ' description!',
        'city' => 'Hamburg',
        'zipcode' => '2' . rand(1000, 9999),
        'country' => 'Germany',
        'distance' => null,
        'opening_start' => '00:01',
        'opening_end' => '23:59',
        'opening_info' => 'Informations about opening hours',
        'verified' => '0',
        'status' => '2',
        'lng' => $area['lng'] + (rand(-1000, 1000) / 100000),
        'lat' => $area['lat'] + (rand(-1000, 1000) / 100000),
        'location_type_id' => '1',
      ]);
    }

    Schema::enableForeignKeyConstraints();
  }
}
