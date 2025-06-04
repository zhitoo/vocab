<?php

namespace App\Contracts;

interface ExerciseGenerationContract
{
    public function generateExercise(int $userId): \App\Models\Exercise;
}
