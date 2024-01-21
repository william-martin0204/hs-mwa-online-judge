<?php

namespace App\Http\Resources;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProblemResource extends JsonResource
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
            'title' => $this->title,
            'url' => route('problems.show', $this),
            'tags' => $this->tags->map(function (Tag $tag) {
                return [
                    'id' => $tag->id,
                    'name' => $tag->name,
                    'url' => route('tags.show', $tag),
                ];
            }),
            'description' => $this->description,
            'example_input' => $this->example_input,
            'example_output' => $this->example_output,
        ];
    }
}
