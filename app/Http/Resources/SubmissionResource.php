<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class SubmissionResource extends JsonResource
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
            'problem_id' => $this->problem_id,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'url' => route('profile.show', $this->user),
            ],
            'url' => route('submissions.show', $this),
            'language' => $this->language,
            'status' => $this->status,
            'problem' => [
                'id' => $this->problem->id,
                'title' => $this->problem->title,
                'url' => route('problems.show', $this->problem),
            ],
            'code' => $this->when(
                Auth::user()?->is_admin || Auth::user()?->id == $this->user->id,
                $this->code
            ),
        ];
    }
}
