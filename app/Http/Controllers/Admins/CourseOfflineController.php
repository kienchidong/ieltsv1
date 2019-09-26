<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class CourseOfflineController extends Controller
{
    public function __construct()
    {
        $data['course_offline_count'] = DB::table('course_offlines')->count();
        $data['course_enrolling_count'] = DB::table('course_enrolling')->count();

        view()->share($data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin'))
        {
            $data['course_offlines'] = DB::table('course_offlines')->orderByDesc('id')->get();
            return view('admin.pages.course_offlines.index', $data);
        }abort(403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.course_offlines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:5',
            'contentt' => 'required|min:100',

        ], [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên không được ít hơn 15 kí tự',
            'contentt.required' => 'Nội dung không được để trống',
            'contentt.min' => 'Nội dung không được ít hơn 100 kí tự',

        ]);

        //Kiểm tra định dạng ảnh

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(7) . "_image_" . $name;
            while (file_exists('images/course_offlines/' . $image)) {
                $image = Str::random(7) . "_image_" . $name;
            }
            $file->move('images/course_offlines/', $image);
            $file_name = $image;


        } else {
            $file_name = 'logo.png';
        }

        DB::table('course_offlines')->insert([
            'name' => $request->name,
            'slug' => Str::slug($request->name."-".time()),
            'image' => $file_name,
            'content'=>$request->contentt,
            'status' => 1,
            'created_at' => now()
        ]);

        return redirect()->back()->with('thongbao', 'Thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['course_offline'] = DB::table('course_offlines')->find($id);
        return view('admin.pages.course_offlines.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_update = DB::table('course_offlines')->where('id', '=', $id)->pluck('image');

        $this->validate($request, [
            'name' => 'required|min:5',
            'contentt' => 'required|min:100',

        ], [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên không được ít hơn 15 kí tự',
            'contentt.required' => 'Nội dung không được để trống',
            'contentt.min' => 'Nội dung không được ít hơn 100 kí tự',

        ]);
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(4) . "_image_" . $name;
            while (file_exists('images/course_offlines/' . $image)) {
                $image = Str::random(4) . "_image_" . $name;
            }
            $file->move('images/course_offlines/', $image);
            $file_name = $image;
            if (file_exists('images/course_offlines/' . $image_update[0]) && $image_update[0] != '') {
                unlink('images/course_offlines/' . $image_update[0]);
            }

        } else {
            $file_name = DB::table('course_offlines')->where('id', $id)->pluck('image')->first();
        }

        DB::table('course_offlines')->where('id', $id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name."-".time()),
            'image' => $file_name,
            'content'=>$request->contentt,
            'status' => 1,
            'created_at' => now()
        ]);


        return redirect()->route('course_offline.index')->with('thongbao', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = DB::table('course_offlines')->where('id', '=', $id)->pluck('image')->first();
        if ($image == "logo.png")
        {
            DB::table('course_offlines')->where('id', '=', $id)->delete();
            return redirect()->back()->with('thongbao', 'Xóa thành công');
        }
        if (file_exists('images/course_offlines/' . $image)) {
            unlink('images/course_offlines/' . $image);
        }
        DB::table('course_offlines')->where('id', '=', $id)->delete();

        return redirect()->back()->with('thongbao', 'Xóa thành công');
    }
    /*
     * Thực hiện ẩn khóa học ofline
     */

    public function setactive($id, $status)
    {
        DB::table('course_offlines')->where('id', '=', $id)->update([
            'status' => $status,
        ]);
        return redirect()->back()->with('thongbao', 'Thành công');
    }


    //Khóa học đang tuyển
    public function index1()
    {
        $data['course_enrolling'] = DB::table('course_enrolling')->orderByDesc('id')->get();
        return view('admin.pages.course_enrolling.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create1()
    {
        return view('admin.pages.course_enrolling.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:5|max:25',


        ], [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên không được ít hơn 15 kí tự',


        ]);

        //Kiểm tra định dạng ảnh

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(7) . "_image_" . $name;
            while (file_exists('images/course_enrolling/' . $image)) {
                $image = Str::random(7) . "_image_" . $name;
            }
            $file->move('images/course_enrolling/', $image);
            $file_name = $image;


        } else {
            $file_name = 'logo.png';
        }

        DB::table('course_enrolling')->insert([
            'name' => $request->name,
            'image' => $file_name,
            'status' => 1,
            'created_at' => now()
        ]);

        return redirect()->back()->with('thongbao', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show1($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit1($id)
    {
        $data['course_enrolling'] = DB::table('course_enrolling')->find($id);
        return view('admin.pages.course_enrolling.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update1(Request $request, $id)
    {
        $image_update = DB::table('course_enrolling')->where('id', '=', $id)->pluck('image');

        $this->validate($request, [
            'name' => 'required|min:5|max:25',


        ], [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên không được ít hơn 15 kí tự',

        ]);
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(4) . "_image_" . $name;
            while (file_exists('images/course_enrolling/' . $image)) {
                $image = Str::random(4) . "_image_" . $name;
            }
            $file->move('images/course_enrolling/', $image);
            $file_name = $image;
            if (file_exists('images/course_enrolling/' . $image_update[0]) && $image_update[0] != '' && $image_update[0] != 'logo.png') {
                unlink('images/course_enrolling/' . $image_update[0]);
            }

        } else {
            $file_name = DB::table('course_enrolling')->where('id', $id)->pluck('image')->first();
        }

        DB::table('course_enrolling')->where('id', $id)->update([
            'name' => $request->name,
            'image' => $file_name,
            'status' => 1,
            'created_at' => now()
        ]);


        return redirect()->route('course_enrolling.index')->with('thongbao', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy1($id)
    {
        $image = DB::table('course_enrolling')->where('id', '=', $id)->pluck('image')->first();
        if ($image == "logo.png")
        {
            DB::table('course_enrolling')->where('id', '=', $id)->delete();
            return redirect()->back()->with('thongbao', 'Xóa thành công');
        }
        if (file_exists('images/course_enrolling/' . $image)) {
            unlink('images/course_enrolling/' . $image);
        }
        DB::table('course_enrolling')->where('id', '=', $id)->delete();

        return redirect()->back()->with('thongbao', 'Xóa thành công');
    }
    /*
     * Thực hiện ẩn khóa học ofline
     */

    public function setactive1($id, $status)
    {
        DB::table('course_enrolling')->where('id', '=', $id)->update([
            'status' => $status,
        ]);
        return redirect()->back()->with('thongbao', 'Thành công');
    }
}
