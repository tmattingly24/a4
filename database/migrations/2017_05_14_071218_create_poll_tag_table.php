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

		# The rest of the fields...
		$table->integer('poll_id');
		$table->integer('tag_id');
			
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
