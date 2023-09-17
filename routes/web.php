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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function(){
    Route::get('/',[GameController::class,'home'])->name('home');
    Route::post('/posts',[GameController::class,'store']);
    Route::get('/games/{game}',[GameController::class,'show']);
    Route::get('/games/{game}/threads/create',[ThreadController::class,'create']);
    Route::get('/games/{game}/threads/{thread}',[ThreadController::class,'show']);
    Route::post('/games/{game}/threads/post',[ThreadController::class,'store']);
    Route::get('/games/{game}/threads/{thread}/comment/create',[CommentController::class,'create']);
    Route::post('/threads/{thread}/comments/post',[CommentController::class,'store']);
    Route::post('/games/{game}/bookmark',[BookmarkController::class,'store']);
    Route::delete('/games/{game}/unbookmark',[BookmarkController::class,'destroy']);
    Route::get('/bookmarks',[GameController::class,'bookmark_games'])->name('bookmarks');
});

Route::middleware('auth')->group(function(){
    Route::get('/translated',[Translation_GameController::class,'home'])->name('translated_home');
    Route::post('/translated/posts',[Translation_GameController::class,'store']);
    Route::get('/translated/games/{game}',[Translation_GameController::class,'show']);
    Route::get('/translated/games/{game}/threads/create',[Translation_ThreadController::class,'create']);
    Route::get('/translated/games/{game}/threads/{thread}',[Translation_ThreadController::class,'show']);
    Route::post('/translated/games/{game}/threads/post',[Translation_ThreadController::class,'store']);
    Route::get('/translated/games/{game}/threads/{thread}/comment/create',[Translation_CommentController::class,'create']);
    Route::post('/translated/threads/{thread}/comments/post',[Translation_CommentController::class,'store']);
});

require __DIR__.'/auth.php';
