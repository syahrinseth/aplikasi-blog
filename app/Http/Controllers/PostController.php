<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Input Validation.
        $validatedData = $request->validate([
            'slug' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'author_info' => 'required|string|max:255',
            'image' => 'required|string|max:2048',
            'category' => 'required|string|max:255',
        ]);
        // Store data ke database.
        Post::create($validatedData);
        // Return back dengan message.
        return back()->with('success', 'Post created successfully!');
    }

    public function update()
    {

    }

    public function destroy($id)
    {

    }
}
