<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		
		
		
		 $user = \App\User::firstOrCreate([
            'email' => 'john@harvard.edu',
            'name' => 'John Harvard',
            'password' => \Hash::make('wordofpass')
        ]);
        
        $user = \App\User::firstOrCreate([
            'email' => 'jimmy@harvard.edu',
            'name' => 'Jimmy CrackCorn',
            'password' => \Hash::make('thepassword')
        ]);

    }
}
