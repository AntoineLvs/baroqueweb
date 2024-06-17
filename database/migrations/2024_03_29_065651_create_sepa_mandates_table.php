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
        Schema::create('sepa_mandates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('creditor_informations')->nullable();
            $table->string('mandate_reference')->nullable();
            $table->string('mandate_type')->nullable();
            $table->string('payer_name')->nullable();
            $table->text('payer_address')->nullable();
            $table->string('payer_iban')->nullable();
            $table->string('payer_bic')->nullable();
            $table->string('payer_bank')->nullable();
            $table->string('payment_type')->nullable();
            $table->date('grant_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sepa_mandates');
    }
};
