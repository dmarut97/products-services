<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('reservation',function (Blueprint $table) {
          $table->id('id_reservation');
          $table->foreignId('id_services')->references('id_services')->on('services');
          $table->string('name');
          $table->integer('phone_number');
          $table->date('date_reservation');
          $table->time('time_reservation');
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
