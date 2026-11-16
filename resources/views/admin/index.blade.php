@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div>
        <p class="text-xs font-bold uppercase tracking-[0.18em] text-red-700">Blogify overview</p>
        <h1 class="mt-2 text-3xl font-extrabold text-gray-900">Admin Dashboard</h1>
        <p class="mt-2 text-sm text-gray-500">Monitor your community and manage site content.</p>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-sm font-semibold text-slate-500">Total users</h2>
            <p class="mt-3 text-3xl font-bold text-slate-950">{{ $stats['users_count'] }}</p>
            <a href="{{ route('admin.users') }}" class="mt-4 inline-block text-xs font-bold text-red-700 hover:underline">Manage users &rarr;</a>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-sm font-semibold text-slate-500">Administrators</h2>
            <p class="mt-3 text-3xl font-bold text-slate-950">{{ $stats['admins_count'] }}</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-sm font-semibold text-slate-500">Authors</h2>
            <p class="mt-3 text-3xl font-bold text-slate-950">{{ $stats['authors_count'] }}</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-sm font-semibold text-slate-500">Readers</h2>
            <p class="mt-3 text-3xl font-bold text-slate-950">{{ $stats['readers_count'] }}</p>
        </div>
        <div class="rounded-2xl border border-amber-200 bg-amber-50/60 p-6 shadow-sm">
            <h2 class="text-sm font-semibold text-amber-800">Subscribers</h2>
            <p class="mt-3 text-3xl font-bold text-slate-950">{{ $stats['subscribers_count'] }}</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-sm font-semibold text-slate-500">All posts</h2>
            <p class="mt-3 text-3xl font-bold text-slate-950">{{ $stats['posts_count'] }}</p>
        </div>
        <div class="rounded-2xl border border-emerald-200 bg-emerald-50/60 p-6 shadow-sm">
            <h2 class="text-sm font-semibold text-emerald-800">Published posts</h2>
            <p class="mt-3 text-3xl font-bold text-slate-950">{{ $stats['published_posts'] }}</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-sm font-semibold text-slate-500">Categories</h2>
            <p class="mt-3 text-3xl font-bold text-slate-950">{{ $stats['categories_count'] }}</p>
            <a href="{{ route('admin.categories') }}" class="mt-4 inline-block text-xs font-bold text-red-700 hover:underline">Manage categories &rarr;</a>
        </div>
    </div>
</div>
@endsection
