<?php

namespace Database\Seeders;

use App\Services\Post\PostServiceContract;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class PostSeeder extends Seeder
{
    private \Faker\Generator $faker;

    public function __construct(
        private readonly PostServiceContract $postService
    ) {
        $this->faker = Factory::create();
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            $this->postService->createPost([
                'title' => $this->faker->company(),
                'content' => $this->faker->text(rand(300, 3000))
            ]);
        }
    }
}
