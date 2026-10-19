<?php

use App\Models\Post;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(LazilyRefreshDatabase::class);

test('the edit page displays the selected post title', function () {
    $categoryId = DB::table('categories')->insertGetId([
        'title' => 'News',
        'slug' => 'news',
    ]);
    $post = Post::create([
        'title' => 'Existing post title',
        'slug' => 'existing-post-title',
        'category_id' => $categoryId,
    ]);

    $response = $this->get(route('post.edit', $post));

    $response->assertOk();
    $response->assertSee('value="Existing post title"', false);
});

test('the post can be updated without changing its slug', function () {
    $categoryId = DB::table('categories')->insertGetId([
        'title' => 'News',
        'slug' => 'news',
    ]);
    $post = Post::create([
        'title' => 'Existing post title',
        'slug' => 'existing-post-title',
        'category_id' => $categoryId,
    ]);

    $response = $this->patch(route('post.update', $post), [
        'title' => 'Updated post title',
        'slug' => 'existing-post-title',
        'content' => 'Updated post content',
        'category_id' => $categoryId,
        'description' => 'Updated post description',
        'posted' => 'not',
    ]);

    $response->assertRedirect(route('post.index'));
    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'title' => 'Updated post title',
        'slug' => 'existing-post-title',
    ]);
});

test('the post cannot be updated with another posts slug', function () {
    $categoryId = DB::table('categories')->insertGetId([
        'title' => 'News',
        'slug' => 'news',
    ]);
    $post = Post::create([
        'title' => 'Existing post title',
        'slug' => 'existing-post-title',
        'category_id' => $categoryId,
    ]);
    Post::create([
        'title' => 'Another post title',
        'slug' => 'another-post-title',
        'category_id' => $categoryId,
    ]);

    $response = $this->patch(route('post.update', $post), [
        'title' => 'Updated post title',
        'slug' => 'another-post-title',
        'content' => 'Updated post content',
        'category_id' => $categoryId,
        'description' => 'Updated post description',
        'posted' => 'not',
    ]);

    $response->assertSessionHasErrors('slug');
    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'title' => 'Existing post title',
        'slug' => 'existing-post-title',
    ]);
});
