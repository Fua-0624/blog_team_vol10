<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Thread;
use App\Models\Comment;

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
    
    public function store(Request $request)
        $input = $request['']; //明日確認して記入
        $game->fill($input)->save();
        return redirect('/games/' . $game->id);
}
