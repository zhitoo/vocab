<?php

use App\Http\Controllers\Api\V1\ExerciseController;
use App\Http\Controllers\Api\V1\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:5,1')->post('/tokens/create', LoginController::class);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/exercise/{exerciseId}', [ExerciseController::class, 'getExercise']);
    Route::post('/exercise', [ExerciseController::class, 'makeExercise']);
    Route::post('/exercise/{exerciseId}/answer', [ExerciseController::class, 'submitExerciseAnswer']);
});
