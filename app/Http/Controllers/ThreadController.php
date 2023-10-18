<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Thread;
use App\Models\Comment;
use Illuminate\Support\Facades\Http;

class ThreadController extends Controller
{
    public function show(Game $game , Thread $thread , Comment $comments)
    {
        return view('threads.show')->with(['game' => $game , 'thread' => $thread , 'comments' => $thread->comments()->get()]);
    }
    
    public function create(Game $game)
    {
        return view('threads.create')->with(['game' => $game]);
    }
    
    public function store(Request $request , Thread $thread, Game $game)
    {
        //threadsテーブルのtitleカラムとbodyカラムに日本語のデータを入れる
        $input = $request['thread'];
        
        //日本語を英語に翻訳
        $translated_thread = $input;
        //titleを英訳する
        $response = Http::get(
             // 無料版URL
             'https://api-free.deepl.com/v2/translate',
             // GETパラメータ
             [
                 'auth_key' => config('services.deepl.token'),
                 'target_lang' => 'EN-US',
                 'text' => $translated_thread['title'],
             ]
         );
        $translated_thread['title'] = $response->json('translations')[0]['text'];
        $input['translated_title'] = $translated_thread['title'];
        //bodyを英訳する
        $response = Http::get(
             // 無料版URL
             'https://api-free.deepl.com/v2/translate',
             // GETパラメータ
             [
                 'auth_key' => config('services.deepl.token'),
                 'target_lang' => 'EN-US',
                 'text' => $translated_thread['body'],
             ]
         );
        $translated_thread['body'] = $response->json('translations')[0]['text'];
        $input['translated_body'] = $translated_thread['body'];
        
        $input['user_id'] = Auth::id();
        $input['game_id'] = $game->id;
        $thread->fill($input)->save();
        return redirect('/games/' . $game->id);
    }
}
