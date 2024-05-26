<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get posts and add human-readable time
        $posts = Post::orderByDesc('created_at')->with('user')->get();
        $posts->map(function ($post) {
            $post->posted = Carbon::parse($post->created_at)->diffForHumans();
            return $post;
        });

        return view('home', compact('posts'));
    }
}
