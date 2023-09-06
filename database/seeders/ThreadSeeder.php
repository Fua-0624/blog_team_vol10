<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('threads')->insert([
            'title' => 'マイクラ募集',
            'body' => '集まれ', 
            'translated_title'=>'shall we play minecraft?',
            'translated_body'=>'gather everyone',
            'game_id' => 1, 
            'user_id' => 1, 
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('threads')->insert([
            'title' => 'モンハン募集',
            'body' => '集まれ２', 
            'translated_title'=>'shall we play Monster Hunter?',
            'translated_body'=>'gather everyone part2',
            'game_id' => 2, 
            'user_id' => 1, 
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
