<?php

namespace App\Services;

use App\Contracts\ExerciseGenerationContract;
use App\Repositories\ExerciseRepository;
use App\Repositories\WordRepository;
use App\Contracts\SpacedRepetitionContract;
use App\Models\Exercise;
use App\Models\Word;

class ExerciseGenerationService implements ExerciseGenerationContract
{
    protected $exerciseRepository;
    protected $wordRepository;
    protected $spacedRepetition;

    public function __construct(
        ExerciseRepository $exerciseRepository,
        WordRepository $wordRepository,
        SpacedRepetitionContract $spacedRepetition
    ) {
        $this->exerciseRepository = $exerciseRepository;
        $this->wordRepository = $wordRepository;
        $this->spacedRepetition = $spacedRepetition;
    }

    public function generateExercise(int $userId): Exercise
    {
        $exercise = $this->exerciseRepository->createExercise($userId);

        $words = $this->spacedRepetition->getWordsForReview($userId, 10);

        foreach ($words as $userWord) {
            $word = Word::findOrFail($userWord['word_id']);
            $distractors = $this->wordRepository->getRandomWordsForDistractors(
                $word->part_of_speech,
                $word->level,
                [$word->id]
            );
            $this->exerciseRepository->addWordToExercise($exercise->id, $word->id, $distractors);
        }

        return $this->exerciseRepository->getExerciseById($exercise->id);
    }

    public function getExercise(int $exerciseId): Exercise
    {
        return $this->exerciseRepository->getExerciseById($exerciseId);
    }
}
