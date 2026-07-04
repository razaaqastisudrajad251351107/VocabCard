<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
protected $fillable = [
    'vocab_id',
    'english',
    'indonesia'
];

    public $timestamps = false;

    public function vocab()
    {
        return $this->belongsTo(Vocab::class);
    }
}