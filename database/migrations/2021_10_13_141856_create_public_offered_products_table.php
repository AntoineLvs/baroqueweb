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
        Schema::create('public_offered_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id')->index();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('public_product_offer_id');

            $table->integer('product_quantity')->nullable();
            $table->unsignedBigInteger('product_unit_id')->nullable();
            $table->integer('max_product_quantity')->nullable();
            $table->decimal('product_price', 10, 2)->nullable();
            $table->Decimal('product_tax', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();

            $table->foreign('public_product_offer_id')->references('id')->on('public_product_offers')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('product_unit_id')->references('id')->on('product_units');

            //$table->foreign('product_type_id')->references('id')->on('product_types');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_offered_products');
    }
};
