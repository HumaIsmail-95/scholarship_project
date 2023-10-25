<?php

namespace App\Services\website;

use App\Http\Requests\website\StudentApplicationRequest;
use App\Models\DocumentGallery;
use App\Models\Student;
use App\Models\StudentApplication;
use App\Models\StudentEducation;
use App\Models\StudentExperience;
use App\Models\StudentTest;
use App\Models\UniCourse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Banner;

class MyApplicationService
{
    public static function getProgram($id)
    {
        return  UniCourse::with('university')->with('university')->with('degree')->with('discipline')->findorFail($id);
    }
    public static function getStudent($user_id)
    {
        return Student::where('user_id', $user_id)->with('studentGalleries:user_id,id,type,image_name,image_url')->first();
    }
    public static function getEducation($user_id)
    {
        return StudentEducation::where('user_id', $user_id)->with('educationGalleries')->get();
    }
    public static function getExperience($user_id)
    {
        return StudentExperience::where('user_id', $user_id)->get();
    }
    public static function getDocuments($user_id)
    {
        return DocumentGallery::where('user_id', $user_id)->get();
    }
    public static function getTestLanguage($user_id)
    {
        return StudentTest::where('user_id', $user_id)->with('testGalleries:test_id,id,type,image_name,image_url')->first();
    }
    public static function store(StudentApplicationRequest $request, $id)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $user_id = Auth::user()->id;
        $program_no = Auth::user()->program_no;
        $data['user_id'] = $user_id;
        $data['course_id'] = $id;
        if ($request->hasFile('doc')) :
            $image_name = FileUploadTrait::fileUpload($request->doc, 'application_purpose');
            $data['image_folder'] = 'application_purpose';
            $data['image_name'] =  $image_name;
            $data['image_url'] = url('/storage/application_purpose/' . $image_name);
        endif;
        $student = StudentApplication::create($data);
        $user = User::findorFail($user_id);
        $data['program_no'] = $program_no - 1;
        if ($data['program_no'] <= 0) {
            $data['subscription'] = 0;
            $data['program_no'] = 0;
        }
        $user->update($data);
        $logo = Banner::where('page_name', 'logo')->first();
        $name = Auth::user()->name;
        $course = UniCourse::with('university:id,name')->findorFail($id);
        $mailData = [
            'logo' => $logo->image_url,
            'name' => $name,
            'university' => $course->university->name,
            'course' => $course->name,
            'companyName' => env('APP_NAME'),
        ];
        Mail::to($user->email)->send(new SendMail($mailData));
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'Application sent successfully.'];
        return $response;
    }
}
