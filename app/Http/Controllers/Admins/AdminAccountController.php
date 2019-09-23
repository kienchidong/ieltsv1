<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminAccountController extends Controller
{
    //
    public function index(){
        if (Gate::allows('admin'))
        {
            $data['roles'] = DB::table('role')->get();
            $data['admins'] =  DB::table('admins')
                ->select('admins.*',DB::raw('if(admins.status = 1, "Hoạt Động", "Khóa") as hienthi'), 'role.name as role')
                ->join('role', 'role.id', '=', 'admins.level')
                ->orderBy('admins.id', 'desc')->get();

//            dd($data);
            return view('admin.pages.admin-account.index', $data);

        }
        abort(403);
    }

    public function create(){
        if (Gate::allows('admin')) {
            $data['roles'] = DB::table('role')->get();

            return view('admin.pages.admin-account.create', $data);
        }
        abort(403);
    }

    public function store(Request $request){

        $request->validate([
            'email' => 'unique:admins,email',
        ],[
            'email.unique' => 'tài khoản email này đã tồn tại',
        ]);
        $role = DB::table('role')->find($request->role);
        //dd($request->all());

        DB::table('admins')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password_confirmation),
            'level' => $request->role
        ]);

        return redirect()->route('admin.account.list')->with('thongbao', 'Tạo tài khoản quản '.$role->name.' thành công');
    }


    public function delete($id){
        if(Gate::allows('admin')) {
            if(Auth::user()->id == $id){
                return redirect()->back()->with('error', 'Bạn không thể xóa tài khoản của chính mình!');
            }
            else{
                DB::table('admins')->where('id', $id)->delete();
                return redirect()->back()->with('thongbao', 'Xóa tài khoản admin thành công!');
            }
        }
        abort(403);
    }


    public function status($id, $status){
        if(Gate::allows('admin')) {
            if(Auth::user()->id == $id){
                return redirect()->back()->with('error', 'Bạn không thể khóa tài khoản của chính mình!');
            }
            else{
                DB::table('admins')->where('id', $id)->update([
                    'status' => $status,
                ]);
                return redirect()->back();
            }
        }
        abort(403);
    }

    public function editrole(Request $request){
        if(Gate::allows('admin')) {
            if(Auth::user()->id == $request->id){
                return redirect()->back()->with('error', 'Bạn không thể Sửa quyền của chính mình!');
            }
            else{
                DB::table('admins')->where('id', $request->id)->update([
                    'level' => $request->role,
                ]);
                return redirect()->back()->with('thongbao', 'Sửa quyền thành công!');
            }
        }
        abort(403);
    }

    public function profile(){
         return view('admin.pages.admin-account.profile');
    }

    public function checkpass(Request $request)
    {
        //dd($request->all());
        $user = DB::table('admins')->find($request->id);
        if (password_verify($request->password, $user->password)) {
        } else {
            echo 'Mật khẩu cũ không đúng!';
        }
    }
    public function editprofile(Request $request){
        //dd($request->all());
        if($request->oldpassword == null){
            DB::table('admins')->where('id',Auth::user()->id)->update([
                'name' => $request->name,
            ]);
            return redirect()->back()->with('thongbao', 'thay đổi thông tin mà không thay dổi mật khẩu thành công!');
        }
        else{
            DB::table('admins')->where('id',Auth::user()->id)->update([
                'name' => $request->name,
                'password' => bcrypt($request->password_confirmation),
            ]);
            return redirect()->back()->with('thongbao', 'thay đổi thông tin thành công!');
        }
    }

}
