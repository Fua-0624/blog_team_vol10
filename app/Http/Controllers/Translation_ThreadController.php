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
        return view('threads.translated_show')->with(['game' => $game , 'thread' => $thread , 'comments' => $comments->get()]);
    }
    
    public function create(Game $game)
    {
        return view('threads.translated_create')->with(['game' => $game]);
    }
    
    public function store(Request $request , Thread $thread, Game $game)
    {
        //英語データを入力
        $input = $request['thread'];
        
        //英語を日本語に翻訳
        $translated_thread = $input;
        //titleを英訳する
        $response = Http::get(
             // 無料版URL
             'https://api-free.deepl.com/v2/translate',
             // GETパラメータ
             [
                 'auth_key' => config('services.deepl.token'),
                 'target_lang' => 'JA',
                 'text' => $translated_thread['translated_title'],
             ]
         );
        $translated_thread['translated_title'] = $response->json('translations')[0]['text'];
        $input['title'] = $translated_thread['translated_title'];
        //bodyを英訳する
        $response = Http::get(
             // 無料版URL
             'https://api-free.deepl.com/v2/translate',
             // GETパラメータ
             [
                 'auth_key' => config('services.deepl.token'),
                 'target_lang' => 'JA',
                 'text' => $translated_thread['translated_body'],
             ]
         );
        $translated_thread['translated_body'] = $response->json('translations')[0]['text'];
        $input['body'] = $translated_thread['translated_body'];
        
        $input['user_id'] = Auth::id();
        $input['game_id'] = $game->id;
        $thread->fill($input)->save();
        return redirect('/translated/games/' . $game->id);
    }
}
