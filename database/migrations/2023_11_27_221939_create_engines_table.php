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
        Schema::create('engines', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('manufacturer_id');

            $table->string('name');
            $table->text('data')->nullable();

            $table->string('power_kw')->nullable();
            $table->string('power_ps')->nullable();
            $table->string('built_from')->nullable();
            $table->string('built_to')->nullable();

            $table->integer('active')->default(1);

            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engines');
    }
};
