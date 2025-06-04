<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = ['word', 'meaning', 'level', 'part_of_speech'];
    protected $casts = ['level' => 'string', 'part_of_speech' => 'string'];

    public function userWords()
    {
        return $this->hasMany(UserWord::class);
    }
}
