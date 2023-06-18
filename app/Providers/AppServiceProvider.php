<?php

namespace App\Providers;

use App\Repositories\Post\PostRepository;
use App\Repositories\Post\PostRepositoryContract;
use App\Services\Post\PostService;
use App\Services\Post\PostServiceContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostServiceContract::class, PostService::class);
        $this->app->bind(PostRepositoryContract::class, PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
