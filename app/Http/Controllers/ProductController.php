<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;
session_start();

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AuthLogin(){
        $NV_MA = Session::get('NV_MA');
        if($NV_MA){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_product(){
        $this->AuthLogin();
        $brand_product = DB::table('nha_xuat_ban')->orderby('NXB_MA')->get(); 
        $lang_product = DB::table('ngon_ngu')->orderby('NN_MA')->get(); 
        return view('admin.add_product')->with('brand_product', $brand_product)->with('lang_product', $lang_product);

    }
    public function all_product(){ //Hien thi tat ca
        $this->AuthLogin();

        $all_product = DB::table('sach')
        ->join('nha_xuat_ban','nha_xuat_ban.NXB_MA','=','sach.NXB_MA')
        ->join('ngon_ngu','ngon_ngu.NN_MA','=','sach.NN_MA')
        ->orderby('SACH_MA','desc')->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin-layout')->with('admin.all_product', $manager_product);
    }

    public function save_product(Request $request){//thêm sách
        $this->AuthLogin();
        $data = array();
        //$data['SACH_MA'] = $request->product_desc;
        $data['SACH_TEN'] = $request->SACH_TEN;
        $data['SACH_MOTA'] = $request->SACH_MOTA;
        $data['SACH_GIA'] = $request->SACH_GIA;
        $data['SACH_CHIETKHAU'] = $request->SACH_CHIETKHAU;
        $data['SACH_NGAYCAPNHAT'] =  Carbon::now('Asia/Ho_Chi_Minh');
        $data['SACH_NGAYTAO'] =  Carbon::now('Asia/Ho_Chi_Minh');
        $data['SACH_SOTRANG'] = $request->SACH_SOTRANG;
        $data['SACH_ISBN'] = $request->SACH_ISBN;
        $data['NXB_MA'] = $request->NXB_MA;
        $data['NN_MA'] = $request->NN_MA;

        DB::table('sach')->insert($data);
        Session::put('message','Thêm sách thành công');
        return Redirect::to('add-product');


    }

    public function edit_product($SACH_MA){
        $this->AuthLogin();
        $brand_product = DB::table('nha_xuat_ban')->orderby('NXB_MA')->get(); 
        $lang_product = DB::table('ngon_ngu')->orderby('NN_MA')->get(); 
        $edit_product = DB::table('sach')->where('SACH_MA',$SACH_MA)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('brand_product',$brand_product)->with('lang_product',$lang_product);
        return view('admin-layout')->with('admin.edit_product', $manager_product);
    }

    public function update_product(Request $request, $SACH_MA){
        $this->AuthLogin();
        $data = array();
        //$data['SACH_MA'] = $request->product_desc;
        $data['SACH_TEN'] = $request->SACH_TEN;
        $data['SACH_MOTA'] = $request->SACH_MOTA;
        $data['SACH_GIA'] = $request->SACH_GIA;
        $data['SACH_CHIETKHAU'] = $request->SACH_CHIETKHAU;
        $data['SACH_NGAYCAPNHAT'] =  Carbon::now('Asia/Ho_Chi_Minh');
        $data['SACH_SOTRANG'] = $request->SACH_SOTRANG;
        $data['SACH_ISBN'] = $request->SACH_ISBN;
        $data['NXB_MA'] = $request->NXB_MA;
        $data['NN_MA'] = $request->NN_MA;
        DB::table('sach')->where('SACH_MA',$SACH_MA)->update($data);
        Session::put('message','Cập nhật sách thành công');
        return Redirect::to('all-product');

    }

    public function delete_product($SACH_MA){
        $this->AuthLogin();
        DB::table('sach')->where('SACH_MA',$SACH_MA)->delete();
        Session::put('message','Xóa sách thành công');
        return Redirect::to('all-product');

    }
}