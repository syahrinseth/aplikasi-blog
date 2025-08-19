@extends('layouts.app')
@section('title', $post['title'])
@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <!-- Navigation Breadcrumb -->
    <nav class="mb-8">
        <div class="flex items-center space-x-2 text-sm text-gray-500">
            <a href="{{ route('posts.index') }}" class="hover:text-gray-700 transition-colors">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                All Posts
            </a>
            <span class="text-gray-300">/</span>
            <span class="text-gray-700">{{ $post['title'] }}</span>
        </div>
    </nav>

    <!-- Article Header -->
    <header class="mb-12 text-center">
        <div class="mb-6">
            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">
                {{ $post['category'] }}
            </span>
        </div>

        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
            {{ $post['title'] }}
        </h1>

        <div class="flex items-center justify-center space-x-6 text-gray-600">
            <div class="flex items-center space-x-3">
                <img src="{{ $post['image'] }}" alt="{{ $post['author'] }}" class="w-12 h-12 rounded-full border-2 border-gray-200">
                <div class="text-left">
                    <p class="font-semibold text-gray-900">{{ $post['author'] }}</p>
                    <p class="text-sm text-gray-500">{{ $post['author_info'] }}</p>
                </div>
            </div>
            <div class="h-8 w-px bg-gray-300"></div>
            <div class="text-center">
                <time datetime="{{ $post['created_at'] }}" class="text-sm text-gray-500">
                    Published on<br>
                    <span class="font-medium text-gray-700">{{ \Carbon\Carbon::parse($post['created_at'])->format('F j, Y') }}</span>
                </time>
            </div>
        </div>
    </header>

    <!-- Article Content -->
    <article class="prose prose-lg max-w-none">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 md:p-12">
            <div class="text-gray-700 leading-relaxed text-lg whitespace-pre-line">
                {{ $post['content'] }}
            </div>
        </div>
    </article>

    <!-- Article Footer with Actions -->
    <footer class="mt-12 pt-8 border-t border-gray-200">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2 text-sm text-gray-500">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Published {{ \Carbon\Carbon::parse($post['created_at'])->diffForHumans() }}</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('posts.index') }}"
                   class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Posts
                </a>

                <a href="{{ route('posts.create') }}"
                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    New Post
                </a>

                {{-- <form action="{{ route('posts.destroy', $post['slug']) }}" method="POST" class="inline-block"
                      onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Delete
                    </button>
                </form> --}}
            </div>
        </div>
    </footer>
</div>
@endsection
