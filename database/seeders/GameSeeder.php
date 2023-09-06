<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'game_name' => 'マインクラフト',
            'genre_id' => 1,
            'translated_game_name' => 'minecraft',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('games')->insert([
            'game_name' => 'モンスターハンター',
            'genre_id' => 5,
            'translated_game_name'=>'Monster Hunter',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
