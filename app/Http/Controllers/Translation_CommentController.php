<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Thread;
use App\Models\Comment;
use Illuminate\Support\Facades\Http;

class Translation_CommentController extends Controller
{
    public function create(Game $game , Thread $thread)
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
        
        return view('comments.translated_create')->with(['game' => $translated_game , 'thread' => $translated_thread]);
    }
    
    public function store(Request $request , Comment $comment, Thread $thread)
    {
        $input = $request['comment'];
        $input['user_id'] = Auth::id();
        $input['thread_id'] = $thread->id;
        $comment->fill($input)->save();
        $game = $thread->game()->first();
        return redirect('/translated/games/' . $game->id . '/threads/' . $thread->id);
    }
}
