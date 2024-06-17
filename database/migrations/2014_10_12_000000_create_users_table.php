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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('role')->default('user');
            $table->integer('status')->default(0);
            $table->string('email'); // ->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedInteger('api_calls_count')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamp('last_sent_at')->nullable()->default(null);
            $table->json('ci_settings')->nullable();
            $table->timestamp('ci_last_edit')->nullable();
            $table->string('invoice_number_prefix')->nullable();
            $table->timestamp('license_requested_at')->nullable();
            $table->string('company_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('iban')->nullable();
            $table->string('bic')->nullable();
            $table->string('country')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->integer('billing_count')->nullable();
            

            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->unsignedBigInteger('tenant_type')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
