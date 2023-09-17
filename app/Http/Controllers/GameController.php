<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Thread;
use App\Models\Genre;
use App\Models\Bookmark;

class GameController extends Controller
{
    public function home(Game $games , Thread $threads , Genre $genre)
    {
        return view('games.index')->with(['games' => $games->get() , 'threads' => $threads->get() , 'genres' => $genre->get()]);
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
    
    public function bookmark_games(){
        $games = \Auth::user()->bookmark_games()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'games' => $games,
        ];
        return view('games.bookmarks', $data);
    }
}
