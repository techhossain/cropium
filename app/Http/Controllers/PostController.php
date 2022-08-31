<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $searchText = request('search');

        $posts = Blog::where('title', 'LIKE', '%' . $searchText . '%')
            ->orWhere('excerpt', 'LIKE', '%' . $searchText . '%')
            ->orWhere('content', 'LIKE', '%' . $searchText . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('backend.posts.index', [
            'posts' => $posts,
            'searchKw' => $searchText,
            'title' => 'All Posts'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.posts.create-post', [
            'categories' => $categories,
            'title' => 'Create new post'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required',
            'feature_image'  => 'required|image|mimes:jpg,png,jpeg',
            'excerpt'  => 'required',
            'content'  => 'required'
        ]);

        $post = new Blog;

        $post->title = $request->title;
        $post->slug  = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title))) . '-' . time();
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;

        // image upload
        $imageName = $request->file('feature_image')->hashName();
        $request->file('feature_image')->storeAs('public/images', $imageName);
        $post->feature_image = $imageName;

        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->views = 0;

        $post->save();

        return redirect()->route('posts.index')->with('message', 'Post Created successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $post)
    {
        $categories = Category::all();
        return view('backend.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'currentCat' => $post->category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $post)
    {

        $post->update($request->all());
        return back()->with('message', 'Post updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $post)
    {
        $post->delete();
        return back()->with('message', 'Post Deleted Successfullt!!');
    }
}
