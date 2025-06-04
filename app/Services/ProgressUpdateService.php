<?php

namespace App\Services;

use App\Contracts\ProgressUpdateContract;
use App\Contracts\SpacedRepetitionContract;
use App\Repositories\ExerciseRepository;
use App\Repositories\UserWordRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class ProgressUpdateService implements ProgressUpdateContract
{
    protected $exerciseRepository;
    protected $spacedRepetition;
    protected $userWordRepository;

    public function __construct(
        ExerciseRepository $exerciseRepository,
        SpacedRepetitionContract $spacedRepetition,
        UserWordRepository $userWordRepository
    ) {
        $this->exerciseRepository = $exerciseRepository;
        $this->spacedRepetition = $spacedRepetition;
        $this->userWordRepository = $userWordRepository;
    }

    public function updateUserProgress(int $exerciseId, array $answers): void
    {

        $exercise = $this->exerciseRepository->getExerciseById($exerciseId);

        if ($exercise->words->count() != count($answers)) {
            dd('error');
        }


        DB::transaction(function () use ($exercise, $answers) {
            foreach ($answers as $exerciseWordId => $userAnswer) {


                $this->exerciseRepository->updateAnswer($exerciseWordId, $userAnswer);;
                $exerciseWord = $exercise->words->firstWhere('id', $exerciseWordId);

                if (!$exerciseWord) {
                    throw new ModelNotFoundException("ExerciseWord with ID {$exerciseWordId} not found.");
                }


                //you can work on quality for better user experience

                $quality = $userAnswer == $exerciseWord->correct_answer ? 5 : 0;

                $userWord = $this->userWordRepository->findByUserAndWord(
                    $exercise->user_id,
                    $exerciseWord->word_id
                );

                if (!$userWord) {
                    throw new ModelNotFoundException("UserWord for user {$exercise->user_id} and word {$exerciseWord->word_id} not found.");
                }


                $this->spacedRepetition->updateProgress($userWord->id, $quality);
            }
        });
    }
}
