<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $NV_MA = Session::get('NV_MA');
        if($NV_MA){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index(){
    	return view('admin-login');
    }
    
    public function show_dashboard(){
        $this->AuthLogin();
        $users = DB::table('khach_hang')->count();
        Session::put('SO_NGUOI_DUNG',$users);
    	return view('admin.dashboard');
    }

    public function dashboard(Request $request){
    	$admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = DB::table('nhanvien')->where('NV_EMAIL', $admin_email)->where('NV_MATKHAU', $admin_password)->first();
        /*echo '<pre>';
        print_r ($result);
        echo '</pre>';
        return view('admin.dashboard'); */
         if($result){
          /* $login_count = $login->count();
            if($login_count>0){
                Session::put('admin_name',$login->admin_name);
                Session::put('admin_id',$login->admin_id);
                return Redirect::to('/dashboard');
            }*/
            Session::put('NV_HOTEN',$result->NV_HOTEN);
            Session::put('NV_MA',$result->NV_MA);
            Session::put('NV_ANHDAIDIEN',$result->NV_ANHDAIDIEN);
            return Redirect::to('/dashboard');
        }else{
                Session::put('message','Mật khẩu hoặc tài khoản sai. Vui lòng nhập lại!');
                return Redirect::to('/admin');
        }
    }

    public function logout(Request $request){
        $this->AuthLogin();
        Session::put('NV_HOTEN',null);
        Session::put('NV_MA',null);
        Session::put('NV_ANHDAIDIEN',null);
        return Redirect::to('/admin');
    }
}
