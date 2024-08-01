<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;



class LocationFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Location::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition(): array
  {
    // multi tenant

    // Génération d'une heure d'ouverture aléatoire entre 8h et 10h
    $openingStart = Carbon::createFromTime($this->faker->numberBetween(4, 8), $this->faker->numberBetween(0, 59), 0);

    // Génération d'une heure de fermeture aléatoire entre 16h et 18h après l'heure d'ouverture
    $openingEnd = Carbon::createFromFormat('H:i:s', $openingStart->format('H:i:s'))
      ->addHours($this->faker->numberBetween(10, 12));

    return [
      'tenant_id' => '1',
      'name' => $this->faker->company,
      'address' => $this->faker->streetAddress,
      'description' => $this->faker->sentence,
      'city' => $this->faker->city,
      'zipcode' => $this->faker->postcode,
      'country' => 'Germany',
      'distance' => Null,
      'opening_start' => $openingStart->format('H:i'),
      'opening_end' => $openingEnd->format('H:i'),
      'opening_info' => $this->faker->sentence,
      'verified' => $this->faker->boolean,
      'active' => rand(0, 1),
      'location_type_id' => $this->faker->numberBetween(1, 4),
      'service_id' => json_encode($this->faker->randomElements([1, 2, 3, 4], $this->faker->numberBetween(1, 3))),
      'product_id' => json_encode([$this->faker->numberBetween(1, 2)]),
      'created_at' => $this->faker->dateTimeThisMonth,
    ];
  }
}
