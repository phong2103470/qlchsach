@extends('welcome')
@section('content')
<section id="blog-home" class="pr-5 mt-3 container center">
            <h2 class="font-weight-bold pt-3">Giỏ Hàng</h2>
            <hr class="mx-auto">
        <?php
      $message = Session::get('message');
      if($message){
          echo '<span class="text-alert">'.$message.'</span>';
          Session::put('message',null);
      }
    ?>
        </section>
        <?php
        //$c= Cart::content();
        //echo '<pre>';
        //print_r ($c);
        //echo '</pre>';
        ?>
        <section id="cart-container" class="container my-5">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Xoá</td>
                        <td>Ảnh</td>
                        <td>Sách</td>
                        <td>Giá</td>
                        <td>Số lượng</td>
                        <td>Tổng</td>
                    </tr>
                </thead>

                <tbody>
                <?php $tong =0; ?>
                @foreach($all_cart_product as $key => $cart_pro)
                <tr>
                    <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa mục này không?')" href="{{URL::to('/delete-cart/'.$cart_pro->SACH_MA)}}" class="active styling-edit" ui-toggle-class=""><i class="fas fa-trash-alt"></i></a></td>
                    <td ><img src="../qlchsach/public/frontend/img/sach/{{$cart_pro->HAS_DUONGDAN}}" alt=""></td>
                    <td>
                        <h5 style='width: 100%;white-space: nowrap; overflow: hidden;text-overflow: ellipsis;'>{{$cart_pro->SACH_TEN}}</h5>
                    </td>
                    <td>
                        <h5><span id="donGia1">{{number_format($cart_pro->SACH_GIA)}}</span> đ</h5>
                    </td>
                    <td>
                        <form action="{{URL::to('/update-cart')}}" method="POST">
                            {{ csrf_field() }}
                                                
                            <input class="w-25 pl-1" name="qty" value="{{$cart_pro->CTGH_SOLUONGSACH}}" type="number" min="1" id="amount1">
                            <input name="productid_hidden" type="hidden"  value="{{$cart_pro->SACH_MA}}" />
                            <button type = "submit" class="btn btn-outline-dark btn-sm">Cập nhật</button>
                        </form>
                    </td>
                    <td>
                        <h5><span id="tongGia1"></span> {{number_format($cart_pro->CTGH_SOLUONGSACH*$cart_pro->SACH_GIA)}} đ</h5>
                    </td>
                    <?php
                        $tong = $tong + $cart_pro->CTGH_SOLUONGSACH*$cart_pro->SACH_GIA;
                    ?>
                </tr>
                @endforeach

                   <!--<tr>
                        <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                        <td><img src="{{('../qlchsach/public/frontend/img/sach/BLLK.jpg')}}" alt=""></td>
                        <td>
                            <h5>Blue Lock - Tập 1</h5>
                        </td>
                        <td>
                            <h5><span id="donGia1">40000</span> đ</h5>
                        </td>
                        <td><input class="w-25 pl-1" value="1" type="number" min="1" id="amount1"></td>
                        <td>
                            <h5><span id="tongGia1"></span> đ</h5>
                        </td>
                    </tr>-->
                </tbody>
            </table>
        </section>

        <section id="cart-bottom" class="container">
            
            <div class="total col-lg-6 col-md-6 col-12">
                <div>
                    <h5>Tổng giỏ hàng</h5>
                    <div class="d-flex justify-content-between">
                        <h6>Tổng tiền</h6>
                        <p><span id="total"></span>
                        <?php echo number_format($tong); ?> đ
                        </p>
                    </div>
                    <button class="ml-auto" onclick="buy()">Đặt hàng</button>
                </div>
            </div>
            </div>
        </section>
@endsection