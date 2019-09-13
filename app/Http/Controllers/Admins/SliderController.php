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
        return view('admin.pages.sliders.index',$data);
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
     * @param  \Illuminate\Http\Request  $request
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
            $image = Str::random(7). "_image_" . $name;
            while (file_exists('images/sliders/' . $image)) {
                $image = Str::random(7) . "_image_" . $name;
            }
            $file->move('images/sliders/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo.png';
        }


        DB::table('sliders')->insert([
            'title'=>$request->title,
            'image'=>$file_name,
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /*
     * Thực hiện ẩn hay hiện cái slider
     */
    public function setactive($id, $status)
    {
        DB::table('sliders')->where('id', '=', $id)->update([
            'status' => $status,
        ]);
        return redirect()->back()->with('thanhcong', 'Thành công');
    }

}
