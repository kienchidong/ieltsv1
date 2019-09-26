<?php

namespace App\Http\Controllers\Admins;

use App\Model\InformationModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    //

    public function information(Request $request){

        if (isset($request->phone) && isset($request->email)){
            $message='';

            if(isset($request->message)){
                $message = $request->message;
            }
            $count = InformationModel::where([
                ['phone', $request->phone],
                ['email', $request->email]
            ])->count();
            if($count==1){
                if($message=='') {
                    return redirect()->back()->with('error', 'Số điện thoại và email này đã từng đăng ký trước đây!');
                }else{
                    DB::table('informations')->where([
                        ['phone', $request->phone],
                        ['email', $request->email]
                    ])->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'message' => $message
                    ]);
                    $mess='Cập nhật tin nhắn thành công';
                }
            }
            else{
                $request->validate([
                    'email' => 'unique:informations,email',
                ],[
                    'email.unique' => 'tài khoản email này đã tồn tại',
                ]);
               DB::table('informations')->where('phone', $request->phone)->update([
                  'name' => $request->name,
                  'email' => $request->email,
                  'message' => $message
               ]);
               $mess = 'cập nhật thành công thông tin của số điện thoại: '.$request->phone;
            }
        }
        elseif(isset($request->phone)) {

            DB::table('informations')->insert([
                'phone' => $request->phone,
            ]);
            $mess = 'Bạn đã đăng ký số điện thoại thành công! chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!';
        }


        return redirect()->back()->with('thongbao', $mess);
    }
}
