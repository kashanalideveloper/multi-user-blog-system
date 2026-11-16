<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['user', 'category', 'tags'])->where('status', 'published');

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('body', 'like', "%{$search}%");
            });
        }

        $posts = $query->orderByDesc('published_at')->paginate(6);
        $categories = Category::all();
        $tags = Tag::all();
        $featuredPosts = Post::with(['user', 'category'])->where('status', 'published')->orderByDesc('published_at')->take(3)->get();

        return view('blog.index', compact('posts', 'categories', 'tags', 'featuredPosts'));
    }

    public function news()
    {
        $posts = Post::with(['user', 'category'])
            ->where('status', 'published')
            ->orderByDesc('published_at')
            ->paginate(6);

        return view('blog.news', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with(['user', 'category', 'tags', 'comments.user', 'comments.replies.user'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }

    public function category(Category $category)
    {
        $posts = $category->posts()->with(['user', 'category', 'tags'])->where('status', 'published')->orderByDesc('published_at')->paginate(6);
        $categories = Category::all();
        return view('blog.category', compact('category', 'posts', 'categories'));
    }

    public function author(User $author)
    {
        return redirect()->route('profile.show', ['username' => $author->username], 301);
    }

    public function storeComment(Request $request, Post $post)
    {
        $request->validate([
            'body' => ['required', 'string', 'max:1000'],
            'parent_id' => ['nullable', 'exists:comments,id'],
        ]);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id,
            'body' => $request->body,
        ]);

        return back()->with('success', 'Comment posted successfully!');
    }
}
