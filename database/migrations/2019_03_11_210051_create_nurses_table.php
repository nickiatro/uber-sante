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
            $table->string('password');
            $table->timestamps();
            $table->rememberToken();
            $table->integer('admin_privilege')->default(0);
            $table->integer('logged_in')->default(0);
        });

        DB::table('nurses')->insert([
            'id' => 300,
            'accessId' => 'nurse123',
            'password' => 'nursePassword',
            'admin_privilege' => 0,
        ]);

        DB::table('nurses')->insert([
            'id' => 400,
            'accessId' => 'nurse678',
            'password' => 'nursePassword2',
            'admin_privilege' => 0,
        ]);

        DB::table('nurses')->insert([
            'id' => 500,
            'accessId' => 'nurse543',
            'password' => 'nursePassword31',
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
        Schema::dropIfExists('nurses');
    }
}
