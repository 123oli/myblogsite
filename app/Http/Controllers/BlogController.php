<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'thumbnail' => 'required|image'
        ]);

        if($validator->fails()) {
            return back()->with('status', 'Something went wrong!');
        } else {
            $imageName = date("Y-m-d") .  time() . "." . $request->thumbnail->extension();

            $request->thumbnail->move(public_path('thumbnails'), $imageName);

            Blog::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'thumbnail' => $imageName
            ]);
        }

        return redirect(route('blogs.all'))->with('status', 'Blog created successfully!');

    }

    public function show($postId) {

        $post = Blog::findOrFail($postId);

        return view('blogs.show', compact('post'));
    }

    public function edit($postId) {
        $post = Blog::findOrFail($postId);
        return view('blogs.edit', compact('post'));
    }

    public function update($postId, Request $request) {

        Blog::findOrFail($postId)->update($request->all());

        return redirect(route('blogs.all'))->with('status', 'Blog updated!');
    }

    public function delete($postId) {
        Blog::findOrFail($postId)->delete();
        return redirect(route('blogs.all'));

    }
}
