<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Thread;
use App\Models\Genre;

class BookmarkController extends Controller
{
    public function store($gameId){
        $user = \Auth::user();
        if (!$user->is_bookmark($gameId)){
            $user->bookmark_games()->attach($gameId);
        }
        return back();
    }
    
    public function destroy($gameId){
        $user = \Auth::user();
        if ($user->is_bookmark($gameId)){
            $user->bookmark_games()->detach($gameId);
        }
        return back();
    }
}
