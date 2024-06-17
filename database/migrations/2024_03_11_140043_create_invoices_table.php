<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->string('invoice_number')->unique();
            $table->unsignedBigInteger('user_id');
            $table->decimal('api_call_count', 10, 2);
            $table->decimal('api_call_cost', 10, 2);
            $table->decimal('monthly_cost', 10, 2);
            $table->decimal('total_bill', 10, 2);
            $table->decimal('tax_rate', 10, 2)->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('status')->default('0');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
