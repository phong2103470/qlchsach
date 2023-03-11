 @extends('welcome')
 @section('content')
 <!-- Mat hang -->
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
                    <a href="{{ URL::to('/chi-tiet-san-pham/'. $product->SACH_MA) }}"><button class="buy-btn">XEM NGAY</button></a>
                </div>
                @endforeach
            </div>
        </section>
            <div class="banner-nho">
                <section id="banner" class="my-5 py-5">
                    <div class="container-fluid">
                        <h4>Ngày hội manga</h4>
                        <h1>SIÊU ƯU ĐÃI<br>LÊN ĐẾN 30%</h1>
                    </div>
                </section>
            </div>
            <section id="clothes" class="my-5">
            <div class="container text-center mt-5 py-5">
                <h3>SÁCH ĐẮT NHẤT</h3>
                <hr class="mx-auto">
            </div>    
               
            <div class="row mx-auto container-fluid">
                @foreach($exp_product as $key => $product)
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
                    <a href="{{ URL::to('/chi-tiet-san-pham/'. $product->SACH_MA) }}"><button class="buy-btn">XEM NGAY</button></a>
                </div>
                @endforeach
            </div>
        </section>
            
        

 

@endsection
