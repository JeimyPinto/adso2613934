<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'document',
        'fullname',
        'gender',
        'birthdate',
        'photo',
        'phone',
        'email',
        'email_verified_at',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
        }
    
    /**
     * Relationship : User has many games
     */
    public function games()
    {
        return $this->hasMany('App\Models\Game');
    }

    /**
     * Relationship : User has many collections
     */
    public function collections()
    {
        return $this->hasMany('App\Models\Collection');
    }

    /**
     * Scope a query to only include users matching the search query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $q
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNames($users, $q)
    {
        if (trim($q)) {
            $users->where('fullname', 'LIKE', "%$q%")
                ->orwhere('email', 'LIKE', "%$q%")
                ->orwhere('document', 'LIKE', "%$q%");
        }
    }
}
