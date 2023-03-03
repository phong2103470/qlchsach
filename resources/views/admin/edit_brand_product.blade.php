@extends('admin-layout')
@section('admin-content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật nhà xuất bản
                        </header>
                        <div class="panel-body">
                            @foreach($edit_brand_product as $key => $edit_value)
                            <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->NXB_MA)}}" method="post">
                                    {{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên nhà xuất bản</label>
                                    <input type="text" value="{{$edit_value->NXB_TEN}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên nhà xuất bản">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mã nhà xuất bản</label>
                                    <textarea class="form-control" name="brand_product_id" rows=1 cols=1 id="exampleInputPassword1" place='Mã nhà xuất bản'>
                                    {{$edit_value->NXB_MA}}</textarea>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số điện thoại</label>
                                    <input  type ="text" value="{{$edit_value->NXB_SODIENTHOAI}}" class="form-control" name="brand_product_phone" id="exampleInputPassword1" placeholder="Số điện thoại nhà xuất bản">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Địa chỉ</label>
                                    <textarea class="form-control" style="resize:none" rows=5 name="brand_product_address" id="exampleInputPassword1" placeholder="Địa chỉ nhà xuất bản">{{$edit_value->NXB_DIACHI}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type ="text" value="{{$edit_value->NXB_EMAIL}}" class="form-control" name="brand_product_email" id="exampleInputPassword1" placeholder="Email nhà xuất bản">
                                </div>
                                
                                
                                
                                
                                <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật nhà xuất bản</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
@endsection
            