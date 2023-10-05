<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CourseRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Degree;
use App\Models\Discipline;
use App\Models\StudyModel;
use App\Models\UniCourse;
use App\Models\University;
use App\Services\admin\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:list-course', ['only' => ['index']]);
        $this->middleware('permission:create-course', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-course', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-course', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $courses = CourseService::getCourses();

        // $groups = CourseService::getCourses();
        // dd($Courses);
        return view('admin.pages.courses.index', compact('courses',));
    }
    public function create()
    {
        try {
            $universities = University::all();
            $countries = Country::all();
            $degrees = Degree::all();
            $studyModels = StudyModel::all();
            $disciplines = Discipline::all();
            return view('admin.pages.courses.create', compact('universities', 'countries', 'degrees', 'studyModels', 'disciplines'));
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ]);
        }
    }
    public function getUniversity(Request $request)
    {
        try {
            $query = $request->input('search');

            $universities = University::where('name', 'like', '%' . $query . '%')
                ->select('id', 'name') // Adjust columns as needed
                ->get();

            return response()->json($universities);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }
    public function getCity(Request $request)
    {
        try {
            $query = $request->input('search');

            $cities = City::where('cityName', 'like', '%' . $query . '%')
                ->select('id', 'cityName') // Adjust columns as needed
                ->get();

            return response()->json($cities);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }
    public function store(CourseRequest $request)
    {
        try {
            $discipline_response = CourseService::store($request);
            return redirect()->back()->with($discipline_response);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ]);
        }
    }


    public function showCourse($id)
    {
        $uni_course = UniCourse::find($id);
        return view('admin.pages.courses.view', compact('uni_course'));
    }
    public function edit($id)
    {
        try {
            //code...
            $uni_course = UniCourse::findorFail($id);
            $universities = University::all();
            $countries = Country::all();
            $degrees = Degree::all();
            $studyModels = StudyModel::all();
            $disciplines = Discipline::all();
            return view('admin.pages.courses.edit', compact(['uni_course', 'universities', 'countries', 'degrees', 'studyModels', 'disciplines']));
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ]);
        }
    }
    public function update(CourseRequest $request, $id)
    {
        try {
            $discipline_response = CourseService::update($request, $id);
            return redirect()->back()->with($discipline_response);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ]);
        }
    }
    public function destroy($id)
    {
        try {
            $discipline_response = CourseService::destroy($id);
            return $discipline_response;
        } catch (\Throwable $th) {
            return [
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ];
        }
    }
}
