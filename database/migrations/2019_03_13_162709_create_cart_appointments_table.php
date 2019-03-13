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
            $table->integer('clinic_id');
            $table->dateTime('start_time');
            $table->integer('duration');
            $table->integer('patient_id');
            $table->integer('physician_id');
            $table->integer('room_id');
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
        Schema::dropIfExists('cart_appointments');
    }
}
