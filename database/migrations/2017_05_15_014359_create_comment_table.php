<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        //create the options table
		
		 Schema::create('comments', function (Blueprint $table) {

		# Auto Incrementing ID field
		
		$table->increments('id');
		$table->timestamps();
		# The rest of the fields...
		$table->mediumText('comment');
			 
		$table->integer('poll_id')->unsigned();
		$table->integer('user_id')->unsigned()->nullable();
			
            # Make foreign keys
			
         $table->foreign('poll_id')->references('id')->on('polls');
		 $table->foreign('user_id')->references('id')->on('users');
			 
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop (delete) options table if needed
		
		Schema::drop('comments');
    }
}


