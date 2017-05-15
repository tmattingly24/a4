<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		  $options = \App\Option::firstOrCreate([
            'name' => 'Generic Option 1',
            'poll_id' => '6',
        ]);
		
		 $options = \App\Option::firstOrCreate([
            'name' => 'Generic Option 2',
            'poll_id' => '6',
        ]);
    }
}
