<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokenTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('token_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('marketing');
            $table->decimal('monthly_cost', 10, 2);
            $table->decimal('api_call_cost', 10, 2);
            $table->decimal('setup_cost', 10, 2);
            $table->decimal('tax_rate', 10, 2)->default(0.19);
            $table->integer('contract_duration');
            $table->integer('api_calls_count')->default(0);
            $table->integer('locations_limit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('token_types');
    }
}
