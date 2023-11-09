<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ApplicationRequest;
use App\Models\StudentApplication;
use App\Services\website\MyApplicationService;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        try {
            // $user_id = Auth::user()->id;
            $applications = StudentApplication::with(['course', 'course.university.images', 'student'])->paginate(20);
            return view('admin.pages.applications.index', compact('applications'));
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
    public function update(ApplicationRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $application = StudentApplication::findorFail($id);
            $application->update($data);
            $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => ' Application status updated successfully.'];
            return $response;
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
    public function review($id)
    {
        try {
            $application = StudentApplication::findorFail($id);
            $program = MyApplicationService::getProgram($application->course_id);
            $user_id = $application->user_id;
            $student = MyApplicationService::getStudent($user_id);
            $education = MyApplicationService::getEducation($user_id);
            $experience = MyApplicationService::getExperience($user_id);
            $documents = MyApplicationService::getDocuments($user_id);
            $testLanguage = MyApplicationService::getTestLanguage($user_id);
            return view('admin.pages.applications.review', compact('program', 'student', 'education', 'experience', 'documents', 'testLanguage'));
            //code...
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
}
