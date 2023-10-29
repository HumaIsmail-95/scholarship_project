<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Services\website\MyApplicationService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        try {
            //code...
            $students = Student::paginate(20);
            return view('admin.pages.students.index', compact('students'));
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
    public function create()
    {
        try {
            //code...
        } catch (\Throwable $th) {

            //throw $th;
        }
    }
    public function getProfile($id)
    {
        try {
            $student = Student::findorFail($id);
            $education = MyApplicationService::getEducation($student->user_id);
            $experience = MyApplicationService::getExperience($student->user_id);
            $documents = MyApplicationService::getDocuments($student->user_id);
            $testLanguage = MyApplicationService::getTestLanguage($student->user_id);
            return view('admin.pages.students.profile', compact('student', 'education', 'experience', 'documents', 'testLanguage'));
        } catch (\Throwable $th) {
            return redirect()->with($th->getMessage());
            //throw $th;
        }
    }
}
