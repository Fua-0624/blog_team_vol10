<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'body',
        'translated_title',
        'translated_body',
        'game_id',
        'user_id'
    ];
    
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()   
    {
        return $this->hasMany(Comment::class);
    }
}
