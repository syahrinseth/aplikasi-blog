<nav class="border-b border-gray-100">
    <div class="max-w-6xl mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-8">
                <a href="#" class="text-xl font-light text-gray-800">Aplikasi Blog</a>
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('welcome') }}" class="text-sm text-gray-600 hover:text-gray-900 transition-colors {{ request()->routeIs('welcome') ? 'text-red-900 font-bold' : '' }}">Laman Utama</a>
                    <a href="{{ route('about') }}" class="text-sm text-gray-600 hover:text-gray-900 transition-colors {{ request()->routeIs('about') ? 'text-red-900 font-bold' : '' }}">Tentang Blog</a>
                    <a href="{{ route('posts.index') }}" class="text-sm text-gray-600 hover:text-gray-900 transition-colors {{ request()->routeIs('posts.index') ? 'text-red-900 font-bold' : '' }}">Blog Posts</a>

                    @can('create', App\Models\Post::class)
                    <a href="{{ route('posts.create') }}" class="text-sm text-gray-600 hover:text-gray-900 transition-colors {{ request()->routeIs('posts.create') ? 'text-red-900 font-bold' : '' }}">Create Post</a>
                    @endcan

                    @can('manage', App\Models\Post::class)
                    <a href="{{ route('admin.dashboard.index') }}" class="text-sm text-gray-600 hover:text-gray-900 transition-colors {{ request()->routeIs('admin.dashboard.index') ? 'text-red-900 font-bold' : '' }}">Dashboard</a>
                    @endcan
                </div>
            </div>
            <div class="flex items-center space-x-4">
                @auth
                    <span class="text-sm text-gray-600">Hello, {{ Auth::user()->name }}</span>
                    <a href="{{ route('profile.show') }}" class="text-sm text-gray-600 hover:text-gray-900 transition-colors {{ request()->routeIs('profile.show') ? 'text-red-900 font-bold' : '' }}">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">Log Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900 transition-colors {{ request()->routeIs('login') ? 'text-red-900 font-bold' : '' }}">Log Masuk</a>
                    <a href="{{ route('register') }}" class="bg-gray-900 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-800 transition-colors {{ request()->routeIs('register') ? 'text-red-900 font-bold' : '' }}">Daftar</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
