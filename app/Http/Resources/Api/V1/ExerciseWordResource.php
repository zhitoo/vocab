<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseWordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'exercise_id' => $this->exercise_id,
            'word_id' => $this->word_id,
            'word' => WordResource::make($this->whenLoaded('word')),
            'distractors' => ExerciseWordDistractorResource::collection($this->whenLoaded('distractors')),
            'user_answer' => $this->user_answer,
            'correct_answer' => $this->correct_answer,
            'is_correct' => (bool)$this->is_correct,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
