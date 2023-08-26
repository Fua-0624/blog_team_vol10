<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Thread;

class GameController extends Controller
{
    public function home(Game $games , Thread $threads)
    {
        return view('games.index')->with(['games' => $games->get() , 'threads' => $threads->get()]);
    }
    
    public function store(Request $request , Game $game)
    {
        $input = $request['game'];
        $game->fill($input)->save();
        return redirect('/');
    }
    
    public function show(Game $game , Thread $threads)
    {
        return view('games.show')->with(['game' => $game , 'threads' => $game->threads()->get()]);
    }
}
