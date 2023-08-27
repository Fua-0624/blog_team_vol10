<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Thread;
use App\Models\Comment;

class Translation_CommentController extends Controller
{
    public function create(Game $game , Thread $thread)
    {
        return view('comments.translated_create')->with(['game' => $game , 'thread' => $thread]);
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
