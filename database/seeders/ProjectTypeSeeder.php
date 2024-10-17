<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('project_types')->delete();
        DB::table('project_types')->insert([

            [
                'id' => '1',
                'name' => "Small Web Application",
                'description' => "Qui possède des fonctionnalités simple, de base.",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '2',
                'name' => "Medium Web Application",
                'description' => "Qui possède des fonctionnalités simple, ainsi qu'une ou deux fonctionnalités plus complexes.",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '3',
                'name' => "Big Web Application",
                'description' => "Qui possède des fonctionnalités complexes.",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '4',
                'name' => "Site Vitrine",
                'description' => "Un site vitrine simple et efficace, qui comporte plusieurs pages, un formulaire de contact, et un bon référencement.",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '5',
                'name' => "Site E-commerce",
                'description' => "Site E-commerce, avec un catalogue attrayant, un systeme de filtrage et de recherche avancé, le payement en ligne, et la livraison.",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

        ]);
    }
}
