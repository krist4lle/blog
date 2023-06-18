<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostIndexRequest;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\Post\PostServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    public function __construct(
        private readonly PostServiceContract $postService
    ) {
    }

    public function index(PostIndexRequest $request): AnonymousResourceCollection
    {
        $posts = $this->postService->getPosts($request->validated());

        return PostResource::collection($posts);
    }

    public function show(Request $request, Post $post): PostResource
    {
        return new PostResource($post);
    }

    public function store(PostStoreRequest $request): PostResource
    {
        $post = $this->postService->createPost($request->validated());

        return new PostResource($post);
    }

    public function update(PostStoreRequest $request, Post $post): PostResource
    {
        $post = $this->postService->updatePost($request->validated(), $post);

        return new PostResource($post);
    }

    public function destroy(Request $request, Post $post): JsonResponse
    {
        $result = $this->postService->deletePost($post);

        return response()->json(['status' => $result], 204);
    }
}
