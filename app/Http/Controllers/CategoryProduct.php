<?php
//Thể loại sách
namespace App\Http\Controllers;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use Illuminate\Http\Request;

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $NV_MA = Session::get('NV_MA');
        if($NV_MA){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.add_category_product');

    }

    public function all_category_product(){ //Hien thi tat ca
        $this->AuthLogin();
        $all_category_product = DB::table('the_loai_sach')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin-layout')->with('admin.all_category_product', $manager_category_product);
    }

    public function save_category_product(Request $request){//thêm thể loại sách
        $this->AuthLogin();
        $data = array();
        //$data['TLS_MA'] = $request->category_product_desc;
        $data['TLS_TEN'] = $request->category_product_name;

        DB::table('the_loai_sach')->insert($data);
        Session::put('message','Thêm thể loại sách thành công');
        return Redirect::to('add-category-product');


    }

    public function edit_category_product($TLS_MA){
        $this->AuthLogin();
        $edit_category_product = DB::table('the_loai_sach')->where('TLS_MA',$TLS_MA)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin-layout')->with('admin.edit_category_product', $manager_category_product);
    }

    public function update_category_product(Request $request, $TLS_MA){
        $this->AuthLogin();
        $data = array();
        //$data['TLS_MA'] = $request->category_product_desc;
        $data['TLS_TEN'] = $request->category_product_name;
        DB::table('the_loai_sach')->where('TLS_MA',$TLS_MA)->update($data);
        Session::put('message','Cập nhật thể loại sách thành công');
        return Redirect::to('all-category-product');

    }

    public function delete_category_product($TLS_MA){
        $this->AuthLogin();
        DB::table('the_loai_sach')->where('TLS_MA',$TLS_MA)->delete();
        Session::put('message','Xóa thể loại sách thành công');
        return Redirect::to('all-category-product');

    }

    // Danh mục sản phẩm trang chủ
    public function show_category_home($TLS_MA){

    }
}
