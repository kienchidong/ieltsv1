<?php

namespace App\Http\Controllers\Admins;

use App\Model\IntroduceModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class IntroduceController extends Controller
{
    //

    public function index()
    {
        if (Gate::allows('admin'))
        {
            $data['introduces'] = DB::table('introduce')->first();

            return view('admin.pages.introduce.index', $data);
        }
        abort(403);
    }

    public function update(Request $request, $id){
        //dd($request->all());
        $intro = IntroduceModel::find($id);
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = $this->imagename($file->getClientOriginalName());
            $avatar = time() . "_logo_" . $name;
            while (file_exists('images/logo/' . $avatar)) {
                $avatar = time() . "_logo_" . $name;
            }
            $file->move('images/logo/', $avatar);
            if($intro->logo != 'logo.png' && file_exists('images/logo/'.$intro->logo)){
                unlink('images/logo/'.$intro->logo);
            }
            $logo = $avatar;
        }
        else{
            $logo= $intro->logo;
        }
        

           $intro->logo = $logo;
            $intro->address = $request->address;
            $intro->phone = $request->phone;
            $intro->email = $request->email;
            $intro->facebook = $request->facebook;
            $intro->title = $request->title;
            $intro->facebook = $request->facebook;
            $intro->content = $request->content;

            $intro->save();


        return redirect()->back()->with('thongbao', 'Sửa giới Thiệu thành Công!');
    }
}
