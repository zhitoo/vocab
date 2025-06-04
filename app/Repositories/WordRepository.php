<?php

namespace App\Repositories;

use App\Models\Word;

class WordRepository
{
    public function getRandomWordsForDistractors(string $partOfSpeech, string $level, array $excludeIds, int $limit = 3): array
    {
        return Word::where('part_of_speech', $partOfSpeech)
            ->whereIn('level', $this->getLevelRange($level))
            ->whereNotIn('id', $excludeIds)
            ->inRandomOrder()
            ->take($limit)
            ->pluck('id')
            ->toArray();
    }

    private function getLevelRange(string $level): array
    {
        $levels = ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'];
        $index = array_search($level, $levels);
        return [$levels[max(0, $index - 1)], $levels[min(count($levels) - 1, $index + 1)]];
    }
}
