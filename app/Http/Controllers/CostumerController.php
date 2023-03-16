<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class CostumerController extends Controller
{
    public function AuthLogin(){
        $KH_MA = Session::get('KH_MA');
        if($KH_MA){
            return Redirect::to('show-cart');
        }else{
            return Redirect::to('trang-chu')->send();
        }
    }
    //Dang nhap/xuat khach hang
    public function dang_nhap(){
        $all_category_product = DB::table('the_loai_sach')->get();

    	return view('login')->with('category', $all_category_product);
    }

    public function trang_chu(Request $request){
        
    	$costum_email = $request->email;
        $costum_password = $request->password;
        
        $result = DB::table('khach_hang')->where('KH_EMAIL', $costum_email)->where('KH_MATKHAU', $costum_password)->first();
        /*echo '<pre>';
        print_r ($result);
        echo '</pre>';*/
        
        if($result){
            Session::put('KH_HOTEN',$result->KH_HOTEN);
            Session::put('KH_MA',$result->KH_MA);
            Session::put('KH_DUONGDANANHDAIDIEN',$result->KH_DUONGDANANHDAIDIEN);
            return Redirect::to('/trang-chu');
        }else{
                Session::put('message','Mật khẩu hoặc tài khoản sai. Vui lòng nhập lại!');
                //Session::put('message',$request->password);
                return Redirect::to('/dang-nhap');
        } 
    }
    public function logout(Request $request){
        $this->AuthLogin();
        Session::put('KH_HOTEN',null);
        Session::put('KH_MA',null);
        Session::put('KH_DUONGDANANHDAIDIEN',null);
        return Redirect::to('/trang-chu');
    }
    
    //Địa chỉ giao hàng
    public function all_location(){
        $this->AuthLogin();
        $KH_MA = Session::get('KH_MA');
        $all_category_product = DB::table('the_loai_sach')->get();
        $all_DCGH = DB::table('dia_chi_giao_hang')
        ->join('xa_phuong','dia_chi_giao_hang.XP_MA','=','xa_phuong.XP_MA')
        ->join('huyen_quan','huyen_quan.HQ_MA','=','xa_phuong.HQ_MA')
        ->join('tinh_thanh_pho','huyen_quan.TTP_MA','=','tinh_thanh_pho.TTP_MA')
        ->join('co_dia_chi_giao_hang','dia_chi_giao_hang.DCGH_MA','=','co_dia_chi_giao_hang.DCGH_MA')
        ->where('co_dia_chi_giao_hang.KH_MA',$KH_MA)
        ->orderby('dia_chi_giao_hang.DCGH_MA','desc')->get();
        
        $count_DCGH = DB::table('dia_chi_giao_hang')
        ->join('co_dia_chi_giao_hang','dia_chi_giao_hang.DCGH_MA','=','co_dia_chi_giao_hang.DCGH_MA')
        ->where('co_dia_chi_giao_hang.KH_MA',$KH_MA)
        ->count('dia_chi_giao_hang.DCGH_MA');
        Session::put('count_DCGH',$count_DCGH);
        return view('pages.location.all-location')->with('category', $all_category_product)
        ->with('all_DCGH', $all_DCGH);
    }

    public function add_location(){
        $this->AuthLogin();
        $KH_MA = Session::get('KH_MA');
        $all_category_product = DB::table('the_loai_sach')->get();

        $ttp= DB::table('tinh_thanh_pho')->orderby('TTP_MA')->get();
        //$hq= DB::table('huyen_quan')->orderby('HQ_MA')->get();
        //$xp= DB::table('xa_phuong')->orderby('XP_MA')->get();
        
        return view('pages.location.add-location')->with('category', $all_category_product)
        //->with('ttp', $ttp)->with('hq', $hq)->with('xp', $xp);
        ->with(compact('ttp'));
    }

    public function select_location(Request $request){
    	$data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="TTP_MA"){
    			$select_HQ = DB::table('huyen_quan')->where('TTP_MA',$data['ma_id'])->orderby('HQ_MA')->get();
    			$output.='<option value="">-- Chọn huyện / quận --</option>';
    			foreach($select_HQ as $key => $hq){
    				$output.='<option value="'.$hq->HQ_MA.'">'.$hq->HQ_TEN.'</option>';
    			}
    		}
            else{

                $select_XP = DB::table('xa_phuong')->where('HQ_MA',$data['ma_id'])->orderby('XP_MA')->get();
    			$output.='<option value="">-- Chọn xã / phường --</option>';
    			foreach($select_XP as $key => $xp){
    				$output.='<option value="'.$xp->XP_MA.'">'.$xp->XP_TEN.'</option>';
    			}
    		}
    		echo $output;
    	}
    }

    public function save_location(Request $request){
        
        $this->AuthLogin();
        $data = array();
        $data['DCGH_HOTENNGUOINHAN'] = $request->DCGH_HOTENNGUOINHAN;
        $data['XP_MA'] = $request->XP_MA;
        $data['DCGH_SONHA'] = $request->DCGH_SONHA;
        if ($request->DCGH_GHICHU == NULL) $request->DCGH_GHICHU = "Không";
        $data['DCGH_GHICHU'] = $request->DCGH_GHICHU;

        DB::table('dia_chi_giao_hang')->insert($data);

        $data2 = array();
        $KH_MA = Session::get('KH_MA');
        $DCGH_MA=DB::table('dia_chi_giao_hang')
        ->orderby('dia_chi_giao_hang.DCGH_MA','desc')->first();
        $data2['DCGH_MA'] = $DCGH_MA->DCGH_MA;
        $data2['KH_MA'] = $KH_MA;

        DB::table('co_dia_chi_giao_hang')->insert($data2);

        Session::put('message','Thêm địa chỉ giao hàng mới thành công');
        return Redirect::to('them-dia-chi-giao-hang');
        
    }

    public function edit_location($DCGH_MA){
        $this->AuthLogin();
        $KH_MA = Session::get('KH_MA');
        $all_category_product = DB::table('the_loai_sach')->get();

        $ttp= DB::table('tinh_thanh_pho')->orderby('TTP_MA')->get();
        $hq= DB::table('huyen_quan')->orderby('HQ_MA')->get();
        $xp= DB::table('xa_phuong')->orderby('XP_MA')->get();
        $edit_location = DB::table('dia_chi_giao_hang')
        ->join('xa_phuong','dia_chi_giao_hang.XP_MA','=','xa_phuong.XP_MA')
        ->join('huyen_quan','huyen_quan.HQ_MA','=','xa_phuong.HQ_MA')
        ->where('dia_chi_giao_hang.DCGH_MA',$DCGH_MA)->get();
        return view('pages.location.edit-location')->with('category', $all_category_product)
        ->with('ttp', $ttp)->with('hq', $hq)->with('xp', $xp)->with(compact('ttp'))->with('edit_location', $edit_location);
    }

    public function update_location(Request $request, $DCGH_MA){
        $this->AuthLogin();
        $data = array();
        $data['DCGH_HOTENNGUOINHAN'] = $request->DCGH_HOTENNGUOINHAN;
        $data['XP_MA'] = $request->XP_MA;
        $data['DCGH_SONHA'] = $request->DCGH_SONHA;
        if ($request->DCGH_GHICHU == NULL) $request->DCGH_GHICHU = "Không";
        $data['DCGH_GHICHU'] = $request->DCGH_GHICHU;

        DB::table('dia_chi_giao_hang')->where('DCGH_MA',$DCGH_MA)->update($data);

        Session::put('message','Cập nhật địa chỉ giao hàng thành công');
        return Redirect::to('dia-chi-giao-hang');

    }

    public function delete_location($DCGH_MA){
        $this->AuthLogin();
        DB::table('co_dia_chi_giao_hang')->where('DCGH_MA',$DCGH_MA)->delete();
        DB::table('dia_chi_giao_hang')->where('DCGH_MA',$DCGH_MA)->delete();
        
        Session::put('message','Xóa sách thành công');
        return Redirect::to('dia-chi-giao-hang');

    }

}
