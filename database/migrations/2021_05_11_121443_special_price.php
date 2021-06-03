<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SpecialPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_price',function (Blueprint $table) {
            $table->id('id_special_price');
            $table->foreignId('id_products')->references('id')->on('products');
            $table->foreignId('NIP_number')->references('NIP')->on('contractor');
            $table->double('net_price');
            $table->double('quantity');
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
