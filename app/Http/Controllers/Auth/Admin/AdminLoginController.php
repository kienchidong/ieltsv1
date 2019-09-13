<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {

        $this->middleware('guest:admin')->except('logout');
    }

    use AuthenticatesUsers;

    //
    /*đăng nhập cho admin
     * */
    public function index(){
        //dd('hihi');
        return view('admin.login.login');
    }


    /*
     * dăng nhập admin
     * lấy thông tin từ form
     * */
    public function login(Request $request){
        $this->validate($request, array(
            'email' => 'required|email',
            'password' => 'required|min:6'
        ));



        //đăng nhập
        if(Auth::guard('admin')-> attempt(['email' => $request->email, 'password' => $request->password], $request -> remember)){

            //nếu thành công thì chuyển hướng về view dashboard của admin
            return redirect()-> intended(route('admin.index'));

        }
        else {

            //thất bại
            return redirect()->back()->withInput($request->only('email', 'remember'));

        }
    }


    /*
     * đăng xuát
     * */
    public function logout(){
        Auth::guard('admin')-> logout();

        return redirect()->route('admin.login');

    }
}
