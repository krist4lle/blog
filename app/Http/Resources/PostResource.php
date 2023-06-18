<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /** @var Post */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $post = $this->resource;

        return [
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content,
            'created_at' => $post->created_at->format('Y-m-d')
        ];
    }
}
