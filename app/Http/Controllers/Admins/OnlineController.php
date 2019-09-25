<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OnlineController extends Controller
{
    //
    public function index()
    {
        $data['online'] = DB::table('course_onlines')->first();

        return view('admin.pages.course_online.index', $data);
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());

        DB::table('course_onlines')->where('id', $id)->update([
           'video' => $request->video,
            'link' =>$request->link
        ]);

        return redirect()->back()->with('thongbao', 'Sửa khóa học thành công');
    }
}
