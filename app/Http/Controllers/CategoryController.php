<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchText = request('search');
        $categories = Category::where('name', 'LIKE', '%' . $searchText . '%')
            ->orWhere('slug', 'LIKE', '%' . $searchText . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('backend.categories.index', compact('searchText', 'categories'));
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
        $request->validate([
            'name'  => 'required'
        ]);

        $category = new Category;

        $category->name = $request->name;
        $category->slug  = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));

        $category->save();

        return redirect()->route('categories.index')->with('message', 'Category Created successfully!!');
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
    public function edit($id)
    {
        $searchText = request('search');

        $current = Category::firstWhere('id', $id);



        $categories = Category::where('name', 'LIKE', '%' . $searchText . '%')
            ->orWhere('slug', 'LIKE', '%' . $searchText . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('backend.categories.edit', compact('searchText', 'categories', 'current'));
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
        $category = Category::firstWhere('id', $id);
        
        $category->name = $request->name;
        $category->slug  = $request->slug;
        $category->save();

        return redirect()->route('categories.index')->with('message', 'Category updated successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::firstWhere('id', $id);
        $category->delete();

        $category->posts()->update(['category_id' => request('updateCategory')]);



        return redirect()->route('categories.index')->with('message', 'Category deleted!!');
    }
}
