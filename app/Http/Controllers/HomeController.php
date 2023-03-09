<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){

        $all_category_product = DB::table('the_loai_sach')->get();

        /*$all_product = DB::table('sach') ->orderby('SACH_MA','desc')->limit(1)->get();

        $all_product_image = DB::table('hinh_anh_sach')
        ->join('sach','sach.SACH_MA','=','hinh_anh_sach.SACH_MA')
        ->orderby('HAS_MA','desc')->get();

    	return view('pages.home')->with('category', $all_category_product)->with('all_product', $all_product)
        ->with('product_image', $all_product_image);*/
        $all_product = DB::table('sach') -> join('hinh_anh_sach','sach.SACH_MA','=','hinh_anh_sach.SACH_MA')
        ->orderby('sach.SACH_NGAYTAO','desc')->limit(4)->get();
        $exp_product = DB::table('sach') -> join('hinh_anh_sach','sach.SACH_MA','=','hinh_anh_sach.SACH_MA')
        ->orderby('sach.SACH_GIA','desc')->limit(4)->get();
        return view('pages.home')->with('category', $all_category_product)->with('all_product', $all_product)
        ->with('exp_product', $exp_product);
    }
}
