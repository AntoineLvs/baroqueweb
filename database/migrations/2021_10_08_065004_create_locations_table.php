<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id')->index();

            $table->string('name');
            $table->text('description')->nullable();

            $table->string('address');
            $table->string('city');
            $table->string('zipcode');
            $table->string('country')->nullable();
            $table->string('distance')->nullable();

            $table->time('opening_start');
            $table->time('opening_end');
            $table->string('opening_info')->nullable();


            $table->integer('active')->default(0);
            $table->integer('verified')->default(0);
            $table->integer('status')->default(0);

            $table->double('lng', 10, 7)->nullable();
            $table->double('lat', 10, 7)->nullable();
            
            $table->unsignedBigInteger('location_type_id');
            $table->json('service_id')->nullable();
            $table->json('product_id')->nullable();



            $table->foreign('location_type_id')->references('id')->on('location_types');


            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
