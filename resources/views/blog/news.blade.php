@extends('layouts.app')

@section('content')
<div class="space-y-12">
    <section class="relative isolate overflow-hidden rounded-[2rem] bg-gradient-to-br from-red-700 via-red-700 to-rose-900 px-6 py-10 text-white shadow-xl shadow-red-950/10 sm:px-10 sm:py-14 lg:px-14">
        <div class="pointer-events-none absolute -right-20 -top-24 size-72 rounded-full border border-white/10"></div>
        <div class="pointer-events-none absolute -right-8 -top-12 size-52 rounded-full border border-white/10"></div>
        <div class="relative max-w-3xl">
            <p class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.2em] text-red-100">
                <span class="size-1.5 rounded-full bg-white"></span> The latest from our writers
            </p>
            <h1 class="mt-5 font-serif text-4xl font-bold tracking-tight sm:text-5xl">News &amp; fresh perspectives</h1>
            <p class="mt-4 max-w-2xl text-base leading-7 text-red-100 sm:text-lg">
                New ideas, useful reads, and stories recently published by the Blogify community.
            </p>
        </div>
    </section>

    <section aria-labelledby="latest-news-heading" class="space-y-7">
        <div class="flex flex-wrap items-end justify-between gap-3 border-b border-slate-200 pb-4">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-red-700">Straight from the community</p>
                <h2 id="latest-news-heading" class="mt-1 font-serif text-3xl font-bold tracking-tight text-slate-950">Recently published</h2>
            </div>
            <a href="{{ route('blogs.index') }}" class="text-sm font-semibold text-red-700 transition hover:text-red-900 hover:underline">
                Browse all blogs <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        @forelse($posts as $post)
            <article class="group grid gap-5 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-red-200 hover:shadow-lg sm:grid-cols-[auto_1fr_auto] sm:items-center sm:gap-7 sm:p-7">
                <div class="flex size-14 items-center justify-center rounded-2xl bg-red-50 font-serif text-2xl font-bold text-red-700 transition group-hover:bg-red-700 group-hover:text-white" aria-hidden="true">
                    {{ mb_substr($post->title, 0, 1) }}
                </div>
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-xs font-semibold text-slate-500">
                        @if($post->category)
                            <span class="text-red-700">{{ $post->category->name }}</span>
                            <span aria-hidden="true">&middot;</span>
                        @endif
                        <time datetime="{{ ($post->published_at ?? $post->created_at)->toDateString() }}">{{ ($post->published_at ?? $post->created_at)->format('M d, Y') }}</time>
                    </div>
                    <h3 class="mt-2 font-serif text-xl font-bold leading-snug text-slate-950 transition group-hover:text-red-700 sm:text-2xl">
                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                    </h3>
                    <p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-600">{{ $post->excerpt }}</p>
                    <p class="mt-3 text-xs font-medium text-slate-500">By <a href="{{ route('profile.show', ['username' => $post->user->username]) }}" class="font-semibold text-red-700 hover:underline">{{ $post->user->name }} <span>{{ '@'.$post->user->username }}</span></a></p>
                </div>
                <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center gap-2 text-sm font-bold text-red-700 transition hover:text-red-900 sm:justify-self-end">
                    Read story <span aria-hidden="true">&rarr;</span>
                </a>
            </article>
        @empty
            <div class="rounded-2xl border border-dashed border-red-200 bg-white px-6 py-14 text-center">
                <p class="font-serif text-2xl font-bold text-slate-900">No news just yet.</p>
                <p class="mt-2 text-sm text-slate-600">Check back soon for the latest stories from our writers.</p>
                <a href="{{ route('blogs.index') }}" class="mt-5 inline-flex rounded-full bg-red-600 px-5 py-2.5 text-sm font-bold text-white transition hover:bg-red-700">Explore the blogs</a>
            </div>
        @endforelse

        @if($posts->hasPages())
            <div class="pt-2">{{ $posts->links() }}</div>
        @endif
    </section>
</div>
@endsection
