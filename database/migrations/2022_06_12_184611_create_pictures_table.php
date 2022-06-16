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
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('url');
            $table->integer('size');
            $table->text('description');
            $table->unsignedBigInteger('theme_id');
            $table->unsignedBigInteger('order_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('theme_id')->references('id')->on('themes');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pictures');
    }
};
