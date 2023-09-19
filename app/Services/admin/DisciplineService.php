<?php

namespace App\Services\admin;

use App\Models\Discipline;

use App\Http\Requests\admin\DisciplineRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

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
        $discipline->update($data);
        DB::commit();
        $response = ['status' => true, 'message' => ' Discipline updated successfully.', 'discipline' => $discipline];
        return $response;
    }
    public static function destroy($id)
    {
        DB::beginTransaction();
        $discipline = Discipline::findorFail($id);
        $discipline->delete();
        DB::commit();
        $response = ['status' => true, 'message' => 'Discipline removed successfully.'];
        return $response;
    }
}
