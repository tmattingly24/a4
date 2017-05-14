<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {

		# Auto Incrementing ID field
		
		$table->increments('id');

		# created and updated_at fields
		$table->timestamps();

		# The rest of the fields...
		$table->string('title');
		$table->mediumText('summary')->nullable();
		$table->integer('user_id');

		

	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('polls');
    }
}
