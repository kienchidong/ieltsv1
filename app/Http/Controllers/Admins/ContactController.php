<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function __construct()
    {
        $data['contact_count'] = DB::table('contacts')->count();
        view()->share($data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['contact'] = DB::table('contacts')->orderByDesc('id')->get();
        return view('admin.pages.contacts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request, [
            'name' => 'min:3',
            'link' => 'required|regex:' . $regex,
        ], [
            'name.min' => 'Tên không được ít hơn 3 kí tự',
            'link.required' => 'Đường dẫn không được để trống',
            'link.regex' => 'Chưa đúng định dạng',
        ]);
        //Kiểm tra định dạng ảnh
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(7) . "_image_" . $name;
            while (file_exists('images/contacts/' . $image)) {
                $image = Str::random(7) . "_image_" . $name;
            }
            $file->move('images/contacts/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo.png';
        }


        DB::table('contacts')->insert([
            'name' => $request->name,
            'icon' => $file_name,
            'link' => $request->link,
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
        $data['contact'] = DB::table('contacts')->find($id);
        return view('admin.pages.contacts.edit', $data);
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
        $image_update = DB::table('contacts')->where('id', '=', $id)->pluck('icon');
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request, [
            'name' => 'min:3',
            'link' => 'required|regex:' . $regex,
        ], [
            'name.min' => 'Tên không được ít hơn 3 kí tự',
            'link.required' => 'Đường dẫn không được để trống',
            'link.regex' => 'Chưa đúng định dạng',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(4) . "_image_" . $name;
            while (file_exists('images/contacts/' . $image)) {
                $image = Str::random(4) . "_image_" . $name;
            }
            $file->move('images/contacts/', $image);
            $file_name = $image;
            if (file_exists('images/contacts/' . $image_update[0]) && $image_update[0] != '') {
                unlink('images/contacts/' . $image_update[0]);
            }

        } else {
            $file_name = DB::table('contacts')->where('id', $id)->pluck('icon')->first();
        }

        DB::table('contacts')->where('id', $id)->update([
            'name' => $request->name,
            'link' => $request->link,
            'icon' => $file_name,
            'updated_at' => now()
        ]);

        return redirect()->route('contact.index')->with('thongbao', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = DB::table('contacts')->where('id', '=', $id)->pluck('icon')->first();

        if (file_exists('images/contacts/' . $image)) {
            unlink('images/contacts/' . $image);
        }
        DB::table('contacts')->where('id', '=', $id)->delete();

        return redirect()->back()->with('thongbao', 'Xóa thành công');
    }

    /*
     * Thực hiện ẩn hay hiện cái slider
     */

    public function setactive($id, $status)
    {
        DB::table('contacts')->where('id', '=', $id)->update([
            'status' => $status,
        ]);
        return redirect()->back()->with('thongbao', 'Thành công');
    }
}
