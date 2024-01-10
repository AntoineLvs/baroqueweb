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
        Schema::create('model_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('model');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('user_type')->nullable();
            $table->string('message');
            $table->text('meta')->nullable();
            $table->timestamp('performed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_histories');
    }
};
