<?php

namespace App\Http\Controllers\Admins;

use App\Model\IntroduceModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IntroduceController extends Controller
{
    //

    public function index()
    {
        $data['introduces'] = DB::table('introduce')->first();

        return view('admin.pages.introduce.index', $data);
    }

    public function update(Request $request){
        //dd($request->all());

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = $this->imagename($file->getClientOriginalName());
            $avatar = time() . "_logo_" . $name;
            while (file_exists('images/logo/' . $avatar)) {
                $avatar = time() . "_logo_" . $name;
            }
            $file->move('images/logo/', $avatar);
            $logo = $avatar;
        }
        else{
            $logo= 'no-img.jpg';
        }
        $intro = new IntroduceModel();

           $intro->logo = $logo;
            $intro->address = $request->address;
            $intro->phone = $request->phone;
            $intro->email = $request->email;
            $intro->title = $request->title;
            $intro->content = $request->content;

            $intro->save();


        return redirect()->back()->with('thongbao', 'Sửa giới Thiệu thành Công!');
    }
}
