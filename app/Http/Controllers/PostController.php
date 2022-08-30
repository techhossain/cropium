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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchText = request('search');

        $posts = Blog::where('title', 'LIKE', '%' . $searchText . '%')
            ->orWhere('excerpt', 'LIKE', '%' . $searchText . '%')
            ->orWhere('content', 'LIKE', '%' . $searchText . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('backend.posts', [
            'posts' => $posts,
            'searchKw' => $searchText,
            'title' => 'All Posts'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.create-post', [
            'categories' => $categories,
            'title' => 'Create new post'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required',
            'feature_image'  => 'required',
            'excerpt'  => 'required',
            'content'  => 'required'
        ]);

        $request['slug'] = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title))) . '-' . time();
        $request['user_id'] = auth()->user()->id;
        $request['views'] = 0;

        Blog::create($request->all());


        return redirect()->route('dashboard-posts')->with('message', 'Post Created successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $post)
    {
        $categories = Category::all();
        return view('backend.edit', [
            'post' => $post,
            'categories' => $categories,
            'currentCat' => $post->category

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $post)
    {
        $post->update($request->all());

        return back()->with('message', 'Post updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $post)
    {
        $post->delete();
        return back()->with('message', 'Post Deleted Successfullt!!');
    }
}
