<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Thread;
use App\Models\Genre;

class Translation_GameController extends Controller
{
    public function home(Game $games , Thread $threads , Genre $genre)
    {
        return view('games.translated_index')->with(['games' => $games->get() , 'threads' => $threads->get() , 'genres' => $genre->get()]);
    }
    
    public function store(Request $request , Game $game)
    {
        $input = $request['game'];
        $game->fill($input)->save();
        return redirect('/translated');
    }
    
    public function show(Game $game , Thread $threads)
    {
        return view('games.translated_show')->with(['game' => $game , 'threads' => $game->threads()->get()]);
    }
}