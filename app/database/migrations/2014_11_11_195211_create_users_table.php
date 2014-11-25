<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the users table
        Schema::create('users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('remember_token');
            $table->timestamps();
        });


        // Creates password reminders table
        Schema::create('tblRace', function($table)
        {
            $table->engine = 'InnoDB';
            $table->string('name');
            $table->string('coverImage');
            $table->string('packageID');
            $table->string('date');
            $table->string('location');
            $table->timestamp('created_at');
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