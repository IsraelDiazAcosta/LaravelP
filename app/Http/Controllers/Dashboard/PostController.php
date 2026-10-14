<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Post::create(
            [
                'title' => 'test title',
                'slug' => 'test slug',
                'content' => 'test content',
                'category_id'=>1,
                'description' => 'test description',
                'posted' => 'not',
                'image' => 'test image',

            ]
        );

        return 'index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');

        return view('dashboard.post.create', compact('categories'));
    }

   
    public function store(Request $request)
    {

        $request->validate([
            'title'=> 'required|min:5|min:500',
            'slug'=> 'required|min:5|min:500',
            'content'=> 'required|min:5',
            'category_id'=> 'required|integer',
            'description'=> 'required|min:5',
            'posted'=> 'required',
            
            ]);
            echo'not';



        Post::create($request->all());
        return to_route('post.index');
       // Post::create([
        //'title' => $request->all()['title'],
        //'slug' => $request->all()['slug'],
        //'content' => $request->all()['content'],
        //'category_id' => $request->all()['category_id'],
        //'description' => $request->all()['description'],
        //'posted' => $request->all()['posted'],
        //'image' => $request->all()['image'],
        //]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
