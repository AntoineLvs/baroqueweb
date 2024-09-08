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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id')->index();
            $table->unsignedBigInteger('from_tenant_id')->nullable();
            $table->unsignedBigInteger('shipper_tenant_id');

            // Customer-related fields
            $table->unsignedBigInteger('to_tenant_id')->nullable();
            $table->string('customer_company_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_contact_firstname')->nullable();
            $table->string('customer_contact_lastname')->nullable();
            $table->string('customer_street')->nullable();
            $table->string('customer_zip')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_country')->nullable();
            $table->text('customer_order_notice')->nullable();
            $table->text('order_notice')->nullable();

            // Order-related fields
            $table->unsignedBigInteger('shipping_status_id')->default(1);

            // General fields

            $table->timestamp('date_of_shipping')->nullable();
            $table->timestamp('date_shipping_sent')->nullable();
            $table->timestamp('date_shipping_confirmed')->nullable();
            $table->timestamp('date_shipping_done')->nullable();
            $table->text('shipping_notice')->nullable();

            // Foreign key constraints
            $table->foreign('from_tenant_id')->references('id')->on('tenants');
            $table->foreign('to_tenant_id')->references('id')->on('tenants');
            $table->foreign('shipper_tenant_id')->references('id')->on('tenants');
            $table->foreign('shipping_status_id')->references('id')->on('shipping_statuses')->onDelete('cascade');

            // Default Laravel fields
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
