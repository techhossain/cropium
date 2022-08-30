<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $allposts = Cache::remember('posts-maher', now()->addMinutes(1), function () {
        //     return DB::table('blogs')->paginate(3);
        // });

        // return view("pages.blog", [
        //     'posts' => $allposts,
        //     'title' => 'Blog Page'
        // ]);

        // dd(Blog::all());

        $search_text = request('search');

        // dd(Blog::where('title', 'LIKE', '%' . $search_text . '%')->get());

        return view("pages.blog", [
            // 'posts' => Blog::with('category', 'user')->get(),
            'posts' => Blog::where('title', 'LIKE', '%' . $search_text . '%')
                ->orWhere('excerpt', 'LIKE', '%' . $search_text . '%')
                ->orWhere('content', 'LIKE', '%' . $search_text . '%')
                ->orderBy('id', 'desc')
                ->paginate(5),
            'title' => 'Blog Page'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        // $single_post = cache()->remember('posts.{$slug}', now()->addMinutes(50), function () use ($slug) {
        //     return DB::table('blogs')->where('slug', $slug)->first();
        // });

        // Blog::where('slug', $slug)->get()->first()

        // cache()->forget('posts.{$slug}');

        // $single_post = DB::table('blogs')->where('slug', $slug)->first();

        $category = $blog->category;


        $blog->increment('views');

        return view("pages.blog-details", [
            'post'      => $blog,
            'category'  => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getPostByCategory(Category $category)
    {
        // $id = Category::firstWhere('slug', $slug)->id;
        return view('pages.category-posts', [
            // 'data' => Blog::where('category_id', $id)->get(),
            // 'data' => $category->posts->load('user', 'category'), eager loading
            'posts' => $category->posts()->paginate(3),
            'title' => $category->name,
            'slug'  => $category->slug
        ]);
    }

    public function getPostByUser(User $user)
    {
        return view('pages.user-posts', [
            'title' => $user->name,
            'data'  => $user,
            // 'posts' => $user->posts->load(['user', 'category']), eager loading
            'posts' => $user->posts()->paginate(3)
        ]);
    }
}
