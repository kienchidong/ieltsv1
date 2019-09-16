<?php

namespace App\Http\Controllers\Admins;

use CKSource\CKFinder\Filesystem\File\File;
use function GuzzleHttp\Psr7\str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /*
     * View Share
     */
    public function __construct()
    {
        $data['slider_count'] = DB::table('sliders')->count();
        view()->share($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sliders'] = DB::table('sliders')->orderByDesc('id')->get();
        return view('admin.pages.sliders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.sliders.create');
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
            while (file_exists('images/sliders/' . $image)) {
                $image = Str::random(7) . "_image_" . $name;
            }
            $file->move('images/sliders/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo.png';
        }


        DB::table('sliders')->insert([
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
        $data['slider'] = DB::table('sliders')->find($id);
        return view('admin.pages.sliders.edit', $data);
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
        $image_update = DB::table('sliders')->where('id', '=', $id)->pluck('image');

        $this->validate($request, [
            'title' => 'min:3',
        ], [
            'title.min' => 'Tên không được ít hơn 3 kí tự',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(4) . "_image_" . $name;
            while (file_exists('images/sliders/' . $image)) {
                $image = Str::random(4) . "_image_" . $name;
            }
            $file->move('images/sliders/', $image);
            $file_name = $image;
            if (file_exists('images/sliders/' . $image_update[0]) && $image_update[0] != '') {
                unlink('images/sliders/' . $image_update[0]);
            }

        } else {
            $file_name = DB::table('sliders')->where('id', $id)->pluck('image')->first();
        }

        DB::table('sliders')->where('id', $id)->update([
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
        $image = DB::table('sliders')->where('id', '=', $id)->pluck('image')->first();
        if ($image == "logo.png")
        {
            DB::table('sliders')->where('id', '=', $id)->delete();
            return redirect()->back()->with('thongbao', 'Xóa thành công');
        }
        if (file_exists('images/sliders/' . $image)) {
            unlink('images/sliders/' . $image);
        }
        DB::table('sliders')->where('id', '=', $id)->delete();

        return redirect()->back()->with('thongbao', 'Xóa thành công');
    }

    /*
     * Thực hiện ẩn hay hiện cái slider
     */

    public function setactive($id, $status)
    {
        DB::table('sliders')->where('id', '=', $id)->update([
            'status' => $status,
        ]);
        return redirect()->back()->with('thongbao', 'Thành công');
    }

}
