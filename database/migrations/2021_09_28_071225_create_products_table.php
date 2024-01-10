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
        Schema::create('products', function (Blueprint $table) {
            $table->id();


            $table->string('name');
            $table->unsignedBigInteger('base_product_id')->nullable();
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('product_unit_id');
            $table->unsignedBigInteger('standard_id')->nullable();
      
            $table->integer('active')->default(0);
            $table->string('data')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->string('price_unit')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->unsignedBigInteger('document_id')->nullable();
            $table->decimal('blend_percent', 5, 2)->nullable();
            $table->string('file')->nullable();
      
      
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
      
      
            $table->foreign('base_product_id')->references('id')->on('base_products');
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('product_unit_id')->references('id')->on('product_units');
            $table->foreign('standard_id')->references('id')->on('standards');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
