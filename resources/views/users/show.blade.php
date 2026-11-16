@extends('layouts.app')

@section('title', '@'.$user->username.' | Blogify')

@section('content')
<div class="mx-auto max-w-5xl space-y-10">
    <section class="relative isolate overflow-hidden rounded-[2rem] bg-gradient-to-br from-red-700 via-red-700 to-rose-900 px-6 py-9 text-white shadow-xl shadow-red-950/10 sm:px-10 sm:py-12">
        <div class="pointer-events-none absolute -right-20 -top-24 size-72 rounded-full border border-white/10"></div>
        <div class="relative flex flex-col gap-6 sm:flex-row sm:items-center">
            <div class="flex size-20 shrink-0 items-center justify-center rounded-3xl border border-white/20 bg-white/10 font-serif text-4xl font-bold text-white">
                {{ mb_strtoupper(mb_substr($user->name, 0, 1)) }}
            </div>
            <div class="min-w-0">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-red-100">{{ ucfirst($user->role) }} profile</p>
                <h1 class="mt-2 break-words font-serif text-3xl font-bold tracking-tight sm:text-4xl">{{ $user->name }}</h1>
                <p class="mt-1 text-sm font-semibold text-red-100">{{ '@'.$user->username }}</p>
                @if($user->bio)
                    <p class="mt-4 max-w-2xl text-sm leading-6 text-red-50">{{ $user->bio }}</p>
                @endif
                <p class="mt-4 text-xs text-red-100">Joined {{ $user->created_at->format('M Y') }}</p>
            </div>
        </div>
    </section>

    <section aria-labelledby="profile-posts-heading" class="space-y-6">
        <div class="flex flex-wrap items-end justify-between gap-3 border-b border-slate-200 pb-4">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-red-700">From this community member</p>
                <h2 id="profile-posts-heading" class="mt-1 font-serif text-3xl font-bold tracking-tight text-slate-950">
                    {{ $user->role === 'author' || $user->role === 'admin' ? 'Published stories' : 'Stories' }}
                </h2>
            </div>
            <span class="rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-800">
                {{ $posts->total() }} {{ $posts->total() === 1 ? 'story' : 'stories' }}
            </span>
        </div>

        @forelse($posts as $post)
            <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-red-200 hover:shadow-md sm:p-7">
                <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-xs font-semibold text-slate-500">
                    @if($post->category)
                        <a href="{{ route('blog.category', $post->category) }}" class="text-red-700 hover:underline">{{ $post->category->name }}</a>
                        <span aria-hidden="true">&middot;</span>
                    @endif
                    <time datetime="{{ ($post->published_at ?? $post->created_at)->toDateString() }}">{{ ($post->published_at ?? $post->created_at)->format('M d, Y') }}</time>
                </div>
                <h3 class="mt-3 font-serif text-xl font-bold leading-snug text-slate-950 hover:text-red-700 sm:text-2xl">
                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                </h3>
                @if($post->excerpt)
                    <p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-600">{{ $post->excerpt }}</p>
                @endif
                <a href="{{ route('blog.show', $post->slug) }}" class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-red-700 hover:text-red-900">
                    Read story <span aria-hidden="true">&rarr;</span>
                </a>
            </article>
        @empty
            <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-12 text-center">
                <h3 class="font-serif text-xl font-bold text-slate-900">No published stories yet</h3>
                <p class="mt-2 text-sm text-slate-600">Published posts from this profile will appear here.</p>
            </div>
        @endforelse

        @if($posts->hasPages())
            <div class="pt-2">{{ $posts->links() }}</div>
        @endif
    </section>
</div>
@endsection
