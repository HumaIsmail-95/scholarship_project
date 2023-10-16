<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\website\StudentApplicationRequest;
use App\Models\StudentApplication;
use App\Models\UniCourse;
use App\Services\website\MyApplicationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyApplicationsController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:my-appications', ['only' => ['myApplications']]);
    //     $this->middleware('permission:my-uni-app', ['only' => ['myUniApp']]);
    //     $this->middleware('permission:personal-info', ['only' => ['personalInfo']]);
    //     $this->middleware('permission:professional-exp', ['only' => ['professionalExp']]);
    //     $this->middleware('permission:test-language', ['only' => ['testLanguage']]);
    //     $this->middleware('permission:store-documents', ['only' => ['storeDocuments']]);
    // }
    public function myApplications()
    {
        try {
            $user_id = Auth::user()->id;
            $applications = StudentApplication::where('user_id', $user_id)->with(['course', 'course.university.images'])->get();
            return view('website.pages.application.index', compact('applications'));
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
    public function overviews(){
        try {
            $user_id = Auth::user()->id;
            $applications = StudentApplication::where('user_id', $user_id)->with(['course', 'course.university'])->paginate(5);
            return view('website.pages.application.overview', compact('applications'));
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
    public function reviewApplication($id)
    {
        try {
            $program = MyApplicationService::getProgram($id);
            $user_id = Auth::user()->id;
            $student = MyApplicationService::getStudent($user_id);
            $education = MyApplicationService::getEducation($user_id);
            $experience = MyApplicationService::getExperience($user_id);
            $documents = MyApplicationService::getDocuments($user_id);
            $testLanguage = MyApplicationService::getTestLanguage($user_id);
            return view('website.pages.application.review', compact('program', 'student', 'education', 'experience', 'documents', 'testLanguage'));
            //code...
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
    public function finalizeApplication($id)
    {
        try {
            $program = MyApplicationService::getProgram($id);

            return view('website.pages.application.finalize', compact('program'));
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
    public function submiteApplication(StudentApplicationRequest $request, $id)
    {
        try {
            $response = MyApplicationService::store($request, $id);
            return redirect(route('myApplications'))->with($response);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
