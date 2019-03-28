<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNursesTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accessId')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->rememberToken();
            $table->integer('admin_privilege')->default(0);
            $table->integer('nurse_privilege')->default(1);
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
        Schema::dropIfExists('nurses');
    }
}
