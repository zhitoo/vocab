<?php

namespace App\Http\Requests\Api\V1;

use App\Rules\Api\V1\Exercise\ExerciseAnswerValidation;
use Illuminate\Foundation\Http\FormRequest;

class SubmitExerciseAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return ['answers' => ['required', 'array', new ExerciseAnswerValidation()]];
    }
}
