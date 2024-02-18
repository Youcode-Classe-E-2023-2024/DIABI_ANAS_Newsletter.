<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostCreateRequest $request)
    {
        $post = Post::create($request->validated());

        if ($request->hasFile('image')) {
            $post->addMediaFromRequest('image')->usingName($post->title)->toMediaCollection();
        }

        // Your additional logic here

        return redirect()->route('posts.index');
    }
    public function edit(Post $post){
        return view('posts.edit',compact('post'));
    }
    public function update(PostCreateRequest $request, Post $post){
        $post->update($request->validated());
        if($request->hasFile('image')){
            $post->clearMediaCollection();
            $post->addMediaFromRequest('image')->usingName($post->title)->toMediaCollection();

        }
        return to_route('posts.index');
    }

    public function destroy($id){
        $post=Post::findOrFail($id);
        $post ->delete();
        return to_route('posts.index');

    }
}