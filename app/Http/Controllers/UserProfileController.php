<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserProfileController extends Controller
{
    public function show(string $username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $posts = $user->posts()
            ->with('category')
            ->where('status', 'published')
            ->orderByDesc('published_at')
            ->paginate(6);

        return view('users.show', compact('user', 'posts'));
    }
}
