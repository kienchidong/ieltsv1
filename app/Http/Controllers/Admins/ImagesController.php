<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ImagesController extends Controller
{
    // home slider
    public function homeslider(){
        if (Gate::allows('admin'))
        {
            $data['images'] = DB::table('images')
            ->select('images.*',DB::raw('if(images.status = 1, "Hiện", "Ẩn") as hienthi'))
            ->where('location', 1)->get();
            return view('admin.pages.images.homeslider', $data);
        }
        abort(403);
       
    }

    // home background
    public function homebackground(){
        if (Gate::allows('admin'))
        {
            $data['title'] = 'Hình nền của Trang chủ';
            $data['images'] = DB::table('images')->where('location', 2)->first();
            return view('admin.pages.images.background', $data);
        }
        abort(403);
    }

    // library background
    public function librarybackground(){
        if (Gate::allows('admin'))
        {
            $data['title'] = 'Hình nền của Thư Viện';
            $data['images'] = DB::table('images')->where('location', 3)->first();
            return view('admin.pages.images.background', $data);

        }
        abort(403);
    }

    //library slider
    public function librarysilder(){
        if (Gate::allows('admin'))
        {
            $data['images'] = DB::table('images')
            ->select('images.*',DB::raw('if(images.status = 1, "Hiện", "Ẩn") as hienthi'))
            ->where('location', 4)->get();
            return view('admin.pages.images.libraryslider', $data);

        }
        abort(403);
    }

    public function store(Request $request){
        //dd($request->all());

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $this->imagename($file->getClientOriginalName());
            $avatar = time() . "_image_" . $name;
            while (file_exists('images/sliders/' . $avatar)) {
                $avatar = time() . "_image_" . $name;
            }
            $file->move('images/sliders/', $avatar);
            // if($intro->logo != 'logo.png' && file_exists('images/sliders/'.$intro->logo)){
            //     unlink('images/sliders/'.$intro->logo);
            // }
            $image = $avatar;
        }
        else{
            $image= 'default.jpg';
        }

        DB::table('images')->insert([
            'image' => $image,
            'title' => $request->title,
            'location' =>$request->location
        ]);

        return redirect()->back()->with('thongbao', 'Thêm ảnh thành Công!');
    }

    public function update(Request $request)
    {
        $old = DB::table('images')->find($request->id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $this->imagename($file->getClientOriginalName());
            $avatar = time() . "_image_" . $name;
            while (file_exists('images/sliders/' . $avatar)) {
                $avatar = time() . "_image_" . $name;
            }
            $file->move('images/sliders/', $avatar);
            if($old->image != 'default.jpg' && file_exists('images/sliders/'.$old->image)){
                unlink('images/sliders/'.$old->image);
            }
            $image = $avatar;
        }
        else{
            $image= $old->image;
        }

        DB::table('images')->where('id',$request->id)->update([
            'image' => $image,
            'title' => $request->title,
        ]);

        return redirect()->back()->with('thongbao', 'Sửa ảnh thành Công!');
    }
    public function delete($id)
    {
        $old = DB::table('images')->find($id);
        if($old->image != 'default.jpg' && file_exists('images/sliders/'.$old->image)){
            unlink('images/sliders/'.$old->image);
        }
        DB::table('images')->where('id', $id)->delete();
        return redirect()->back()->with('thongbao', 'Xóa ảnh thành công!');
    }

    public function status($id, $status)
    {
        DB::table('images')->where('id', $id)->update([
            'status' => $status,
        ]);
        return redirect()->back();
    }
    
}
