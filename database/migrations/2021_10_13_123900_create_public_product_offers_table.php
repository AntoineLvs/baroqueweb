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
        Schema::create('public_product_offers', function (Blueprint $table) {
            $table->id();

            $table->text('informations')->nullable();

            $table->timestamp('date_valid')->nullable();

            $table->unsignedBigInteger('tenant_id')->index();
            $table->timestamps();
            $table->unsignedBigInteger('offer_type')->default(1);
            $table->unsignedBigInteger('offer_status')->default(0);

            $table->integer('active')->default(0);

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('contact_person')->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();

            //$table->decimal('quantity', 10, 2)->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('contact_person')->references('id')->on('users');

            $table->unsignedBigInteger('document_id')->nullable();

            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_product_offers');
    }
};
