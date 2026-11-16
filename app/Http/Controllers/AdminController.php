<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'users_count' => User::count(),
            'admins_count' => User::where('role', 'admin')->count(),
            'authors_count' => User::where('role', 'author')->count(),
            'readers_count' => User::where('role', 'reader')->count(),
            'subscribers_count' => User::where('role', 'subscriber')->count(),
            'posts_count' => Post::count(),
            'categories_count' => Category::count(),
            'published_posts' => Post::where('status', 'published')->count(),
        ];
        return view('admin.index', compact('stats'));
    }

    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function updateUserRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => ['required', 'in:admin,author,reader,subscriber'],
        ]);

        if (
            $user->is(auth()->user())
            && $validated['role'] !== 'admin'
            && User::where('role', 'admin')->count() <= 1
        ) {
            return back()->withErrors([
                'role' => 'You cannot remove the only administrator. Promote another user to admin first.',
            ]);
        }

        $user->update(['role' => $validated['role']]);
        return back()->with('success', 'User role updated successfully!');
    }

    public function categories()
    {
        $categories = Category::withCount('posts')->latest()->get();
        return view('admin.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
            'description' => ['nullable', 'string'],
        ]);

        Category::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'],
        ]);

        return back()->with('success', 'Category created successfully!');
    }
}
