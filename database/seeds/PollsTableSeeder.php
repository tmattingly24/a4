<?php

use Illuminate\Database\Seeder;

class PollsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		     $polls = \App\Poll::firstOrCreate([
            'title' => 'Generic Poll 1',
            'summary' => 'This is a summary',
			'user_id' => '1',
				 
			]);
		
			$polls = \App\Poll::firstOrCreate([
            'title' => 'Generic Poll 2',
            'summary' => 'This is also a summary',
			'user_id' => '1',
				 
			]);		
    }
}
