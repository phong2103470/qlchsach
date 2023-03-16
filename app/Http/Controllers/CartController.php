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
    //Đặt hàng
    public function show_detail_order(){
        $this->AuthLogin();
        $KH_MA = Session::get('KH_MA');
        $all_category_product = DB::table('the_loai_sach')->get();

        $DCGH = DB::table('dia_chi_giao_hang')
        ->join('xa_phuong','dia_chi_giao_hang.XP_MA','=','xa_phuong.XP_MA')
        ->join('huyen_quan','huyen_quan.HQ_MA','=','xa_phuong.HQ_MA')
        ->join('tinh_thanh_pho','huyen_quan.TTP_MA','=','tinh_thanh_pho.TTP_MA')
        ->join('co_dia_chi_giao_hang','co_dia_chi_giao_hang.DCGH_MA','=','dia_chi_giao_hang.DCGH_MA')
        ->where('co_dia_chi_giao_hang.KH_MA', $KH_MA)->get();

        $CTGH = DB::table('chi_tiet_gio_hang')
        ->join('sach','sach.SACH_MA','=','chi_tiet_gio_hang.SACH_MA')
        ->join('hinh_anh_sach','sach.SACH_MA','=','hinh_anh_sach.SACH_MA')
        ->join('gio_hang','chi_tiet_gio_hang.GH_MA','=','gio_hang.GH_MA')
        ->join('khach_hang','khach_hang.KH_MA','=','gio_hang.KH_MA')
        ->where('khach_hang.KH_MA', $KH_MA)->get();

        $HTTT = DB::table('hinh_thuc_thanh_toan')->get();

        return view('pages.cart.show_detail_order')->with('category', $all_category_product)
        ->with('DCGH', $DCGH)->with('CTGH', $CTGH)->with('HTTT', $HTTT);

    }

    public function order(Request $request){
        $this->AuthLogin();
        $KH_MA = Session::get('KH_MA');

        $DCGH = DB::table('dia_chi_giao_hang')
        ->join('xa_phuong','dia_chi_giao_hang.XP_MA','=','xa_phuong.XP_MA')
        ->join('huyen_quan','huyen_quan.HQ_MA','=','xa_phuong.HQ_MA')
        ->join('tinh_thanh_pho','huyen_quan.TTP_MA','=','tinh_thanh_pho.TTP_MA')
        ->join('co_dia_chi_giao_hang','co_dia_chi_giao_hang.DCGH_MA','=','dia_chi_giao_hang.DCGH_MA')
        ->where('dia_chi_giao_hang.DCGH_MA', $request->DCGH_MA)->first();

        $data = array();

        $data['HTTT_MA'] = $request->HTTT_MA;
        $data['KH_MA'] = $KH_MA;
        $data['DCGH_MA'] = $request->DCGH_MA;
        $data['DDH_NGAYDAT'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data['DDH_TONGTIEN'] =  $request->DDH_TONGTIEN+$DCGH->XP_CHIPHIGIAOHANG;
        $data['DDH_PHISHIPTHUCTE'] = $DCGH->XP_CHIPHIGIAOHANG;
        $data['DDH_THUEVAT'] = $request->DDH_THUEVAT;
        $data['DDH_DUONGDANHINHANHCHUYENKHOAN'] = $request->DDH_DUONGDANHINHANHCHUYENKHOAN;
        if ($request->HTTT_MA != "1" && $request->DDH_DUONGDANHINHANHCHUYENKHOAN =NULL){
            Session::put('message','Nếu không đặt hàng trực tiếp phải có ảnh minh chứng');
            return Redirect::to('show-cart');
        }

        DB::table('don_dat_hang')->insert($data);
        
        
        // Truy vấn dữ liệu
        $CTGH = DB::table('chi_tiet_gio_hang')
        ->join('sach','sach.SACH_MA','=','chi_tiet_gio_hang.SACH_MA')
        ->join('hinh_anh_sach','sach.SACH_MA','=','hinh_anh_sach.SACH_MA')
        ->join('gio_hang','chi_tiet_gio_hang.GH_MA','=','gio_hang.GH_MA')
        ->join('khach_hang','khach_hang.KH_MA','=','gio_hang.KH_MA')
        ->where('khach_hang.KH_MA', $KH_MA)->get();


        
        //echo '<pre>';
        $DDH_MA=DB::table('don_dat_hang')
        ->orderby('don_dat_hang.DDH_MA','desc')->first();
        $data2 = array();
        // Lấy từng dòng và hiển thị
        $all_cart_product = DB::table('gio_hang')
        ->join('khach_hang','gio_hang.KH_MA','=','khach_hang.KH_MA')
        ->where('khach_hang.KH_MA', $KH_MA)->first();
        foreach ($CTGH as $row) {
            $data2['DDH_MA'] = $DDH_MA->DDH_MA;
            $data2['SACH_MA'] = $row->SACH_MA;
            $data2['CTDDH_SOLUONG'] = $row->CTGH_SOLUONGSACH;
            $data2['CTDDH_DONGIA'] = $row->SACH_GIA;
            //print_r ($data2);
            DB::table('chi_tiet_don_dat_hang')->insert($data2);
            DB::table('chi_tiet_gio_hang')->where('GH_MA', $all_cart_product->GH_MA)->where('SACH_MA',$row->SACH_MA)->delete();
        }
        

        

        
        //print_r ($data);
        //echo '</pre>';

        Session::put('message','Đặt hàng thành công!');
        return Redirect::to('show-cart');
    }
}
