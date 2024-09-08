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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id')->index();
            $table->unsignedBigInteger('to_tenant_id')->nullable();

            // Order-related fields
            $table->unsignedBigInteger('order_status_id')->default(1);
            $table->unsignedBigInteger('order_type_id')->default(1);
            $table->unsignedBigInteger('product_type_id')->nullable();


            // Customer-related fields
            $table->unsignedBigInteger('customer_tenant_id')->nullable();
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

            // General fields
            $table->text('order_notice')->nullable();
            $table->timestamp('date_valid')->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->string('price_unit')->nullable();
            $table->timestamp('date_customer_sent')->nullable();
            $table->timestamp('date_customer_confirmed')->nullable();
            $table->timestamp('date_customer_cancelled')->nullable();

            // Foreign key references
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('contact_person')->nullable();
            $table->unsignedBigInteger('document_id')->nullable();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('contact_person')->references('id')->on('users');
            $table->foreign('customer_tenant_id')->references('id')->on('tenants');
            $table->foreign('order_type_id')->references('id')->on('order_types')->onDelete('cascade');
            $table->foreign('order_status_id')->references('id')->on('order_statuses')->onDelete('cascade');
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');

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
