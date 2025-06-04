<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\ExerciseGenerationContract;
use App\Contracts\ProgressUpdateContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\SubmitExerciseAnswerRequest;
use App\Http\Resources\Api\V1\ExerciseResource;
use App\Repositories\ExerciseRepository;
use App\Rules\Api\V1\Exercise\ExerciseAnswerValidation;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    protected $exerciseGeneration;
    protected $progressUpdate;

    protected $exerciseRepository;

    public function __construct(ExerciseGenerationContract $exerciseGeneration, ProgressUpdateContract $progressUpdate, ExerciseRepository $exerciseRepository)
    {
        $this->exerciseGeneration = $exerciseGeneration;
        $this->progressUpdate = $progressUpdate;
        $this->exerciseRepository = $exerciseRepository;
    }
    public function getExercise($exerciseId)
    {
        $exercise = $this->exerciseRepository->getExerciseById($exerciseId);
        abort_if($exercise->user_id != auth()->id(), 403);
        return ExerciseResource::make($exercise);
    }
    public function makeExercise()
    {
        $exercise = $this->exerciseGeneration->generateExercise(auth()->id());
        return ExerciseResource::make($exercise);
    }

    public function submitExerciseAnswer(SubmitExerciseAnswerRequest $request, int $exerciseId)
    {
        $this->progressUpdate->updateUserProgress($exerciseId, $request->input('answers'));
        return response()->json(['message' => 'Answers submitted successfully']);
    }
}
