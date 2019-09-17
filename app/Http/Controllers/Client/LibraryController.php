<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    // public function loaitintuc($slug)
    public function loaithuvien($slug)
    {
        $cate_id = DB::table('cate_librarys')->where('slug', $slug)->pluck('id')->first();
        $data['cate_name'] = DB::table('cate_librarys')->where('slug', $slug)->first();
        $data['library'] = DB::table('librarys')->where('cate_id', $cate_id )
            ->where('status',1)->paginate(5);
        return view('client.library', $data);
    }

    public function chitietthuvien($cate, $slug)
    {
        $data['librarys'] = DB::table('librarys')
            ->select('librarys.*')
            ->join('cate_librarys','librarys.cate_id','=','cate_librarys.id')
            ->where('cate_librarys.slug','=',$cate)
            ->where('librarys.status','=',1)
            ->orderByDesc('librarys.id')
            ->limit(6)->get();

        $data['library'] = DB::table('librarys')->where('slug', $slug)->first();

        return view('client.library-detail', $data);
    }
}
