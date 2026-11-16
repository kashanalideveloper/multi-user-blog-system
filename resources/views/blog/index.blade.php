@extends('layouts.app')

@section('content')
<div class="space-y-14">
    <section class="relative isolate overflow-hidden rounded-[2rem] bg-gradient-to-br from-red-700 via-red-700 to-rose-900 px-6 py-10 text-white shadow-xl shadow-red-950/10 sm:px-10 sm:py-14 lg:px-14 lg:py-16">
        <div class="pointer-events-none absolute -right-24 -top-32 size-96 rounded-full border border-white/10"></div>
        <div class="pointer-events-none absolute -right-10 -top-16 size-64 rounded-full border border-white/10"></div>
        <div class="relative grid items-center gap-10 lg:grid-cols-[1fr_auto] lg:gap-16">
            <div class="max-w-3xl">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3.5 py-1.5 text-[11px] font-bold uppercase tracking-[0.18em] text-red-50">
                    <span class="size-1.5 rounded-full bg-white"></span> A community of voices
                </span>
                <h1 class="mt-6 max-w-2xl font-serif text-4xl font-bold leading-[1.08] tracking-tight sm:text-5xl lg:text-6xl">
                    Ideas worth reading.<br class="hidden sm:block"> Voices worth <span class="italic text-red-100">hearing.</span>
                </h1>
                <p class="mt-5 max-w-xl text-base leading-7 text-red-100 sm:text-lg">
                    Discover perspectives from writers everywhere, or publish a story of your own.
                </p>
            </div>
            <div class="hidden lg:block" aria-hidden="true">
                <div class="flex size-40 rotate-3 items-center justify-center rounded-[2rem] border border-white/20 bg-white/10 shadow-2xl backdrop-blur-sm">
                    <span class="font-serif text-8xl italic text-white/90">B<span class="text-red-200">.</span></span>
                </div>
            </div>
            <form method="GET" action="{{ route('blog.index') }}" class="flex w-full max-w-2xl flex-col gap-3 sm:flex-row lg:col-span-2" role="search">
                <label for="story-search" class="sr-only">Search stories</label>
                <div class="relative min-w-0 flex-1">
                    <svg class="pointer-events-none absolute left-4 top-1/2 size-5 -translate-y-1/2 text-red-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <circle cx="11" cy="11" r="7" />
                        <path stroke-linecap="round" d="m16 16 4 4" />
                    </svg>
                    <input id="story-search" type="search" name="search" value="{{ request('search') }}" placeholder="Search stories, topics, or writers" class="w-full rounded-xl border border-white/25 bg-white px-4 py-3.5 pl-12 text-sm text-slate-900 shadow-sm placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-white/70">
                </div>
                <button type="submit" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-white px-7 py-3.5 text-sm font-bold text-red-800 transition hover:bg-red-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-red-700">
                    Find a story <span aria-hidden="true">&rarr;</span>
                </button>
            </form>
        </div>
    </section>

    <!-- Main Grid & Sidebar -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
        <!-- Articles Feed -->
        <div class="lg:col-span-3 space-y-8">
            <div class="flex flex-wrap items-end justify-between gap-3 border-b border-slate-200 pb-4">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-red-700">Fresh from the community</p>
                    <h2 class="mt-1 font-serif text-3xl font-bold tracking-tight text-slate-950">Latest stories</h2>
                </div>
                <span class="rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-800">{{ $posts->total() }} {{ $posts->total() === 1 ? 'story' : 'stories' }}</span>
            </div>

            @if($posts->isEmpty())
                <div class="bg-white rounded-2xl p-12 text-center border border-slate-200 space-y-3">
                    <p class="text-xl font-semibold text-slate-700">No articles found matching your query.</p>
                    <p class="text-sm text-slate-500">Try searching for something else or browse all categories.</p>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($posts as $post)
                    <article class="group bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between transform hover:-translate-y-1">
                        <div class="p-7 space-y-4">
                            <div class="flex items-center justify-between">
                                @if($post->category)
                                    <a href="{{ route('blog.category', $post->category) }}" class="text-xs font-bold text-red-600 bg-red-50 px-3 py-1 rounded-lg uppercase tracking-wider group-hover:bg-red-600 group-hover:text-white transition">
                                        {{ $post->category->name }}
                                    </a>
                                @endif
                                <time class="text-xs font-medium text-slate-400" datetime="{{ ($post->published_at ?? $post->created_at)->toDateString() }}">{{ ($post->published_at ?? $post->created_at)->format('M d, Y') }}</time>
                            </div>

                            <h3 class="text-xl font-serif font-bold text-slate-900 group-hover:text-red-600 transition leading-snug">
                                <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>

                            <p class="text-slate-600 text-sm leading-relaxed line-clamp-3">
                                {{ $post->excerpt }}
                            </p>
                        </div>

                        <div class="px-7 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                            <a href="{{ route('profile.show', ['username' => $post->user->username]) }}" class="flex items-center space-x-3 group/author">
                                <div class="w-8 h-8 rounded-full bg-slate-200 text-slate-700 font-bold text-xs flex items-center justify-center group-hover/author:bg-red-600 group-hover/author:text-white transition">
                                    {{ substr($post->user->name, 0, 1) }}
                                </div>
                                <span class="text-xs font-semibold text-slate-700 group-hover/author:text-red-600 transition">{{ $post->user->name }} <span class="text-slate-400">{{ '@'.$post->user->username }}</span></span>
                            </a>
                            <a href="{{ route('blog.show', $post->slug) }}" class="text-xs font-bold text-red-600 hover:underline flex items-center space-x-1">
                                <span>Read story</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="pt-6">
                {{ $posts->links() }}
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-8">
            <!-- Categories Widget -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs space-y-4">
                <h3 class="text-base font-bold text-slate-900 uppercase tracking-wider border-b border-slate-100 pb-3">Categories</h3>
                <ul class="space-y-2">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('blog.category', $category) }}" class="group flex justify-between items-center py-2 px-3 rounded-xl text-slate-600 hover:text-red-600 hover:bg-red-50/50 transition text-sm font-medium">
                                <span class="group-hover:translate-x-1 transition-transform">{{ $category->name }}</span>
                                <span class="bg-slate-100 text-slate-600 group-hover:bg-red-100 group-hover:text-red-700 px-2.5 py-0.5 rounded-full text-xs font-bold transition">
                                    {{ $category->posts()->where('status', 'published')->count() }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="relative overflow-hidden rounded-2xl bg-red-700 p-6 text-white shadow-lg shadow-red-950/10">
                <div class="pointer-events-none absolute -right-8 -top-10 size-28 rounded-full border border-white/15"></div>
                <p class="relative text-xs font-bold uppercase tracking-[0.16em] text-red-100">Your story belongs here</p>
                <h3 class="relative mt-3 font-serif text-2xl font-bold leading-tight">Write something worth sharing.</h3>
                <p class="relative mt-3 text-sm leading-6 text-red-100">Join a community where every writer can publish and be heard.</p>
                @auth
                    @if(auth()->user()->role === 'author' || auth()->user()->role === 'admin')
                        <a href="{{ route('author.posts.create') }}" class="relative mt-5 inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2.5 text-sm font-bold text-red-800 transition hover:bg-red-50">Start writing <span aria-hidden="true">&rarr;</span></a>
                    @else
                        <a href="{{ route('blog.index') }}" class="relative mt-5 inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2.5 text-sm font-bold text-red-800 transition hover:bg-red-50">Keep exploring <span aria-hidden="true">&rarr;</span></a>
                    @endif
                @else
                    <a href="{{ route('register') }}" class="relative mt-5 inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2.5 text-sm font-bold text-red-800 transition hover:bg-red-50">Become a writer <span aria-hidden="true">&rarr;</span></a>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
