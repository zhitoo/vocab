<?php

namespace App\Rules\Api\V1\Exercise;

use App\Repositories\ExerciseRepository;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ExerciseAnswerValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $exerciseId = request()->route('exerciseId');
        $repo  = new ExerciseRepository();
        $exercise = $repo->getExerciseById($exerciseId);


        $words = $exercise->words;

       //dd($words->pluck('id')->toArray());


        foreach ($value as $word_id => $val) {
            $w = $words->where('id', $word_id)->first();
            //dd($w, $word_id);
            if (!$w) {
                // dd($w, $word_id);
                $fail(__('validations.answers_is_incorect'));
                return;
            }
            $validAnswers = $w->distractors->pluck('word_id')->toArray();
            $validAnswers[] =  $w->correct_answer;
            if (!in_array((int)$val, $validAnswers)) {
                dd($word_id, $w->correct_answer, $validAnswers);
                $fail(__('validations.answers_is_incorect'));
                return;
            }
        }


        $words = $exercise->words->pluck('id')->toArray();
        $wordIds = array_keys($value);

        sort($words);
        sort($wordIds);

        if ($words !== $wordIds) {
            $fail(__('validations.answers_is_incorect'));
            return;
        }
    }
}
