<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TokenTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('token_types')->delete();
        DB::table('token_types')->insert([
            [
                'id' => '1',
                'name' => 'Free License',
                'description' => 'Unterseite mit eigener Cl z.B. xtl-freigaben.de/efuel-today',
                'marketing' => 'Individuell anpassbar auf eigener Website, Gestaltung direkt im Kundenbackend',
                'monthly_cost' => '99',
                'api_call_cost' => '10',
                'tax_rate' => '0.19',
                'setup_cost' => '290',
                'contract_duration' => '365',
                'api_calls_count' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '2',
                'name' => 'On Site Integration',
                'description' => 'Unterseite mit eigener Cl z.B. xtl-freigaben.de/efuel-today',
                'marketing' => 'Individuell anpassbar auf eigener Website, Gestaltung direkt im Kundenbackend',
                'monthly_cost' => '99',
                'api_call_cost' => '10',
                'tax_rate' => '0.19',
                'setup_cost' => '290',
                'contract_duration' => '365',
                'api_calls_count' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ]);
    }
}
