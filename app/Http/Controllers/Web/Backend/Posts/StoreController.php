<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Backend\Posts;

use App\Http\Requests\Web\Backend\Posts\StoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class StoreController
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        Post::query()->create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'content' => $request->get('content'),
            'category_id' => $request->get('category'),
            'user_id' => $request->user()->id,
        ]);

        return Redirect::route('dashboard');
    }
}
