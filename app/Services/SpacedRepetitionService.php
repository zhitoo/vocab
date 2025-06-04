<?php

namespace App\Services;

use App\Contracts\SpacedRepetitionContract;
use App\Models\UserWord;
use App\Models\Word;
use App\Repositories\UserWordRepository;
use App\Repositories\WordRepository;
use Carbon\Carbon;
use InvalidArgumentException;

class SpacedRepetitionService implements SpacedRepetitionContract
{
    protected $userWordRepository;
    protected $wordRepository;

    public function __construct(UserWordRepository $userWordRepository, WordRepository $wordRepository)
    {
        $this->userWordRepository = $userWordRepository;
        $this->wordRepository = $wordRepository;
    }

    public function getWordsForReview(int $userId, int $limit): array
    {
        $words = $this->userWordRepository->getWordsForReview($userId, $limit);

        if ($words->count() < $limit) {
            $remaining = $limit - $words->count();
            $excludeIds = $words->pluck('word_id')->toArray();
            $newWords = Word::whereNotIn('id', $excludeIds)
                ->inRandomOrder()
                ->take($remaining)
                ->get();

            foreach ($newWords as $newWord) {
                $words->push($this->userWordRepository->create($userId, $newWord->id));
            }
        }

        return $words->toArray();
    }

    public function updateProgress(int $userWordId, int $quality): void
    {

        if ($quality < 0 || $quality > 5) {
            throw new InvalidArgumentException('Quality must be between 0 and 5.');
        }

        $userWord = $this->userWordRepository->find($userWordId);
        if (!$userWord) {
            throw new InvalidArgumentException('UserWord not found.');
        }


        $userWord->easiness_factor = max(
            1.3,
            min(
                2.5,
                $userWord->easiness_factor + (0.1 - (5 - $quality) * (0.08 + (5 - $quality) * 0.02))
            )
        );

        if ($quality >= 3) {
            $userWord->repetition_count += 1;
        } else {
            $userWord->repetition_count = max(0, $userWord->repetition_count - 1);
        }

        $interval = 0;
        if ($userWord->repetition_count > 0) {
            if ($userWord->repetition_count == 1) {
                $interval = 1;
            } elseif ($userWord->repetition_count == 2) {
                $interval = 6;
            } else {
                $interval = $userWord->interval * $userWord->easiness_factor;
            }
        }

        $userWord->interval = $interval;
        $userWord->next_review_date = $interval > 0
            ? Carbon::now()->addDays(round($interval))->startOfDay()
            : Carbon::now()->startOfDay();


        $userWord->mastery_score = max(
            0,
            $userWord->mastery_score + ($quality >= 3 ? 10 : -5)
        );

        $this->userWordRepository->save($userWord);
    }
}
