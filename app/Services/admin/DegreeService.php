<?php

namespace App\Services\admin;

use App\Models\Degree;
use App\Http\Requests\admin\DegreeRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Storage;

class DegreeService
{
    public static function getDegrees()
    {

        $degrees = Degree::with('discipline')->orderBy('id', 'DESC')->paginate(20);
        return $degrees;
    }

    public  static function store(DegreeRequest $request)
    {

        DB::beginTransaction();
        $data = $request->validated();
        $data['status'] = isset($request->status) ? 1 : 0;
        if ($request->hasFile('image')) :
            $image_name = FileUploadTrait::fileUpload($request->image, 'degrees');
            $data['image_folder'] = 'degrees';
            $data['image_name'] =  $image_name;
            $data['image_url'] = url('/storage/degrees/' . $image_name);

        endif;
        $degree = Degree::create($data);
        $degree->discipline;
        DB::commit();
        $response = ['status' => true, 'message' => 'Degree added successfully.', 'degree' => $degree];

        return $response;
    }


    public static function update(DegreeRequest $request, Degree $degree)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $data['status'] = isset($request->status) ? 1 : 0;
        if ($request->hasFile('image')) :
            $image_name = FileUploadTrait::fileUpload($request->image, 'degrees');
            $data['image_folder'] = 'degrees';
            $data['image_name'] =  $image_name;
            $data['image_url'] = url('/storage/degrees/' . $image_name);
            if (Storage::exists('degrees/' . $degree->image_name)) {
                Storage::delete('degrees/' . $degree->image_name);
            }
        endif;
        $degree->update($data);
        $degree->discipline;
        DB::commit();
        $response = ['status' => true, 'message' => ' Degree updated successfully.', 'degree' => $degree];
        return $response;
    }
    public static function destroy($id)
    {
        DB::beginTransaction();
        $degree = Degree::findorFail($id);
        if (Storage::exists('degrees/' . $degree->image_name)) {
            Storage::delete('degrees/' . $degree->image_name);
        }
        $degree->delete();
        DB::commit();
        $response = ['status' => true, 'message' => 'Degree removed successfully.'];
        return $response;
    }
}
