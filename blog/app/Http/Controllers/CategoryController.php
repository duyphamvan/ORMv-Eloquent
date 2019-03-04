<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $blogs = Blog::all();
        return view('categories.list', compact('categories', 'blogs'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('index.ct');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::where('id',$id)->first();
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('index.ct');

    }

    public function destroy($id)
    {
        $category = Category::where('id',$id)->first();
        $category->blogs()->delete();
        $category->delete();
        return redirect()->route('index.ct');
    }

}
