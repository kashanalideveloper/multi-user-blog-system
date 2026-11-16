<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#fffdfc]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Blogify').' | Multi-User Blog System')</title>
    <link rel="icon" type="image/webp" href="{{ asset('favicon.webp') }}">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="h-full antialiased text-slate-900 flex flex-col justify-between selection:bg-red-500 selection:text-white">
    <div class="min-h-screen flex flex-col">
        <nav class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/95 shadow-xs backdrop-blur-xl" aria-label="Main navigation">
            <div class="mx-auto flex h-[4.5rem] max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
                <a href="{{ route('blog.index') }}" class="group flex shrink-0 items-center gap-3 rounded-lg focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500 focus-visible:ring-offset-4">
                    <span class="flex size-10 items-center justify-center rounded-xl bg-red-600 font-serif text-2xl font-bold text-white shadow-sm shadow-red-900/20 transition-transform group-hover:-rotate-3 group-hover:scale-105" aria-hidden="true">B</span>
                    <span class="leading-tight">
                        <span class="block text-xl font-extrabold tracking-tight text-slate-950">Blogify<span class="text-red-600">.</span></span>
                        <span class="hidden text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-500 sm:block">Stories for everyone</span>
                    </span>
                </a>

                <div class="hidden items-center gap-1 lg:flex">
                    <a href="{{ route('news.index') }}" class="rounded-full px-3.5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-red-50 hover:text-red-700 {{ request()->routeIs('news.index') ? 'bg-red-50 text-red-700' : '' }}" @if(request()->routeIs('news.index')) aria-current="page" @endif>
                        News
                    </a>
                    <a href="{{ route('blogs.index') }}" class="rounded-full px-3.5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-red-50 hover:text-red-700 {{ request()->routeIs('blogs.index', 'blog.index', 'blog.show', 'blog.category', 'blog.author', 'profile.show') ? 'bg-red-50 text-red-700' : '' }}" @if(request()->routeIs('blogs.index', 'blog.index', 'blog.show', 'blog.category', 'blog.author', 'profile.show')) aria-current="page" @endif>
                        Blogs
                    </a>
                    <a href="{{ route('services') }}" class="rounded-full px-3.5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-red-50 hover:text-red-700 {{ request()->routeIs('services') ? 'bg-red-50 text-red-700' : '' }}" @if(request()->routeIs('services')) aria-current="page" @endif>
                        Services
                    </a>
                    <a href="{{ route('faq') }}" class="rounded-full px-3.5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-red-50 hover:text-red-700 {{ request()->routeIs('faq') ? 'bg-red-50 text-red-700' : '' }}" @if(request()->routeIs('faq')) aria-current="page" @endif>
                        FAQ
                    </a>
                </div>

                <div class="hidden items-center justify-end gap-2 lg:flex">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.index') }}" class="rounded-full px-3.5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-red-50 hover:text-red-700">Admin</a>
                        @endif
                        @if(auth()->user()->role === 'author' || auth()->user()->role === 'admin')
                            <a href="{{ route('author.posts.index') }}" class="rounded-full px-3.5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-red-50 hover:text-red-700">My writing</a>
                        @endif
                        <span class="ml-1 flex max-w-48 items-center gap-2.5 border-l border-slate-200 pl-4">
                            <span class="flex size-9 shrink-0 items-center justify-center rounded-full bg-slate-900 text-sm font-bold text-white">{{ mb_substr(auth()->user()->name, 0, 1) }}</span>
                            <span class="min-w-0">
                                <span class="block truncate text-sm font-semibold text-slate-700">{{ auth()->user()->name }}</span>
                                <span class="block text-[10px] font-semibold capitalize tracking-wide text-slate-400">{{ auth()->user()->role }}</span>
                            </span>
                        </span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="rounded-full px-3 py-2 text-sm font-semibold text-slate-500 transition hover:bg-slate-100 hover:text-slate-900">Log out</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="rounded-full px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100 hover:text-slate-950">Log in</a>
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 rounded-full bg-red-600 px-5 py-2.5 text-sm font-bold text-white shadow-sm shadow-red-900/15 transition hover:-translate-y-0.5 hover:bg-red-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500 focus-visible:ring-offset-2">
                            Join the community <span aria-hidden="true">&rarr;</span>
                        </a>
                    @endauth
                </div>

                <details class="group relative lg:hidden">
                    <summary class="flex size-11 cursor-pointer list-none items-center justify-center rounded-xl border border-slate-200 text-slate-700 transition hover:border-red-200 hover:bg-red-50 hover:text-red-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500 [&::-webkit-details-marker]:hidden" aria-label="Toggle navigation menu">
                        <svg class="size-5 group-open:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16" />
                        </svg>
                        <svg class="hidden size-5 group-open:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" d="m6 6 12 12M18 6 6 18" />
                        </svg>
                    </summary>
                    <div class="mobile-nav-panel absolute right-0 top-full mt-3 w-[min(88vw,22rem)] rounded-2xl border border-slate-200 bg-white p-3 shadow-xl shadow-slate-900/10">
                        <a href="{{ route('news.index') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-red-50 hover:text-red-700">News</a>
                        <a href="{{ route('blogs.index') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-red-50 hover:text-red-700">Blogs</a>
                        <a href="{{ route('services') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-red-50 hover:text-red-700">Services</a>
                        <a href="{{ route('faq') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-red-50 hover:text-red-700">FAQ</a>
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.index') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-red-50 hover:text-red-700">Admin panel</a>
                            @endif
                            @if(auth()->user()->role === 'author' || auth()->user()->role === 'admin')
                                <a href="{{ route('author.posts.index') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-red-50 hover:text-red-700">My writing</a>
                            @endif
                            <div class="my-2 border-t border-slate-100"></div>
                            <div class="flex items-center gap-3 px-4 py-3">
                                <span class="flex size-9 shrink-0 items-center justify-center rounded-full bg-slate-900 text-sm font-bold text-white">{{ mb_substr(auth()->user()->name, 0, 1) }}</span>
                                <span class="min-w-0">
                                    <span class="block truncate text-sm font-semibold text-slate-800">{{ auth()->user()->name }}</span>
                                    <span class="block text-xs font-medium capitalize text-slate-500">{{ auth()->user()->role }}</span>
                                </span>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full rounded-xl px-4 py-3 text-left text-sm font-semibold text-red-700 transition hover:bg-red-50">Log out</button>
                            </form>
                        @else
                            <div class="my-2 border-t border-slate-100"></div>
                            <a href="{{ route('login') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Log in</a>
                            <a href="{{ route('register') }}" class="mt-1 block rounded-xl bg-red-600 px-4 py-3 text-center text-sm font-bold text-white transition hover:bg-red-700">Join the community <span aria-hidden="true">&rarr;</span></a>
                        @endauth
                    </div>
                </details>
            </div>
        </nav>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 w-full">
                <div class="bg-emerald-50 border border-emerald-200 p-4 rounded-xl text-emerald-800 text-sm font-medium flex items-center shadow-xs">
                    <span class="mr-2">✨</span> {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Main Content -->
        <main class="flex-1 py-10">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    
    <!-- Footer -->
    <footer class="relative shrink-0 overflow-hidden bg-gradient-to-br from-red-700 via-red-800 to-rose-950 text-white">
        <div class="pointer-events-none absolute -right-24 -top-32 size-96 rounded-full border border-white/10"></div>
        <div class="pointer-events-none absolute -right-12 -top-20 size-72 rounded-full border border-white/10"></div>
        <div class="relative mx-auto max-w-7xl px-4 py-10 sm:px-6 sm:py-14 lg:px-8">
            <div class="grid grid-cols-1 gap-8 border-b border-white/15 pb-10 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8">
                <div class="max-w-sm">
                    <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-3 rounded-lg focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-4 focus-visible:ring-offset-red-800">
                        <span class="flex size-11 items-center justify-center rounded-xl bg-white font-serif text-2xl font-bold text-red-700">B</span>
                        <span class="text-2xl font-extrabold tracking-tight">Blogify<span class="text-red-200">.</span></span>
                    </a>
                    <p class="mt-5 text-sm leading-7 text-red-100">
                        A multi-user space to share ideas, discover fresh perspectives, and give every writer a voice.
                    </p>
                </div>

                <div>
                    <h2 class="text-xs font-bold uppercase tracking-[0.18em] text-red-200">Explore</h2>
                    <ul class="mt-5 space-y-3 text-sm text-white/90">
                        <li><a href="{{ route('news.index') }}" class="transition hover:text-white hover:underline hover:underline-offset-4">News</a></li>
                        <li><a href="{{ route('blogs.index') }}" class="transition hover:text-white hover:underline hover:underline-offset-4">Blogs</a></li>
                        <li><a href="{{ route('services') }}" class="transition hover:text-white hover:underline hover:underline-offset-4">Services</a></li>
                        @guest
                            <li><a href="{{ route('register') }}" class="transition hover:text-white hover:underline hover:underline-offset-4">Join Blogify</a></li>
                        @endguest
                    </ul>
                </div>

                <div>
                    <h2 class="text-xs font-bold uppercase tracking-[0.18em] text-red-200">Help &amp; policies</h2>
                    <ul class="mt-5 space-y-3 text-sm text-white/90">
                        <li><a href="{{ route('faq') }}" class="transition hover:text-white hover:underline hover:underline-offset-4">Frequently asked questions</a></li>
                        <li><a href="{{ route('privacy-policy') }}" class="transition hover:text-white hover:underline hover:underline-offset-4">Privacy policy</a></li>
                        <li><a href="{{ route('terms-and-conditions') }}" class="transition hover:text-white hover:underline hover:underline-offset-4">Terms &amp; conditions</a></li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-xs font-bold uppercase tracking-[0.18em] text-red-200">Let’s connect</h2>
                    <ul class="mt-5 space-y-3 text-sm text-white/90">
                        <li>
                            <a href="https://github.com/kashanalideveloper/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-white/90 transition hover:text-white">
                                <span class="text-red-200" aria-hidden="true">↗</span> GitHub
                            </a>
                        </li>
                        <li>
                            <a href="https://malik-kashan-portfolio.vercel.app/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-white/90 transition hover:text-white">
                                <span class="text-red-200" aria-hidden="true">↗</span> Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/923281944386" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-white/90 transition hover:text-white">
                                <span class="text-red-200" aria-hidden="true">↗</span> +92 328 1944386
                            </a>
                        </li>
                        <li>
                            <a href="mailto:kashanalikot@gmail.com" class="inline-flex break-all items-center gap-2 text-white/90 transition hover:text-white">
                                <span class="text-red-200" aria-hidden="true">↗</span> kashanalikot@gmail.com
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-col gap-3 pt-6 text-xs text-red-100 sm:flex-row sm:items-center sm:justify-between">
                <p>&copy; {{ date('Y') }} Blogify. All rights reserved.</p>
                <p>Made for people with something to share.</p>
            </div>
        </div>
    </footer>
    </div>
</body>
</html>
