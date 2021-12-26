<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Post/Artikle', [
            'posts' => Post::with('user')->get()
        ]);
    }

    public function create(): \Inertia\Response
    {
        return Inertia::render('Post/CreateArtikel', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'postTitle'      => 'required|string|max:255',
            'postContent'    => 'required',
            'postImage'      => 'required|url|max:255',
            'postCategories' => 'required|array|min:1|max:3',
            'postSlug'       => 'required|string|max:255',
        ]);

        Post::create([
            'post_title'     => $request->postTitle,
            'post_content'   => $request->postContent,
            'featured_image' => $request->postImage,
            'slug'           => $request->postSlug,
            'user_id'        => auth()->id(),
            'excerpt'        => 'halo',
        ])->categories()->sync($request->postCategories);

        return redirect()->route('artikel')->with('message', 'Berhasil Menambah Artikel');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post): \Inertia\Response
    {
        return Inertia::render('Post/EditArtikel', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'postTitle'   => 'required|string|max:255',
            'postContent' => 'required',
        ]);

        Post::where('id', $post->id)
            ->update([
                'post_title'   => $request->postTitle,
                'post_content' => $request->postContent,
            ]);

        return redirect()->route('artikel')->with('message', 'Artikel berhasil dirubah');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('artikel')->with('message', 'Artikel berhasil dihapus');
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function createSlug(Request $request): JsonResponse
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
