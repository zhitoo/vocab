<?php

namespace App\Repositories;

use App\Models\Exercise;
use App\Models\ExerciseWord;
use App\Models\ExerciseWordDistractor;

class ExerciseRepository
{
    public function createExercise(int $userId): Exercise
    {
        return Exercise::create(['user_id' => $userId]);
    }

    public function addWordToExercise(int $exerciseId, int $wordId, array $distractors): ExerciseWord
    {
        $exerciseWord = ExerciseWord::create([
            'exercise_id' => $exerciseId,
            'word_id' => $wordId,
            'correct_answer' => $wordId,
        ]);
        $distractorRows = [];
        foreach ($distractors as $distractorId) {
            $distractorRows[] = [
                'exercise_word_id' => $exerciseWord->id,
                'word_id' => $distractorId
            ];
        }
        ExerciseWordDistractor::query()->insert($distractorRows);
        return $exerciseWord;
    }

    public function updateAnswer(int $exerciseWordId, int $userAnswer): void
    {
        $exerciseWord = ExerciseWord::findOrFail($exerciseWordId);
        $exerciseWord->user_answer = $userAnswer;
        $exerciseWord->is_correct = $userAnswer == $exerciseWord->correct_answer;
        $exerciseWord->save();
    }

    public function getExerciseById(int $exerciseId): Exercise
    {
        return Exercise::with(['words.word', 'words.distractors.word'])->findOrFail($exerciseId);
    }
}
