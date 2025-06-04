<?php

namespace App\Contracts;

interface SpacedRepetitionContract
{
    public function getWordsForReview(int $userId, int $limit): array;
    public function updateProgress(int $userWordId, int $quality): void;
}
