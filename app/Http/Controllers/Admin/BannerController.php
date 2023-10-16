<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:list-banner', ['only' => ['getBanner']]);
        $this->middleware('permission:update-banner', ['only' => ['edit', 'update']]);
    }
    public static function getBanner()
    {

        $banners = Banner::all()->groupBy('page_name');
        return view('admin.pages.banners.index', compact('banners'));
    }

    public static function update(BannerRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $type = $data['type'];
            $banners = Banner::where('page_name', $type)->get();
            if ($request->hasFile('image')) :
                if ($type == 'home') {
                    if (isset($banners)) {
                        foreach ($banners as $banner) {
                            Storage::delete($banner->image_url);
                            $oldbanner = Banner::findorFail($banner->id);
                            $oldbanner->delete();
                        }
                    }
                    foreach ($request->image as $image) {
                        $image_name = FileUploadTrait::fileUpload($image, 'banners');
                        $bannerData['page_name'] = $type;
                        $bannerData['image_folder'] = 'banners';
                        $bannerData['image_name'] =  $image_name;
                        $bannerData['image_url'] = url('/storage/banners/' . $image_name);
                        Banner::create($bannerData);
                    }
                } else {
                    $image_name = FileUploadTrait::fileUpload($request->image, 'banners');
                    $bannerData['page_name'] = $type;
                    $bannerData['image_folder'] = 'banners';
                    $bannerData['image_name'] =  $image_name;
                    $bannerData['image_url'] = url('/storage/banners/' . $image_name);
                    if (isset($banners)) {
                        foreach ($banners as $banner) {
                            Storage::delete($banner->image_url);
                            $oldbanner = Banner::findorFail($banner->id);
                            $oldbanner->delete();
                        }
                    }
                    Banner::create($bannerData);
                }
            endif;

            DB::commit();
            $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => ' Degree updated successfully.'];

            return redirect()->back()->with('response');
        } catch (\Throwable $th) {
            dd($th->getMessage(), ' i m here');
        }
    }
}
