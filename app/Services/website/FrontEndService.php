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
use App\Models\UniCourse;
use App\Models\University;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

use App\Traits\FileUploadTrait;

class FrontEndService
{
    public  static function getPopular()
    {
        $count = UniCourse::where('city_id', 8)->count();
        $response['Beijing'] = [
            'name' => 'Beijing',
            'count' => $count,
            'image' => asset('website/assets/images/cities/Beijing.jpg'),
        ];
        $count = UniCourse::where('city_id', 87)->count();
        $response['Shanghai'] = [
            'name' => 'Shanghai',
            'count' => $count,
            'image' => asset('website/assets/images/cities/Shanghai.jpg'),
        ];
        $count = UniCourse::where('city_id', 90)->count();
        $response['Tianjin'] = [
            'name' => 'Tianjin',
            'count' => $count,
            'image' => asset('website/assets/images/cities/Tianjin.jpg'),
        ];
        $count = UniCourse::where('city_id', 65)->count();
        $response['Shenzhen'] = [
            'name' => 'Shenzhen',
            'count' => $count,
            'image' => asset('website/assets/images/cities/Shenzhen.jpg'),
        ];
        $count = UniCourse::where('city_id', 23)->count();
        $response['Guangzhou'] = [
            'name' => 'Guangzhou',
            'count' => $count,
            'image' => asset('website/assets/images/cities/Guangzhou.jpg'),
        ];
        return $response;
    }
    public static function getPrograms(Request $request)
    {
        $uni_id = $request->uni_id;
        $city_id = $request->city_id;
        $discipline_id = $request->discipline_id;
        $minPrice = $request->min_price;
        $maxPrice = $request->max_price;
        $courses = new UniCourse();
        if ($uni_id) {
            $courses = $courses->where('uni_id', $uni_id);
        }
        if ($city_id) {
            $courses = $courses->where('city_id', $city_id);
        }
        if ($discipline_id) {
            $courses = $courses->where('discipline_id', $discipline_id);
        }
        if ($minPrice) {
            $courses = $courses->where('tuition_fee', '>=', $minPrice);
        }
        if ($maxPrice) {
            $courses = $courses->where('tuition_fee', '<=', $maxPrice);
        }
        $courses = $courses->with(['university', 'university.images' => function ($query) {
            $query->select('id', 'image_url', 'type', 'uni_id');
            $query->where('type', 'logo');
        }])->with('city:id,cityName')->with('degree:id,name')->with('studyModel:id,name')->paginate(5);
        return $courses;
    }
    public static function getProgramDetail($id)
    {
        try {
            $course = UniCourse::findorFail($id);
            return $course;
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
    public static function universityDetail($id)
    {
        try {
            $response = University::findorFail($id);
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
}
