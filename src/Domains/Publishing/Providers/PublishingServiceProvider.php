<?php

declare(strict_types=1);

namespace Domains\Publishing\Providers;

use Domains\Publishing\Actions\CreateNewPost;
use Domains\Publishing\Actions\UpdatePost;
use Domains\Publishing\Factories\PostFactory;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Publishing\Contracts\Actions\UpdatePostContract;
use Infrastructure\Publishing\Contracts\CreateNewPostContract;
use Infrastructure\Publishing\Contracts\PostFactoryContract;

class PublishingServiceProvider extends ServiceProvider
{
    /**
     * @var array<string,string>
     */
    public $bindings = [
        PostFactoryContract::class => PostFactory::class,
        CreateNewPostContract::class => CreateNewPost::class,
        UpdatePostContract::class => UpdatePost::class,
    ];

    public function register(): void
    {
        $this->loadRoutesFrom(
            path: __DIR__ . '/../Routes/web.php',
        );
    }
}
