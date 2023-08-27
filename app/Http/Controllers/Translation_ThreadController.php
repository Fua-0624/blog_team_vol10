<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Thread;
use App\Models\Comment;
use Illuminate\Support\Facades\Http;

class Translation_ThreadController extends Controller
{
    public function show(Game $game , Thread $thread , Comment $comments)
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
        
        $translated_thread = $thread;
        $response = Http::get(
            // 無料版URL
            'https://api-free.deepl.com/v2/translate',
            // GETパラメータ
            [
                'auth_key' => config('services.deepl.token'),
                'target_lang' => 'EN-US',
                'text' => $translated_thread->title,
            ]
        );
        $translated_thread->title = $response->json('translations')[0]['text'];
        $response = Http::get(
            // 無料版URL
            'https://api-free.deepl.com/v2/translate',
            // GETパラメータ
            [
                'auth_key' => config('services.deepl.token'),
                'target_lang' => 'EN-US',
                'text' => $translated_thread->body,
            ]
        );
        $translated_thread->body = $response->json('translations')[0]['text'];
        
        $translated_comments = $thread->comments()->get();
        for ($i = 0; $i < count($translated_comments); $i++) {
            $response = Http::get(
                // 無料版URL
                'https://api-free.deepl.com/v2/translate',
                // GETパラメータ
                [
                    'auth_key' => config('services.deepl.token'),
                    'target_lang' => 'EN-US',
                    'text' => $translated_comments[$i]->body,
                ]
            );
            $translated_comments[$i]->body = $response->json('translations')[0]['text'];
        }
        
        return view('threads.translated_show')->with(['game' => $translated_game , 'thread' => $translated_thread , 'comments' => $translated_comments]);
    }
    
    public function create(Game $game)
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
        
        return view('threads.translated_create')->with(['game' => $translated_game]);
    }
    
    public function store(Request $request , Thread $thread, Game $game)
    {
        $input = $request['thread'];
        $input['user_id'] = Auth::id();
        $input['game_id'] = $game->id;
        $thread->fill($input)->save();
        return redirect('/translated/games/' . $game->id);
    }
}
