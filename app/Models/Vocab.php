<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vocab extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'word',
        'meaning',
    ];

    // Tambahkan ini
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sentences()
    {
        return $this->hasMany(Sentence::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}