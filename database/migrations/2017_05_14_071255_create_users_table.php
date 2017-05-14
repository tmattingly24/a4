<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create users table
		
		 Schema::create('users', function (Blueprint $table) {

		# Auto Incrementing ID field
		
		$table->increments('id');

		# created and updated_at fields
		$table->timestamps();
		$table->rememberToken();
			 
		# The rest of the fields...
		$table->string('name');
		$table->string('email')->unique();
		$table->string('password');

		

	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop this table if needed
		
		Schema::drop('users');
    }
}
