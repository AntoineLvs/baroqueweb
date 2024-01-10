<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    // $antoine = Location::factory()->create([
    //   'tenant_id' => '1',
    //   'name' => 'Antoines house',
    //   'address' =>'Flurstrasse 2B',
    //   'description' =>'German house for the next couple months !',
    //   'city' => 'Hamburg',
    //   'zipcode' => '22549',
    //   'country' => 'Germany',
    //   'distance' => Null,
    //   'opening_start' => '10:00',
    //   'opening_end' => '16:30',
    //   'opening_info' => 'Blablabla',
    //   'verified' => '0',
    //   'active' => '0',
    //   'status' => '0',
    //   'lng' => '9.87',
    //   'lat' => '53.59',
    //   'location_type_id' => '1',
    // ]);

    DB::table('locations')->delete();
    $location = Location::factory()->count(8)->create();


    Schema::enableForeignKeyConstraints();
  }
}
