<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
class Game extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'image',
        'developer',
        'releasedate',
        'categoryId',
        'userId',
        'price',
        'genre',
        'slider',
        'description',
    ];

    /**
     * Relationship : Game belongs to user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Relationship : Game belongs to category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship : Game belongs to collection
     */
    public function collections()
    {
        return $this->belongsTo('App\Models\Collection');
    }
    /**
     * Summary of scopeNames
     * @param mixed $query
     * @param mixed $name
     * @return void
     */
    public function scopeNames($query, $q)
    {
        if (trim($q)) {
            return $query->where('title', 'LIKE', "%$q%")
                ->orwhere('developer', 'LIKE', "%$q%");
        }
    }
}
