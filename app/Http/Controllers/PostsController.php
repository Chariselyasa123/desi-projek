<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function index(Request $request): \Inertia\Response
    {
        return Inertia::render('Post/Artikle', [
            'posts' => Post::with('user')->when($request->search, function ($query, $search) {
                return $query->where('post_title', 'like', "%{$search}%");
            })->paginate(10)->through(function ($post) {
                return [
                    'post_title'   => $post->post_title,
                    'author'       => $post->user->name,
                    'post_created' => $post->created_at->format('d-m-Y'),
                    'slug'         => $post->slug,
                ];
            }),
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
            'postCategories' => 'required|array|min:1|max:3',
            'slug'           => 'required|string|max:255|unique:posts',
        ]);

        Post::create([
            'post_title'     => $request->postTitle,
            'post_content'   => $request->postContent,
            'featured_image' => $request->postImage,
            'slug'           => $request->slug,
            'user_id'        => auth()->id(),
            'excerpt'        => Str::limit(strip_tags($request->postContent)),
        ])->categories()->sync($request->postCategories);

        return redirect()->route('post')->with('message', 'Berhasil Menambah Artikel');
    }

    public function show(Request $request, Post $post)
    {
        return Inertia::render('Artikel', [
            'posts' => $post->with('categories')->when($request->search, function ($query, $search) {
                return $query->where('post_title', 'like', "%{$search}%");
            })->latest()->paginate(6)->through(function ($post) {
                return [
                    'post_title'     => $post->post_title,
                    'featured_image' => $post->featured_image,
                    'slug'           => $post->slug,
                    'excerpt'        => $post->excerpt,
                    'human_date'     => $post->created_at->diffForHumans(),
                    'date'           => $post->created_at->format('d M Y'),
                    'diff_date'      => $post->created_at->diffInDays(),
                    'categories'     => $post->categories->map(function ($category) {
                        return [
                            'category_name' => $category->name,
                            'slug'          => $category->slug,
                        ];
                    })
                ];
            }),
        ]);
    }

    public function edit($slug): \Inertia\Response
    {
        return Inertia::render('Post/EditArtikel', [
            'post'       => Post::with('categories')->where('slug', $slug)->first(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * @param  Request  $request
     * @param  Post  $post
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'postTitle'      => 'required|string|max:255',
            'postContent'    => 'required',
            'postCategories' => 'required|array|min:1|max:3',
        ]);

        if ($request->slug !== $post->slug) {
            $request->validate([
                'slug' => 'required|string|max:255|unique:posts',
            ]);
        }


        $post->whereId($post->id)
             ->update([
                 'post_title'     => $request->postTitle,
                 'post_content'   => $request->postContent,
                 'slug'           => $request->slug,
                 'featured_image' => $request->postImage,
                 'excerpt'        => Str::limit(strip_tags($request->postContent)),
             ]);
        $post->categories()->sync($request->postCategories);

        return redirect()->route('post')->with('message', 'Artikel berhasil dirubah');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post')->with('message', 'Artikel berhasil dihapus');
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

    public function single($slug)
    {
        $post = Post::where('slug', $slug)->with('categories')->first();

        $newPost = collect([
            'post_title'     => $post->post_title,
            'featured_image' => $post->featured_image,
            'excerpt'        => $post->excerpt,
            'post_content'   => $post->post_content,
            'human_date'     => $post->created_at->diffForHumans(),
            'date'           => $post->created_at->format('d M Y'),
            'diff_date'      => $post->created_at->diffInDays(),
            'categories'     => $post->categories->map(function ($category) {
                return [
                    'category_name' => $category->name,
                    'slug'          => $category->slug,
                ];
            }),
        ]);

        return Inertia::render('Single', [
            'post' => $newPost,
        ]);
    }
}
