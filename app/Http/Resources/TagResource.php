<?php

namespace App\Http\Resources;

use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
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
            'name' => $this->name,
            'url' => route('tags.show', $this),
            'description' => $this->description,
            'problems' => $this->problems->map(function (Problem $problem) {
                return [
                    'id' => $problem->id,
                    'title' => $problem->title,
                    'url' => route('problems.show', $problem),
                ];
            }),
        ];
    }
}
