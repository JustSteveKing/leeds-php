<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Backend\Posts;

use App\Http\Requests\Web\Backend\Posts\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class UpdateController
{
    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {
        $post->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'content' => $request->get('content'),
            'category_id' => $request->get('category'),
        ]);

        return Redirect::route('dashboard');
    }
}
