<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create link table for poll->option
		
		Schema::create('poll_option', function (Blueprint $table) {

		# Auto Incrementing ID field
		
		$table->increments('id');

		# The rest of the fields...
		$table->integer('poll_id');
		$table->integer('option_id');
			
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
		Schema::drop('poll_tag');
    }
}
