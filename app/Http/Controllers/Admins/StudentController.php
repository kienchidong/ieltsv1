<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function __construct()
    {
//        $data['cate_student_count'] = DB::table('cate_student')->count();

        $data['student_count'] = DB::table('student')->count();

        view()->share($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $data['student'] = DB::table('student')
//            ->select('student.*', 'cate_student.name as cate_student')
//            ->join('cate_student', 'student.cate_id', '=', 'cate_student.id')
//            ->orderByDesc('id')->get();
        $data['students'] = DB::table('student')->orderByDesc('id')->get();
        return view('admin.pages.student.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $data['cate_student'] = DB::table('cate_student')->orderByDesc('id')->get();
        return view('admin.pages.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:10',
            'course' => 'required|max:15',
            'contenttt' => 'required|max:100',
        ], [
            'name.min' => 'Tên không được ít hơn 10 kí tự',

        ]);
        //Kiểm tra định dạng ảnh
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(7) . "_image_" . $name;
            while (file_exists('images/student/' . $image)) {
                $image = Str::random(7) . "_image_" . $name;
            }
            $file->move('images/student/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo.png';
        }


        DB::table('student')->insert([
            'name' => $request->name,
            'image' => $file_name,
            'course' => $request->course,
            'content' => $request->contenttt,
            'status' => 1,
            'created_at' => now()
        ]);

        return redirect()->back()->with('thongbao', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $data['cate_student'] = DB::table('cate_student')->orderByDesc('id')->get();
//        $data['student'] = DB::table('student')
//            ->select('student.*', 'cate_student.name as cate_name','cate_student.id as cate_idd' )
//            ->join('cate_student','student.cate_id','=','cate_student.id')->where('student.id',$id)->first();
        $data['student'] = DB::table('student')->where('id', $id)->first();

        return view('admin.pages.student.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $image_update = DB::table('student')->where('id', '=', $id)->pluck('image');

        $this->validate($request, [
            'name' => 'required|min:10',
            'course' => 'required|max:15',
            'contenttt' => 'required|max:100',
        ], [
            'name.min' => 'Tên không được ít hơn 10 kí tự',

        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(4) . "_image_" . $name;
            while (file_exists('images/student/' . $image)) {
                $image = Str::random(4) . "_image_" . $name;
            }
            $file->move('images/student/', $image);
            $file_name = $image;
            if (file_exists('images/student/' . $image_update[0]) && $image_update[0] != '' && $image_update[0] != 'logo.png') {
                unlink('images/student/' . $image_update[0]);
            }

        } else {
            $file_name = DB::table('student')->where('id', $id)->pluck('image')->first();
        }

        DB::table('student')->where('id', $id)->update([
            'name' => $request->name,
            'image' => $file_name,
            'course' => $request->course,
            'content' => $request->contenttt,
            'status' => 1,
            'created_at' => now()
        ]);

        return redirect()->route('student.index')->with('thongbao', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = DB::table('student')->where('id', '=', $id)->pluck('image')->first();
        if ($image == "logo.png") {
            DB::table('student')->where('id', '=', $id)->delete();
            return redirect()->back()->with('thongbao', 'Xóa thành công');
        }
        if (file_exists('images/student/' . $image)) {
            unlink('images/student/' . $image);
        }
        DB::table('student')->where('id', '=', $id)->delete();

        return redirect()->back()->with('thongbao', 'Xóa thành công');
    }

    /*
     * Thực hiện ẩn hay hiện cái slider
     */

    public function setactive($id, $status)
    {
        DB::table('student')->where('id', '=', $id)->update([
            'status' => $status,
        ]);
        return redirect()->back()->with('thanhcong', 'Thành công');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function cate_create()
//    {
//        $data['cate_student'] = DB::table('cate_student')->orderByDesc('id')->get();
//        return view('admin.pages.student.cate_create', $data);
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
//    public function cate_store(Request $request)
//    {
//        $this->validate($request, [
//            'name' => 'min:5',
//        ], [
//            'name.min' => 'Tên không được ít hơn 10 kí tự',
//        ]);
//
//
//        DB::table('cate_student')->insert([
//            'name' => $request->name,
//            'slug' => Str::slug($request->name),
//            'status' => 1,
//            'created_at' => now()
//        ]);
//
//        return redirect()->back()->with('thongbao', 'Thành công');
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
//    public function cate_destroy($id)
//    {
//        DB::table('cate_student')->where('id', '=', $id)->delete();
//
//        return redirect()->back()->with('thongbao', 'Xóa thành công');
//    }

    /*
     * Thực hiện ẩn hay hiện cái slider
     */

//    public function cate_setactive($id, $status)
//    {
//        DB::table('cate_student')->where('id', '=', $id)->update([
//            'status' => $status,
//        ]);
//        return redirect()->back()->with('thongbao', 'Thành công');
//    }

}
