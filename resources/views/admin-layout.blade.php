<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
https://fontawesome.com/v4/icons/
-->
<!DOCTYPE html>
<head>
<title>FAA - Trang quản trị bán sách</title>
<link rel="shortcut icon" href="{{('public/frontend/img/logo.png')}}" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{URL::to('/dashboard')}}" class="logo">
        FAA
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>

<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="border-radius: 1.5em;">
				<i class="fa fa-calendar-o"></i>
				<?php
				$date_array = getdate();
				$formated_date  = "Hôm nay là: ";
				$formated_date .= $date_array['mday'] . "/";
				$formated_date .= $date_array['mon'] . "/";
				$formated_date .= $date_array['year'];
				print $formated_date;
				?>
			</a>
		</li>
		<li >
	</ul>
</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
			
                <img alt='' src="public/backend/images/nhanvien/
					<?php
						$avt= Session::get('NV_DUONGDANANHDAIDIEN');
						if ($avt) {
							echo $avt;
						}
					?>
					">
                <span class="username">

					<?php
						$name= Session::get('NV_HOTEN');
						if($name){
							echo $name;
						}
						?>
				</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
				<li><a href="{{URL::to('/show-employee')}}"><i class=" fa fa-user"></i>Tài khoản</a></li>
                <li><a href="{{URL::to('/log-out')}}"><i class="fa fa-key"></i>Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý sách</span>
                    </a>
                    <ul class="sub">
						<!-- sach -->
						<li><a href="{{URL::to('/add-product')}}">Thêm sách</a></li>
						<li><a href="{{URL::to('/all-product')}}">Liệt kê sách</a></li>
						<!-- hinh_anh_sach -->
						<li><a href="{{URL::to('/add-product-image')}}">Thêm ảnh sách</a></li>
						<li><a href="{{URL::to('/all-product-image')}}">Liệt kê ảnh sách</a></li>
						<!-- tac_gia --> 
						<li><a href="{{URL::to('/add-tacgia-product')}}">Thêm tác giả</a></li> 
						<li><a href="{{URL::to('/all-tacgia-product')}}">Liệt kê tác giả</a></li>
						<!-- co_tac_gia --> 
						<li><a href="{{URL::to('/add-tacgia-cuasach')}}">Thêm tác giả của sách</a></li>
						<li><a href="{{URL::to('/all-tacgia-cuasach')}}">Liệt kê tác giả của sách</a></li>
                    </ul>  
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
						<i class="fa fa-th-list"></i>
                        <span>Quản lý thể loại sách</span>
                    </a>
                    <ul class="sub">
						<!-- the_loai_sach -->
						<li><a href="{{URL::to('/add-category-product')}}">Thêm thể loại sách</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Liệt kê thể loại sách</a></li>
						<!-- cua_sach -->
						<li><a href="{{URL::to('/add-cttheloai-cuasach')}}">Thêm chi tiết thể loại sách</a></li>
						<li><a href="{{URL::to('/all-cttheloai-cuasach')}}">Liệt kê chi tiết thể loại sách</a></li>
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
						<i class="fa fa-archive"></i>
                        <span>Quản lý nhà xuất bản sách</span>
                    </a>
                    <ul class="sub">
						<!-- nha_xuat_ban -->
						<li><a href="{{URL::to('/add-brand-product')}}">Thêm nhà xuất bản</a></li>
						<li><a href="{{URL::to('/all-brand-product')}}">Liệt kê nhà xuất bản</a></li>
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-clipboard"></i>
                        <span>Quản lý đơn đặt hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/trang-thai/tat-ca')}}">Liệt kê các đơn đặt hàng</a></li> <!-- in cả sách? số lượng? đơn giá? -->
						<li><a href="{{URL::to('/all-lktt-trangthaiddh')}}">Liệt kê thông tin sửa đổi trạng thái đơn đặt hàng</a></li><!-- duoc_quan_ly_boi--> 
						<li><a href="{{URL::to('/all-nguoixuly')}}">Liệt kê người xử lý đơn hàng</a></li><!-- duoc_xu_ly--> 

						<!-- hinh_thuc_thanh_toan --> 
						<li><a href="{{URL::to('/add-hinhthu-thanhtoan')}}">Thêm hình thức thanh toán đơn đặt hàng</a></li>
						<li><a href="{{URL::to('/all-hinhthu-thanhtoan')}}">Liệt kê hình thức thanh toán đơn đặt hàng</a></li>
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
						<i class="fa fa-cubes"></i>
                        <span>Quản lý lô</span>
                    </a>
                    <ul class="sub">
						<!-- lo_nhap -->
						<li><a href="{{URL::to('/add-lonhap')}}">Thêm lô nhập</a></li> 
						<li><a href="{{URL::to('/all-lonhap')}}">Liệt kê lô nhập</a></li>
						<!-- chi_tiet_lo_nhap -->
						<li><a href="{{URL::to('/add-chitiet-lonhap')}}">Thêm chi tiết lô nhập</a></li> 
						<li><a href="{{URL::to('/all-chitiet-lonhap')}}">Liệt kê chi tiết lô nhập</a></li>
						<!-- lo_xuat -->
						<li><a href="{{URL::to('/add-loxuat')}}">Thêm lô xuất</a></li> 
						<li><a href="{{URL::to('/all-loxuat')}}">Liệt kê lô xuất</a></li>
						<!-- chi_tiet_lo_xuat -->
						<li><a href="{{URL::to('/add-chitiet-loxuat')}}">Thêm chi tiết lô xuất</a></li> 
						<li><a href="{{URL::to('/all-chitiet-loxuat')}}">Liệt kê chi tiết lô xuất</a></li>
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>Quản lý tài khoản</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-chucvu')}}">Thêm chức vụ</a></li>
						<li><a href="{{URL::to('/all-chucvu')}}">Liệt kê chức vụ</a></li>
						<li><a href="{{URL::to('/add-employee')}}">Thêm nhân viên</a></li>
						<li><a href="{{URL::to('/all-employee')}}">Liệt kê nhân viên</a></li>
						<li><a href="{{URL::to('/all-khachhang')}}">Liệt kê khách hàng</a></li>
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="{{URL::to('/show_feeship')}}"> 
						<i class="fa fa-truck"></i> 
                        <span>Quản lý phí ship</span> 
                    </a>
                </li>
				<li class="sub-menu">
                    <a href="{{URL::to('/thong-ke')}}">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Thống kê</span>
                    </a>
                </li>
                
            </ul>            </div>
			
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
         @yield('admin-content')
    </section>
 <!-- footer 
		  <div class="footer">
			<div class="wthree-copyright text-center">
			Faa Ⓒ All Rights Recieved
			</div>
		  </div>-->
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast'); 
	   }); 
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200); 
		  return false; 
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
