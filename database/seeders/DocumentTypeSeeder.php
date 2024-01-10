<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();

        DB::table('document_types')->delete();
        DB::table('document_types')->insert([
            [
                'id' => '1',
                'name' => 'Product Datasheet',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '2',
                'name' => 'Project Description',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '3',
                'name' => 'Business Terms',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '4',
                'name' => 'Product Offer',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '5',
                'name' => 'Other',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ]);

        Schema::enableForeignKeyConstraints();
    }
}
