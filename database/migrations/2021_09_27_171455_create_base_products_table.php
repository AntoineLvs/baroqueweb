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
        Schema::create('base_products', function (Blueprint $table) {
            $table->id();

            $table->timestamps();

            $table->string('name');
            $table->unsignedBigInteger('product_type_id');
            $table->integer('active')->default(0);
            $table->string('data')->nullable();
            $table->decimal('blend_percent', 5, 2)->nullable();

            $table->foreign('product_type_id')->references('id')->on('product_types');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_products');
    }
};
