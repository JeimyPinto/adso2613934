<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'releasedate',
        'description',
    ];

    /**
     * Relationship : Category has many games
     */
    public function games()
    {
        return $this->hasMany('App\Models\Game');
    }

    public function scopeNames($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%$name%")
            ->orwhere('description', 'LIKE', "%$name%");
        }
    }
}
