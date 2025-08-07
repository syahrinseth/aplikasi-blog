<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = App\Models\Post::all();
    return view('welcome', [
        'posts' => $posts,
    ]);
})->name('welcome');

Route::get('/tentang-blog', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
