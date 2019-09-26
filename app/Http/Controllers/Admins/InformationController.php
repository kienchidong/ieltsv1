<?php

namespace App\Http\Controllers\Admins;

use App\Model\InformationModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    //

    public function index(){
        $data['informations'] = DB::table('informations')->orderBy('id','desc')->where('status', 0)->get();

        return view('admin.pages.informations.index', $data);
    }

    public function information(Request $request){
        $name=null; $email=null; $message=null;
        if(isset($request->name)){
                    $name = $request->name;
            }
        if(isset($request->email)){
            $request->validate([
                'email' => 'unique:informations,email',
            ],[
                'email.unique' => 'tài khoản email này đã tồn tại',
            ]);
                    $email = $request->email;
            }
        if(isset($request->message)){
                $message = $request->message;
            }

        $count = DB::table('informations')->where([
            ['phone', $request->phone],
            ['email', $email]
        ])->count();
        $count_phone = DB::table('informations')->where('phone', $request->phone)->count();
        if($count == 0 && $count_phone == 0){
            $request->validate([
                'phone' => 'unique:informations,phone',
            ],[
                'phone.unique' => 'Số điện thoại đã từng đăng ký trước đây!',
            ]);
            DB::table('informations')->insert([
                'name' => $name,
                'phone' => $request->phone,
                'email' => $email,
                'message' => $message
            ]);
            $mess = 'Bạn đã đăng ký thành công! chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!';
        }
        
        elseif($count == 0 && $count_phone==1 && $email == null){
            DB::table('informations')->where('phone', $request->phone)->update([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $message
            ]);
            $mess = 'Cập nhật thành công thông tin của số điện thoại: '.$request->phone;
        }
        elseif($count == 1 && $email != null){
            DB::table('informations')->where([
                ['phone', $request->phone],
                ['email', $email]
            ])->update([
                'name' => $request->name,
                'message' => $message
            ]);
            $mess = 'cập kiên nhật thành công thông tin của số điện thoại: '.$request->phone;
        }
        elseif($count_phone == 1){
            return redirect()->back()->with('error', 'Số điện thoại và email này đã từng đăng ký trước đây!');

        }
        return redirect()->back()->with('thongbao', $mess);
    }
}
