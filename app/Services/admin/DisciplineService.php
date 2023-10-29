<?php

namespace App\Services\admin;

use App\Models\Discipline;

use App\Http\Requests\admin\DisciplineRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Traits\FileUploadTrait;

class DisciplineService
{
    public static function getDisciplines()
    {

        $disciplines = Discipline::orderBy('id', 'DESC')->paginate(20);
        return $disciplines;
    }

    public  static function store($request)
    {

        DB::beginTransaction();
        $data = $request->validated();
        $data['status'] = isset($request->status) ? 1 : 0;
        if ($request->hasFile('image')) :
            $image_name = FileUploadTrait::fileUpload($request->image, 'disciplines');
            $data['image_folder'] = 'disciplines';
            $data['image_name'] =  $image_name;
            $data['image_url'] = url('/storage/disciplines/' . $image_name);

        endif;
        $discipline = Discipline::create($data);
        DB::commit();
        $response = ['status' => true, 'message' => 'Discipline added successfully.', 'discipline' => $discipline];

        return $response;
    }


    public static function update(DisciplineRequest $request, Discipline $discipline)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $data['status'] = isset($request->status) ? 1 : 0;
        if ($request->hasFile('image')) :
            $image_name = FileUploadTrait::fileUpload($request->image, 'disciplines');
            $data['image_folder'] = 'disciplines';
            $data['image_name'] =  $image_name;
            $data['image_url'] = url('/storage/disciplines/' . $image_name);
            if (Storage::exists('disciplines/' . $discipline->image_name)) {
                Storage::delete('disciplines/' . $discipline->image_name);
            }
        endif;
        $discipline->update($data);
        DB::commit();
        $response = ['status' => true, 'message' => ' Discipline updated successfully.', 'discipline' => $discipline];
        return $response;
    }
    public static function destroy($id)
    {
        DB::beginTransaction();
        $discipline = Discipline::findorFail($id);
        if (Storage::exists('disciplines/' . $discipline->image_name)) {
            Storage::delete('disciplines/' . $discipline->image_name);
        }
        $discipline->delete();
        DB::commit();
        $response = ['status' => true, 'message' => 'Discipline removed successfully.'];
        return $response;
    }
}
