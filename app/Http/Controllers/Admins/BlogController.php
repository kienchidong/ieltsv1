<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $data['cate_blog_count'] = DB::table('cate_blogs')->count();
        $data['blog_count'] = DB::table('blogs')->count();

        view()->share($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['blogs'] = DB::table('blogs')
            ->select('blogs.*','cate_blogs.name as cate_blog')
            ->join('cate_blogs','blogs.cate_id','=','cate_blogs.id')
            ->orderByDesc('id')->get();

        return view('admin.pages.blogs.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cate_blogs'] = DB::table('cate_blogs')->orderByDesc('id')->get();
        return view('admin.pages.blogs.create',$data);
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
            'contentt' => 'required|min:100',
        ], [
            'name.min' => 'Tên không được ít hơn 10 kí tự',
            'contentt.min' => 'Tên không được ít hơn 100 kí tự',
            'name.required'=> 'Tên bài viết không được để trống',
            'contentt.required'=> 'Nội dung bài viết không được để trống',
        ]);
        //Kiểm tra định dạng ảnh
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(7) . "_image_" . $name;
            while (file_exists('images/blogs/' . $image)) {
                $image = Str::random(7) . "_image_" . $name;
            }
            $file->move('images/blogs/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo.png';
        }


        DB::table('blogs')->insert([
            'name' => $request->name,
            'slug' => Str::slug($request->name."-".time()),
            'image' => $file_name,
            'content' => $request->contentt,
            'cate_id' => $request->cate_id,
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
        $data['cate_blogs'] = DB::table('cate_blogs')->orderByDesc('id')->get();
        $data['blog'] = DB::table('blogs')->find($id);
        return view('admin.pages.blogs.edit', $data);
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

        $image_update = DB::table('blogs')->where('id', '=', $id)->pluck('image');

        $this->validate($request, [
            'name' => 'required|min:10',
            'contentt' => 'required|min:100',
        ], [
            'name.min' => 'Tên không được ít hơn 10 kí tự',
            'contentt.min' => 'Tên không được ít hơn 100 kí tự',
            'name.required'=> 'Tên bài viết không được để trống',
            'contentt.required'=> 'Nội dung bài viết không được để trống',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = Str::random(4) . "_image_" . $name;
            while (file_exists('images/blogs/' . $image)) {
                $image = Str::random(4) . "_image_" . $name;
            }
            $file->move('images/blogs/', $image);
            $file_name = $image;
            if (file_exists('images/blogs/' . $image_update[0]) && $image_update[0] != '') {
                unlink('images/blogs/' . $image_update[0]);
            }

        } else {
            $file_name = DB::table('blogs')->where('id', $id)->pluck('image')->first();
        }

        DB::table('blogs')->where('id', $id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name."-".time()),
            'image' => $file_name,
            'content' => $request->contentt,
            'cate_id' => $request->cate_id,
            'status' => 1,
            'created_at' => now()
        ]);

        return redirect()->route('blog.index')->with('thongbao', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = DB::table('blogs')->where('id', '=', $id)->pluck('image')->first();
        if ($image == "logo.png")
        {
            DB::table('blogs')->where('id', '=', $id)->delete();
            return redirect()->back()->with('thongbao', 'Xóa thành công');
        }
        if (file_exists('images/blogs/' . $image)) {
            unlink('images/blogs/' . $image);
        }
        DB::table('blogs')->where('id', '=', $id)->delete();

        return redirect()->back()->with('thongbao', 'Xóa thành công');
    }

    /*
     * Thực hiện ẩn hay hiện cái slider
     */

    public function setactive($id, $status)
    {
        DB::table('blogs')->where('id', '=', $id)->update([
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
        $data['cate_blogs'] = DB::table('cate_blogs')->orderByDesc('id')->get();
        return view('admin.pages.blogs.cate_create', $data);
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


        DB::table('cate_blogs')->insert([
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
        DB::table('cate_blogs')->where('id', '=', $id)->delete();

        return redirect()->back()->with('thongbao', 'Xóa thành công');
    }

    /*
     * Thực hiện ẩn hay hiện cái slider
     */

    public function cate_setactive($id, $status)
    {
        DB::table('cate_blogs')->where('id', '=', $id)->update([
            'status' => $status,
        ]);
        return redirect()->back()->with('thongbao', 'Thành công');
    }

}
