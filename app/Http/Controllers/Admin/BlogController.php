<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\BlogRequest;
use App\Models\Blog;
use App\Services\admin\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = BlogService::getBlogs();
        return view('admin.pages.blogs.index', compact('blogs',));
    }
    public function create()
    {
        return view('admin.pages.blogs.create');
    }
    public function store(BlogRequest $request)
    {
        try {
            $blog_response = BlogService::storeBlog($request);
            return redirect()->back()->with($blog_response);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['status' => false, 'icon' => 'error', 'heading' => 'Error', 'message' => $th->getMessage()]);
        }
    }


    public function show($id)
    {
        $blog = Blog::find($id);
        return view('admin.pages.blogs.edit', compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        try {
            $blog_response = BlogService::update($request, $blog);
            return redirect()->back()->with($blog_response);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['status' => false, 'icon' => 'error', 'heading' => 'Error', 'message' => $th->getMessage()]);
            return $th;
        }
    }
    public function destroy($id)
    {
        try {
            $blog_response = BlogService::destroy($id);
            return redirect()->back()->with($blog_response);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['status' => false, 'icon' => 'error', 'heading' => 'Error', 'message' => $th->getMessage()]);
            return $th;
        }
    }
}
