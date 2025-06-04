<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWord extends Model
{
    protected $fillable = ['user_id', 'word_id', 'easiness_factor', 'repetition_count', 'interval', 'next_review_date', 'mastery_score'];
    protected $casts = ['next_review_date' => 'datetime', 'easiness_factor' => 'float', 'mastery_score' => 'float', 'interval' => 'float'];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }
}
