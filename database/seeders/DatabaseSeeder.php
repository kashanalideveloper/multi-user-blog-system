<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = \App\Models\User::firstOrCreate(
            ['email' => 'admin@blog.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'bio' => 'System Administrator & Lead Editor.',
            ]
        );

        $author = \App\Models\User::firstOrCreate(
            ['email' => 'author@blog.com'],
            [
                'name' => 'John Doe',
                'password' => bcrypt('password'),
                'role' => 'author',
                'bio' => 'Passionate tech writer and software engineer.',
            ]
        );

        $reader = \App\Models\User::firstOrCreate(
            ['email' => 'reader@blog.com'],
            [
                'name' => 'Jane Smith',
                'password' => bcrypt('password'),
                'role' => 'reader',
                'bio' => 'Avid blog reader and tech enthusiast.',
            ]
        );

        $cat1 = \App\Models\Category::firstOrCreate(
            ['slug' => 'technology'],
            ['name' => 'Technology', 'description' => 'Latest in tech, software engineering, and AI.']
        );

        $cat2 = \App\Models\Category::firstOrCreate(
            ['slug' => 'lifestyle'],
            ['name' => 'Lifestyle', 'description' => 'Productivity, remote work, and daily living.']
        );

        $tag1 = \App\Models\Tag::firstOrCreate(['slug' => 'laravel'], ['name' => 'Laravel']);
        $tag2 = \App\Models\Tag::firstOrCreate(['slug' => 'web-dev'], ['name' => 'Web Dev']);

        $post1 = \App\Models\Post::firstOrCreate(
            ['slug' => 'getting-started-with-laravel-11'],
            [
                'user_id' => $author->id,
                'category_id' => $cat1->id,
                'title' => 'Getting Started with Laravel 11 and Tailwind CSS',
                'excerpt' => 'Discover how to build powerful multi-user applications with Laravel 11 and modern Tailwind styling.',
                'body' => 'Laravel 11 brings a streamlined directory structure, elegant dependency management, and lightning-fast performance. Combined with Tailwind CSS, creating stunning multi-user blog systems has never been easier or more enjoyable.',
                'status' => 'published',
            ]
        );
        $post1->tags()->sync([$tag1->id, $tag2->id]);

        $post2 = \App\Models\Post::firstOrCreate(
            ['slug' => 'top-remote-work-tips-for-developers'],
            [
                'user_id' => $author->id,
                'category_id' => $cat2->id,
                'title' => 'Top Remote Work Tips for Software Developers in 2026',
                'excerpt' => 'Master remote work productivity, deep focus, and work-life balance as a developer.',
                'body' => 'Working remotely offers immense flexibility but requires discipline. Establishing a dedicated workspace, setting clear asynchronous communication boundaries, and taking regular breaks will skyrocket your productivity.',
                'status' => 'published',
            ]
        );
        $post2->tags()->sync([$tag2->id]);
    }
}
