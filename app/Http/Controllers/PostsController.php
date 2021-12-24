<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function index()
    {
        return Inertia::render('Post/Artikle');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        dd($request->all());
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
