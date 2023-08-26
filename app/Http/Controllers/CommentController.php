<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Thread;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(Game $game , Thread $thread)
    {
        return view('comments.create')->with(['game' => $game , 'thread' => $thread]);
    }
    
    public function store(Request $request , Comment $comment)
    {
        $input = $request['comment'];
        $comment->fill($input)->save();
        return redirect('/games/' . $comment->thread->game->id . '/threads/' . $comment->thread->id);
    }
}
