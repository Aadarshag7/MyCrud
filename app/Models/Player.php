<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'age',
        'photo'
    ];

    public function game()
    {
        return $this->belongsToMany(Game::class);
    }
}
