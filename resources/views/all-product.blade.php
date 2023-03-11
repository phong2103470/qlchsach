<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faa - Cửa hàng bán sách trực tuyến</title>
    <link rel="shortcut icon" href="{{('../public/frontend/img/logo.png')}}" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <script src="https://kit.fontawesome.com/b76b24adf8.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">

</head>

<body>
    <script type="text/javascript">
        const loading_icon_url = 'https://mir-s3-cdn-cf.behance.net/project_modules/max_632/04de2e31234507.564a1d23645bf.gif';
    </script>

    <header>
        <div id="top_banner" style="background-color:#DFC8FF">
            <img src="{{('../public/frontend/img/banner/banner-top.jpg')}}"
                alt="" />
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 sticky-top">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span id="bar" class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a href="{{URL::to('/trang-chu')}}"><img src="{{('../public/frontend/img/Faa-basic.png')}}" alt=""></a>

                    <ul class="navbar-nav ml-auto text-right">
                        <li class="nav-item">
                            <form class="d-flex">
                                <input class="form-control me-2" type="text" placeholder="Nhập sách cần tìm...">
                                <button class="btn btn-link" type="button"><a href="search.html"><i
                                            class="fa fa-search icon-white"></i></a></button>
                            </form>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('/trang-chu')}}">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button type="button" class="btn btn-link dropdown-toggle nav-link nav-item"
                                    data-bs-toggle="dropdown">
                                    Danh mục sản phẩm
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ URL::to('/danh-muc-san-pham/tat-ca')}}">- - Tất cả sản phẩm - -</a></li>

                                    @foreach($category as $key => $cate)

                                    <li><a class="dropdown-item" href="{{ URL::to('/danh-muc-san-pham/'. $cate->TLS_MA) }}">{{ $cate->TLS_TEN }}</a></li>

                                    @endforeach
                                </ul>

                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="cart.html">Giỏ hàng</a>
                        </li>
                        <li class="nav-item" display=hidden>
                            <a class="nav-link" href="login.html">Đăng nhập / Đăng ký</a>
                        </li>
                </div>
            </div>
        </nav>
    </header>

    <main class="container container-fluid pt-1 ">

    @yield('content')

    </main>
    <footer class="mt-5 py-5">
        <div class="row container-fluid mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-12 center mb-3">
                <img src="{{('../public/frontend/img/Faa-color.png')}}" alt="">
                <p class="pt-3">................................................</p>
                <div class="copyright mt-1 mb-5">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                </div>
            </div>
            <div class=" footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">DỊCH VỤ</h5>
                <ul class=" list-unstyled">
                    <li><a href="#">Điều khoản sử dụng</a></li>
                    <li><a href="#">Chính sách bảo mật thông tin cá nhân</a></li>
                    <li><a href="#">Chính sách bảo mật thanh toán</a></li>
                    <li><a href="#">Giới thiệu Fahasa</a></li>
                    <li><a href="#">Hệ thống trung tâm - nhà sách</a></li>
                </ul>
            </div>
            <div class=" footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">HỖ TRỢ</h5>
                <ul class=" list-unstyled">
                    <li><a href="#">Chính sách đổi - trả - hoàn tiền</a></li>
                    <li><a href="#">Chính sách bảo hành - bồi hoàn</a></li>
                    <li><a href="#">Chính sách vận chuyển</a></li>
                    <li><a href="#">Chính sách khách sỉ</a></li>
                    <li><a href="#">Phương thức thanh toán và xuất HĐ</a></li>
                </ul>
            </div>
            <div class=" footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">LIÊN HỆ NHÓM 1</h5>
                <ul class="list-unstyled">
                    <li>
                        <p><i class="fa-solid fa-user"></i> Nguyễn Phương Hiếu</p>
                    </li>
                    <li>
                        <p><i class="fa-solid fa-envelope"></i> hieub2003737@student.ctu.edu.vn</p>
                    </li>
                    <li>
                        <p><i class="fa-solid fa-user"></i> Nguyễn Thị Ngọc Hương</p>
                    </li>
                    <li>
                        <p><i class="fa-solid fa-user"></i> Trịnh Ngọc Ngân</p>
                    </li>
                    <li>
                        <p><i class="fa-solid fa-user"></i> Nguyễn Hồng Diễm</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="center">
            <p>Faa Ⓒ All Rights Recieved</p>
        </div>
    </footer>

</body>

</html>
