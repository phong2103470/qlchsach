@extends('admin-layout')
@section('admin-content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm chi tiết lô nhập
                        </header>
                        <div class="panel-body">
                            <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null); 
                            }
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-chitiet-lonhap')}}" method="post">
                                    {{csrf_field() }}
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Mã lô nhập</label>
                                      <select name="lonhap_product_name" class="form-control input-sm m-bot15">
                                        @foreach($lonhap_product as $key => $malonhap)
                                            <option value="{{$malonhap->LN_MA}}" required="">{{$malonhap->LN_MA}}</option> 
                                            
                                        @endforeach
                                            
                                    </select>
                                </div>

                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Sách nhập</label>
                                      <select name="masach_product_name" class="form-control input-sm m-bot15" required="">
                                        @foreach($sach as $key => $masach)
                                            <option value="{{$masach->SACH_MA}}">{{$masach->SACH_TEN}}</option> 
                                            
                                        @endforeach
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" name="soluong_product_name" class="form-control" id="exampleInputEmail1" placeholder="Số lượng" required="" pattern="[0-9]+">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="text" name="gia_product_name" class="form-control" id="exampleInputEmail1" placeholder="Giá" required="" pattern="[0-9]+">
                                </div>
                                
                                <button type="submit" name="add_chitiet_lonhap" class="btn btn-info">Thêm chi tiết lô nhập</button>
                            </form>
                            </div>

                        </div>
                    </section>
@endsection
            