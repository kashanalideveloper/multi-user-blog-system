@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-6xl space-y-14">
    <section class="relative isolate overflow-hidden rounded-[2rem] bg-gradient-to-br from-red-700 via-red-700 to-rose-900 px-6 py-10 text-white shadow-xl shadow-red-950/10 sm:px-10 sm:py-14 lg:px-14">
        <div class="pointer-events-none absolute -right-20 -top-24 size-72 rounded-full border border-white/10"></div>
        <div class="pointer-events-none absolute -right-8 -top-12 size-52 rounded-full border border-white/10"></div>
        <div class="relative max-w-3xl">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-red-100">One home for every voice</p>
            <h1 class="mt-4 font-serif text-4xl font-bold tracking-tight sm:text-5xl">A better place to read, write, and connect.</h1>
            <p class="mt-5 max-w-2xl text-base leading-7 text-red-100 sm:text-lg">
                Blogify brings writers and readers together with simple tools for sharing stories and discovering new ideas.
            </p>
            <a href="{{ route('register') }}" class="mt-7 inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-red-800 transition hover:bg-red-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-red-700">
                Join the community <span aria-hidden="true">&rarr;</span>
            </a>
        </div>
    </section>

    <section aria-labelledby="services-heading">
        <div class="max-w-2xl">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-red-700">Made for the whole community</p>
            <h2 id="services-heading" class="mt-2 font-serif text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">Everything your next story needs.</h2>
        </div>

        <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <article class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">
                <span class="flex size-11 items-center justify-center rounded-xl bg-red-50 text-lg font-bold text-red-700 transition group-hover:bg-red-700 group-hover:text-white" aria-hidden="true">01</span>
                <h3 class="mt-5 font-serif text-xl font-bold text-slate-950">Discover stories</h3>
                <p class="mt-2 text-sm leading-6 text-slate-600">Browse fresh posts, explore categories, and search for the ideas you care about.</p>
                <a href="{{ route('news.index') }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-red-700 hover:text-red-900">Read the latest <span aria-hidden="true">&rarr;</span></a>
            </article>

            <article class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">
                <span class="flex size-11 items-center justify-center rounded-xl bg-red-50 text-lg font-bold text-red-700 transition group-hover:bg-red-700 group-hover:text-white" aria-hidden="true">02</span>
                <h3 class="mt-5 font-serif text-xl font-bold text-slate-950">Publish your writing</h3>
                <p class="mt-2 text-sm leading-6 text-slate-600">Create articles, add categories and tags, save drafts, and publish when you’re ready.</p>
                <a href="{{ route('register') }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-red-700 hover:text-red-900">Become a writer <span aria-hidden="true">&rarr;</span></a>
            </article>

            <article class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">
                <span class="flex size-11 items-center justify-center rounded-xl bg-red-50 text-lg font-bold text-red-700 transition group-hover:bg-red-700 group-hover:text-white" aria-hidden="true">03</span>
                <h3 class="mt-5 font-serif text-xl font-bold text-slate-950">Join the conversation</h3>
                <p class="mt-2 text-sm leading-6 text-slate-600">Comment on published stories and connect with authors and other readers.</p>
                <a href="{{ route('blogs.index') }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-red-700 hover:text-red-900">Explore blogs <span aria-hidden="true">&rarr;</span></a>
            </article>

            <article class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">
                <span class="flex size-11 items-center justify-center rounded-xl bg-red-50 text-lg font-bold text-red-700 transition group-hover:bg-red-700 group-hover:text-white" aria-hidden="true">04</span>
                <h3 class="mt-5 font-serif text-xl font-bold text-slate-950">Manage your author space</h3>
                <p class="mt-2 text-sm leading-6 text-slate-600">Keep your posts organized from one dashboard and update them whenever inspiration strikes.</p>
                <a href="{{ route('register') }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-red-700 hover:text-red-900">Get started <span aria-hidden="true">&rarr;</span></a>
            </article>

            <article class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">
                <span class="flex size-11 items-center justify-center rounded-xl bg-red-50 text-lg font-bold text-red-700 transition group-hover:bg-red-700 group-hover:text-white" aria-hidden="true">05</span>
                <h3 class="mt-5 font-serif text-xl font-bold text-slate-950">Explore by topic</h3>
                <p class="mt-2 text-sm leading-6 text-slate-600">Find focused collections of articles grouped into topics by the Blogify community.</p>
                <a href="{{ route('blogs.index') }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-red-700 hover:text-red-900">Browse articles <span aria-hidden="true">&rarr;</span></a>
            </article>

            <article class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">
                <span class="flex size-11 items-center justify-center rounded-xl bg-red-50 text-lg font-bold text-red-700 transition group-hover:bg-red-700 group-hover:text-white" aria-hidden="true">06</span>
                <h3 class="mt-5 font-serif text-xl font-bold text-slate-950">Community moderation</h3>
                <p class="mt-2 text-sm leading-6 text-slate-600">Role-based admin tools help keep users, topics, and the publishing community organized.</p>
                <a href="{{ route('faq') }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-red-700 hover:text-red-900">Questions? Read the FAQ <span aria-hidden="true">&rarr;</span></a>
            </article>
        </div>
    </section>
</div>
@endsection
