<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CourseController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {
        $data['course_offlines'] = DB::table('course_offlines')->where('status', 1)->get();
        $data['course_enrolling'] = DB::table('course_enrolling')->where('status',1)->orderByDesc('id')->get();
        return view('client.pages.course_offlines.landingpage', $data);
    }
}
