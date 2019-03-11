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
            $table->integer('logged_in')->default(0);
        });

        DB::table('users')->insert([
            'id' => 1100,
            'email' => "admin@admin.com",
            'password' => "adminadmin",
            'healthCard' => "adminadmin",
            'birthday' => "01/01/2019",
            'gender' => "other",
            'phone' => "1010101010",
            'country' => "Canada",
            'province' => "Quebec",
            'postalCode' => "h1h1h1",
            'city' => "montreal",
            'street' => "admin street",
            'admin_privilege' => 1,
        ]);
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
