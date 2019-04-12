<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('physicianNumber')->unique()->unsigned()->nullable();
            $table->string('accessId')->unique()->unsigned()->nullable();
            $table->integer('clinic_id');
            $table->timestamps();
        });

        Schema::table('clinic', function($table){
            $table->foreign('physicianNumber')->references('physicianNumber')->on('physicians');
            $table->foreign('accessId')->references('accessId')->on('nurses');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinic');
    }
}
