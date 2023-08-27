<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Thread;
use App\Models\Genre;
use Illuminate\Support\Facades\Http;

class Translation_GameController extends Controller
{
    public function home(Game $games , Thread $threads , Genre $genre)
    {
        $translated_games = $games->get();
        for ($i = 0; $i < count($translated_games); $i++) {
            $response = Http::get(
                // 無料版URL
                'https://api-free.deepl.com/v2/translate',
                // GETパラメータ
                [
                    'auth_key' => config('services.deepl.token'),
                    'target_lang' => 'EN-US',
                    'text' => $translated_games[$i]->game_name,
                ]
            );
            $translated_games[$i]->game_name = $response->json('translations')[0]['text'];
        }
        
        $translated_threads = $threads->get();
        for ($i = 0; $i < count($translated_threads); $i++) {
            $response = Http::get(
                // 無料版URL
                'https://api-free.deepl.com/v2/translate',
                // GETパラメータ
                [
                    'auth_key' => config('services.deepl.token'),
                    'target_lang' => 'EN-US',
                    'text' => $translated_threads[$i]->title,
                ]
            );
            $translated_threads[$i]->title = $response->json('translations')[0]['text'];
        }
        
        $translated_genres = $genre->get();
        for ($i = 0; $i < count($translated_genres); $i++) {
            $response = Http::get(
                // 無料版URL
                'https://api-free.deepl.com/v2/translate',
                // GETパラメータ
                [
                    'auth_key' => config('services.deepl.token'),
                    'target_lang' => 'EN-US',
                    'text' => $translated_genres[$i]->genre_name,
                ]
            );
            $translated_genres[$i]->genre_name = $response->json('translations')[0]['text'];
        }
        
        return view('games.translated_index')->with(['games' => $translated_games , 'threads' => $translated_threads , 'genres' => $translated_genres]);
    }
    
    public function store(Request $request , Game $game)
    {
        $input = $request['game'];
        $game->fill($input)->save();
        return redirect('/translated');
    }
    
    public function show(Game $game , Thread $threads)
    {
        $translated_game = $game;
        $response = Http::get(
            // 無料版URL
            'https://api-free.deepl.com/v2/translate',
            // GETパラメータ
            [
                'auth_key' => config('services.deepl.token'),
                'target_lang' => 'EN-US',
                'text' => $translated_game->game_name,
            ]
        );
        $translated_game->game_name = $response->json('translations')[0]['text'];
        
        $translated_threads = $game->threads()->get();
        for ($i = 0; $i < count($translated_threads); $i++) {
            $response = Http::get(
                // 無料版URL
                'https://api-free.deepl.com/v2/translate',
                // GETパラメータ
                [
                    'auth_key' => config('services.deepl.token'),
                    'target_lang' => 'EN-US',
                    'text' => $translated_threads[$i]->title,
                ]
            );
            $translated_threads[$i]->title = $response->json('translations')[0]['text'];
        }
        
        return view('games.translated_show')->with(['game' => $translated_game , 'threads' => $translated_threads]);
    }
}