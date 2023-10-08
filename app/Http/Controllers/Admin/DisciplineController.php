<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\DisciplineRequest;
use App\Models\Discipline;
use App\Services\admin\DisciplineService;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:list-discipline', ['only' => ['index']]);
        $this->middleware('permission:create-discipline', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-discipline', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-discipline', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $disciplines = DisciplineService::getDisciplines();
        // $groups = DisciplineService::getDisciplines();
        // dd($Disciplines);
        return view('admin.pages.disciplines.index', compact('disciplines'));
    }

    public function store(DisciplineRequest $request)
    {
        try {
            $discipline_response = DisciplineService::store($request);
            return $discipline_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }


    public function show($id)
    {
        $discipline = Discipline::find($id);
        return view('Disciplines.show', compact('discipline'));
    }

    public function update(DisciplineRequest $request, Discipline $discipline)
    {
        try {
            $discipline_response = DisciplineService::update($request, $discipline);
            return $discipline_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function destroy($id)
    {
        try {
            $discipline_response = DisciplineService::destroy($id);
            return $discipline_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
