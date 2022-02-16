<?php

declare(strict_types=1);

namespace Domains\Publishing\Actions;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\Publishing\Contracts\Actions\UpdatePostContract;
use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

class UpdatePost implements UpdatePostContract
{
    public function handle(DataObjectContract $object, int|string $identifier): Model
    {
        $post = Post::query()->find($identifier);

        $post->update(
            attributes: $object->toArray(),
        );

        return $post->refresh();
    }
}
