<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('layouts.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('layouts.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->image;
            $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = $image->storeAs('', $name, 'public');
        } else {
            $save_url = 'default.jpg';
        }

        Post::create([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'desc' => $request->desc,
            'image' => $save_url,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = Post::find($post->id);
        $categories = Category::all();
        $related_posts = Post::inRandomOrder()->where('category_id', $post->category_id)->where('id', '!=', $post->id)->get();
        return view('layouts.pages.single', compact('post'))->with(compact('categories', 'related_posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // $post = Post::find($post->id);
        $categories = Category::all();
        return view('layouts.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post = Post::find($post->id);
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($post->image);
            $image = $request->image;
            $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = $image->storeAs('', $name, 'public');
        } else {
            $save_url = $post->image;
        }

        $post->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'desc' => $request->desc,
            'image' => $save_url,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        if ($post->image !== 'default.jpg') {
            Storage::disk('public')->delete($post->image);
        }
        return redirect()->back();
    }
}
