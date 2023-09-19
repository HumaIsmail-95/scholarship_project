<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\DegreeRequest;
use App\Models\Degree;
use App\Models\Discipline;
use App\Services\admin\DegreeService;
use Illuminate\Http\Request;

class DegreeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:list-degree', ['only' => ['index']]);
        $this->middleware('permission:create-degree', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-degree', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-degree', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $degrees = DegreeService::getDegrees();
        $disciplines = Discipline::all();
        // $groups = DegreeService::getDegrees();
        // dd($Degrees);
        return view('admin.pages.degrees.index', compact('degrees', 'disciplines'));
    }

    public function store(DegreeRequest $request)
    {
        try {
            $discipline_response = DegreeService::store($request);
            return $discipline_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }


    public function show($id)
    {
        $discipline = Degree::find($id);
        return view('Degrees.show', compact('discipline'));
    }

    public function update(DegreeRequest $request, Degree $degree)
    {
        try {
            $discipline_response = DegreeService::update($request, $degree);
            return $discipline_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function destroy($id)
    {
        try {
            $discipline_response = DegreeService::destroy($id);
            return $discipline_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
