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
        Schema::create('product_offer_inquiries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id')->index();

            $table->integer('active')->default(0);
            $table->unsignedBigInteger('inquiry_type')->default(1);
            $table->unsignedBigInteger('inquiry_status')->default(0);

            $table->unsignedBigInteger('product_unit_id')->nullable();
            $table->unsignedBigInteger('product_type_id')->nullable();

            $table->unsignedBigInteger('public_product_offer_id')->nullable();
            $table->unsignedBigInteger('product_offer_id')->nullable();
            $table->unsignedBigInteger('supplier_tenant_id')->nullable();

            $table->text('request_text')->nullable();
            $table->decimal('request_quantity')->default(1);

            $table->unsignedBigInteger('status')->default(0);

            $table->foreign('public_product_offer_id')->references('id')->on('public_product_offers')->onDelete('cascade');
            $table->foreign('product_offer_id')->references('id')->on('product_offers');
            $table->foreign('product_type_id')->references('id')->on('product_types');

            $table->foreign('supplier_tenant_id')->references('id')->on('tenants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_offer_inquiries');
    }
};
