<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availabilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('physicianNumber')->unsigned()->nullable();
            $table->dateTime('start_time');
            $table->integer('duration');
            $table->timestamps();

        });

        Schema::table('appointments', function($table){
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
        Schema::dropIfExists('availabilities');
    }
}
