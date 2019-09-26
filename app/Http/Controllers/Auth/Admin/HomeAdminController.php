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
