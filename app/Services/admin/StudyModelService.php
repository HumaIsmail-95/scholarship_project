<?php

namespace App\Services\admin;

use App\Models\StudyModel;

use App\Http\Requests\admin\StudyModelRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

class StudyModelService
{
    public static function getStudyModels()
    {

        $study_models = StudyModel::orderBy('id', 'DESC')->paginate(20);
        return $study_models;
    }

    public  static function store($request)
    {

        DB::beginTransaction();
        $data = $request->validated();

        $studyModel = StudyModel::create($data);
        DB::commit();
        $response = ['status' => true, 'message' => 'Study Model added successfully.', 'studyModel' => $studyModel];

        return $response;
    }


    public static function update(StudyModelRequest $request, StudyModel $studyModel)
    {
        DB::beginTransaction();
        $data = $request->validated();

        $studyModel->update($data);
        DB::commit();
        $response = ['status' => true, 'message' => ' Study Model updated successfully.', 'studyModel' => $studyModel];
        return $response;
    }
    public static function destroy($id)
    {
        DB::beginTransaction();
        $studyModel = StudyModel::findorFail($id);
        $studyModel->delete();
        DB::commit();
        $response = ['status' => true, 'message' => 'Study Model removed successfully.'];
        return $response;
    }
}
