@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="bg-gradient-to-br from-red-700 to-rose-900 rounded-2xl p-8 text-white">
        <h1 class="text-3xl font-extrabold mb-2">Category: {{ $category->name }}</h1>
        <p class="text-red-100 text-sm">{{ $category->description }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
            <article class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm flex flex-col justify-between">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-red-700">
                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                    </h3>
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">{{ $post->excerpt }}</p>
                </div>
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                    <a href="{{ route('profile.show', ['username' => $post->user->username]) }}" class="truncate hover:text-red-700">By {{ $post->user->name }} <span>{{ '@'.$post->user->username }}</span></a>
                    <time datetime="{{ ($post->published_at ?? $post->created_at)->toDateString() }}">{{ ($post->published_at ?? $post->created_at)->format('M d, Y') }}</time>
                </div>
            </article>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
@endsection
