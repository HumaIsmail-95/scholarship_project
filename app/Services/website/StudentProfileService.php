<?php

namespace App\Services\website;

// use App\Models\User;

use App\Http\Requests\website\ProfessionalExpRequest;
use App\Http\Requests\website\StudentRequest;
use App\Models\EducationGallery;
use App\Models\Student;
use App\Models\StudentEducation;
use App\Models\StudentExperience;
use App\Models\StudentGallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

use App\Traits\FileUploadTrait;

class StudentProfileService
{
    public  static function store(StudentRequest $request, User $user)
    {

        DB::beginTransaction();
        $request->validated();
        $studentData = [
            'user_id' => $user->id,
            'name' => $request->name,
            'sur_name' => $request->sur_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'alternative_modile' => $request->alternative_modile,
            'gender' => $request->gender,
            'd_o_b' => $request->d_o_b,
            'id_type' => $request->id_type,
            'id_number' => $request->id_number,
            'nationality' => $request->nationality,
            'visa_holder' => $request->visa_holder,
            'address' => $request->address,
            'city' => $request->city,
            'post_code' => $request->post_code,
            'state' => $request->state,
            'country' => $request->country,
            'travel_history' => $request->travel_history,
            'traveled_to' => $request->traveled_to,
            'created_by' => $user->id,
        ];
        $student = Student::where('user_id', $user->id)->first();
        if ($student != null) {
            $student->update($studentData);

            if ($request->hasFile('id_document')) :

                $file = StudentGallery::where('user_id', $user->id)->where('type', 'id_card')->first();
                $fileToDelete = 'public/student_galleries/' . $file['image_name'];
                if (Storage::exists($fileToDelete)) {
                    Storage::delete($fileToDelete);
                }
                $file->delete();

                $image_name = FileUploadTrait::fileUpload($request->id_document, 'student_galleries');
                $doc['type'] = 'id_card';
                $doc['folder_name'] = 'student_galleries';
                $doc['image_name'] =  $image_name;
                $doc['user_id'] =  $user->id;
                $doc['image_url'] = url('/storage/student_galleries/' . $image_name);
                StudentGallery::create($doc);
            endif;
            if ($request->hasFile('travel_document')) :

                $file = StudentGallery::where('user_id', $user->id)->where('type', 'travel_proof')->first();
                $fileToDelete = 'public/student_galleries/' . $file->image_name;
                if (Storage::exists($fileToDelete)) {
                    Storage::delete($fileToDelete);
                }
                $file->delete();
                $image_name = FileUploadTrait::fileUpload($request->travel_document, 'student_galleries');
                $doc['type'] = 'travel_proof';
                $doc['folder_name'] = 'student_galleries';
                $doc['image_name'] =  $image_name;
                $doc['user_id'] =  $user->id;
                $doc['image_url'] = url('/storage/student_galleries/' . $image_name);
                StudentGallery::create($doc);
            endif;
        } else {
            $student = Student::create($studentData);
            if ($request->hasFile('id_document')) :
                $image_name = FileUploadTrait::fileUpload($request->id_document, 'student_galleries');
                $doc['type'] = 'id_card';
                $doc['folder_name'] = 'student_galleries';
                $doc['image_name'] =  $image_name;
                $doc['user_id'] =  $user->id;
                $doc['image_url'] = url('/storage/student_galleries/' . $image_name);
                StudentGallery::create($doc);
            endif;
            if ($request->hasFile('travel_document')) :
                $image_name = FileUploadTrait::fileUpload($request->travel_document, 'student_galleries');
                $doc['type'] = 'travel_proof';
                $doc['folder_name'] = 'student_galleries';
                $doc['image_name'] =  $image_name;
                $doc['user_id'] =  $user->id;
                $doc['image_url'] = url('/storage/student_galleries/' . $image_name);
                StudentGallery::create($doc);
            endif;
        }
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'User added successfully.', 'user' => $user];

        return $response;
    }

    public static function storeProfessionalExp(ProfessionalExpRequest $request, User $user)
    {

        DB::beginTransaction();
        $data = $request->validated();
        $studentEducation = StudentEducation::where('user_id', $user->id)->first();
        if ($studentEducation != null) {
            foreach ($data as $dataItem) {
                $educationData = [
                    'user_id' => $user->id,
                    'start' => $dataItem->start,
                    'end' => $dataItem->end,
                    'program_name' => $dataItem->program_name,
                    'institute_name' => $dataItem->institute_name,
                    'alternative_modile' => $dataItem->alternative_modile,
                    'grade' => $dataItem->grade,
                    'created_by' => $user->id,
                ];
                $studentEducation->update($educationData);
            }
            if ($request->hasFile('transcript')) :

                $transcriptFiles = EducationGallery::where('user_id', $user->id)->where('type', 'transcript')->get();
                foreach ($transcriptFiles as $fileData) {
                    # code...
                    $fileToDelete = 'public/student_transcripts/' . $fileData['image_name'];
                    if (Storage::exists($fileToDelete)) {
                        Storage::delete($fileToDelete);
                    }
                    $fileData->delete();
                }

                foreach ($transcriptFiles as $file) {
                    $image_name = FileUploadTrait::fileUpload($request->transcript, 'student_transcripts');
                    $doc['type'] = 'transcript';
                    $doc['folder_name'] = 'student_transcripts';
                    $doc['image_name'] =  $image_name;
                    $doc['user_id'] =  $user->id;
                    $doc['image_url'] = url('/storage/student_transcripts/' . $image_name);
                    EducationGallery::create($doc);
                }
            endif;
            if ($request->hasFile('certificate')) :

                $files = EducationGallery::where('user_id', $user->id)->where('type', 'certificate')->get();
                foreach ($files as $fileData) {
                    $fileToDelete = 'public/student_certificates/' . $fileData['image_name'];
                    if (Storage::exists($fileToDelete)) {
                        Storage::delete($fileToDelete);
                    }
                    $fileData->delete();
                }

                foreach ($files as $file) {
                    $image_name = FileUploadTrait::fileUpload($request->certificate, 'student_certificates');
                    $doc['type'] = 'certificate';
                    $doc['folder_name'] = 'student_certificates';
                    $doc['image_name'] =  $image_name;
                    $doc['user_id'] =  $user->id;
                    $doc['image_url'] = url('/storage/student_certificates/' . $image_name);
                    EducationGallery::create($doc);
                }
            endif;
        } else {
            foreach ($data as $dataItem) {
                $educationData = [
                    'user_id' => $user->id,
                    'start' => $dataItem->start,
                    'end' => $dataItem->end,
                    'program_name' => $dataItem->program_name,
                    'institute_name' => $dataItem->institute_name,
                    'alternative_modile' => $dataItem->alternative_modile,
                    'grade' => $dataItem->grade,
                    'created_by' => $user->id,
                ];
                StudentEducation::create($educationData);
            }
            if ($request->hasFile('transcript')) :



                foreach ($request->transcript as $file) {
                    $image_name = FileUploadTrait::fileUpload($file, 'student_transcripts');
                    $doc['type'] = 'transcript';
                    $doc['folder_name'] = 'student_transcripts';
                    $doc['image_name'] =  $image_name;
                    $doc['user_id'] =  $user->id;
                    $doc['image_url'] = url('/storage/student_transcripts/' . $image_name);
                    EducationGallery::create($doc);
                }
            endif;
            if ($request->hasFile('certificate')) :
                foreach ($request->certificate as $file) {
                    $image_name = FileUploadTrait::fileUpload($file, 'student_certificates');
                    $doc['type'] = 'certificate';
                    $doc['folder_name'] = 'student_certificates';
                    $doc['image_name'] =  $image_name;
                    $doc['user_id'] =  $user->id;
                    $doc['image_url'] = url('/storage/student_certificates/' . $image_name);
                    EducationGallery::create($doc);
                }
            endif;
        }
        $studentExperience = StudentExperience::where('user_id', $user->id)->first();
        if ($studentExperience != null) {
            foreach ($data as $dataItem) {
                $experienceData = [
                    'user_id' => $user->id,
                    'joining' => $request->joining,
                    'ending' => $request->ending,
                    'employer_name' => $request->employer_name,
                    'location' => $request->location,
                    'title' => $request->title,
                    'duties' => $request->duties,
                    'created_by' => $user->id,
                ];
                $studentExperience->update($experienceData);
            }
        } else {
            foreach ($data as $dataItem) {
                $experienceData = [
                    'user_id' => $user->id,
                    'start' => $dataItem->start,
                    'end' => $dataItem->end,
                    'program_name' => $dataItem->program_name,
                    'institute_name' => $dataItem->institute_name,
                    'alternative_modile' => $dataItem->alternative_modile,
                    'grade' => $dataItem->grade,
                    'created_by' => $user->id,
                ];
                StudentExperience::create($experienceData);
            }
        }
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'User added successfully.', 'user' => $user];

        return $response;
    }
}
