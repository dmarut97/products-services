<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products',function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->foreignId('category')->references('id_category')->on('category');
            $table->foreignId('producer')->references('id_producer')->on('producer');
            $table->double('net_price');
            $table->double('gross_price');
            $table->integer('percent_VAT');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
