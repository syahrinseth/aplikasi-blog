<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/tentang-blog', [
    \App\Http\Controllers\AboutController::class,
    'index'
])->name('about');

Route::get('posts', [
    \App\Http\Controllers\PostController::class,
    'index'
])->name('posts.index');

Route::get('posts/create', [
    \App\Http\Controllers\PostController::class,
    'create'
])->name('posts.create');

Route::post('posts/store', [
    \App\Http\Controllers\PostController::class,
    'store'
])->name('posts.store');

Route::get('posts/{slug}', [
    \App\Http\Controllers\PostController::class,
    'show'
])->name('posts.show');
