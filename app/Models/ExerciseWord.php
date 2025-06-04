<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExerciseWord extends Model
{
    protected $fillable = ['exercise_id', 'word_id', 'correct_answer', 'user_answer', 'is_correct'];

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function distractors()
    {
        return $this->hasMany(ExerciseWordDistractor::class);
    }
}
