<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Backend\Posts;

use App\Http\Requests\Web\Backend\Posts\StoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Infrastructure\Publishing\Contracts\CreateNewPostContract;
use Infrastructure\Publishing\Contracts\PostFactoryContract;

class StoreController
{
    public function __construct(
        private readonly CreateNewPostContract $action,
        private readonly PostFactoryContract $factory,
    ) {}

    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $this->action->handle(
            object: $this->factory->make(
                attributes: array_merge($request->validated(), [
                    'user' => auth()->id(),
                ]),
            )
        );

        return Redirect::route('dashboard');
    }
}
