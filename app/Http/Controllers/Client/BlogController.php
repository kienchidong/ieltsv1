<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    // public function loaitintuc($slug)
    public function loaitintuc($slug)
    {

        $cate_id = DB::table('cate_news')->where('slug', $slug)->pluck('id')->first();
        $data['cate_name'] = DB::table('cate_news')->where('slug', $slug)->first();
        $data['news'] = DB::table('news')->where('cate_id', $cate_id)->paginate(5);
        return view('page.tintuc', $data);
    }

    public function chitiettintuc($cate, $slug)
    {
        $news_id = DB::table('news')->where('slug', $slug)->pluck('id');
        $cate_id = DB::table('cate_news')->where('slug', $cate)->pluck('id')->first();
        $data['news'] = DB::table('news')->where('cate_id', $cate_id)->first();
        $data['news_tags'] = DB::table('news_tags')->where('news_id', '=', $news_id)->get();
        return view('page.tintucchitiet', $data);
    }
}
