<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentSubscription;
use App\Models\UniCourse;
use App\Models\University;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:admin-dashboard', ['only' => ['index']]);
    }
    public function index()
    {
        $common_count = University::where('featured', 0)->count();
        $course_count = UniCourse::count();
        $student_count = Student::count();
        $featured_count = University::where('featured', 1)->count();
        $courses = UniCourse::with('university.images')->with('city')->with('degree')->take(4)->orderBy('id', 'DESC')->get();
        $now = Carbon::now();
        $lastMonthStart = $now->subMonth()->startOfMonth();
        $lastMonthEnd = $now->endOfMonth();
        $last_month = $lastMonthStart->format('Y-m');
        $packages = StudentSubscription::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->get();
        $package = $packages->count();
        $totalPrice = 0;
        foreach ($packages as $package) {
            $totalPrice += $package->price;
        }
        $featured = [
            'last_month' => $last_month,
            'package' => $package,
            'totalPrice' => $totalPrice,
        ];
        $number = Student::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();
        $student = [
            'last_month' => $last_month,
            'number' => $number,
        ];
        return view('admin.pages.dashboard', compact('common_count', 'course_count', 'student_count', 'featured_count', 'featured', 'student', 'courses'));
    }
}
