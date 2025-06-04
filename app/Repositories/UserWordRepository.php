<?php

namespace App\Repositories;

use App\Models\UserWord;

class UserWordRepository
{
    public function getWordsForReview(int $userId, int $limit): \Illuminate\Database\Eloquent\Collection
    {
        return UserWord::where('user_id', $userId)
            ->where('next_review_date', '<=', now())
            ->orderBy('mastery_score', 'asc')
            ->orderBy('next_review_date', 'asc')
            ->take($limit)
            ->get();
    }

    public function create(int $userId, int $wordId): UserWord
    {
        return UserWord::create([
            'user_id' => $userId,
            'word_id' => $wordId,
            'next_review_date' => now(),
            'easiness_factor' => 2.5,
            'mastery_score' => 0,
            'repetition_count' => 0,
        ]);
    }

    public function findByUserAndWord(int $userId, int $wordId): ?UserWord
    {
        return UserWord::where('user_id', $userId)
            ->where('word_id', $wordId)
            ->first();
    }

    public function find(int $id): ?UserWord
    {
        return UserWord::find($id);
    }

    public function save(UserWord $userWord): void
    {
        $userWord->save();
    }
}
