<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('post');
    }
    public function blog()
    {
        return view('blog');
    }

    public function allPosts() {
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('posts.all-posts', compact('posts'));
    }

    public function allBlogs() {
        $blogs = Blog::where('user_id', Auth::user()->id)->get();
        return view('blogs.all-blogs', compact('blogs'));
    }
}
