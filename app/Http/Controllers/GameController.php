<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Thread;
use App\Models\Genre;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function home(Game $games , Thread $threads , Genre $genre)
    {
        return view('games.index')->with(['games' => $games->get() , 'threads' => $threads->get() , 'genres' => $genre->get()]);
    }
    
    public function store(Request $request , Game $game)
    {
        //日本語データを$inputに入れる
        $input = $request['game'];
        
        //英語翻訳する
        $translated_game_name = $input['game_name'];
        $response = Http::get(
             // 無料版URL
             'https://api-free.deepl.com/v2/translate',
             // GETパラメータ
             [
                 'auth_key' => config('services.deepl.token'),
                 'target_lang' => 'EN-US',
                 'text' => $translated_game_name,
             ]
         );
        $translated_game_name = $response->json('translations')[0]['text'];
        $input['translated_game_name'] = $translated_game_name;
        
        $game->fill($input)->save();
        return redirect('/');
    }
    
    public function show(Game $game , Thread $threads)
    {
        return view('games.show')->with(['game' => $game , 'threads' => $game->threads()->get()]);
    }
    
    public function bookmark_games(){
        $games = \Auth::user()->bookmark_games()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'games' => $games,
        ];
        return view('games.bookmarks', $data);
    }
}
