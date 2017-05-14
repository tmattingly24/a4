<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create the options table
		
		 Schema::create('options', function (Blueprint $table) {

		# Auto Incrementing ID field
		
		$table->increments('id');
		$table->timestamps();
		# The rest of the fields...
		$table->string('name');
		$table->integer('votes')->default(0);
			 
		$table->integer('poll_id')->unsigned();
			
            # Make foreign keys
			
         $table->foreign('poll_id')->references('id')->on('polls');
			
			 
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
		
		Schema::drop('options');
    }
}
