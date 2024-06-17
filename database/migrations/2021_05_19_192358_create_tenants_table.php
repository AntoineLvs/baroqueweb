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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
            $table->integer('type')->default(1);
            $table->unsignedBigInteger('tenant_type_id')->default(1);
            $table->unsignedInteger('api_calls_count')->default(0);
            $table->string('url_subsite', 255)->nullable();

            $table->integer('status')->default(0);
            $table->integer('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('street')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('description')->nullable();
            $table->string('website')->nullable();
            $table->string('photo')->nullable();
            $table->string('photo_header')->nullable();
            //$table->integer('transmission')->default(1);

            $table->foreign('tenant_type_id')->references('id')->on('tenant_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
