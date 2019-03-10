<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysiciansTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physicians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('physicianNumber')->unique();;
            $table->string('password');
            $table->string('specialty');
            $table->string('city');
            $table->timestamps();
            $table->rememberToken();
            $table->integer('admin_privilege')->default(0);
            $table->integer('logged_in')->default(0);
        });


        DB::table('physicians')->insert([
            'id' => 800,
            'firstName' => 'Richard',
            'lastName' => 'Blake',
            'physicianNumber' => '3454',
            'password' => 'physicianPassword',
            'specialty' => 'General',
            'city' => 'Montreal',
            'admin_privilege' => 0,
        ]);

        DB::table('physicians')->insert([
            'id' => 900,
            'firstName' => 'Bob',
            'lastName' => 'Harvey',
            'physicianNumber' => '3567',
            'password' => 'physicianPassword2',
            'specialty' => 'Cornea',
            'city' => 'Toronto',
            'admin_privilege' => 0,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('physicians');
    }
}
