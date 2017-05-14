<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create link table for polls->tags
		
		Schema::create('poll_tag', function (Blueprint $table) {

		# Auto Incrementing ID field
		
		 $table->increments('id');
         $table->timestamps();

		 $table->integer('poll_id')->unsigned();
         $table->integer('tag_id')->unsigned();
			
            # Make foreign keys
			
         $table->foreign('poll_id')->references('id')->on('polls');
         $table->foreign('tag_id')->references('id')->on('tags');
			
	});
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop (delete) this table if needed
		
		Schema::drop('poll_tag');
    }
}
