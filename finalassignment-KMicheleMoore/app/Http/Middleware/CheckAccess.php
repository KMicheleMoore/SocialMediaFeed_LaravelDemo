<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the request is for creating a new post
        if ($request->isMethod('post') && $request->routeIs('posts.store') ||
            $request->isMethod('get') && $request->routeIs('posts.create')){
            return $next($request);
        }

        $postId = $request->route('post');
        $post = Post::find($postId)->first();

        if (Auth::id() !== $post->created_by) {
            if(($request->isMethod('delete')) && Auth::user()->hasRole('Moderator')){
                return $next($request);
            } else {
                return redirect(route('home'))
                    ->with('status', 'Denied: You do not have permission to modify this post.')
                    ->with('status_type', 'danger');
            }
        }
        return $next($request);
    }
}
