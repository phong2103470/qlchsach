<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class ImageProductController extends Controller
{
    public function AuthLogin(){
        $NV_MA = Session::get('NV_MA');
        if($NV_MA){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_product_image(){
        $this->AuthLogin();
        $product = DB::table('sach')->orderby('SACH_MA')->get(); 
        return view('admin.add_product_image')->with('product', $product);

    }
    public function all_product_image(){ //Hien thi tat ca
        $this->AuthLogin();

        $all_product_image = DB::table('hinh_anh_sach')
        ->join('sach','sach.SACH_MA','=','hinh_anh_sach.SACH_MA')
        ->orderby('HAS_MA','desc')->get();
        $manager_product_image = view('admin.all_product_image')->with('all_product_image', $all_product_image);
        return view('admin-layout')->with('admin.all_product_image', $manager_product_image);
    }

    public function save_product_image(Request $request){//thêm sách
        $this->AuthLogin();
        $data = array();
        $data['HAS_TEN'] = $request->HAS_TEN;
        $data['HAS_DUONGDAN'] = $request->HAS_DUONGDAN;  
        $data['SACH_MA'] = $request->SACH_MA;

        DB::table('hinh_anh_sach')->insert($data);
        Session::put('message','Thêm hình ảnh sách thành công');
        return Redirect::to('add-product-image');
    }

    public function edit_product_image($HAS_MA){
        $this->AuthLogin();
        $product = DB::table('sach')->orderby('SACH_MA')->get(); 
        $edit_product_image = DB::table('hinh_anh_sach')->where('HAS_MA',$HAS_MA)->get();
        $manager_product_image = view('admin.edit_product_image')->with('edit_product_image', $edit_product_image)->with('product',$product);
        return view('admin-layout')->with('admin.edit_product_image', $manager_product_image);
    }

    public function update_product_image(Request $request, $HAS_MA){
        $this->AuthLogin();
        $data = array();
        $data = array();
        $data['HAS_TEN'] = $request->HAS_TEN;
        $data['HAS_DUONGDAN'] = $request->HAS_DUONGDAN;  
        $data['SACH_MA'] = $request->SACH_MA;
        DB::table('hinh_anh_sach')->where('HAS_MA',$HAS_MA)->update($data);
        Session::put('message','Cập nhật hình ảnh sách thành công');
        return Redirect::to('all-product-image');

    }

    public function delete_product_image($HAS_MA){
        $this->AuthLogin();
        DB::table('hinh_anh_sach')->where('HAS_MA',$HAS_MA)->delete();
        Session::put('message','Xóa hình ảnh sách thành công');
        return Redirect::to('all-product-image');

    }
}
