<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StudyModelRequest;
use App\Models\StudyModel;
use App\Services\admin\StudyModelService;
use Illuminate\Http\Request;

class StudyModelController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:list-study-model', ['only' => ['index']]);
        $this->middleware('permission:create-study-model', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-study-model', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-study-model', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $studyModels = StudyModelService::getStudyModels();
        // $groups = StudyModelService::getStudyModels();
        // dd($StudyModels);
        return view('admin.pages.study_models.index', compact('studyModels'));
    }

    public function store(StudyModelRequest $request)
    {
        try {
            $studyModel_response = StudyModelService::store($request);
            return $studyModel_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }


    public function show($id)
    {
        $studyModel = StudyModel::find($id);
        return view('StudyModels.show', compact('studyModel'));
    }

    public function update(StudyModelRequest $request, StudyModel $studyModel)
    {
        try {
            $studyModel_response = StudyModelService::update($request, $studyModel);
            return $studyModel_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function destroy($id)
    {
        try {
            $studyModel_response = StudyModelService::destroy($id);
            return $studyModel_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
