<?php

declare(strict_types=1);

namespace Domains\Publishing\Actions;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\Publishing\Contracts\CreateNewPostContract;
use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

class CreateNewPost implements CreateNewPostContract
{
    /**
     * @param DataObjectContract $object
     * @return Model<Post>
     */
    public function handle(DataObjectContract $object): Model
    {
        return Post::query()->create($object->toArray());
    }
}
