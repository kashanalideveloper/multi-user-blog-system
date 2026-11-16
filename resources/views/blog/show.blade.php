@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-x-12 gap-y-12">
    <!-- Main Content -->
    <div class="lg:col-span-2 space-y-8">
        <!-- Article Header -->
        <div class="bg-white p-8 md:p-10 rounded-3xl border border-slate-200 shadow-xs space-y-6">
            @if($post->category)
                <span class="inline-block text-xs font-bold text-red-700 bg-red-50 px-3 py-1 rounded-lg uppercase tracking-wider">
                    {{ $post->category->name }}
                </span>
            @endif
            
            <h1 class="text-3xl md:text-4xl font-serif font-bold text-slate-900 leading-tight">{{ $post->title }}</h1>
            
            <div class="flex items-center space-x-3 text-sm text-slate-500 border-t border-slate-100 pt-6">
                <div class="w-10 h-10 rounded-full bg-slate-900 text-white font-bold text-sm flex items-center justify-center">
                    {{ mb_substr($post->user->name, 0, 1) }}
                </div>
                <div>
                    <span class="font-bold text-slate-900">{{ $post->user->name }}</span>
                    <p class="text-xs">Published {{ ($post->published_at ?? $post->created_at)->format('M d, Y') }} &bull; {{ ceil(str_word_count($post->body) / 200) }} min read</p>
                </div>
            </div>
        </div>

        <!-- Article Body -->
        <div class="bg-white p-8 md:p-10 rounded-3xl border border-slate-200 shadow-xs prose max-w-none text-slate-800 text-lg leading-relaxed">
            {!! nl2br(e($post->body)) !!}
        </div>

        <!-- Author Bio Box -->
        <div class="bg-red-50 border border-red-100 p-8 rounded-3xl flex items-center space-x-6">
            <div class="w-16 h-16 rounded-2xl bg-red-700 text-white flex items-center justify-center font-bold text-2xl shadow-md">
                {{ mb_substr($post->user->name, 0, 1) }}
            </div>
            <div>
                <h4 class="font-bold text-slate-900 text-lg">Written by {{ $post->user->name }}</h4>
                <p class="text-slate-600 text-sm mt-1">{{ $post->user->bio ?? 'Passionate writer and contributor at Blogify.' }}</p>
            </div>
        </div>
    </div>

    <!-- Right Sidebar -->
    <aside class="space-y-8">
        <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-xs">
            <h3 class="font-bold text-slate-900 mb-4">About Blogify</h3>
            <p class="text-sm text-slate-600 leading-relaxed">A platform for fresh perspectives and stories. Join our growing community of writers and readers.</p>
        </div>
        <div class="bg-slate-900 p-8 rounded-3xl text-white">
            <h3 class="font-bold mb-4">Newsletter</h3>
            <p class="text-sm text-slate-300 mb-4">Get the best stories delivered directly to your inbox.</p>
            <button class="w-full py-2 bg-red-600 rounded-xl text-sm font-bold">Subscribe Now</button>
        </div>
    </aside>
</div>
@endsection
