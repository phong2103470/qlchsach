@extends('welcome')
@section('content')
<section id="blog-home" class="pr-5 mt-3 container center">
            <h2 class="font-weight-bold pt-3">Giỏ Hàng</h2>
            <hr class="mx-auto">
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
                    <tr>
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
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="cart-bottom" class="container">
            
            <div class="total col-lg-6 col-md-6 col-12">
                <div>
                    <h5>Tổng giỏ hàng</h5>
                    <div class="d-flex justify-content-between">
                        <h6>Tổng tiền sách</h6>
                        <p><span id="subtotal"></span> đ</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Ship</h6>
                        <p><span id="shipping"></span> đ</p>
                    </div>
                    <hr class="second-hr">
                    <div class="d-flex justify-content-between">
                        <h6>Tổng tiền</h6>
                        <p><span id="total"></span> đ
                        </p>
                    </div>
                    <button class="ml-auto" onclick="buy()">Đặt hàng</button>
                </div>
            </div>
            </div>
        </section>
@endsection