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

        return view('client.trangchu', $data);
    }
}
