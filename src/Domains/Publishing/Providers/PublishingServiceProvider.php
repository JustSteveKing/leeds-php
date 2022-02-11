<?php

declare(strict_types=1);

namespace Domains\Publishing\Providers;

use Illuminate\Support\ServiceProvider;

class PublishingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadRoutesFrom(
            path: __DIR__ . '/../Routes/web.php',
        );
    }
}
