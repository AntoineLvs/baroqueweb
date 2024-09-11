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
                'name' => 'Kostenlose Lizenz',
                'description' => 'Legen Sie bis zu 5 eigene Tankstellen kostenlos an.',
                'marketing' => 'Individuelle Verwaltung jeder Tankstelle im Backend. Freie Zuweisung von HVO Produkten.',
                'monthly_cost' => '0',
                'api_call_cost' => '0',
                'tax_rate' => '0.19',
                'setup_cost' => '0',
                'contract_duration' => '365',
                'api_calls_count' => '0',
                'locations_limit' => '5',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '2',
                'name' => 'Business Lizenz',
                'description' => 'Legen Sie bis zu 10 eigene Tankstellen kostenlos an.',
                'marketing' => 'Individuelle Verwaltung jeder Tankstelle im Backend. Freie Zuweisung von HVO Produkten.',
                'monthly_cost' => '99',
                'api_call_cost' => '0.05',
                'tax_rate' => '0.19',
                'setup_cost' => '290',
                'contract_duration' => '365',
                'api_calls_count' => '0',
                'locations_limit' => '25',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ]);
    }
}
