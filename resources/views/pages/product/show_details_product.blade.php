@extends('all-product')
@section('content')

<!--Chi tiet sach-->
<section class="container sproduct my-2 pt-1">

    <div class="row mt-1">
        @foreach($product_detail as $key => $value)
        <div class="col-lg-5 col-md-12 col-12">
         <img class="img-fluid w-100 pb-1" id="MainImg" src="../public/frontend/img/sach/{{$value->HAS_DUONGDAN}}" alt="">
        </div>
            <div class="col-lg-7 col-md-12 col-12" style="text-align:justify">
                <h2 class="py-4">{{$value->SACH_TEN}}</h2>
                <form action="{{URL::to('/save-cart')}}" method="POST">
                    {{ csrf_field() }}
                                          
                    <h2>{{number_format($value->SACH_GIA)}} đ</h2>
                    <p>Số lượng: <input name="qty" type="number" min="1" value="1"></p>
					<input name="productid_hidden" type="hidden"  value="{{$value->SACH_MA}}" />

                    <button type = "submit" class="buy-btn">THÊM GIỎ HÀNG</button>
                </form>
                <h3 class="mt-5 mb-3">Mô tả sách </h3>
                <hr class="">
                <p><span class="bold">Tác giả: </span>
                @foreach($author_product as $key => $au)
                {{$au->TG_HOTEN}} |
                @endforeach
                </p>

                <p><span class="bold">Thể loại: </span>
                @foreach($category_product as $key => $cate)
                {{$cate->TLS_TEN}} |
                @endforeach
                </p>

                <p><span class="bold">Nội dung: </span>{{$value->SACH_MOTA}}</p>
                <p><span class="bold">Ngôn ngữ: </span>{{$value->NN_TEN}}</p>
                <p><span class="bold">Nhà xuất bản: </span>{{$value->NXB_TEN}}</p>
                <p><span class="bold">Số trang: </span>{{$value->SACH_SOTRANG}}</p>
                <p><span class="bold">ISBN: </span>{{$value->SACH_ISBN}}</p>
            </div>
        @endforeach
    </div>
</section>



    <!--Sach lien quan-->
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Sách liên quan</h3>
            <hr class="mx-auto">
        </div>

        <div class="row mx-auto container-fluid">
            @foreach($product_relate as $key => $relate)
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="../public/frontend/img/sach/{{$relate->HAS_DUONGDAN}}" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">{{$relate->SACH_TEN}}</h5>
                <h4 class="p-price">{{number_format($relate->SACH_GIA)}}</h4>
                <a href="{{ URL::to('/chi-tiet-san-pham/'. $relate->SACH_MA) }}"><button class="buy-btn">XEM NGAY</button></a>
            </div>
            @endforeach
        </div>
    </section>


@endsection