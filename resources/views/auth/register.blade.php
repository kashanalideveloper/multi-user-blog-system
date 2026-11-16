@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 border border-gray-200 rounded-lg shadow-sm">
    <h2 class="text-2xl font-bold text-center text-gray-900 mb-2">Join Blogify</h2>
    <p class="mb-6 text-center text-sm text-gray-500">Choose how you’d like to take part in the community.</p>

    @if($errors->any())
        <div class="mb-4 bg-red-50 border-l-4 border-red-400 p-4 text-red-700 text-sm">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-4">
            <label for="register-role" class="block text-sm font-medium text-gray-700 mb-1">I want to join as</label>
            <select id="register-role" name="role" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500">
                <option value="reader" {{ old('role') === 'reader' ? 'selected' : '' }}>Reader</option>
                <option value="subscriber" {{ old('role', 'subscriber') === 'subscriber' ? 'selected' : '' }}>Subscriber</option>
                <option value="author" {{ old('role') === 'author' ? 'selected' : '' }}>Author / Writer</option>
            </select>
            <p class="mt-1.5 text-xs leading-5 text-gray-500">Readers and subscribers can explore and discuss stories. Authors can write and publish posts.</p>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <div class="relative">
                <input type="password" name="password" required autocomplete="new-password" data-password-input class="w-full px-3 py-2 pr-16 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500">
                <button type="button" data-password-toggle aria-label="Show password" aria-pressed="false" class="absolute inset-y-0 right-0 rounded-r-md px-3 text-xs font-semibold text-red-700 hover:text-red-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-red-500">
                    Show
                </button>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
            <div class="relative">
                <input type="password" name="password_confirmation" required autocomplete="new-password" data-password-input class="w-full px-3 py-2 pr-16 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500">
                <button type="button" data-password-toggle aria-label="Show confirmation password" aria-pressed="false" class="absolute inset-y-0 right-0 rounded-r-md px-3 text-xs font-semibold text-red-700 hover:text-red-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-red-500">
                    Show
                </button>
            </div>
        </div>

        <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none">
            Create account
        </button>
    </form>
    
    <p class="mt-4 text-center text-sm text-gray-600">
        Already have an account? <a href="{{ route('login') }}" class="font-semibold text-red-700 hover:underline">Login</a>
    </p>
</div>
@endsection
