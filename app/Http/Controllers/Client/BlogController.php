<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{

    public function index()
    {
        $data['blogs'] = DB::table('blogs')->where('status', 1)->orderByDesc('id')->paginate(5);
        return view('client.pages.blogs.blog', $data);
    }

    public function detail($slug)
    {
        $data['blog'] = DB::table('blogs')->where('slug', $slug)->first();
        $data['blogs'] = DB::table('blogs')->where('status', 1)->orderByDesc('id')->get();

        return view('client.pages.blogs.blog-detai', $data);
    }
}
