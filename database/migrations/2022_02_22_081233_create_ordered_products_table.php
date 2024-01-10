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
        Schema::create('ordered_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id')->index();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('order_id');

            $table->integer('product_quantity')->nullable();
            $table->unsignedBigInteger('product_unit_id')->nullable();
            $table->integer('max_product_quantity')->nullable();
            $table->decimal('product_price', 10, 2)->nullable();
            $table->Decimal('product_tax', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();

            $table->foreign('order_id')->references('id')->on('orders');
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
        Schema::dropIfExists('ordered_products');
    }
};
