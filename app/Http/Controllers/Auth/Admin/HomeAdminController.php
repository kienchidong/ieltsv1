<?php

namespace App\Http\Controllers\Auth\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class HomeAdminController extends Controller
{
    //
    public function index(){

        $data['count_time'] = DB::table('time')->first();
        $data['count_information'] = DB::table('informations')->where('status', 0)->count();
        $data['count_blog'] = DB::table('blogs')->count();
        $data['count_library'] = DB::table('librarys')->count();
        $data['count_course'] = DB::table('course_offlines')->count();
        return view('admin.index', $data);
    }

    public function edittime(Request $request, $id){
        if(Gate::allows('admin')) {
            DB::table('time')->where('id', $id)->update([
               'date' => $request->date,
            ]);

            return redirect()->back()->with('thongbao', 'Sửa Ngày thành công');
        }
        abort(403);
    }
}
