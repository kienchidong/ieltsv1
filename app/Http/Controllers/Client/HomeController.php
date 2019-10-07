<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    public function __construct()
    {
//        $data['contact'] = DB::table('contacts')->get();
//        dd($data);
//        view()->share($data);


    }
    public function index()
    {
        $data['blogs'] = DB::table('blogs')->where('status', 1)
            ->orderBy('id', 'DESC')->limit(3)->get();
        $data['homesliders'] = DB::table('images')->where([
            ['location', 1],
            ['status', 1]
            ])->get();
        $data['homebackground'] = DB::table('images')->where('location', 2)->first();
        $data['librarybackground'] = DB::table('images')->where('location', 3)->first();
        $data['commentbackground'] = DB::table('images')->where('location', 4)->first();
        $data['online'] = DB::table('course_onlines')->first();
        $blogs = DB::table('blogs')
            ->select('blogs.name', 'blogs.slug', 'blogs.image', 'blogs.view', 'blogs.folder')
            ->where('status', 1);
        $data['hotpost'] = DB::table('librarys')
            ->select('librarys.name', 'librarys.slug', 'librarys.image', 'librarys.view', 'librarys.folder')
            ->where('status', 1)
            ->union($blogs)
            ->orderBy('view', 'desc')->limit(3)->get();

        return view('client.trangchu', $data);
    }

    public function post($slug){

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        $libraries = DB::table('librarys')
            ->select('librarys.slug', 'cate_librarys.slug as cate_slug')
            ->join('cate_librarys', 'cate_librarys.id', '=', 'librarys.cate_id')
            ->where('librarys.slug', $slug)->first();

        if($blog != null){
            return redirect()->route('client.blogs.detail', $blog->slug);
        } elseif($libraries != null){
            return redirect()->route('client.librarys.detail', [$libraries->cate_slug, $libraries->slug]);
        }

    }

    public function search(Request $request){
        $data['key'] = $request->value;
        $data['blogs'] = DB::table('blogs')
            ->where('status', 1)
            ->orderBy('view', 'desc')
            ->where('name' , 'like', '%'.$request->value.'%')
            ->get();
        $data['searchs'] = DB::table('librarys')
            ->select('librarys.*', 'cate_librarys.slug as cate')
            ->join('cate_librarys', 'librarys.cate_id', '=', 'cate_librarys.id')
            ->where('librarys.status', 1)
            ->orderBy('view', 'desc')
            ->where('librarys.name' , 'like', '%'.$request->value.'%')
            ->get();
          
        $blog = DB::table('blogs')
            ->where('status', 1)
            ->orderBy('view', 'desc')
            ->where('name' , 'like', '%'.$request->value.'%')
            ->count();
        $libraries = DB::table('librarys')
            ->where('status', 1)
            ->orderBy('view', 'desc')
            ->where('name' , 'like', '%'.$request->value.'%')
            ->count();

        if($blog > $libraries){
            $data['background'] = DB::table('images')->where('location', 5)->first();
        }
        else{
            $data['background'] = DB::table('images')->where('location', 3)->first();
        }
        $data['count'] = $blog + $libraries;
        
        return view('client.pages.search.search', $data);
    }

}
