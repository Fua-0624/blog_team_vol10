<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'body' => '私も入りたい',
            'translated_body'=>'I also want to join',
            'thread_id' => 1, 
            'user_id' => 1, 
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'body' => '僕も',
            'translated_body'=>'Me too',
            'thread_id' => 2, 
            'user_id' => 1, 
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
