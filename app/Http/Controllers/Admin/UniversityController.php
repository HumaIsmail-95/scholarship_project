<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UniversityRequest;
use App\Models\University;
use App\Services\admin\UniversityService;
use Illuminate\Http\Request;

class UniversityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:list-university', ['only' => ['index']]);
        $this->middleware('permission:create-university', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-university', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-university', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $universities = UniversityService::getUniversities();
        // $groups = UniversityService::getUniversitys();
        // dd($universities);
        return view('admin.pages.universities.index', compact('universities'));
    }
    public function create()
    {
        $countries = UniversityService::getCountries();
        return view('admin.pages.universities.create', compact('countries'));
    }
    public function edit(University $university)
    {
        try {
            $countries = UniversityService::getCountries();
            $university = UniversityService::setImage($university);
            return view('admin.pages.universities.edit', compact('university', 'countries'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(['status' => false, 'icon' => 'error', 'heading' => 'Error', 'message' => $th->getMessage()]);
        }
    }
    public function store(UniversityRequest $request)
    {
        try {
            $university_response = UniversityService::store($request);
            return redirect()->back()->with($university_response);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['status' => false, 'icon' => 'error', 'heading' => 'Error', 'message' => $th->getMessage()]);
        }
    }


    public function show($id)
    {
        $university = University::find($id);
        return view('admin.pages.universities.edit', compact('university'));
    }

    public function update(UniversityRequest $request, University $university)
    {
        try {
            $university_response = UniversityService::update($request, $university);
            return redirect()->back()->with($university_response);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['status' => false, 'icon' => 'error', 'heading' => 'Error', 'message' => $th->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {
            $university_response = UniversityService::destroy($id);
            return $university_response;
        } catch (\Throwable $th) {
            return redirect()->back()->with(['status' => false, 'icon' => 'error', 'heading' => 'Error', 'message' => $th->getMessage()]);
        }
    }
}
