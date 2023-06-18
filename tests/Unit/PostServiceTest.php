<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Repositories\Post\PostRepository;
use App\Services\Post\PostService;
use App\Services\Post\PostServiceContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

/**
 * @property PostServiceContract $postService
 * @property PostRepository|(PostRepository&object&\PHPUnit\Framework\MockObject\MockObject)|(PostRepository&\PHPUnit\Framework\MockObject\MockObject)|(object&\PHPUnit\Framework\MockObject\MockObject)|\PHPUnit\Framework\MockObject\MockObject $postRepositoryMock
 */
class PostServiceTest extends TestCase
{
    protected function setUp(): void
    {
        $this->postRepositoryMock = $this->createMock(PostRepository::class);
        $this->postService = new PostService($this->postRepositoryMock);
    }

    public function testPostCreate()
    {
        $payload = [
            'title' => 'Title',
            'content' => 'Content'
        ];

        $this->postRepositoryMock
            ->expects($this->once())
            ->method('create')
            ->with($payload)
            ->willReturn(new Post());

        $post = $this->postService->createPost($payload);

        $this->assertInstanceOf(Post::class, $post);
    }

    public function testPostUpdate()
    {
        $payload = [
            'title' => 'Title update',
            'content' => 'Content update'
        ];

        $postMock = $this->createMock(Post::class);

        $this->postRepositoryMock
            ->expects($this->once())
            ->method('update')
            ->with($payload, $postMock)
            ->willReturn(new Post());

        $post = $this->postService->updatePost($payload, $postMock);

        $this->assertInstanceOf(Post::class, $post);
    }

    public function testPostDelete()
    {
        $postMock = $this->createMock(Post::class);

        $this->postRepositoryMock
            ->expects($this->once())
            ->method('delete')
            ->with($postMock)
            ->willReturn(true);

        $result = $this->postService->deletePost($postMock);

        $this->assertTrue($result);
    }

    public function testGetPosts()
    {
        $filters = rand(0,1) === 1 ? ['search' => 'a'] : [];
        $sort = rand(0,1) === 1 ? ['column' => 'title', 'direction' => 'asc'] : [];
        $pagination = rand(0,1) === 1 ? ['page' => 1, 'per_page' => 10] : [];

        $payload = array_merge($filters, $sort, $pagination);

        $paginatorMock = $this->createMock(LengthAwarePaginator::class);

        $this->postRepositoryMock
            ->expects($this->once())
            ->method('getEntities')
            ->willReturn($paginatorMock);

        $posts = $this->postService->getPosts($payload);

        $this->assertIsIterable($posts);
        $this->assertInstanceOf(LengthAwarePaginator::class, $posts);

        foreach ($posts as $post) {
            $this->assertInstanceOf(Post::class, $post);
            if (isset($filters['search'])) {
                $this->assertContains($post->title, $filters['search']);
            }
        }
    }
}
