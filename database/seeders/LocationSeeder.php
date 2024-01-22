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

    Location::factory()->create([
      'tenant_id' => '1',
      'name' => 'Bahrenfeld Esso',
      'address' => 'Theodorstraße 1',
      'description' => 'Esso description !',
      'city' => 'Hamburg',
      'zipcode' => '22761',
      'country' => 'Germany',
      'distance' => Null,
      'opening_start' => '00:00',
      'opening_end' => '00:00',
      'opening_info' => 'Informations about opening hours',
      'verified' => '0',
      'active' => '0',
      'status' => '0',
      'lng' => '9.89689014472671', 
      'lat' => '53.56578311708071',
      'location_type_id' => '1',
    ]);
    Location::factory()->create([
      'tenant_id' => '1',
      'name' => 'Esso Station Hamburg Koppelstrasse',
      'address' => 'Koppelstraße 30',
      'description' => 'Esso description !',
      'city' => 'Hamburg',
      'zipcode' => '22527',
      'country' => 'Germany',
      'distance' => Null,
      'opening_start' => '06:00',
      'opening_end' => '22:00',
      'opening_info' => 'Informations about opening hours',
      'verified' => '0',
      'active' => '0',
      'status' => '0',
      'lng' => '9.938949225081904', 
      'lat' => '53.59301794510828',
      'location_type_id' => '1',
    ]);
    Location::factory()->create([
      'tenant_id' => '1',
      'name' => 'Esso Station Hamburg Ostfrieslandstrasse',
      'address' => 'Ostfrieslandstraße 97',
      'description' => 'Esso description !',
      'city' => 'Hamburg',
      'zipcode' => '21129',
      'country' => 'Germany',
      'distance' => Null,
      'opening_start' => '00:00',
      'opening_end' => '00:00',
      'opening_info' => 'Informations about opening hours',
      'verified' => '0',
      'active' => '0',
      'status' => '0',
      'lng' => ' 9.886471422731614', 
      'lat' => '53.52662184322945',
      'location_type_id' => '1',
    ]);

    Location::factory()->create([
      'tenant_id' => '2',
      'name' => 'Hegestraße Shell',
      'address' => 'Hegestraße 26',
      'description' => 'Shell description !',
      'city' => 'Hamburg',
      'zipcode' => '20251',
      'country' => 'Germany',
      'distance' => Null,
      'opening_start' => '06:00',
      'opening_end' => '23:00',
      'opening_info' => 'Informations about opening hours',
      'verified' => '0',
      'active' => '0',
      'status' => '0',
      'lng' => '9.981372832630548', 
      'lat' => '53.58272060073454',
      'location_type_id' => '1',
    ]);

    Location::factory()->create([
      'tenant_id' => '2',
      'name' => 'Hammerbrook Shell',
      'address' => 'Amsinckstraße 60',
      'description' => 'Shell description !',
      'city' => 'Hamburg',
      'zipcode' => '20097',
      'country' => 'Germany',
      'distance' => Null,
      'opening_start' => '00:00',
      'opening_end' => '00:00',
      'opening_info' => 'Informations about opening hours',
      'verified' => '0',
      'active' => '0',
      'status' => '0',
      'lng' => '10.021071224931767', 
      'lat' => '53.54323311115686',
      'location_type_id' => '1',
    ]);

    Location::factory()->create([
      'tenant_id' => '2',
      'name' => 'Kollaustraße Shell',
      'address' => 'Kollaustraße 39',
      'description' => 'Shell description !',
      'city' => 'Hamburg',
      'zipcode' => '22529',
      'country' => 'Germany',
      'distance' => Null,
      'opening_start' => '00:00',
      'opening_end' => '00:00',
      'opening_info' => 'Informations about opening hours',
      'verified' => '0',
      'active' => '0',
      'status' => '0',
      'lng' => '9.961673652325398', 
      'lat' => '53.602848979108025',
      'location_type_id' => '1',
    ]);

    Location::factory()->create([
      'tenant_id' => '3',
      'name' => 'Bahrenfeld TotalEnergies',
      'address' => 'Von-Sauer-Straße 27 ',
      'description' => 'TotalEnergies Tankstelle description !',
      'city' => 'Hamburg',
      'zipcode' => '22761',
      'country' => 'Germany',
      'distance' => Null,
      'opening_start' => '05:00',
      'opening_end' => '22:00',
      'opening_info' => 'Informations about opening hours',
      'verified' => '0',
      'active' => '0',
      'status' => '0',
      'lng' => '9.906521899611883',
      'lat' => '53.56551776065264',
      'location_type_id' => '1',
    ]);

    Location::factory()->create([
      'tenant_id' => '3',
      'name' => 'Altonaer TotalEnergies',
      'address' => 'Altonaer Str. 377',
      'description' => 'TotalEnergies Tankstelle description !',
      'city' => 'Rellingen',
      'zipcode' => '25462',
      'country' => 'Germany',
      'distance' => Null,
      'opening_start' => '05:00',
      'opening_end' => '22:00',
      'opening_info' => 'Informations about opening hours',
      'verified' => '0',
      'active' => '0',
      'status' => '0',
      'lng' => '9.884611518445025',
      'lat' => '53.62198996869011',
      'location_type_id' => '1',
    ]);

    Location::factory()->create([
      'tenant_id' => '3',
      'name' => 'Mundsburg TotalEnergies',
      'address' => 'Mundsburger Damm 47',
      'description' => 'TotalEnergies Tankstelle description !',
      'city' => 'Hamburg',
      'zipcode' => '22087',
      'country' => 'Germany',
      'distance' => Null,
      'opening_start' => '05:00',
      'opening_end' => '22:00',
      'opening_info' => 'Informations about opening hours',
      'verified' => '0',
      'active' => '0',
      'status' => '0',
      'lng' => '10.020002942807713',
      'lat' => '53.575057142157405',
      'location_type_id' => '1',
    ]);

    Schema::enableForeignKeyConstraints();
  }
}
