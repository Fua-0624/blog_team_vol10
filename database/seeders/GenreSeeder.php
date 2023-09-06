<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
        'genre_name'=>'シュミレーション',
        'translated_game_name'=>'Simulation',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'シューティング',
        'translated_genre_name'=>'Shooter',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'アクション',
        'translated_genre_name'=>'Action',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'アドベンチャー',
        'translated_genre_name'=>'Adventure',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'ロールプレイング',
        'translated_genre_name'=>'Role-playing',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'パズル',
        'translated_genre_name'=>'Puzzle',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'レース',
        'translated_genre_name'=>'Race',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'音楽',
        'translated_genre_name'=>'Music',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'スポーツ',
        'translated_genre_name'=>'Sport',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'オープンワールド',
        'translated_genre_name'=>'Open World',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'ボード',
        'translated_genre_name'=>'board',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
    }
}
