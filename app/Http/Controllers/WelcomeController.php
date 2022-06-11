<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Blog;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {

        $posts = Post::latest()->paginate(3);
        $blogs = Blog::latest()->paginate(3);
        return view('welcome', compact('posts','blogs'));

    }

    public function welcomeBlog() {

        $blogs = Blog::all();
        return view('welcome-blog', compact('blogs'));

    }
    public function welcomePost() {

        $posts = Post::all();
        return view('welcome-post', compact('posts'));

    }
}
