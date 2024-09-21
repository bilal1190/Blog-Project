<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
// use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{
    // public function index()
    // {
    //     $blogs = Blog::with('user', 'category')->latest()->paginate(9);
    //     return view('admin.blogs.list', [
    //         'blogs' => $blogs,
    //     ]);
    // }
    public function index(Request $request)
    {
        $blogs = Blog::with('user', 'category')->latest()->paginate(9);
        // dd($request->user()->is_admin);
        // if (Auth::user()->is_admin==true) {
        if ($request->user()->is_admin == true) {
            
            // Admin can manage blogs
            return view('admin.blogs.list', ['blogs' => $blogs]);
        }
        // Normal users can only view blogs
        return view('frontblog.list', ['blogs' => $blogs]);
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create',  compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:blogs,title|max:100',
            'content' => 'required|max:200',
            'category_id' => 'required|exists:categories,id'

        ]);

        if ($validator->passes()) {

            Blog::create([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ]);
            return redirect()->route('admin.blogs.list')->with('success', 'Post created successfully');
        } else {
            return redirect()->route('admin.blogs.create')->withInput()->withErrors($validator);
        }
    }

    public function edit($id)
    {

        $blog = Blog::findOrFail($id);
        $categories = Category::all();

        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100|unique:blogs,name,' . $id . ',id',
            'content' => 'required |unique:string|max:200',
            'category_id' => 'required|exists:categories,id'

        ]);

        if ($validator->passes()) {

            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->category_id = $request->category_id;
            $blog->save();

            return redirect()->route('admin.blogs.list')->with('success', 'Post Updated successfully');
        } else {
            return redirect()->route('admin.blogs.edit', $id)->withInput()->withErrors($validator);
        }
    }
    public function show($id)
    {
    $blog = Blog::findOrFail($id); // Fetch the blog by ID or fail if not found
    return view('frontblog.show', compact('blog')); // Return the 'show' view with the blog data
    }


    public function destroy($id)
    {
        $blog = Blog::find($id);

        if ($blog == null) {
            session()->flash('error', 'Blog Not Found!');
            return response()->json([
                'status' => false
            ]);
        }

        $blog->delete();

        session()->flash('success', 'Blog Deleted Successfully!');
        return response()->json([
            'status' => true
        ]);
    }

}
