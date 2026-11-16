<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogPublicationTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_load_successfully(): void
    {
        foreach ([
            '/',
            '/blogs',
            '/news',
            '/services',
            '/faq',
            '/privacy-policy',
            '/terms-and-conditions',
            '/login',
            '/register',
        ] as $path) {
            $this->get($path)->assertOk();
        }
    }

    public function test_successful_registration_and_login_show_success_feedback(): void
    {
        $credentials = [
            'name' => 'Blogify Reader',
            'email' => 'reader@example.test',
            'password' => 'correct-horse-battery',
            'password_confirmation' => 'correct-horse-battery',
            'role' => 'reader',
        ];

        $this->post(route('register'), $credentials)
            ->assertRedirect('/@blogify-reader')
            ->assertSessionHas('success', 'Your account has been created successfully.');

        $this->get('/@blogify-reader')
            ->assertOk()
            ->assertSee('Your account has been created successfully.');

        $this->post(route('logout'))->assertRedirect('/');

        $this->post(route('login'), [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ])->assertRedirect('/@blogify-reader')
            ->assertSessionHas('success', 'You are now signed in.');

        $this->get('/@blogify-reader')
            ->assertOk()
            ->assertSee('You are now signed in.');

        $user = User::where('email', $credentials['email'])->firstOrFail();
        $this->assertSame('blogify-reader', $user->username);
        $this->get(route('profile.show', ['username' => $user->username]))
            ->assertOk()
            ->assertSee('@blogify-reader');
    }

    public function test_every_role_logs_in_to_its_own_profile_and_logout_returns_home(): void
    {
        $roles = ['reader', 'subscriber', 'author', 'admin'];
        $this->get(route('admin.index'))->assertRedirect(route('login'));

        foreach ($roles as $role) {
            $user = User::factory()->create([
                'name' => 'Profile '.ucfirst($role),
                'email' => $role.'-profile@example.test',
                'role' => $role,
            ]);

            $this->post(route('login'), [
                'email' => $user->email,
                'password' => 'password',
            ])->assertRedirect(route('profile.show', ['username' => $user->username]));

            $this->get(route('profile.show', ['username' => $user->username]))
                ->assertOk()
                ->assertSee('@'.$user->username);

            $this->post(route('logout'))->assertRedirect('/');
        }
    }

    public function test_each_user_gets_a_unique_public_profile_with_only_published_posts(): void
    {
        $firstUser = User::factory()->create([
            'name' => 'Mary Jane',
            'role' => 'author',
        ]);
        $secondUser = User::factory()->create([
            'name' => 'Mary Jane',
            'role' => 'subscriber',
        ]);

        $this->assertSame('mary-jane', $firstUser->username);
        $this->assertSame('mary-jane-2', $secondUser->username);

        $category = Category::create([
            'name' => 'Stories',
            'slug' => 'stories',
        ]);
        $publishedPost = Post::create([
            'user_id' => $firstUser->id,
            'category_id' => $category->id,
            'title' => 'Public profile story',
            'slug' => 'public-profile-story',
            'body' => 'Published content',
            'status' => 'published',
            'published_at' => now(),
        ]);
        Post::create([
            'user_id' => $firstUser->id,
            'category_id' => $category->id,
            'title' => 'Private draft story',
            'slug' => 'private-draft-story',
            'body' => 'Draft content',
            'status' => 'draft',
        ]);

        $this->get(route('profile.show', ['username' => $firstUser->username]))
            ->assertOk()
            ->assertSee('@mary-jane')
            ->assertSee('Public profile story')
            ->assertDontSee('Private draft story');

        $this->get(route('blog.author', $firstUser))
            ->assertRedirect(route('profile.show', ['username' => $firstUser->username]));

        $this->get(route('blog.show', $publishedPost->slug))
            ->assertOk()
            ->assertSee(route('profile.show', ['username' => $firstUser->username]));
    }

    public function test_unknown_profile_handle_returns_not_found(): void
    {
        $this->get('/@missing-user')->assertNotFound();
    }

    public function test_auth_pages_offer_email_sign_in_and_role_selection_only(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Sign in')
            ->assertSee('Email address')
            ->assertDontSee('Continue with Google');

        $this->get(route('register'))
            ->assertOk()
            ->assertSee('Reader')
            ->assertSee('Subscriber')
            ->assertSee('Author / Writer')
            ->assertSee('Create account')
            ->assertDontSee('Sign up with Google');
    }

    public function test_google_oauth_endpoints_are_removed(): void
    {
        $this->get('/auth/google/redirect')->assertNotFound();
        $this->get('/auth/google/callback')->assertNotFound();
    }

    public function test_reader_and_subscriber_are_public_roles_while_admin_routes_are_restricted(): void
    {
        $subscriber = User::factory()->create(['role' => 'subscriber']);
        $reader = User::factory()->create(['role' => 'reader']);
        $author = User::factory()->create(['role' => 'author']);
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($subscriber)->get(route('admin.index'))->assertForbidden();
        $this->get(route('author.posts.index'))->assertForbidden();

        $this->actingAs($reader)->get(route('admin.index'))->assertForbidden();
        $this->get(route('author.posts.index'))->assertForbidden();

        $this->actingAs($author)->get(route('author.posts.index'))->assertOk();
        $this->get(route('admin.index'))->assertForbidden();

        $this->actingAs($admin)->get(route('admin.index'))->assertOk();
        $this->get(route('author.posts.index'))->assertOk();
    }

    public function test_a_subscriber_account_can_be_registered_and_appears_in_admin_metrics(): void
    {
        $this->post(route('register'), [
            'name' => 'Blogify Subscriber',
            'email' => 'subscriber@example.test',
            'password' => 'correct-horse-battery',
            'password_confirmation' => 'correct-horse-battery',
            'role' => 'subscriber',
        ])->assertRedirect('/@blogify-subscriber')
            ->assertSessionHas('success', 'Your account has been created successfully.');

        $this->assertDatabaseHas('users', [
            'email' => 'subscriber@example.test',
            'role' => 'subscriber',
        ]);

        $subscriber = User::where('email', 'subscriber@example.test')->firstOrFail();
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->get(route('admin.index'))
            ->assertOk()
            ->assertViewHas('stats', fn (array $stats) => $stats['subscribers_count'] === 1);

        $this->patch(route('admin.users.role', $subscriber), ['role' => 'reader'])
            ->assertSessionHas('success', 'User role updated successfully!');

        $this->assertSame('reader', $subscriber->fresh()->role);
    }

    public function test_post_date_is_the_actual_publish_date(): void
    {
        $author = User::factory()->create(['role' => 'author']);
        $category = Category::create([
            'name' => 'Stories',
            'slug' => 'stories',
        ]);
        $postData = [
            'title' => 'A story with its real date',
            'category_id' => $category->id,
            'excerpt' => 'A short introduction.',
            'body' => 'The complete story.',
        ];

        $this->actingAs($author)
            ->post(route('author.posts.store'), $postData + ['status' => 'draft'])
            ->assertRedirect(route('author.posts.index'));

        $post = Post::firstOrFail();
        $this->assertNull($post->published_at);

        $firstPublishDate = now()->addDay()->startOfMinute();
        $this->travelTo($firstPublishDate);
        $this->put(route('author.posts.update', $post), $postData + ['status' => 'published'])
            ->assertRedirect(route('author.posts.index'));

        $post->refresh();
        $this->assertEquals($firstPublishDate->toDateTimeString(), $post->published_at->toDateTimeString());

        $this->travelTo($firstPublishDate->copy()->addDay());
        $this->put(route('author.posts.update', $post), $postData + ['status' => 'published'])
            ->assertRedirect(route('author.posts.index'));
        $this->assertEquals($firstPublishDate->toDateTimeString(), $post->fresh()->published_at->toDateTimeString());

        $this->put(route('author.posts.update', $post), $postData + ['status' => 'draft'])
            ->assertRedirect(route('author.posts.index'));
        $this->assertNull($post->fresh()->published_at);

        $republishDate = now()->addDay()->startOfMinute();
        $this->travelTo($republishDate);
        $this->put(route('author.posts.update', $post), $postData + ['status' => 'published'])
            ->assertRedirect(route('author.posts.index'));
        $this->assertEquals($republishDate->toDateTimeString(), $post->fresh()->published_at->toDateTimeString());
    }
}
