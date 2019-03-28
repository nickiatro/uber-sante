<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('healthCard')->unique();
            $table->string('birthday');
            $table->string('gender');
            $table->string('phone');
            $table->string('country');
            $table->string('province');
            $table->string('postalCode');
            $table->string('city');
            $table->string('street');
            $table->timestamps();
            $table->rememberToken();
            $table->integer('admin_privilege')->default(0);
            $table->integer('nurse_privilege')->default(0);
            $table->integer('physician_privilege')->default(0);
            $table->integer('logged_in')->default(0);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
