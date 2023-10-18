<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Thread;
use App\Models\Genre;
use Illuminate\Support\Facades\Http;

class Translation_GameController extends Controller
{
    public function home(Game $games , Thread $threads , Genre $genres)
    {
        return view('games.translated_index')->with(['games' => $games->get() , 'threads' => $threads->get() , 'genres' => $genres->get()]);
    }
    
    public function store(Request $request , Game $game)
    {
        //英語データを入力
        $input = $request['game'];
        //日本語翻訳する
        $translated_game_name = $input['translated_game_name'];
        $response = Http::get(
             // 無料版URL
             'https://api-free.deepl.com/v2/translate',
             // GETパラメータ
             [
                 'auth_key' => config('services.deepl.token'),
                 'target_lang' => 'JA',
                 'text' => $translated_game_name,
             ]
         );
        $translated_game_name = $response->json('translations')[0]['text'];
        $input['game_name'] = $translated_game_name;
        $game->fill($input)->save();
        return redirect('/translated');
    }
    
    public function show(Game $game , Thread $threads)
    {
        return view('games.translated_show')->with(['game' => $game , 'threads' => $game->threads()->get()]);
    }
}