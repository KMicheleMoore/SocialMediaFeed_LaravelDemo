<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000'
        ]);
        $newPost = new Post();
        $newPost->title = $request->title;
        $newPost->content = $request->content;
        $newPost->created_by = Auth::id();

        $newPost->save();
        return redirect()->route('home')->with('status', 'Post created');

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
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000'
        ]);

        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();
        return redirect()->route('home')->with('success', 'Post created');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        // redirect to the list
        return redirect(route('home'))->with('status', 'Post Deleted');
    }
}
