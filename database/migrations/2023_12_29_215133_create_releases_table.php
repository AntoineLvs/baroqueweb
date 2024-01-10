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
        Schema::create('releases', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('engine_id');
            $table->unsignedBigInteger('standard_id');
            $table->unsignedBigInteger('manufacturer_id');
            $table->string('info');

            $table->string('release_from')->nullable();

            $table->timestamp('date')->nullable();

            $table->foreign('engine_id')->references('id')->on('engines');
            $table->foreign('standard_id')->references('id')->on('standards');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('releases');
    }
};
