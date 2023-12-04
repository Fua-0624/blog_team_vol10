<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\Translation_GameController;
use App\Http\Controllers\Translation_ThreadController;
use App\Http\Controllers\Translation_CommentController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//日本語版
Route::middleware('auth')->group(function(){
    Route::controller(ProfileController::class)->group(function(){
        Route::get('/profile','edit')->name('profile.edit');
        Route::patch('/profile','update')->name('profile.update');
        Route::delete('/profile','destroy')->name('profile.destroy');
    });
    Route::controller(GameController::class)->group(function(){
        Route::get('/','home')->name('home');
        Route::post('/posts','store');
        Route::get('/games/{game}','show');
        Route::get('/bookmarks','bookmark_games')->name('bookmarks');
    });
    Route::controller(ThreadController::class)->group(function(){
        Route::get('/games/{game}/threads/create','create');
        Route::get('/games/{game}/threads/{thread}','show');
        Route::post('/games/{game}/threads/post','store');    
    });
    Route::controller(CommentController::class)->group(function(){
        Route::get('/games/{game}/threads/{thread}/comment/create','create');
        Route::post('/threads/{thread}/comments/post','store');    
    });
    Route::controller(BookmarkController::class)->group(function(){
        Route::post('/games/{game}/bookmark','store');
        Route::delete('/games/{game}/unbookmark','destroy');    
    });
    Route::controller(ChatController::class)->group(function(){
        Route::get('/chat/{user}','openChat');
        Route::post('/chat','sendMessage');
        Route::get('/chats/index','chatIndex')->name('chats.index');
    });
});

//英語版
Route::middleware('auth')->group(function(){
    Route::controller(Translation_GameController::class)->group(function(){
        Route::get('/translated','home')->name('translated_home');
        Route::post('/translated/posts','store');
        Route::get('/translated/games/{game}','show');    
    });
    Route::controller(Translaed_ThreadController::class)->group(function(){
        Route::get('/translated/games/{game}/threads/create','create');
        Route::get('/translated/games/{game}/threads/{thread}','show');
        Route::post('/translated/games/{game}/threads/post','store');    
    });
    Route::controller(Translated_CommentController::class)->group(function(){
        Route::get('/translated/games/{game}/threads/{thread}/comment/create','create');
        Route::post('/translated/threads/{thread}/comments/post','store');    
    });
    
});

require __DIR__.'/auth.php';