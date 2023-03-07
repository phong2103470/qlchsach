@extends('admin-layout')
@section('admin-content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật nhân viên
                        </header>
                        <div class="panel-body">
                        @foreach($edit_employee as $key => $edit_value)
                            <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-employee/'.$edit_value->NV_MA)}}" method="post">
                                    {{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên nhân viên</label>
                                    <input type="text" value="{{$edit_value->NV_HOTEN}}" name="NV_HOTEN" class="form-control" id="exampleInputEmail1" placeholder="Tên nhân viên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chức vụ</label>
                                      <select name="CV_MA" class="form-control input-sm m-bot15">

                                        @foreach($position as $key => $pos)
                                            
                                            @if($pos->CV_MA==$edit_value->CV_MA)
                                            <option selected value="{{$pos->CV_MA}}">{{$pos->CV_TEN}}</option>
                                            @else
                                            <option value="{{$pos->CV_MA}}">{{$pos->CV_TEN}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" value="{{$edit_value->NV_SODIENTHOAI}}" name="NV_SODIENTHOAI" class="form-control" id="exampleInputEmail1" placeholder="Tên nhân viên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" value="{{$edit_value->NV_DIACHI}}" name="NV_DIACHI" class="form-control" id="exampleInputEmail1" placeholder="Tên nhân viên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày sinh</label>
                                    <input type="date" value="{{$edit_value->NV_NGAYSINH}}" name="NV_NGAYSINH" class="form-control" id="exampleInputEmail1" placeholder="Tên nhân viên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giới tính</label>
                                    <input type="text" value="{{$edit_value->NV_GIOITINH}}" name="NV_GIOITINH" class="form-control" id="exampleInputEmail1" placeholder="Tên nhân viên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" value="{{$edit_value->NV_EMAIL}}" name="NV_EMAIL" class="form-control" id="exampleInputEmail1" placeholder="Tên nhân viên">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đường dẫn ảnh đại diện</label>
                                    <input type="file" name="HAS_DUONGDAN" class="form-control" id="exampleInputEmail1" placeholder="Tên hình ảnh sách">
                                    <br>
                                    <span><label for="exampleInputEmail1">Đường dẫn hình ảnh sách ban đầu: </label> {{$edit_value->NV_DUONGDANANHDAIDIEN}} => </span>
                                    <img src="{{URL::to('public/backend/images/nhanvien/'.$edit_value->NV_DUONGDANANHDAIDIEN)}}" height="100" width="100">
                                    
                                </div>
                                
                                <button type="submit" name="add_employee" class="btn btn-info">Cập nhật nhân viên</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
@endsection
            