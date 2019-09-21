<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IntroduceController extends Controller
{
    //

    public function index(){
        $data['introduces'] = DB::table('introduce')->first();

        return view('admin.pages.introduce.index', $data);
    }
}
