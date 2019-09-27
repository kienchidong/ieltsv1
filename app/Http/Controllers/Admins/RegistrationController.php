<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class RegistrationController extends Controller
{
    //
    public function index()
    {
        if (Gate::allows('admin'))
        {
        $data['registration'] = DB::table('registration')->first();

        return view('admin.pages.registration.index', $data);
        }
        abort(403);
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request, [
//            'name' => 'min:3',
            'link' => 'required|regex:' . $regex,
        ], [
//            'name.min' => 'Tên không được ít hơn 3 kí tự',
            'link.required' => 'Đường dẫn không được để trống',
            'link.regex' => 'Chưa đúng định dạng',
        ]);

        DB::table('registration')->where('id', $id)->update([

            'link' =>$request->link,
        ]);

        return redirect()->back()->with('thongbao', 'Sửa khóa học thành công');
    }
}
