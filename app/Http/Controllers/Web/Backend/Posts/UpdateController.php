<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Backend\Posts;

use App\Http\Requests\Web\Backend\Posts\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Infrastructure\Publishing\Contracts\Actions\UpdatePostContract;
use Infrastructure\Publishing\Contracts\PostFactoryContract;

class UpdateController
{
    public function __construct(
        private readonly UpdatePostContract $action,
        private readonly PostFactoryContract $factory,
    ) {}

    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {
        $this->action->handle(
            object: $this->factory->make(
                array_merge($request->validated(), ['user' => auth()->id()]),
            ),
            identifier: $post->id,
        );

        return Redirect::route('dashboard');
    }
}
