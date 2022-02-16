<?php

declare(strict_types=1);

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

use JustSteveKing\StatusCode\Http;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('shows the create form', function () {
    $user = User::factory()->create();
    $posts = Post::factory(10)->create(['user_id' => $user->id]);
    auth()->loginUsingId($user->id);

    get(
        route('app:posts:create'),
    )->assertStatus(Http::OK)->assertSee('Create a new Post');
})->group('publishing');

it('can create a new post', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();
    auth()->loginUsingId($user->id);

    $data = [
        'title' => 'pest php',
        'category' => $category->id,
        'description' => 'pest PHP is awesome, prove me wrong',
        'content' => 'Here be content',
    ];

    expect(Post::query()->count())->toEqual(0);

    post(
        route('app:posts:store'),
        $data
    )->assertStatus(Http::FOUND);

    expect(Post::query()->count())->toEqual(1);
})->group('publishing');
