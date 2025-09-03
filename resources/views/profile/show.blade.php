@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto px-6 py-16">
    <!-- Header Section -->
    <div class="mb-12 text-center">
        <h1 class="text-3xl font-light tracking-wide text-gray-800 mb-4">My Profile</h1>
        <p class="text-gray-500 text-sm">Manage your account information and settings</p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-8 p-4 bg-green-50 border border-green-200 rounded-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-green-700 font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- Form Container -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
        <form action="{{ route('profile.update') }}" method="POST" class="p-8 space-y-8">
            @csrf
            @method('PUT')

            <!-- Profile Information Section -->
            <div class="space-y-6">
                <div class="border-b border-gray-100 pb-4">
                    <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>
                    <p class="text-sm text-gray-500 mt-1">Update your basic account information</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('name') border-red-300 @enderror"
                            value="{{ old('name', $user->name) }}"
                            placeholder="Enter your full name"
                        >
                        @error('name')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('email') border-red-300 @enderror"
                            value="{{ old('email', $user->email) }}"
                            placeholder="Enter your email address"
                        >
                        @error('email')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Account Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Member Since</label>
                        <div class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-600">
                            {{ $user->created_at->format('F j, Y') }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Account Role</label>
                        <div class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-600">
                            {{ ucfirst($user->role ?? 'User') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Password Change Section -->
            <div class="space-y-6">
                <div class="border-b border-gray-100 pb-4">
                    <h2 class="text-lg font-medium text-gray-900">Change Password</h2>
                    <p class="text-sm text-gray-500 mt-1">Leave blank if you don't want to change your password</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">
                            Current Password
                        </label>
                        <input
                            type="password"
                            name="current_password"
                            id="current_password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('current_password') border-red-300 @enderror"
                            placeholder="Enter current password"
                        >
                        @error('current_password')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            New Password
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('password') border-red-300 @enderror"
                            placeholder="Enter new password"
                        >
                        @error('password')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            Confirm New Password
                        </label>
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm"
                            placeholder="Confirm new password"
                        >
                    </div>
                </div>
            </div>

            <!-- Submit Section -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                <div class="text-sm text-gray-500">
                    <span class="text-red-500">*</span> Required fields
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('welcome') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-3 bg-gray-900 text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors">
                        Update Profile
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Profile Statistics -->
    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white border border-gray-200 rounded-xl p-6 text-center">
            <div class="text-2xl font-bold text-gray-900">{{ $user->posts->count() }}</div>
            <div class="text-sm text-gray-500 mt-1">Blog Posts</div>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl p-6 text-center">
            <div class="text-2xl font-bold text-gray-900">{{ $user->comments->count() }}</div>
            <div class="text-sm text-gray-500 mt-1">Comments Made</div>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl p-6 text-center">
            <div class="text-2xl font-bold text-gray-900">{{ $user->created_at->diffInDays() }}</div>
            <div class="text-sm text-gray-500 mt-1">Days Active</div>
        </div>
    </div>
</div>
@endsection
