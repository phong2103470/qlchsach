<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;
session_start();

class OrderController extends Controller
{
    public function AuthLogin(){
        $NV_MA = Session::get('NV_MA');
        if($NV_MA){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function update_status_order($DDH_MA){
        $this->AuthLogin();
        $NV_MA_get = Session::get('NV_MA');
        $this->AuthLogin();
        $trangthai = DB::table('TRANG_THAI')->get(); 
        $edit_order = DB::table('chi_tiet_trang_thai')->where('DDH_MA',$DDH_MA)->get();
        Session::put('NV_MA_get',$NV_MA_get);
        $manager_order = view('admin.dashboard.update_status_order')->with('edit_order', $edit_order)->with('trangthai',$trangthai);
        return view('admin-layout')->with('admin.dashboard.update_status_order', $manager_order);
    }
}
