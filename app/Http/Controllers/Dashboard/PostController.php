<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(2);

        return view('dashboard.post.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');
$post=new Post();
        return view('dashboard.post.create', compact('categories','post'));
    }

    public function store(StoreRequest $request)
    {
        Post::create($request->validated());

        return to_route('post.index');

        // $request->validate([
        //    'title'=> 'required|min:5|max:500',
        //    'slug'=> 'required|min:5|max:500',
        //    'content'=> 'required|min:5',
        //    'category_id'=> 'required|integer',
        //    'description'=> 'required|min:5',
        //    'posted'=> 'required',
        //
        //    ]);
        // Post::create([
        // 'title' => $request->all()['title'],
        // 'slug' => $request->all()['slug'],
        // 'content' => $request->all()['content'],
        // 'category_id' => $request->all()['category_id'],
        // 'description' => $request->all()['description'],
        // 'posted' => $request->all()['posted'],
        // 'image' => $request->all()['image'],
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post._show', ['post'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');

        return view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {

        $data = $request->validated();

        //image
        if(isset($data['image'])) {
        $data['image']=$filname=time().'.'.$data['image']->extension();
        $request->image->move(public_path('uploads/posts'),$filname);
        }
        //image
        $post->update($data);
      
        return to_route('post.index');
    
    }
    public function destroy(Post $post)
    {
    $post->delete();
    return to_route('post.index');
    }
}
