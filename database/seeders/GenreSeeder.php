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
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'シューティング',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'アクション',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'アドベンチャー',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'ロールプレイング',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'パズル',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'レース',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'音楽',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'スポーツ',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'オープンワールド',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('genres')->insert([
        'genre_name'=>'ボード',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
    }
}
