<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminAccountController extends Controller
{
    //
    public function index(){
        if (Gate::allows('admin.view.admin.account'))
        {
            $data['admins'] =  DB::table('admins')->orderBy('id', 'desc')->get();

            return view('admin.pages.admin-account.index', $data);
        }
        abort(403);
        
    }
}
