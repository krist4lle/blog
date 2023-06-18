<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PostServiceContract
{
    public function getPosts(array $payload = []): LengthAwarePaginator;

    public function createPost(array $payload): Post;

    public function updatePost(array $payload, Post $post): Post;

    public function deletePost(Post $post): ?bool;
}
