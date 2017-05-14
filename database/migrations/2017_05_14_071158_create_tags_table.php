<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create tags table
		Schema::create('tags', function (Blueprint $table) {

		# Auto Incrementing ID field
		
		$table->increments('id');

		# The rest of the fields...
		$table->string('name');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop delete tags table if needed
		Schema::drop('tags');
    }
}
