<?php

namespace App\Services\admin;

use App\Models\City;
use App\Http\Requests\admin\CityRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Storage;

class CityService
{
    public static function getCities()
    {

        $cities = City::paginate(20);
        return $cities;
    }

    public static function update(CityRequest $request, City $city)
    {
        DB::beginTransaction();
        $data = $request->validated();
        if ($request->hasFile('image')) :
            $image_name = FileUploadTrait::fileUpload($request->image, 'cities');
            $data['image_folder'] = 'cities';
            $data['image_name'] =  $image_name;
            $data['image_url'] = url('/storage/cities/' . $image_name);
            if (Storage::exists('cities/' . $city->image_name)) {
                Storage::delete('cities/' . $city->image_name);
            }
        endif;
        $city->update($data);
        DB::commit();
        $response = ['status' => true, 'message' => ' City updated successfully.', 'city' => $city];
        return $response;
    }
}
