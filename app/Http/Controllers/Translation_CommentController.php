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
        return view('comments.translated_create')->with(['game' => $game , 'thread' => $thread]);
    }
    
    public function store(Request $request , Comment $comment, Thread $thread)
    {
        //英語データを入力
        $input = $request['comment'];
        
        //英語を日本語に翻訳
        $translated_body = $input;
        $response = Http::get(
             // 無料版URL
             'https://api-free.deepl.com/v2/translate',
             // GETパラメータ
             [
                 'auth_key' => config('services.deepl.token'),
                 'target_lang' => 'JA',
                 'text' => $translated_body['translated_body'],
             ]
         );
        $translated_body = $response->json('translations')[0]['text'];
        $input['body'] = $translated_body;
        
        $input['user_id'] = Auth::id();
        $input['thread_id'] = $thread->id;
        $comment->fill($input)->save();
        $game = $thread->game()->first();
        return redirect('/translated/games/' . $game->id . '/threads/' . $thread->id);
    }
}
