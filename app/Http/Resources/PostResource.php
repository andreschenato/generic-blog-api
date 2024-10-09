<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "postedAt" => $this->created_at->diffForHumans(),
            "editedAt" => $this->updated_at->diffForHumans(),
            "comments"=> CommentResource::collection($this->whenLoaded("comments")),
        ];
    }
}
