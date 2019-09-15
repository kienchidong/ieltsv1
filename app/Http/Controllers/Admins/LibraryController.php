<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LibraryController extends Controller
{
    public function __construct()
    {
        $data['cate_library_count'] = DB::table('cate_librarys')->count();
        $data['library_count'] = DB::table('librarys')->count();

        view()->share($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['librarys'] = DB::table('librarys')
            ->select('librarys.*','cate_librarys.name as cate_library')
            ->join('cate_librarys','librarys.cate_id','=','cate_librarys.id')
            ->orderByDesc('id')->get();

        return view('admin.pages.librarys.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cate_librarys'] = DB::table('cate_librarys')->orderByDesc('id')->get();
        return view('admin.pages.librarys.create',$data);
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
            'title' => 'min:3',
        ], [
            'title.min' => 'Tên không được ít hơn 3 kí tự',
        ]);
        //Kiểm tra định dạng ảnh
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(7) . "_image_" . $name;
            while (file_exists('images/librarys/' . $image)) {
                $image = Str::random(7) . "_image_" . $name;
            }
            $file->move('images/librarys/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo.png';
        }


        DB::table('librarys')->insert([
            'title' => $request->title,
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
        $data['slider'] = DB::table('librarys')->find($id);
        return view('admin.pages.librarys.edit', $data);
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
        $image_update = DB::table('librarys')->where('id', '=', $id)->pluck('image');

        $this->validate($request, [
            'title' => 'min:3',
        ], [
            'title.min' => 'Tên không được ít hơn 3 kí tự',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(4) . "_image_" . $name;
            while (file_exists('images/librarys/' . $image)) {
                $image = Str::random(4) . "_image_" . $name;
            }
            $file->move('images/librarys/', $image);
            $file_name = $image;
            if (file_exists('images/librarys/' . $image_update[0]) && $image_update[0] != '') {
                unlink('images/librarys/' . $image_update[0]);
            }

        } else {
            $file_name = DB::table('librarys')->where('id', $id)->pluck('image')->first();
        }

        DB::table('librarys')->where('id', $id)->update([
            'title' => $request->title,
            'image' => $file_name,
            'updated_at' => now()
        ]);

        return redirect()->route('slider.index')->with('thongbao', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = DB::table('librarys')->where('id', '=', $id)->pluck('image')->first();

        if (file_exists('images/librarys/' . $image)) {
            unlink('images/librarys/' . $image);
        }
        DB::table('librarys')->where('id', '=', $id)->delete();

        return redirect()->back()->with('thongbao', 'Xóa thành công');
    }

    /*
     * Thực hiện ẩn hay hiện cái slider
     */

    public function setactive($id, $status)
    {
        DB::table('librarys')->where('id', '=', $id)->update([
            'status' => $status,
        ]);
        return redirect()->back()->with('thanhcong', 'Thành công');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cate_create()
    {
        $data['cate_librarys'] = DB::table('cate_librarys')->orderByDesc('id')->get();
        return view('admin.pages.librarys.cate_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function cate_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'min:5',
        ], [
            'name.min' => 'Tên không được ít hơn 10 kí tự',
        ]);


        DB::table('cate_librarys')->insert([
            'name' => $request->name,
            'slug' => Str::slug($request->name . "-" . time()),
            'status' => 1,
            'created_at' => now()
        ]);

        return redirect()->back()->with('thongbao', 'Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function cate_destroy($id)
    {
        DB::table('cate_librarys')->where('id', '=', $id)->delete();

        return redirect()->back()->with('thongbao', 'Xóa thành công');
    }

    /*
     * Thực hiện ẩn hay hiện cái slider
     */

    public function cate_setactive($id, $status)
    {
        DB::table('cate_librarys')->where('id', '=', $id)->update([
            'status' => $status,
        ]);
        return redirect()->back()->with('thongbao', 'Thành công');
    }


}
