<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Frontend
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/trang-chu', 'App\Http\Controllers\HomeController@index');
Route::get('/danh-muc-san-pham/tat-ca', 'App\Http\Controllers\HomeController@all_product');

//Home Product Categories
Route::get('/danh-muc-san-pham/{TLS_MA}', 'App\Http\Controllers\CategoryProduct@show_category_home');
Route::get('/chi-tiet-san-pham/{SACH_MA}', 'App\Http\Controllers\ProductController@detail_product');


//Login
Route::get('/dang-nhap','App\Http\Controllers\CostumerController@dang_nhap');
Route::get('/logout', 'App\Http\Controllers\CostumerController@logout');
Route::post('/costumer-check', 'App\Http\Controllers\CostumerController@trang_chu');

//Cart
//Route::post('/update-cart-quantity','App\Http\Controllers\CartController@update_cart_quantity');
//Route::post('/update-cart','App\Http\Controllers\CartController@update_cart');
Route::post('/save-cart','App\Http\Controllers\CartController@save_cart');
Route::get('/show-cart','App\Http\Controllers\CartController@show_cart');
Route::post('/update-cart', 'App\Http\Controllers\CartController@update_cart');
Route::get('/delete-cart/{SACH_MA}', 'App\Http\Controllers\CartController@delete_cart');

//Location: Địa chỉ giao hàng
Route::get('/dia-chi-giao-hang','App\Http\Controllers\CostumerController@all_location');
Route::get('/them-dia-chi-giao-hang','App\Http\Controllers\CostumerController@add_location');
Route::get('/sua-dia-chi-giao-hang/{DCGH_MA}', 'App\Http\Controllers\CostumerController@edit_location');
Route::get('/xoa-dia-chi-giao-hang/{DCGH_MA}', 'App\Http\Controllers\CostumerController@delete_location');

Route::post('/select-location', 'App\Http\Controllers\CostumerController@select_location');
Route::post('/save-location', 'App\Http\Controllers\CostumerController@save_location');
Route::post('/update-location/{DCGH_MA}', 'App\Http\Controllers\CostumerController@update_location');



//---------------------------------------------------



//Backend
Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
Route::get('/log-out', 'App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard', 'App\Http\Controllers\AdminController@dashboard');

//Category Product
Route::get('/add-category-product', 'App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/edit-category-product/{TLS_MA}', 'App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{TLS_MA}', 'App\Http\Controllers\CategoryProduct@delete_category_product');
Route::get('/all-category-product', 'App\Http\Controllers\CategoryProduct@all_category_product');

Route::post('/save-category-product', 'App\Http\Controllers\CategoryProduct@save_category_product');
Route::post('/update-category-product/{TLS_MA}', 'App\Http\Controllers\CategoryProduct@update_category_product');

//Brand Product
Route::get('/add-brand-product', 'App\Http\Controllers\BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{NXB_MA}', 'App\Http\Controllers\BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{NXB_MA}', 'App\Http\Controllers\BrandProduct@delete_brand_product');
Route::get('/all-brand-product', 'App\Http\Controllers\BrandProduct@all_brand_product');

Route::post('/save-brand-product', 'App\Http\Controllers\BrandProduct@save_brand_product');
Route::post('/update-brand-product/{NXB_MA}', 'App\Http\Controllers\BrandProduct@update_brand_product');

//Product
Route::get('/add-product', 'App\Http\Controllers\ProductController@add_product');
Route::get('/edit-product/{SACH_MA}', 'App\Http\Controllers\ProductController@edit_product');
Route::get('/delete-product/{SACH_MA}', 'App\Http\Controllers\ProductController@delete_product');
Route::get('/all-product', 'App\Http\Controllers\ProductController@all_product');

Route::post('/save-product', 'App\Http\Controllers\ProductController@save_product');
Route::post('/update-product/{SACH_MA}', 'App\Http\Controllers\ProductController@update_product');

//Product Image
Route::get('/add-product-image', 'App\Http\Controllers\ImageProductController@add_product_image');
Route::get('/edit-product-image/{HAS_MA}', 'App\Http\Controllers\ImageProductController@edit_product_image');
Route::get('/delete-product-image/{HAS_MA}', 'App\Http\Controllers\ImageProductController@delete_product_image');
Route::get('/all-product-image', 'App\Http\Controllers\ImageProductController@all_product_image');

Route::post('/save-product-image', 'App\Http\Controllers\ImageProductController@save_product_image');
Route::post('/update-product-image/{HAS_MA}', 'App\Http\Controllers\ImageProductController@update_product_image');


//Product tacgia
Route::get('/add-tacgia-product', 'App\Http\Controllers\TacgiaProduct@add_tacgia_product');
Route::get('/edit-tacgia-product/{TG_MA}', 'App\Http\Controllers\TacgiaProduct@edit_tacgia_product');
Route::get('/delete-tacgia-product/{TG_MA}', 'App\Http\Controllers\TacgiaProduct@delete_tacgia_product');
Route::get('/all-tacgia-product', 'App\Http\Controllers\TacgiaProduct@all_tacgia_product');

Route::post('/save-tacgia-product', 'App\Http\Controllers\TacgiaProduct@save_tacgia_product');
Route::post('/update-tacgia-product/{TG_MA}', 'App\Http\Controllers\TacgiaProduct@update_tacgia_product');

//Employee
Route::get('/add-employee', 'App\Http\Controllers\EmployeeController@add_employee');
Route::get('/edit-employee/{NV_MA}', 'App\Http\Controllers\EmployeeController@edit_employee');
Route::get('/delete-employee/{NV_MA}', 'App\Http\Controllers\EmployeeController@delete_employee');
Route::get('/all-employee', 'App\Http\Controllers\EmployeeController@all_employee');

Route::post('/save-employee', 'App\Http\Controllers\EmployeeController@save_employee');
Route::post('/update-employee/{NV_MA}', 'App\Http\Controllers\EmployeeController@update_employee');
