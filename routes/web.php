<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard', [
        'posts' => Post::query()->where('user_id', auth()->id())->get(),
    ]);
})->middleware(['auth'])->name('dashboard');
