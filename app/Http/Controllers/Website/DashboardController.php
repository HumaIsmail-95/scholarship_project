<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\website\DocumentGalleryRequest;
use App\Http\Requests\website\ProfessionalExpRequest;
use App\Http\Requests\website\StudentRequest;
use App\Http\Requests\website\StudentTestRequest;
use App\Models\DocumentGallery;
use App\Models\Student;
use App\Models\StudentApplication;
use App\Models\StudentEducation;
use App\Models\StudentExperience;
use App\Models\StudentSubscription;
use App\Models\StudentTest;
use App\Models\User;
use App\Services\website\StudentProfileService;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:website-dashboard', ['only' => ['index']]);
        $this->middleware('permission:my-uni-app', ['only' => ['myUniApp']]);
        $this->middleware('permission:personal-info', ['only' => ['personalInfo']]);
        $this->middleware('permission:professional-exp', ['only' => ['professionalExp']]);
        $this->middleware('permission:test-language', ['only' => ['testLanguage']]);
        $this->middleware('permission:store-documents', ['only' => ['storeDocuments']]);
    }
    public function index()
    {
        $user_id = Auth::user()->id;
        $applications = StudentApplication::where('user_id', $user_id)->get();
        $currentSubscription = StudentSubscription::with('package')->where('user_id', $user_id)->orderby('id', 'DESC')->first();
        return view('website.pages.dashboard.index', compact('applications', 'currentSubscription'));
    }
    public function myUniApp()
    {
        $user_id = Auth::user()->id;
        $student = Student::where('user_id', $user_id)->with('studentGalleries:user_id,id,type,image_name,image_url')->first();
        $professionalData['education'] = StudentEducation::where('user_id', $user_id)->with('educationGalleries')->get();
        $professionalData['experience'] = StudentExperience::where('user_id', $user_id)->get();
        $documents = DocumentGallery::where('user_id', $user_id)->get();

        $testLanguage = StudentTest::where('user_id', $user_id)->with('testGalleries:test_id,id,type,image_name,image_url')->first();
        return view('website.pages.profile.my_uni_app', compact('student', 'professionalData', 'testLanguage', 'documents'));
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
    public function testLanguage(StudentTestRequest $request, User $user)
    {
        try {
            $response = StudentProfileService::storeTestLanguage($request, $user);
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }
    public function storeDocuments(DocumentGalleryRequest $request, User $user)
    {
        try {
            $response = StudentProfileService::storeDocuments($request, $user);
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
    public function profile()
    {
        try {
            return view('website.pages.profile.edit');
            //code...
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
    public function updateProfile(Request $request, $id)
    {
        $user = User::findorFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'password' => 'required',
            'new_password' => 'required|string|min:8',
        ]);;
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'The current password is incorrect.']);
        }
        if ($request->new_password != $request->password_confirmation) {
            return redirect()->back()->withErrors(['new_password' => 'The confimr password doesnot match']);
        }
        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['password'] = Hash::make($request->new_password);
        $user->update($data);
        return redirect()->back()->with(['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'profile updated successfully']);
    }
    public function deleteEducationRecord($id)
    {
        $edu = StudentEducation::findorFail($id);
        $edu->educationGalleries;
        foreach ($edu->educationGalleries as $key => $fileToDelete) {
            if (Storage::exists($fileToDelete)) {
                Storage::delete($fileToDelete);
            }
        }
        $edu->delete();
        return redirect()->back()->with(['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'Education deleted successfully']);
    }
}
