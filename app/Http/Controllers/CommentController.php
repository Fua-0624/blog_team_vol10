<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Thread;
use App\Models\Comment;
use Illuminate\Support\Facades\Http;

class CommentController extends Controller
{
    public function create(Game $game , Thread $thread)
    {
        return view('comments.create')->with(['game' => $game , 'thread' => $thread]);
    }
    
    public function store(Request $request , Comment $comment, Thread $thread)
    {
        //commentsテーブルのbodyカラムに入れる日本語データを$inputに入れる
        $input = $request['comment'];
        
        //日本語を英語に翻訳してtranslated_bodyカラムに入れる
        $translated_body = $input; 
        $response = Http::get(
             // 無料版URL
             'https://api-free.deepl.com/v2/translate',
             // GETパラメータ
             [
                 'auth_key' => config('services.deepl.token'),
                 'target_lang' => 'EN-US',
                 'text' => $translated_body['body'],
             ]
         );
        $translated_body = $response->json('translations')[0]['text'];
        $input['translated_body'] = $translated_body;
        
        $input['user_id'] = Auth::id();
        $input['thread_id'] = $thread->id;
        
        $comment->fill($input)->save();
        $game = $thread->game()->first();
        return redirect('/games/' . $game->id . '/threads/' . $thread->id);
    }
}
