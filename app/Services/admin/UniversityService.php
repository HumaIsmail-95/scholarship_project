<?php

namespace App\Services\admin;

use App\Models\University;

use App\Http\Requests\admin\UniversityRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

class UniversityService
{
    public static function getUniversities()
    {

        $study_models = University::orderBy('id', 'DESC')->paginate(20);
        return $study_models;
    }

    public  static function store($request)
    {

        DB::beginTransaction();
        $data = $request->validated();
        $data['status'] = isset($request->status) ? 1 : 0;

        $university = University::create($data);
        DB::commit();
        $response = ['status' => true, 'message' => 'University added successfully.', 'univer$university' => $university];

        return $response;
    }


    public static function update(UniversityRequest $request, University $university)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $data['status'] = isset($request->status) ? 1 : 0;

        $university->update($data);
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
