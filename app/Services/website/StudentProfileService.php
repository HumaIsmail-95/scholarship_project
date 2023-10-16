<?php

namespace App\Services\website;

// use App\Models\User;

use App\Http\Requests\website\DocumentGalleryRequest;
use App\Http\Requests\website\EducationRequest;
use App\Http\Requests\website\ProfessionalExpRequest;
use App\Http\Requests\website\StudentRequest;
use App\Http\Requests\website\StudentTestRequest;
use App\Models\DocumentGallery;
use App\Models\EducationGallery;
use App\Models\Student;
use App\Models\StudentEducation;
use App\Models\StudentExperience;
use App\Models\StudentGallery;
use App\Models\StudentTest;
use App\Models\TestGallery;
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
        $personal = $user->personal;
        $education = $user->education;
        $test = $user->test;
        $document = $user->document;
        $percentage = ($personal + $education + $test + $document) * 25;
        $user->update(['profile_percentage' => $percentage, 'personal' => 1]);
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'User added successfully.', 'user' => $user];

        return $response;
    }

    public static function storeProfessionalExp(ProfessionalExpRequest $request, User $user)
    {

        DB::beginTransaction();
        $data = $request->validated(EducationRequest::class);

        $studentEducation = StudentEducation::where('user_id', $user->id)->with('educationGalleries')->get();
        if ($studentEducation != null) {
            foreach ($studentEducation as $edu) {
                $edu->delete();
            }
        }
        foreach ($data['start'] as $index => $responseName) {
            $educationData = [
                'user_id' => $user->id,
                'start' => $data['start'][$index],
                'end' => $data['end'][$index],
                'program_name' => $data['program_name'][$index],
                'institute_name' => $data['institute_name'][$index],
                'grade' => $data['grade'][$index],
                'created_by' => $user->id,
            ];
            $education = StudentEducation::create($educationData);
            if (isset($data['transcript'][$index])) :
                $fileTranscript = $data['transcript'][$index];

                $image_name = FileUploadTrait::fileUpload($fileTranscript, 'student_transcripts');
                // $deleteTranscript = 'public/student_transcripts/' . $image_name;
                // if (Storage::exists($deleteTranscript)) {
                //     Storage::delete($deleteTranscript);
                // }
                $doc['type'] = 'transcript';
                $doc['folder_name'] = 'student_transcripts';
                $doc['image_name'] =  $image_name;
                $doc['education_id'] =  $education->id;
                $doc['image_url'] = url('/storage/student_transcripts/' . $image_name);
                EducationGallery::create($doc);
            endif;
            if (isset($data['certificate'][$index])) :
                // $deleteCertificate = 'public/student_certificates/' . $image_name;
                // if (Storage::exists($deleteCertificate)) {
                //     Storage::delete($deleteCertificate);
                // }
                $fileCertificate = $data['certificate'][$index];
                $image_name = FileUploadTrait::fileUpload($fileCertificate, 'student_certificates');

                $doc['type'] = 'certificate';
                $doc['folder_name'] = 'student_certificates';
                $doc['image_name'] =  $image_name;
                $doc['education_id'] =  $education->id;
                $doc['image_url'] = url('/storage/student_certificates/' . $image_name);
                EducationGallery::create($doc);
            endif;
        }
        $studentExperience = StudentExperience::where('user_id', $user->id)->get();
        if ($studentExperience != null) {
            foreach ($studentExperience as $expp) {
                $expp->delete();
            }
        }
        foreach ($data['joining'] as $index => $responseName) {
            $experienceData = [
                'user_id' => $user->id,
                'joining' => $data['joining'][$index],
                'ending' => $data['ending'][$index],
                'employer_name' => $data['employer_name'][$index],
                'location' => $data['location'][$index],
                'title' => $data['title'][$index],
                'duties' => $data['duties'][$index],
                'created_by' => $user->id,
            ];
            StudentExperience::create($experienceData);
        }
        $personal = $user->personal;
        $education = $user->education;
        $test = $user->test;
        $document = $user->document;
        $percentage = ($personal + $education + $test + $document) * 25;
        $user->update(['profile_percentage' => $percentage, 'education' => 1]);
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'User added successfully.', 'user' => $user];

        return $response;
    }

    public static function storeTestLanguage(StudentTestRequest $request, User $user)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $studentTest = StudentTest::where('user_id', $user->id)->with('testGalleries')->first();
        if (!empty($studentTest)) {
            $testData = [
                'user_id' => $user->id,
                'native_english' => isset($data['native_english']) ? 1 : 0,
                'ielts_score' => $data['ielts_score'],
                'pearson_score' => $data['pearson_score'],
                'toelf_score' => $data['toelf_score'],
                'created_by' => $user->id,
            ];
            $studentTest->update($testData);
            if ($request->hasFile('ielts')) :
                foreach ($studentTest->testGalleries as $test) {
                    if ($test->type == 'ielts') {
                        $file = $test;
                    }
                }
                $fileToDelete = 'public/test_gallery/' . $file->image_name;
                if (Storage::exists($fileToDelete)) {
                    Storage::delete($fileToDelete);
                }
                $file->delete();
                $image_name = FileUploadTrait::fileUpload($request->ielts, 'test_gallery');
                $doc['type'] = 'ielts';
                $doc['folder_name'] = 'test_gallery';
                $doc['image_name'] =  $image_name;
                $doc['test_id'] =  $studentTest->id;
                $doc['image_url'] = url('/storage/test_gallery/' . $image_name);
                TestGallery::create($doc);
            endif;
            if ($request->hasFile('toelf')) :
                foreach ($studentTest->testGalleries as $test) {
                    if ($test->type == 'toelf') {
                        $file = $test;
                    }
                }
                $fileToDelete = 'public/test_gallery/' . $file->image_name;
                if (Storage::exists($fileToDelete)) {
                    Storage::delete($fileToDelete);
                }
                $file->delete();
                $image_name = FileUploadTrait::fileUpload($request->toelf, 'test_gallery');
                $doc['type'] = 'toelf';
                $doc['folder_name'] = 'test_gallery';
                $doc['image_name'] =  $image_name;
                $doc['test_id'] =  $studentTest->id;
                $doc['image_url'] = url('/storage/test_gallery/' . $image_name);
                TestGallery::create($doc);
            endif;
            if ($request->hasFile('pearson')) :
                foreach ($studentTest->testGalleries as $test) {
                    if ($test->type == 'pearson') {
                        $file = $test;
                    }
                }
                $fileToDelete = 'public/test_gallery/' . $file->image_name;
                if (Storage::exists($fileToDelete)) {
                    Storage::delete($fileToDelete);
                }
                $file->delete();
                $image_name = FileUploadTrait::fileUpload($request->pearson, 'test_gallery');
                $doc['type'] = 'pearson';
                $doc['folder_name'] = 'test_gallery';
                $doc['image_name'] =  $image_name;
                $doc['test_id'] =  $studentTest->id;
                $doc['image_url'] = url('/storage/test_gallery/' . $image_name);
                TestGallery::create($doc);
            endif;
            if ($request->hasFile('moi')) :
                foreach ($studentTest->testGalleries as $test) {
                    if ($test->type == 'moi') {
                        $file = $test;
                    }
                }
                $fileToDelete = 'public/test_gallery/' . $file->image_name;
                if (Storage::exists($fileToDelete)) {
                    Storage::delete($fileToDelete);
                }
                $file->delete();
                $image_name = FileUploadTrait::fileUpload($request->moi, 'test_gallery');
                $doc['type'] = 'moi';
                $doc['folder_name'] = 'test_gallery';
                $doc['image_name'] =  $image_name;
                $doc['test_id'] =  $studentTest->id;
                $doc['image_url'] = url('/storage/test_gallery/' . $image_name);
                TestGallery::create($doc);
            endif;
        } else {
            $testData = [
                'user_id' => $user->id,
                'native_english' => isset($data['native_english']) ? $data['native_english'] : 0,
                'ielts_score' => $data['ielts_score'],
                'pearson_score' => $data['pearson_score'],
                'toelf_score' => $data['toelf_score'],
                'created_by' => $user->id,
            ];
            $studentTest = StudentTest::create($testData);
            if ($request->hasFile('ielts')) :
                $image_name = FileUploadTrait::fileUpload($request->ielts, 'test_gallery');
                $doc['type'] = 'ielts';
                $doc['folder_name'] = 'test_gallery';
                $doc['image_name'] =  $image_name;
                $doc['test_id'] =  $studentTest->id;
                $doc['image_url'] = url('/storage/test_gallery/' . $image_name);
                TestGallery::create($doc);
            endif;
            if ($request->hasFile('toelf')) :

                $image_name = FileUploadTrait::fileUpload($request->toelf, 'test_gallery');
                $doc['type'] = 'toelf';
                $doc['folder_name'] = 'test_gallery';
                $doc['image_name'] =  $image_name;
                $doc['test_id'] =  $studentTest->id;
                $doc['image_url'] = url('/storage/test_gallery/' . $image_name);
                TestGallery::create($doc);
            endif;
            if ($request->hasFile('pearson')) :
                $image_name = FileUploadTrait::fileUpload($request->pearson, 'test_gallery');
                $doc['type'] = 'pearson';
                $doc['folder_name'] = 'test_gallery';
                $doc['image_name'] =  $image_name;
                $doc['test_id'] =  $studentTest->id;
                $doc['image_url'] = url('/storage/test_gallery/' . $image_name);
                TestGallery::create($doc);
            endif;
            if ($request->hasFile('moi')) :
                $image_name = FileUploadTrait::fileUpload($request->moi, 'test_gallery');
                $doc['type'] = 'moi';
                $doc['folder_name'] = 'test_gallery';
                $doc['image_name'] =  $image_name;
                $doc['test_id'] =  $studentTest->id;
                $doc['image_url'] = url('/storage/test_gallery/' . $image_name);
                TestGallery::create($doc);
            endif;
        }
        $personal = $user->personal;
        $education = $user->education;
        $test = $user->test;
        $document = $user->document;
        $percentage = ($personal + $education + $test + $document) * 25;
        $user->update(['profile_percentage' => $percentage, 'test' => 1]);
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'User added successfully.', 'user' => $user];
        return $response;
    }
    public static function storeDocuments(DocumentGalleryRequest $request, User $user)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $docuemntData = DocumentGallery::where('user_id', $user->id)->get();
        if ($docuemntData->isNotEmpty()) {
            foreach ($docuemntData as $data) {
                if ($request->hasFile('resume')) :
                    $fileToDelete = 'public/document_gallery/' . $data->image_name;
                    if (Storage::exists($fileToDelete)) {
                        Storage::delete($fileToDelete);
                    }
                    $data->delete();
                endif;
                if ($request->hasFile('exp_letter')) :
                    $fileToDelete = 'public/document_gallery/' . $data->image_name;
                    if (Storage::exists($fileToDelete)) {
                        Storage::delete($fileToDelete);
                    }
                    $data->delete();
                endif;
                if ($request->hasFile('other')) :
                    $fileToDelete = 'public/document_gallery/' . $data->image_name;
                    if (Storage::exists($fileToDelete)) {
                        Storage::delete($fileToDelete);
                    }
                    $data->delete();
                endif;
                if ($request->hasFile('recomendation')) :
                    $fileToDelete = 'public/document_gallery/' . $data->image_name;
                    if (Storage::exists($fileToDelete)) {
                        Storage::delete($fileToDelete);
                    }
                    $data->delete();
                endif;
            }
            if ($request->hasFile('resume')) {
                $image_name = FileUploadTrait::fileUpload($request->exp_letter, 'document_gallery');
                $doc['type'] = 'resume';
                $doc['folder_name'] = 'document_gallery';
                $doc['image_name'] =  $image_name;
                $doc['user_id'] =  $user->id;
                $doc['image_url'] = url('/storage/document_gallery/' . $image_name);
                DocumentGallery::create($doc);
            }
            if ($request->hasFile('exp_letter')) {
                $image_name = FileUploadTrait::fileUpload($request->exp_letter, 'document_gallery');
                $doc['type'] = 'exp_letter';
                $doc['folder_name'] = 'document_gallery';
                $doc['image_name'] =  $image_name;
                $doc['user_id'] =  $user->id;
                $doc['image_url'] = url('/storage/document_gallery/' . $image_name);
                DocumentGallery::create($doc);
            }
            if ($request->hasFile('other')) {
                $image_name = FileUploadTrait::fileUpload($request->other, 'document_gallery');
                $doc['type'] = 'other';
                $doc['folder_name'] = 'document_gallery';
                $doc['image_name'] =  $image_name;
                $doc['user_id'] =  $user->id;
                $doc['image_url'] = url('/storage/document_gallery/' . $image_name);
                DocumentGallery::create($doc);
            }
            if ($request->hasFile('recomendation')) {
                $image_name = FileUploadTrait::fileUpload($request->recomendation, 'document_gallery');
                $doc['type'] = 'recomendation';
                $doc['folder_name'] = 'document_gallery';
                $doc['image_name'] =  $image_name;
                $doc['user_id'] =  $user->id;
                $doc['image_url'] = url('/storage/document_gallery/' . $image_name);
                DocumentGallery::create($doc);
            }
        } else {
            if ($request->hasFile('resume')) {
                $image_name = FileUploadTrait::fileUpload($request->resume, 'document_gallery');
                $doc['type'] = 'resume';
                $doc['folder_name'] = 'document_gallery';
                $doc['image_name'] =  $image_name;
                $doc['user_id'] =  $user->id;
                $doc['image_url'] = url('/storage/document_gallery/' . $image_name);
                DocumentGallery::create($doc);
            }
            if ($request->hasFile('exp_letter')) {
                $image_name = FileUploadTrait::fileUpload($request->exp_letter, 'document_gallery');
                $doc['type'] = 'exp_letter';
                $doc['folder_name'] = 'document_gallery';
                $doc['image_name'] =  $image_name;
                $doc['user_id'] =  $user->id;
                $doc['image_url'] = url('/storage/document_gallery/' . $image_name);
                DocumentGallery::create($doc);
            }
            if ($request->hasFile('other')) {
                $image_name = FileUploadTrait::fileUpload($request->other, 'document_gallery');
                $doc['type'] = 'other';
                $doc['folder_name'] = 'document_gallery';
                $doc['image_name'] =  $image_name;
                $doc['user_id'] =  $user->id;
                $doc['image_url'] = url('/storage/document_gallery/' . $image_name);
                DocumentGallery::create($doc);
            }
            if ($request->hasFile('recomendation')) {
                $image_name = FileUploadTrait::fileUpload($request->recomendation, 'document_gallery');
                $doc['type'] = 'recomendation';
                $doc['folder_name'] = 'document_gallery';
                $doc['image_name'] =  $image_name;
                $doc['user_id'] =  $user->id;
                $doc['image_url'] = url('/storage/document_gallery/' . $image_name);
                DocumentGallery::create($doc);
            }
        }
        $personal = $user->personal;
        $education = $user->education;
        $test = $user->test;
        $document = $user->document;
        $percentage = ($personal + $education + $test + $document) * 25;
        $user->update(['profile_percentage' => $percentage + 25, 'document' => 1]);
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'User added successfully.', 'user' => $user];
        return $response;
    }
}
