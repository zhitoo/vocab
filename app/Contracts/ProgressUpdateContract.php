<?php

namespace App\Contracts;

interface ProgressUpdateContract
{
    public function updateUserProgress(int $exerciseId, array $answers): void;
}
