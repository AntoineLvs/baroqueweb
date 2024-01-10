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
        Schema::create('bucket_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id')->index();

            $table->unsignedBigInteger('bucket_id');
            $table->unsignedBigInteger('product_offer_id');

            $table->timestamps();

            $table->foreign('bucket_id')->references('id')->on('buckets')->onDelete('cascade');
            $table->foreign('product_offer_id')->references('id')->on('product_offers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bucket_entries');
    }
};
