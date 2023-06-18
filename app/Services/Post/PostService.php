<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Repositories\Post\PostRepositoryContract;
use App\Traits\HasPagination;
use App\Traits\HasSorting;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostService implements PostServiceContract
{
    use HasSorting;
    use HasPagination;

    public function __construct(
        private readonly PostRepositoryContract $postRepository
    ) {
    }

    public function getPosts(array $payload = []): LengthAwarePaginator
    {
        return $this->postRepository->getEntities(
            $this->getFilters($payload),
            $this->getSort($payload),
            $this->getPagination($payload)
        );
    }

    public function createPost(array $payload): Post
    {
        return $this->postRepository->create($payload);
    }

    public function updatePost(array $payload, Post $post): Post
    {
        return $this->postRepository->update($payload, $post);
    }

    public function deletePost(Post $post): ?bool
    {
        return $this->postRepository->delete($post);
    }

    private function getFilters(array $data): array
    {
        return [
            'search' => $data['search'] ?? null
        ];
    }
}
