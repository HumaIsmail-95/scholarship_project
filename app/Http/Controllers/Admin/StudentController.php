<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
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
}
