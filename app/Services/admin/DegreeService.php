<?php

namespace App\Services\admin;

use App\Models\Degree;
use App\Http\Requests\admin\DegreeRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DegreeService
{
    public static function getDegrees()
    {

        $degrees = Degree::orderBy('id', 'DESC')->paginate(20);
        return $degrees;
    }

    public  static function store($request)
    {

        DB::beginTransaction();
        $data = $request->validated();

        $degree = Degree::create($data);
        DB::commit();
        $response = ['status' => true, 'message' => 'Degree added successfully.', 'degree' => $degree];

        return $response;
    }


    public static function update(DegreeRequest $request, Degree $degree)
    {
        DB::beginTransaction();
        $data = $request->validated();

        $degree->update($data);
        DB::commit();
        $response = ['status' => true, 'message' => ' Degree updated successfully.', 'degree' => $degree];
        return $response;
    }
    public static function destroy($id)
    {
        DB::beginTransaction();
        $degree = Degree::findorFail($id);
        $degree->delete();
        DB::commit();
        $response = ['status' => true, 'message' => 'Degree removed successfully.'];
        return $response;
    }
}
