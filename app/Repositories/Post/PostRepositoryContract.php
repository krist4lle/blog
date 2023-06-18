<?php

namespace App\Repositories\Post;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PostRepositoryContract
{
    public function getEntities(array $filters, array $sort, array $pagination): LengthAwarePaginator;

    public function getById(int $id): ?Post;

    public function create(array $payload): Post;

    public function update(array $payload, Post $post): Post;

    public function delete(Post $post): ?bool;
}
