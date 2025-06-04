<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseResource extends JsonResource
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
            'user_id' => $this->word,
            'words' => ExerciseWordResource::collection($this->whenLoaded('words')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
