<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi ke tabel vocab
    public function vocabs()
    {
        return $this->hasMany(Vocab::class);
    }

    // Relasi ke tabel favorites
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Relasi ke tabel history
    public function histories()
    {
        return $this->hasMany(History::class);
    }
}