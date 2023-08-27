<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Thread;
use App\Models\Comment;

class Translatation_ThreadController extends Controller
{
    public function show(Game $game , Thread $thread , Comment $comments)
    {
        return view('threads.translated_show')->with(['game' => $game , 'thread' => $thread , 'comments' => $thread->comments()->get()]);
    }
    
    public function create(Game $game)
    {
        return view('threads.translated_create')->with(['game' => $game]);
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
