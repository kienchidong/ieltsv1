<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function __construct()
    {
        $data['teacher_count'] = DB::table('teachers')->count();
        view()->share($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['teachers'] = DB::table('teachers')->orderByDesc('id')->get();
        return view('admin.pages.teachers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.teachers.create');
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
            'name' => 'min:3',

        ], [
            'name.min' => 'Tên không được ít hơn 3 kí tự',
        ]);
        //Kiểm tra định dạng ảnh
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(7) . "_image_" . $name;
            while (file_exists('images/teachers/' . $image)) {
                $image = Str::random(7) . "_image_" . $name;
            }
            $file->move('images/teachers/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo.png';
        }


        DB::table('teachers')->insert([
            'name' => $request->name,
            'position' => $request->position,
            'content' =>$request->contenttt,
            'image' => $file_name,
            'status' => 1,
            'created_at' => now()
        ]);

        return redirect()->back()->with('thongbao', 'Thành công');
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
        $data['teacher'] = DB::table('teachers')->find($id);
        return view('admin.pages.teachers.edit', $data);
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
        $image_update = DB::table('teachers')->where('id', '=', $id)->pluck('image');

        $this->validate($request, [
            'name' => 'min:3',
        ], [
            'name.min' => 'Tên không được ít hơn 3 kí tự',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(4) . "_image_" . $name;
            while (file_exists('images/teachers/' . $image)) {
                $image = Str::random(4) . "_image_" . $name;
            }
            $file->move('images/teachers/', $image);
            $file_name = $image;
            if (file_exists('images/teachers/' . $image_update[0]) && $image_update[0] != '' && $image_update[0] != 'logo.png') {
                unlink('images/teachers/' . $image_update[0]);
            }

        } else {
            $file_name = DB::table('teachers')->where('id', $id)->pluck('image')->first();
        }

        DB::table('teachers')->where('id', $id)->update([
            'name' => $request->name,
            'position' => $request->position,
            'content' =>$request->contenttt,
            'image' => $file_name,
            'status' => 1,
            'created_at' => now()
        ]);

        return redirect()->route('teacher.index')->with('thongbao', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = DB::table('teachers')->where('id', '=', $id)->pluck('image')->first();
        if ($image == "logo.png")
        {
            DB::table('teachers')->where('id', '=', $id)->delete();
            return redirect()->back()->with('thongbao', 'Xóa thành công');
        }
        if (file_exists('images/teachers/' . $image)) {
            unlink('images/teachers/' . $image);
        }
        DB::table('teachers')->where('id', '=', $id)->delete();

        return redirect()->back()->with('thongbao', 'Xóa thành công');
    }

    /*
     * Thực hiện ẩn hay hiện cái teacher
     */

    public function setactive($id, $status)
    {
        DB::table('teachers')->where('id', '=', $id)->update([
            'status' => $status,
        ]);
        return redirect()->back()->with('thongbao', 'Thành công');
    }
}
