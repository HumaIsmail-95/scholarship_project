<?php

namespace App\Services\admin;

use App\Models\Blog;
use App\Http\Requests\admin\BlogRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogService
{
    public static function getBlogs()
    {

        $blogs = Blog::orderBy('id', 'DESC')->paginate(20);
        return $blogs;
    }
    public static function getRecentBlogs()
    {
        return  Blog::orderBy('id', 'DESC')->take(3)->get();
    }
    public  static function storeBlog(BlogRequest $request)
    {

        try {
            DB::beginTransaction();
            $data = $request->validated();
            $data['status'] = isset($request->status) ? 1 : 0;
            $data['created_by'] = Auth::user()->id;
            if ($request->hasFile('image')) :
                $image_name = FileUploadTrait::fileUpload($request->image, 'blogs');
                $data['image_folder'] = 'blogs';
                $data['image_name'] =  $image_name;
                $data['image_url'] = url('/storage/blogs/' . $image_name);

            endif;
            $blog = Blog::create($data);
            DB::commit();
            $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'Blog added successfully.', 'blog' => $blog];

            return $response;
        } catch (\Throwable $th) {
            dd($th->getMessage());
            //throw $th;
        }
    }


    public static function update(BlogRequest $request, Blog $blog)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $data['updated_by'] = Auth::user()->id;
        $data['status'] = isset($request->status) ? 1 : 0;
        if ($request->hasFile('image')) :
            $image_name = FileUploadTrait::fileUpload($request->image, 'blogs');
            $data['image_folder'] = 'blogs';
            $data['image_name'] =  $image_name;
            $data['image_url'] = url('/storage/blogs/' . $image_name);
            if (Storage::exists('blogs/' . $blog->image_name)) {
                Storage::delete('blogs/' . $blog->image_name);
            }
        endif;
        $blog->update($data);
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => ' Blog updated successfully.', 'blog' => $blog];
        return $response;
    }
    public static function destroy($id)
    {
        DB::beginTransaction();
        $blog = Blog::findorFail($id);
        if (Storage::exists('blogs/' . $blog->image_name)) {
            Storage::delete('blogs/' . $blog->image_name);
        }
        $blog->delete();
        DB::commit();
        $response = ['status' => true, 'message' => 'Blog removed successfully.'];
        return $response;
    }
}
