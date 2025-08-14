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
