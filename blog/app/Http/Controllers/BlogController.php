<?php

namespace App\Http\Controllers;
use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use http\Env\Response;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('due_date', 'asc')->paginate(3);

        $categories = Category::all();
        return view('blogs.list', compact('blogs', 'categories'));
    }
    public function read($id)
    {
        $blog = Blog::where('id',$id)->first();
        //$categories = Category::all();
       // dd($blog);
        return view('blogs.read',compact('blog'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }
    public function store(Request $request)
    {

        $blog = new Blog();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $blog->image = $path;
        }

        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->author = $request->input('author');
        $blog->due_date = $request->input('due_date');
        $blog->category_id  = $request->input('category_id');
        $blog->save();
        Session::flash('success', 'Tạo mới thành công');
        return redirect()->route('index');

    }

    public function edit($id)
    {
        $blog = Blog::where('id',$id)->first();
        $categories = Category::all();
        //dd($blog);
        return view('blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request,$id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->category_id = $request->input('category_id');
        //cap nhat anh
        if ($request->hasFile('image')) {

            //xoa anh cu neu co
            $currentImg = $blog->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            // cap nhat anh moi
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $blog->image = $path;
        }

        $blog->author = $request->input('author');
        $blog->due_date = $request->input('due_date');
        $blog->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $blog = Blog::where('id',$id)->first();
        $image = $blog->image;
        if ($image) {
            Storage::delete('/public/' . $image);
        }

        $blog->delete();
        Session::flash('success', 'Xóa thành công');
        return redirect()->route('index');
    }

    public function search(Request $request)
    {
        $keywords = $request->input('keywords');
        if (!$keywords){
            return redirect()->route('index');
        }
        $blogs = Blog::where('title', 'LIKE', '%'.$keywords.'%')->paginate(2);
        $categories = Category::all();
        return view('blogs.list', compact('blogs', 'categories'));
    }

    public function filterByCategory($categoryId)
    {
        $blogs = Category::findOrFail($categoryId)->blogs;
        //$blogs = Blog::where('category_id', $categoryFilter->id)->get();
        $categories = Category::all();
        return view('blogs.display', compact('blogs', 'categories'));
    }

}
