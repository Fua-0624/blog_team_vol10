<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class Game extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'game_name',
        'translated_game_name',
        'genre_id'
    ];
    
    public function threads()   
    {
        return $this->hasMany(Thread::class);  
    }
    
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    
    
}
