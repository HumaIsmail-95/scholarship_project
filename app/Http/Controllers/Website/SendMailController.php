<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendMailController extends Controller
{
    public function index()
    {
        // $logo = Banner::where('page_name', 'logo')->first();
        // $name = Auth::user()->name;
        $mailData = [
            'logo' => $logo,
            'name' => $name,
        ];
        Mail::to('jabberjay582@gmail.com')->send(new SendMail($mailData));
    }
}
