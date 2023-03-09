 @extends('welcome')
 @section('content')
 <!-- Mat hang -->
 <!-- <section id="featured" class="my-1 pb-5">
            <div class="container text-center mt-5 py-1">
                <h3>XU HƯỚNG MUA SẮM</h3>
                <hr class="mx-auto">
                <p>Xu hướng mua sắm của ngày hôm nay</p>
            </div>
            <div class="row mx-auto container-fluid">
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="{{{'public/frontend/img/sach/BLLK.jpg'}}}" alt="">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name">Blue Lock - Tập 1</h5>
                    <h4 class="p-price">40.000 đ</h4>
                    <button class="buy-btn">MUA NGAY</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="{{{'public/frontend/img/sach/SOICUU.j'}}}pg" alt="">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name">Không Phải Sói Nhưng Cũng Đừng Là Cừu</h5>
                    <h4 class="p-price">96.000 đ</h4>
                    <button class="buy-btn">MUA NGAY</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="{{{'public/frontend/img/sach/PHAPY.jp'}}}g" alt="">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name">Ghi Chép Pháp Y - Những Cái Chết Bí Ẩn</h5>
                    <h4 class="p-price">120.000 đ</h4>
                    <button class="buy-btn">MUA NGAY</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="{{{'public/frontend/img/sach/SPY.jpg'}}}" alt="">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name">Spy X Family - Tập 1</h5>
                    <h4 class="p-price">27.000 đ</h4>
                    <button class="buy-btn">MUA NGAY</button>
                </div>
            </div>
        </section> -->

        <section id="clothes" class="my-5">
            <div class="container text-center mt-5 py-5">
                <h3>SÁCH MỚI</h3>
                <hr class="mx-auto">
            </div>    
               
            <div class="row mx-auto container-fluid">
                @foreach($all_product as $key => $product)
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="public/frontend/img/sach/{{$product->HAS_DUONGDAN}}" alt="">

                    <div class="star">
                        <?php
                        // Create connection
                        $conn = new mysqli('localhost', 'root', '', 'qlchsach');
                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }
                        $point = "select ROUND(AVG(DG_DIEM)) dg from Danh_gia group by SACH_MA having SACH_MA ='".$product->SACH_MA."'";
                        $result = $conn->query($point);
                        while ($row = $result->fetch_assoc()) {
                            $dg= $row['dg']."<br>";
                        }
                        $x = 1;
                        for ($x = 1; $x <= $dg; $x++) {
                        echo '<i class="fas fa-star"></i>';
                        }
                        ?>
                    </div>
                    <h5 class="p-name">{{$product->SACH_TEN}}</h5>
                    <h4 class="p-price">{{number_format($product->SACH_GIA)}} đ</h4>
                    <button class="buy-btn">MUA NGAY</button>
                </div>
                <!--<div class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="{{{'public/frontend/img/sach/BLUE.jpg'}}}" alt="">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name">Blue Period - Tập 1</h5>
                    <h4 class="p-price">48.000 đ</h4>
                    <button class="buy-btn">MUA NGAY</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="{{{'public/frontend/img/sach/TTTL.jpg'}}}" alt="">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name">Thao Túng Tâm Lý - Nhận Diện, Thức Tỉnh Và Chữa Lành Những Tổn Thương Tiềm Ẩn</h5>
                    <h4 class="p-price">109.850 đ</h4>
                    <button class="buy-btn">MUA NGAY</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="{{{'public/frontend/img/sach/PHAPY.jp'}}}g" alt="">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name">Ghi Chép Pháp Y - Những Cái Chết Bí Ẩn</h5>
                    <h4 class="p-price">120.000 đ</h4>
                    <button class="buy-btn">MUA NGAY</button>
                </div>-->
                @endforeach
            </div>

            <div class="banner-nho">
                <section id="banner" class="my-5 py-5">
                    <div class="container-fluid">
                        <h4>Ngày hội manga</h4>
                        <h1>SIÊU ƯU ĐÃI<br>LÊN ĐẾN 30%</h1>
                    </div>
                </section>
            </div>

            
        </section>

    <!--    <section id="watches" class="my-5">
            <div class="container text-center mt-5 py-5">
                <h3>SÁCH HOT</h3>
                <hr class="mx-auto">
            </div>
            <div class="row mx-auto container-fluid">
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="{{{'public/frontend/img/sach/GATSBY.j'}}}pg" alt="">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name">Gatsby Vĩ Đại</h5>
                    <h4 class="p-price">103.950 đ</h4>
                    <button class="buy-btn">MUA NGAY</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="{{{'public/frontend/img/sach/HIRA.jpg'}}}" alt="">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name">Keep It Up - Tập Viết Tiếng Nhật Theo Bảng Chữ Cái Hiragana</h5>
                    <h4 class="p-price">50.000 đ</h4>
                    <button class="buy-btn">MUA NGAY</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="{{{'public/frontend/img/sach/TANAKA.j'}}}pg" alt="">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name">Tanaka Lúc Nào Cũng Vật Vờ - Tập 1</h5>
                    <h4 class="p-price">38.000 đ</h4>
                    <button class="buy-btn">MUA NGAY</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="{{{'public/frontend/img/sach/TCNYTNSM'}}}.jpg" alt="">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name">Từng Có Người Yêu Tôi Như Sinh Mệnh </h5>
                    <h4 class="p-price">87.720 đ</h4>
                    <button class="buy-btn">MUA NGAY</button>
                </div>
            </div>
        </section> -->

@endsection
