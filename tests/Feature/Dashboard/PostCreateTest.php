<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

it('renders a message when no category exists', function () {
    $response = $this->actingAs(User::factory()->create())
        ->get(route('post.create'));

    $response->assertOk();
    $response->assertSee('Create a category before adding a post.');
});

it('renders category choices without requiring a selected category', function () {
    DB::table('categories')->insert([
        'title' => 'News',
        'slug' => 'news',
    ]);

    $response = $this->actingAs(User::factory()->create())
        ->get(route('post.create'));

    $response->assertOk();
    $response->assertSee('Select a category');
    $response->assertSee('News');
});

it('creates a post when its category exists', function () {
    $categoryId = DB::table('categories')->insertGetId([
        'title' => 'News',
        'slug' => 'news',
    ]);

    $response = $this->actingAs(User::factory()->create())
        ->post(route('post.store'), [
            'title' => 'A valid post title',
            'slug' => 'a-valid-post-slug',
            'content' => 'A valid post body',
            'category_id' => $categoryId,
            'description' => 'Description for a valid post',
            'posted' => 'yes',
        ]);

    $response->assertRedirect(route('post.index'));
    $this->assertDatabaseHas('posts', [
        'title' => 'A valid post title',
        'slug' => 'a-valid-post-slug',
        'category_id' => $categoryId,
    ]);
});

it('rejects a post with a duplicate slug', function () {
    $categoryId = DB::table('categories')->insertGetId([
        'title' => 'News',
        'slug' => 'news',
    ]);
    Post::create([
        'title' => 'Existing post title',
        'slug' => 'existing-post-slug',
        'category_id' => $categoryId,
    ]);

    $response = $this->actingAs(User::factory()->create())
        ->post(route('post.store'), [
            'title' => 'A different post title',
            'slug' => 'existing-post-slug',
            'content' => 'A valid post body',
            'category_id' => $categoryId,
            'description' => 'Description for a valid post',
            'posted' => 'yes',
        ]);

    $response->assertSessionHasErrors(['slug']);
    $this->assertDatabaseMissing('posts', [
        'title' => 'A different post title',
    ]);
});
