<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Backend\Posts;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateController
{
    public function __invoke(Request $request): View
    {
        return view('app.posts.create', [
            'categories' => Category::query()->get(),
        ]);
    }
}
