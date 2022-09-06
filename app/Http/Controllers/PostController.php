<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->cannot('posts')) {
            abort(403);
        } else {

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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if (!auth()->user()->can('Create Post')) {
        //     abort(403);
        // }
        if (auth()->user()->cannot('posts')) {
            abort(403);
        } else {

            $categories = Category::all();
            return view('backend.posts.create-post', [
                'categories' => $categories,
                'title' => 'Create new post'
            ]);
        }
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
        $post->slug  = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower(trim($request->title)))) . '-' . time();
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
        // if(!Gate::allows('modify-post', $post)){
        //     abort(403);
        // }
        // Gate::authorize('modify-post', $post);

        // if (!auth()->user()->can('Edit Posts')) {
        //     abort(403);
        // }

        if (auth()->user()->cannot('posts')) {
            abort(403);
        } else {
            $categories = Category::all();
            return view('backend.posts.edit', [
                'post' => $post,
                'categories' => $categories,
                'currentCat' => $post->category
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'  => 'required',
            'excerpt'  => 'required',
            'content'  => 'required'
        ]);

        $post = Blog::firstWhere('id', $id);

        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;
        $post->slug  = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower(trim($request->title)))) . '-' . time();

        // image upload
        if ($request->feature_image != null) {
            $imageName = $request->file('feature_image')->hashName();
            $request->file('feature_image')->storeAs('public/images', $imageName);
            $post->feature_image = $imageName;
        } else {
            $post->feature_image = $request->update_feature_image;
        }

        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;

        $post->save();


        // $post = new Blog();
        // $post->update($request->all());
        return back()->with('message', 'Post updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $post)
    {
        // Gate::authorize('deletePost', $post);

        if (auth()->user()->cannot('posts')) {
            abort(403);
        } else {

            $post->delete();
            return back()->with('message', 'Post Deleted Successfullt!!');
        }
    }
}
