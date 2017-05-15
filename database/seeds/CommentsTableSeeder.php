<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = \App\Comment::firstOrCreate([
            'comment' => 'Generic Comment 1',
            'poll_id' => '6',
			'user_id' => '1',
        ]);
        
        $comments = \App\Comment::firstOrCreate([
            'comment' => 'Generic Comment 2',
            'poll_id' => '6',
			'user_id' => '1',
        ]);

    }
}
