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
        Schema::create('orders', function (Blueprint $table) {
            // product
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('name');
            $table->unsignedBigInteger('stock');
            $table->unsignedBigInteger('price');
            $table->string('category');
            $table->unsignedBigInteger('sold')->nullable()->default(0);
            $table->unsignedBigInteger('count');
            $table->string('size');
            $table->string('status');
            $table->string('image');
            $table->string('payment')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
