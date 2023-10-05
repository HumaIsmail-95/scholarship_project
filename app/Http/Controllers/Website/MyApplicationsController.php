<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyApplicationsController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:my-appications', ['only' => ['myApplications']]);
    //     $this->middleware('permission:my-uni-app', ['only' => ['myUniApp']]);
    //     $this->middleware('permission:personal-info', ['only' => ['personalInfo']]);
    //     $this->middleware('permission:professional-exp', ['only' => ['professionalExp']]);
    //     $this->middleware('permission:test-language', ['only' => ['testLanguage']]);
    //     $this->middleware('permission:store-documents', ['only' => ['storeDocuments']]);
    // }
    public function myApplications()
    {
        try {
            return view('website.pages.application.index');
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
}
