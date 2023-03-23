<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;
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

        //Các mini box
        //Tổng đơn hàng
        $ddh = DB::table('don_dat_hang')->count();
        Session::put('SO_DDH',$ddh);

        //Đơn hàng chưa xử lý
        /*SELECT c.*, t.*
        from trang_thai t JOIN (SELECT c1.DDH_MA ddh, c1.TT_MA tt
                                from chi_tiet_trang_thai c1 join (SELECT ddh_ma, max(cttt_ngaycapnhat)cap_nhat
                                                                    from chi_tiet_trang_thai GROUP BY ddh_ma) c2 on c1.ddh_ma = c2.ddh_ma
                                WHERE c1.CTTT_NGAYCAPNHAT = c2.cap_nhat) c on t.TT_MA = c.tt
        WHERE t.TT_TEN='Da dat hang nhung chua xu ly';
        $ddh_cxl1 = DB::table('chi_tiet_trang_thai')
        ->select('ddh_ma', 'max(cttt_ngaycapnhat) cap_nhat')
        ->groupby('ddh_ma')->get();

        $ddh_cxl2 = DB::table('chi_tiet_trang_thai c1')
        ->select('c1.DDH_MA ddh', 'c1.TT_MA tt')
        ->join(DB::raw('(' . $ddh_cxl1->toSql() . ') c2'), 'c1.ddh_ma', '=', 'c2.ddh_ma')
        ->where('c1.CTTT_NGAYCAPNHAT', '=', 'c2.cap_nhat');

        $ddh_cxl = DB::table('trang_thai t')
        ->select('c.*', 't.*')
        ->join(DB::raw('(' . $ddh_cxl2->toSql() . ') c'), 't.TT_MA', '=', 'c.tt')
        ->where('t.TT_TEN', '=', 'Da dat hang nhung chua xu ly')->count();

        $query = DB::table('trang_thai as t') ->select('c.', 't.')
        ->join(DB::raw('(SELECT c1.DDH_MA ddh, c1.TT_MA tt from chi_tiet_trang_thai c1 join (SELECT ddh_ma, max(cttt_ngaycapnhat) cap_nhat from chi_tiet_trang_thai GROUP BY ddh_ma) c2 on c1.ddh_ma = c2.ddh_ma
        WHERE c1.CTTT_NGAYCAPNHAT = c2.cap_nhat) c'),'t.TT_MA', '=', 'c.tt')
        ->where('t.TT_TEN', 'Da dat hang nhung chua xu ly') ->get();*/

        $ddh_cxl = DB::table('trang_thai as t') ->select('c.*', 't.*')
        ->join(DB::raw('(SELECT c1.DDH_MA ddh, c1.TT_MA tt from chi_tiet_trang_thai c1
                        join (SELECT ddh_ma, max(cttt_ngaycapnhat) cap_nhat from chi_tiet_trang_thai
                        GROUP BY ddh_ma) c2 on c1.ddh_ma = c2.ddh_ma
                        WHERE c1.CTTT_NGAYCAPNHAT = c2.cap_nhat) c'),'t.TT_MA', '=', 'c.tt')
        ->where('t.TT_TEN', 'Đã đặt hàng nhưng chưa xử lý')->count();


        Session::put('SO_DDH_CXL',$ddh_cxl);

        //Số người dùng
        $users = DB::table('khach_hang')->count();
        Session::put('SO_NGUOI_DUNG',$users);

        //Số nhân viên
        $emp = DB::table('nhanvien')->count();
        Session::put('SO_NHAN_VIEN',$emp);

        //Doanh thu
        /*$result = DB::table('don_dat_hang as d')
            ->join(DB::raw('(SELECT c.*, t.*
                            FROM trang_thai t
                            JOIN (SELECT c1.DDH_MA ddh, c1.TT_MA tt
                                  FROM chi_tiet_trang_thai c1
                                  JOIN (SELECT ddh_ma, max(cttt_ngaycapnhat)cap_nhat
                                        FROM chi_tiet_trang_thai
                                        GROUP BY ddh_ma) c2
                                  ON c1.ddh_ma = c2.ddh_ma
                                  WHERE c1.CTTT_NGAYCAPNHAT = c2.cap_nhat) c
                            ON t.TT_MA = c.tt
                            WHERE t.TT_TEN = "Da thanh toan") c'), 'd.DDH_MA', '=', 'c.ddh')
            ->select(DB::raw('SUM(d.ddh_tongtien)'))
            ->get(); */

            $ddh_dtt = DB::table('don_dat_hang as d')
            ->join(DB::raw('(SELECT c.*, t.*
                            from trang_thai t JOIN (SELECT c1.DDH_MA ddh, c1.TT_MA tt
                                    from chi_tiet_trang_thai c1 join (SELECT ddh_ma, max(cttt_ngaycapnhat)cap_nhat
                            from chi_tiet_trang_thai GROUP BY ddh_ma) c2 on c1.ddh_ma = c2.ddh_ma
                            WHERE c1.CTTT_NGAYCAPNHAT = c2.cap_nhat) c on t.TT_MA = c.tt
                            WHERE t.TT_TEN="Đã thanh toán") c'), 'd.ddh_ma', '=', 'c.ddh')->sum('ddh_tongtien');

            $ctlx = DB::table('chi_tiet_lo_xuat')->sum('CTLX_GIA');

            Session::put('DOANH_THU_L',$ctlx);
            Session::put('DOANH_THU_S',$ddh_dtt);

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
            Session::put('NV_DUONGDANANHDAIDIEN',$result->NV_DUONGDANANHDAIDIEN);
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
        Session::put('NV_DUONGDANANHDAIDIEN',null);
        return Redirect::to('/admin');
    }

    public function thong_ke(){
        $this->AuthLogin();

        $dayprev=Carbon::now('Asia/Ho_Chi_Minh')->subMonths(3);
        $daynow=Carbon::now('Asia/Ho_Chi_Minh');
        //echo $dayprev .";". $daynow;

        Session::put('TGBDau', $dayprev);
        Session::put('TGKThuc', $daynow);

        /*
        SELECT s.*, c.* FROM sach s JOIN chi_tiet_don_dat_hang c on s.SACH_MA = c.SACH_MA 
        JOIN don_dat_hang d on c.DDH_MA = d.DDH_MA
        WHERE d.DDH_NGAYDAT BETWEEN '2023-02-01' AND '2023-03-21' 
        GROUP by s.SACH_MA HAVING SUM(ctddh_soluong) = (SELECT max(tongsoluong) FROM (SELECT c.SACH_MA, SUM(ctddh_soluong) tongsoluong FROM chi_tiet_don_dat_hang c JOIN don_dat_hang d on c.DDH_MA = d.DDH_MA WHERE d.DDH_NGAYDAT BETWEEN '2023-02-01' AND '2023-03-21' GROUP BY (c.SACH_MA)) sum_sach);

        $query = DB::table('sach as s')
           ->join('chi_tiet_don_dat_hang as c', 's.SACH_MA', '=', 'c.SACH_MA')
           ->join('don_dat_hang as d', 'c.DDH_MA', '=', 'd.DDH_MA')
           ->select('s.*', 'c.*')
           ->whereBetween('d.DDH_NGAYDAT', ['2023-02-01', '2023-03-21'])
           ->groupBy('s.SACH_MA')
           ->havingRaw('SUM(ctddh_soluong) = (SELECT max(tongsoluong) FROM (SELECT c.SACH_MA, SUM(ctddh_soluong) tongsoluong FROM chi_tiet_don_dat_hang c JOIN don_dat_hang d on c.DDH_MA = d.DDH_MA WHERE d.DDH_NGAYDAT BETWEEN '2023-02-01' AND '2023-03-21' GROUP BY (c.SACH_MA)) sum_sach)')
           ->get();
        
        $sachbannhieu = DB::table('sach as s')
        ->join('chi_tiet_don_dat_hang as c', 's.SACH_MA', '=', 'c.SACH_MA')
        ->join('don_dat_hang as d', 'c.DDH_MA', '=', 'd.DDH_MA')
        ->select('s.*', 'c.*')
        ->whereBetween('d.DDH_NGAYDAT', [$dayprev, $dayprev])
        ->groupBy('s.SACH_MA')
        ->havingRaw("SUM(ctddh_soluong) = (SELECT max(tongsoluong) FROM (SELECT c.SACH_MA, SUM(ctddh_soluong) tongsoluong FROM chi_tiet_don_dat_hang c JOIN don_dat_hang d on c.DDH_MA = d.DDH_MA WHERE d.DDH_NGAYDAT BETWEEN '".$dayprev."' AND '".$daynow."' GROUP BY (c.SACH_MA)) sum_sach)")
        ->get();

        $sachbannhieu = DB::table('sach as s')
        ->join('chi_tiet_don_dat_hang as c', 's.SACH_MA', '=', 'c.SACH_MA')
        ->join('don_dat_hang as d', 'c.DDH_MA', '=', 'd.DDH_MA')
        ->select('s.*', 'c.*')
        ->whereBetween('d.DDH_NGAYDAT', ['2023-02-01', '2023-03-21'])
        ->groupBy('s.SACH_MA')
        ->havingRaw('SUM(ctddh_soluong) = (SELECT max(tongsoluong) FROM (SELECT c.SACH_MA, SUM(ctddh_soluong) tongsoluong FROM chi_tiet_don_dat_hang c JOIN don_dat_hang d on c.DDH_MA = d.DDH_MA WHERE d.DDH_NGAYDAT BETWEEN "2023-02-01" AND "2023-03-21" GROUP BY (c.SACH_MA)) sum_sach)')
        ->get();

        echo '<pre>';
        print_r ($sachbannhieu);
        echo '</pre>';*/
        return view('admin.dashboard.thong_ke');
    }

    public function thong_ke_tg(Request $request){
        $this->AuthLogin();
        $homnay=Carbon::now('Asia/Ho_Chi_Minh');
        if ($request->TGBDau && $request->TGKThuc && $request->TGBDau<=$request->TGKThuc && $request->TGKThuc<=$homnay ){
            Session::put('TGBDau', $request->TGBDau);
            Session::put('TGKThuc', $request->TGKThuc);
            return view('admin.dashboard.thong_ke');
        }
        
        Session::put('message','Xin kiểm tra lại dữ liệu đầu vào');
        return view('admin.dashboard.thong_ke');
    }
}
