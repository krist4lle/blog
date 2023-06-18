<?php

namespace App\Repositories\Post;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class PostRepository implements PostRepositoryContract
{
    public function getEntities(array $filters, array $sort, array $pagination): LengthAwarePaginator
    {
        return Post::query()
            ->when(isset($filters['search']), function (Builder $query) use ($filters) {
                $query
                    ->where('title', 'LIKE', "%{$filters['search']}%")
                    ->orWhere('content', 'LIKE', "%{$filters['search']}%");
            })
            ->orderBy($sort['column'], $sort['direction'])
            ->paginate(perPage: $pagination['per_page'], page: $pagination['page']);
    }

    public function getById(int $id): ?Post
    {
        return Post::find($id);
    }

    public function create(array $payload): Post
    {
        $post = new Post();
        $post->title = $payload['title'];
        $post->content = $payload['content'];
        $post->save();

        return $post;
    }

    public function update(array $payload, Post $post): Post
    {
        $post->fill($payload);
        $post->save();

        return $post;
    }

    public function delete(Post $post): ?bool
    {
        return $post->delete();
    }
}
