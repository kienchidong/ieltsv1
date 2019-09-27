<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    public function __construct()
    {
//        $data['contact'] = DB::table('contacts')->get();
//        dd($data);
//        view()->share($data);


    }
    public function index()
    {
        $data['blogs'] = DB::table('blogs')->where('status', 1)
            ->orderBy('id', 'DESC')->limit(3)->get();
        $data['homesliders'] = DB::table('images')->where([
            ['location', 1],
            ['status', 1]
            ])->get();
        $data['homebackground'] = DB::table('images')->where('location', 2)->first();
        $data['librarybackground'] = DB::table('images')->where('location', 3)->first();
        $data['commentbackground'] = DB::table('images')->where('location', 4)->first();
        $data['online'] = DB::table('course_onlines')->first();
        $data['hotpost'] = DB::table('blogs')->where('status', 1)->orderByDesc('view')->limit(3)->get();

        return view('client.trangchu', $data);
    }
}
