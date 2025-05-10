<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Password;

use Illuminate\Support\Str;
use Illuminate\Support\Number;

use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'currency' => 'required|numeric',
        ]);

        $title = $request->title;
        $slug = Str::slug($title, '-');
        $uuid = Str::uuid();
        $currency = $request->currency;

        $post = new Post();
        $post->title = $title;
        $post->slug = $slug;
        $post->uuid = $uuid;
        $post->currency = $currency;

        if($post->save()){
            return redirect()->route('post.index')->with('success', 'Save successfully!');
        }
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
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
            // echo "<pre>"; print_r($post->id); die;
        $validated = $request->validate([
            'title' => 'required|max:255|unique:posts,title,' . $post->id,
            'currency' => 'required',
        ]);

        $title = $request->title;
        $slug = Str::slug($title, '-');
        $uuid = Str::uuid();
        $currency = $request->currency;

        $post->title = $title;
        $post->slug = $slug;
        $post->uuid = $uuid;
        $post->currency = $currency;

        if($post->save()){
            return redirect()->route('post.index')->with('success', 'Updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
