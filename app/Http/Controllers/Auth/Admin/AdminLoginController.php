<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $role = DB::table('role')
        ->select('role.name')
        ->join('admins', 'admins.level', '=', 'role.id')
        ->where('admins.email', $request->email)
        ->first();

        //đăng nhập
        if(Auth::guard('admin')-> attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request -> remember)){
           
            //nếu thành công thì chuyển hướng về view dashboard của admin
            return redirect()->route('admin.index')->with('thongbao', 'Đăng nhập thành công với quyền '.$role->name);

        }
        else {

            //thất bại
            return redirect()->back()->with('error', 'đăng nhập thất bại');

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
