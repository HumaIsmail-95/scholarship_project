<?php

namespace App\Services\admin;

use App\Models\University;

use App\Http\Requests\admin\UniversityRequest;
use App\Models\Country;
use App\Models\UniGallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Auth;

class UniversityService
{
    public static function getUniversities()
    {

        $response = University::orderBy('id', 'DESC')->paginate(20);
        return $response;
    }
    public static function getCountries()
    {
        return Country::all();
    }
    public  static function store(UniversityRequest $request)
    {

        DB::beginTransaction();
        $data = $request->validated();
        $uniData = [
            'name' => $data['name'],
            'country' => $data['country'],
            'created_by' => Auth::user()->id,
        ];
        $university = University::create($uniData);
        if ($request->hasFile('logo')) :
            $image_name = FileUploadTrait::fileUpload($request->logo, 'uni_logos');
            $logo['type'] = 'logo';
            $logo['folder_name'] = 'uni_logos';
            $logo['image_name'] =  $image_name;
            $logo['uni_id'] =  $university->id;
            $logo['image_url'] = url('/storage/uni_logos/' . $image_name);

        endif;
        UniGallery::create($logo);
        if ($request->hasFile('banner')) :
            $image_name = FileUploadTrait::fileUpload($request->logo, 'uni_banners');
            $banner['type'] = 'banner';
            $banner['folder_name'] = 'uni_banners';
            $banner['image_name'] =  $image_name;
            $banner['uni_id'] =  $university->id;
            $banner['image_url'] = url('/storage/uni_banners/' . $image_name);
        endif;
        UniGallery::create($banner);
        if ($request->hasFile('gallery')) {
            FileUploadTrait::uploadGalleryImages($request->gallery,  'UniGallery', 'gallery', $university->id);
        }

        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'University added successfully.', 'university' => $university];

        return $response;
    }

    public static function edit(University $university)
    {
        // return $response;
    }
    public static function setImage(University $university)
    {
        $key = 0;
        foreach ($university->images as  $image) {
            if ($image->type == 'logo') {
                $university['logo'] = $image;
            } else if ($image->type == 'banner') {
                $university['banner'] = $image;
            } else if ($image->type == 'UniGallery') {
                $UniGallery[$key] = $image;
                $key += 1;
            }
        }
        $university['UniGallery'] = $UniGallery;
        return $university;
    }

    public static function update(UniversityRequest $request, University $university)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $uniData = [
            'name' => $data['name'],
            'country' => $data['country'],
            'updated_by' => Auth::user()->id,
        ];
        $university->update($uniData);
        $images = UniversityService::setImage($university);
        if ($request->hasFile('logo')) :
            $image_name = FileUploadTrait::fileUpload($request->logo, 'uni_logos');
            $logoData['type'] = 'logo';
            $logoData['folder_name'] = 'uni_logos';
            $logoData['image_name'] =  $image_name;
            $logoData['uni_id'] =  $university->id;
            $logoData['image_url'] = url('/storage/uni_logos/' . $image_name);
            if (isset($images->logo)) {
                if (Storage::exists('uni_logos/' . $images->logo->image_name)) {
                    Storage::delete('uni_logos/' . $images->logo->image_name);
                }
                $oldLogo = UniGallery::findorFail($images->logo->id);
                $oldLogo->delete();
            }
            UniGallery::create($logoData);
        endif;

        if ($request->hasFile('banner')) :
            $image_name = FileUploadTrait::fileUpload($request->banner, 'uni_banners');
            $bannerData['type'] = 'banner';
            $bannerData['folder_name'] = 'uni_banners';
            $bannerData['image_name'] =  $image_name;
            $bannerData['uni_id'] =  $university->id;
            $bannerData['image_url'] = url('/storage/uni_banners/' . $image_name);
            UniGallery::create($bannerData);
            if (isset($images->banner)) {
                Storage::delete($images->banner->image_url);
                $oldbanner = UniGallery::findorFail($images->banner->id);
                $oldbanner->delete();
            }
        endif;

        if ($request->hasFile('gallery')) {

            // FileUploadTrait::MultipleFilesDeleted('gallery', $images->UniGallery->image_name);
            FileUploadTrait::uploadGalleryImages($request->gallery,  'UniGallery', 'gallery', $university->id);
        }
        DB::commit();
        $response = ['status' => true, 'message' => ' University updated successfully.', 'univer$university' => $university];
        return $response;
    }
    public static function destroy($id)
    {
        DB::beginTransaction();
        $university = University::findorFail($id);
        $university->delete();
        DB::commit();
        $response = ['status' => true, 'message' => 'University removed successfully.'];
        return $response;
    }
}
