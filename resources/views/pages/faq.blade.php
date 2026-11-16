@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-4xl space-y-12">
    <section class="relative isolate overflow-hidden rounded-[2rem] bg-gradient-to-br from-red-700 via-red-700 to-rose-900 px-6 py-10 text-white shadow-xl shadow-red-950/10 sm:px-10 sm:py-14 lg:px-14">
        <div class="pointer-events-none absolute -right-20 -top-24 size-72 rounded-full border border-white/10"></div>
        <div class="relative max-w-2xl">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-red-100">A little clarity</p>
            <h1 class="mt-4 font-serif text-4xl font-bold tracking-tight sm:text-5xl">Frequently asked questions</h1>
            <p class="mt-4 text-base leading-7 text-red-100 sm:text-lg">Everything you need to get started reading and writing on Blogify.</p>
        </div>
    </section>

    <section aria-label="Frequently asked questions" class="divide-y divide-slate-200 border-y border-slate-200">
        <details class="group py-6 first:pt-2">
            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 py-3 font-serif text-lg font-bold text-slate-900 marker:content-none hover:text-red-700 [&::-webkit-details-marker]:hidden">
                What is Blogify?
                <span class="flex size-8 shrink-0 items-center justify-center rounded-full bg-red-50 text-red-700 transition group-open:rotate-45" aria-hidden="true">+</span>
            </summary>
            <p class="max-w-3xl pb-3 pr-10 text-sm leading-7 text-slate-600">Blogify is a multi-user blogging platform where readers discover ideas and writers can publish stories for the community.</p>
        </details>

        <details class="group py-6">
            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 py-3 font-serif text-lg font-bold text-slate-900 marker:content-none hover:text-red-700 [&::-webkit-details-marker]:hidden">
                Do I need an account to read posts?
                <span class="flex size-8 shrink-0 items-center justify-center rounded-full bg-red-50 text-red-700 transition group-open:rotate-45" aria-hidden="true">+</span>
            </summary>
            <p class="max-w-3xl pb-3 pr-10 text-sm leading-7 text-slate-600">No. Published stories are open to everyone. You’ll need an account to join the conversation, and an author account to publish.</p>
        </details>

        <details class="group py-6">
            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 py-3 font-serif text-lg font-bold text-slate-900 marker:content-none hover:text-red-700 [&::-webkit-details-marker]:hidden">
                How do I become a writer?
                <span class="flex size-8 shrink-0 items-center justify-center rounded-full bg-red-50 text-red-700 transition group-open:rotate-45" aria-hidden="true">+</span>
            </summary>
            <p class="max-w-3xl pb-3 pr-10 text-sm leading-7 text-slate-600">Create an account and choose the Author role when registering. Once signed in, open My writing to create and manage your posts.</p>
        </details>

        <details class="group py-6">
            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 py-3 font-serif text-lg font-bold text-slate-900 marker:content-none hover:text-red-700 [&::-webkit-details-marker]:hidden">
                Can I save a post as a draft?
                <span class="flex size-8 shrink-0 items-center justify-center rounded-full bg-red-50 text-red-700 transition group-open:rotate-45" aria-hidden="true">+</span>
            </summary>
            <p class="max-w-3xl pb-3 pr-10 text-sm leading-7 text-slate-600">Yes. Authors can save a post as a draft and publish it when it’s ready from the post editor.</p>
        </details>

        <details class="group py-6">
            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 py-3 font-serif text-lg font-bold text-slate-900 marker:content-none hover:text-red-700 [&::-webkit-details-marker]:hidden">
                How do I leave a comment?
                <span class="flex size-8 shrink-0 items-center justify-center rounded-full bg-red-50 text-red-700 transition group-open:rotate-45" aria-hidden="true">+</span>
            </summary>
            <p class="max-w-3xl pb-3 pr-10 text-sm leading-7 text-slate-600">Sign in to your reader or author account, open a story, and use the discussion form below the post.</p>
        </details>

        <details class="group py-6 last:pb-2">
            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 py-3 font-serif text-lg font-bold text-slate-900 marker:content-none hover:text-red-700 [&::-webkit-details-marker]:hidden">
                Where can I get help?
                <span class="flex size-8 shrink-0 items-center justify-center rounded-full bg-red-50 text-red-700 transition group-open:rotate-45" aria-hidden="true">+</span>
            </summary>
            <p class="max-w-3xl pb-3 pr-10 text-sm leading-7 text-slate-600">Reach the site owner at <a href="mailto:kashanalikot@gmail.com" class="font-semibold text-red-700 underline decoration-red-200 underline-offset-4 hover:decoration-red-700">kashanalikot@gmail.com</a>, or browse the <a href="{{ route('blogs.index') }}" class="font-semibold text-red-700 underline decoration-red-200 underline-offset-4 hover:decoration-red-700">latest blogs</a>.</p>
        </details>
    </section>
</div>
@endsection
