<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colletion extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'game_id',
        'user_id'
    ];

    /**
     * Relationship : Colletion belongs to user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Relationship : Colletion belongs to game
     */
    public function game()
    {
        return $this->belongsTo('App\Models\Game');
    }
}
