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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('tenant_id')->index();
            $table->unsignedBigInteger('engine_id');
            $table->unsignedBigInteger('manufacturer_id');

            $table->string('name');
            $table->string('vin')->nullable();
            $table->text('description')->nullable();

            $table->integer('active')->default(1);

            $table->foreign('engine_id')->references('id')->on('engines');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
