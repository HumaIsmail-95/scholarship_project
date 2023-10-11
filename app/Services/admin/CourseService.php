<?php

namespace App\Services\admin;

use App\Models\Course;
use App\Http\Requests\admin\CourseRequest;
use App\Models\CourseRequirement;
use App\Models\UniCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CourseService
{
    public static function getCourses()
    {

        $uniCourses = UniCourse::with('university:id,name')->with('country:id,name')
            ->with('city:id,cityName')->with('degree:id,name')
            ->with('studyModel:id,name')->orderBy('id', 'DESC')->paginate(20);
        return $uniCourses;
    }

    public  static function store(CourseRequest $request)
    {

        DB::beginTransaction();
        $data = $request->validated();
        $courseData['created_by'] = Auth::user()->id;
        $courseData['name'] = $request->name;
        $courseData['scholarship'] = $request->scholarship;
        $courseData['uni_id'] = $request->uni_id;
        $courseData['country_id'] = 'China';
        $courseData['city_id'] = $request->city_id;
        $courseData['duration'] = $request->duration;
        $courseData['degree_id'] = $request->degree_id;
        $courseData['tuition_fee'] = $request->tuition_fee;
        $courseData['tuition_fee_type'] = $request->tuition_fee_type;
        $courseData['study_model_id'] = $request->study_model_id;
        $courseData['discipline_id'] = $request->discipline_id;
        $courseData['season'] = $request->season;
        $courseData['start_month'] = $request->start_month;
        $courseData['description'] = $request->description;
        $courseData['requirement_details'] = $request->requirement_details;
        $courseData['other_requirements'] = $request->other_requirements;
        $uniCourse = UniCourse::create($courseData);
        foreach ($request['test_name'] as $key => $response) {
            $requiremntData =  [
                'course_id' => $uniCourse->id,
                'test_name' => $request['test_name'][$key],
                'min_score' => $request['min_score'][$key],
                'min_score_level' => $request['min_score_level'][$key],
                'created_by' => Auth::user()->id,
            ];
            CourseRequirement::create($requiremntData);
        }
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'Course added successfully.', 'uniCourse' => $uniCourse];
        return $response;
    }


    public static function update(CourseRequest $request, $id)
    {
        DB::beginTransaction();
        $uni_course = UniCourse::findorFail($id);

        $data = $request->validated();
        $courseData['created_by'] = Auth::user()->id;
        $courseData['name'] = $request->name;
        $courseData['scholarship'] = $request->scholarship;
        $courseData['uni_id'] = $request->uni_id;
        $courseData['country_id'] = 'China';
        $courseData['city_id'] = $request->city_id;
        $courseData['duration'] = $request->duration;
        $courseData['degree_id'] = $request->degree_id;
        $courseData['tuition_fee'] = $request->tuition_fee;
        $courseData['tuition_fee_type'] = $request->tuition_fee_type;
        $courseData['study_model_id'] = $request->study_model_id;
        $courseData['discipline_id'] = $request->discipline_id;
        $courseData['season'] = $request->season;
        $courseData['start_month'] = $request->start_month;
        $courseData['description'] = $request->description;
        $courseData['requirement_details'] = $request->requirement_details;
        $courseData['other_requirements'] = $request->other_requirements;
        $uni_course->update($courseData);
        $uni_course->requirements()->delete();
        foreach ($request['test_name'] as $key => $response) {
            $requiremntData =  [
                'course_id' => $uni_course->id,
                'test_name' => $request['test_name'][$key],
                'min_score' => $request['min_score'][$key],
                'min_score_level' => $request['min_score_level'][$key],
                'created_by' => Auth::user()->id,
            ];
            CourseRequirement::create($requiremntData);
        }
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => ' Course updated successfully.'];
        return $response;
    }
    public static function destroy($id)
    {
        DB::beginTransaction();
        $uniCourse = UniCourse::findorFail($id);
        $uniCourse->delete();
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'Course removed successfully.'];
        return $response;
    }
}
