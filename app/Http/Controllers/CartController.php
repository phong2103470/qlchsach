<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function save_cart(Request $request){
        $all_category_product = DB::table('the_loai_sach')->get();
        $SACH_MA = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('sach')->where('SACH_MA',$SACH_MA)->first(); 

    
        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //Cart::destroy();
        /*$data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);*/
        // Cart::destroy();
        
        /*return Redirect::to('/show-cart');*/
        
        return view('pages.cart.show_cart')->with('category', $all_category_product);
     //Cart::destroy();
       
    }
}
