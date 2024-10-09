<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "postId"=> $this->post_id,
            "content"=> $this->content,
            "postedAt"=> $this->created_at->diffForHumans(),
            "editedAt"=> $this->updated_at->diffForHumans(),
        ];
    }
}
