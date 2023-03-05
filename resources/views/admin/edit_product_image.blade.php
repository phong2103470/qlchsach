@extends('admin-layout')
@section('admin-content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật hình ảnh sách
                        </header>
                        <div class="panel-body">
                            @foreach($edit_product_image as $key => $edit_value)
                           
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-product-image/'.$edit_value->HAS_MA)}}" method="post">
                                    {{csrf_field() }}
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Tên hình ảnh sách</label>
                                    <input type="text" name="HAS_TEN" class="form-control" id="exampleInputEmail1" value="{{$edit_value->HAS_TEN}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đường dẫn hình ảnh sách</label>
                                    <input type="text" name="HAS_DUONGDAN" class="form-control" id="exampleInputEmail1"  value="{{$edit_value->HAS_DUONGDAN}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh của sách</label>
                                      <select name="SACH_MA" class="form-control input-sm m-bot15">
                                        @foreach($product as $key => $prod)
                                            
                                            @if($prod->SACH_MA==$edit_value->SACH_MA)
                                            <option selected value="{{$prod->SACH_MA}}">{{$prod->SACH_TEN}}</option>
                                            @else
                                            <option value="{{$prod->SACH_MA}}">{{$prod->SACH_TEN}}</option>
                                            @endif
                                        @endforeach
                                            
                                    </select>
                                </div>
                                
                                
                                <button type="submit" name="update_product_image" class="btn btn-info">Cập nhật hình ảnh sách</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
@endsection
            