<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\website\ProfessionalExpRequest;
use App\Http\Requests\website\StudentRequest;
use App\Models\Student;
use App\Models\StudentEducation;
use App\Models\StudentExperience;
use App\Models\User;
use App\Services\website\StudentProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:list-subscription', ['only' => ['index']]);
    //     $this->middleware('permission:create-subscription', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:edit-subscription', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:delete-subscription', ['only' => ['destroy']]);
    // }
    public function index()
    {
        return view('website.pages.dashboard.index');
    }
    public function myUniApp()
    {
        $user_id = Auth::user()->id;
        $student = Student::where('user_id', $user_id)->with('studentGalleries:user_id,id,type,image_name,image_url')->first();
        $professionalData['education'] = StudentEducation::where('user_id', $user_id)->with('educationGalleries:user_id,id,type,image_name,image_url')->get();
        $professionalData['experience'] = StudentExperience::where('user_id', $user_id)->with('experienceGalleries:user_id,id,type,image_name,image_url')->get();
        return view('website.pages.profile.my_uni_app', compact('student', 'professionalData'));
    }
    public function personalInfo(StudentRequest $request, User $user)
    {
        try {
            $response = StudentProfileService::store($request, $user);
            return $response;
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }

    public function professionalExp(ProfessionalExpRequest $request, User $user)
    {
        try {
            $response = StudentProfileService::storeProfessionalExp($request, $user);
            return $response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
