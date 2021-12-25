<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function index()
    {
        return Inertia::render('Post/Artikle', [
            'posts' => Post::with('user')->get()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'postTitle'   => 'required|string|max:255',
            'postContent' => 'required',
        ]);

        Post::create([
            'user_id'      => auth()->id(),
            'post_title'   => $request->postTitle,
            'post_content' => $request->postContent,
        ]);

        return redirect()->route('artikel');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
