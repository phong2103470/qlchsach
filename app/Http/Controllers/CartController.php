<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Carbon\Carbon;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function AuthLogin(){
        $KH_MA = Session::get('KH_MA');
        if($KH_MA){
            return Redirect::to('show-cart');
        }else{
            //return Redirect::to('trang-chu')->send();
            $alert='Đăng nhập để có thể sử dụng chức năng này!';
            return Redirect::to('trang-chu')->send()->with('alert',$alert);
        }
    }

    public function save_cart(Request $request){
        $this->AuthLogin();
        $KH_MA = Session::get('KH_MA');

        $all_category_product = DB::table('the_loai_sach')->get();
        $all_cart_product = DB::table('gio_hang')
        ->join('khach_hang','gio_hang.KH_MA','=','khach_hang.KH_MA')
        ->where('khach_hang.KH_MA', $KH_MA)->first();
        
        $data = array();
        $data['GH_MA'] = $all_cart_product->GH_MA;
        $data['SACH_MA'] = $request->productid_hidden;
        $data['CTGH_SOLUONGSACH'] = $request->qty;
        
        /*echo '<pre>';
        print_r ($data);
        echo '</pre>';*/

        DB::table('gio_hang')->where('GH_MA', $all_cart_product->GH_MA)->update(['GH_NGAYCAPNHATLANCUOI' => Carbon::now('Asia/Ho_Chi_Minh')]);
        DB::table('chi_tiet_gio_hang')->insert($data);
        Session::put('message','Thêm sách vào giỏ hàng thành công');
        
        //$SACH_MA = $request->productid_hidden;
        //$quantity = $request->qty;
        //$product_info = DB::table('sach')->where('SACH_MA',$SACH_MA)->first(); 
        //------------------------
        return Redirect::to('chi-tiet-san-pham/'.$request->productid_hidden);
    }
    public function show_cart(){
        $this->AuthLogin();
        $KH_MA = Session::get('KH_MA');
        $all_category_product = DB::table('the_loai_sach')->get();
        $all_cart_product = DB::table('gio_hang')
        ->join('khach_hang','gio_hang.KH_MA','=','khach_hang.KH_MA')
        ->join('chi_tiet_gio_hang','gio_hang.GH_MA','=','chi_tiet_gio_hang.GH_MA')
        ->join('sach','chi_tiet_gio_hang.SACH_MA','=','sach.SACH_MA')
        ->join('hinh_anh_sach','sach.SACH_MA','=','hinh_anh_sach.SACH_MA')
        ->where('khach_hang.KH_MA', $KH_MA)
        ->orderby('GH_NGAYCAPNHATLANCUOI','desc')->get();
        
        return view('pages.cart.show_cart')->with('category', $all_category_product)->with('all_cart_product', $all_cart_product);

    }

    public function update_cart(Request $request){
        $this->AuthLogin();
        $KH_MA = Session::get('KH_MA');
        $all_category_product = DB::table('the_loai_sach')->get();
        $all_cart_product = DB::table('gio_hang')
        ->join('khach_hang','gio_hang.KH_MA','=','khach_hang.KH_MA')
        ->where('khach_hang.KH_MA', $KH_MA)->first();
        /*
        $data = array();
        $data['GH_MA'] = $all_cart_product->GH_MA;
        $data['SACH_MA'] = $request->productid_hidden;
        $data['CTGH_SOLUONGSACH'] = $request->qty;
        
        echo '<pre>';
        print_r ($data);
        echo '</pre>';*/

        DB::table('gio_hang')->where('GH_MA', $all_cart_product->GH_MA)->update(['GH_NGAYCAPNHATLANCUOI' => Carbon::now('Asia/Ho_Chi_Minh')]);
        DB::table('chi_tiet_gio_hang')->where('GH_MA', $all_cart_product->GH_MA)->where('SACH_MA', $request->productid_hidden)->update(['CTGH_SOLUONGSACH' => $request->qty]);
        
        return Redirect::to('show-cart');
    }

    public function delete_cart($SACH_MA){
        $this->AuthLogin();
        $KH_MA = Session::get('KH_MA');
        $all_category_product = DB::table('the_loai_sach')->get();
        $all_cart_product = DB::table('gio_hang')
        ->join('khach_hang','gio_hang.KH_MA','=','khach_hang.KH_MA')
        ->where('khach_hang.KH_MA', $KH_MA)->first();

        DB::table('gio_hang')->where('GH_MA', $all_cart_product->GH_MA)->update(['GH_NGAYCAPNHATLANCUOI' => Carbon::now('Asia/Ho_Chi_Minh')]);
        DB::table('chi_tiet_gio_hang')->where('GH_MA', $all_cart_product->GH_MA)->where('SACH_MA',$SACH_MA)->delete();
        
        return Redirect::to('show-cart');
    }
    //Don dat hang
    public function show_all_bill(){
        $this->AuthLogin();
        $KH_MA = Session::get('KH_MA');
        $all_category_product = DB::table('the_loai_sach')->get();
        $all_DDH=  DB::table('don_dat_hang')->where('don_dat_hang.KH_MA', $KH_MA)->get();
        $group_DDH = DB::table('don_dat_hang')
        ->join('chi_tiet_don_dat_hang','don_dat_hang.DDH_MA','=','chi_tiet_don_dat_hang.DDH_MA')
        ->join('sach','sach.SACH_MA','=','chi_tiet_don_dat_hang.SACH_MA')
        ->where('don_dat_hang.KH_MA', $KH_MA)->get();
        return view('pages.cart.show_all_bill')->with('category', $all_category_product)
        ->with('all_DDH', $all_DDH)->with('group_DDH', $group_DDH);

    }
    public function show_detail_bill($DDH_MA){
        $this->AuthLogin();
        $KH_MA = Session::get('KH_MA');
        $all_category_product = DB::table('the_loai_sach')->get();
        $all_DDH=  DB::table('don_dat_hang')
        ->join('dia_chi_giao_hang','dia_chi_giao_hang.DCGH_MA','=','don_dat_hang.DCGH_MA')
        ->join('hinh_thuc_thanh_toan','hinh_thuc_thanh_toan.HTTT_MA','=','don_dat_hang.HTTT_MA')
        ->join('xa_phuong','dia_chi_giao_hang.XP_MA','=','xa_phuong.XP_MA')
        ->join('huyen_quan','huyen_quan.HQ_MA','=','xa_phuong.HQ_MA')
        ->join('tinh_thanh_pho','huyen_quan.TTP_MA','=','tinh_thanh_pho.TTP_MA')
        ->where('don_dat_hang.DDH_MA', $DDH_MA)->get();

        
        $group_DDH = DB::table('chi_tiet_don_dat_hang')
        ->join('sach','sach.SACH_MA','=','chi_tiet_don_dat_hang.SACH_MA')
        ->join('hinh_anh_sach','sach.SACH_MA','=','hinh_anh_sach.SACH_MA')
        ->where('chi_tiet_don_dat_hang.DDH_MA', $DDH_MA)->get();
        return view('pages.cart.show_detail_bill')->with('category', $all_category_product)
        ->with('all_DDH', $all_DDH)->with('group_DDH', $group_DDH);

    }

}
