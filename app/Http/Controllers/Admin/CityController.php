<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CityRequest;
use App\Models\City;
use App\Services\admin\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:list-city', ['only' => ['index']]);
        $this->middleware('permission:update-city', ['only' => ['edit', 'update']]);
    }

    public function index(Request $request)
    {
        $cities = CityService::getCities();
        // $groups = CityService::getCities();
        // dd($Cities);
        return view('admin.pages.cities.index', compact('cities'));
    }



    public function update(CityRequest $request, City $city)
    {
        try {
            $discipline_response = CityService::update($request, $city);
            return $discipline_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
