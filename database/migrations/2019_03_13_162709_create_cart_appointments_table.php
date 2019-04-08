<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinic_id')->default(0);
            $table->dateTime('start_time');
            $table->integer('duration');
            $table->integer('healthCard')->unsigned()->nullable();;
            $table->integer('physicianNumber')->unsigned()->nullable();;
            $table->integer('room_id')->default(0);;
            $table->timestamps();

        });


        Schema::table('appointments', function($table){
            $table->foreign('healthCard')->references('healthCard')->on('users');
            $table->foreign('physicianNumber')->references('physicianNumber')->on('physicians');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_appointments');
    }
}
