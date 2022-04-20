<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>DashBoard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}" >
<link rel="stylesheet" href="{{asset('backend/css/all.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('backend/css/font.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{asset('backend/css/regular.css')}}" type="text/css"/>
<link href="{{asset('backend/css/fontawesome.css')}}" rel="stylesheet"> 
<!-- calendar -->
<link rel="stylesheet" href="{{asset('backend/css/monthly.css')}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;1,300&family=Quicksand:wght@300;500&family=Rubik:wght@300&display=swap" rel="stylesheet"><script src="{{asset('backend/js/jquery-3.6.0.min.js')}}"></script>
<!-- Jquery-UI -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<!-- //Jquery-UI -->
<!-- Morris Chart -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- //Morris-chart -->

<script src="{{asset('backend/js/fontawesome.min.js')}}"></script>
<script src="{{asset('backend/js/conflict-detection.js')}}"></script>
<script src="{{asset('backend/js/regular.js')}}"></script>
<script src="{{asset('backend/js/solid.js')}}"></script>
<script src="{{asset('backend/js/fontawesome.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{URL::to('/dashboard')}}" class="logo">
        QH-FRUITS
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('backend/image/2.png')}}">
                <span class="username">
				Chào, <b>
				<?php
				$name=Session::get('admin_name');
				if($name){
					echo $name;					
        		}
        		?>
				</b>
				</span>            
            </a>
            <ul class="dropdown-menu extended logout">               
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Đăng Xuất</a></li>
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
                           
                <li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-list-ul"></i>
                    <span>Danh Mục Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Hiển thị danh mục</a></li>                   
                    </ul>
                </li>     
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-users"></i>
                        <span>Khách Hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/show-customer')}}">Hiển thị tất cả khách hàng</a></li>                   
                    </ul>
                </li>  
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-box"></i>
                        <span>Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
						<li><a href="{{URL::to('/add-sub-product')}}">Thêm lô sản phẩm</a></li>
						<li><a href="{{URL::to('/all-product')}}">Hiển thị sản phẩm</a></li>        
						<li><a href="{{URL::to('/show-sub-product')}}">Hiển thị lô sản phẩm</a></li>            
                    </ul>
                </li> 
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-calendar-check"></i>
                        <span>Chương Trình Khuyến Mãi</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-promotion')}}">Thêm khuyến mãi</a></li>
						<li><a href="{{URL::to('/all-promotion')}}">Hiển thị sản phẩm khuyến mãi</a></li>                   
                    </ul>
                </li>   
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-file-invoice"></i>
                        <span>Đơn Hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/unprocessed-order')}}">Đơn hàng chưa xử lý</a></li>
						<li><a href="{{URL::to('/complete-order')}}">Đơn hàng đã hoàn thành</a></li>                   
                    </ul>
                </li>  
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-sliders"></i>
                        <span>Banner</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-banner')}}">Thêm banner</a></li>
						<li><a href="{{URL::to('/show-banner')}}">Hiển thị tất cả banner</a></li>                   
                    </ul>
                </li>  
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-ticket"></i>
                        <span>Phiếu Nhập</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/all-form')}}">Hiển thị các phiếu nhập</a></li>                   
                    </ul>
                </li>  
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-user-tag"></i>
                        <span>Thương Hiệu Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu sản phẩm</a></li>
						<li><a href="{{URL::to('/all-brand-product')}}">Hiển thị thương hiệu sản phẩm</a></li>                   
                    </ul>
                </li>   
                <li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-ticket"></i>
                        <span>Mã Giảm Giá</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-coupon')}}">Thêm mã giảm giá</a></li>
						<li><a href="{{URL::to('/all-coupon')}}">Hiển thị các mã giảm giá </a></li>                   
                    </ul>
                </li>     
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-newspaper"></i>
                        <span>Bài Viết</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-post')}}">Thêm bài viết</a></li>
						<li><a href="{{URL::to('/all-post')}}">Hiển thị tất cả bài viết</a></li>                   
                    </ul>
                </li> 	
				<li class="sub-menu logout-styling">
                    <a href="{{URL::to('/logout')}}">
					<i class="fa-solid fa-arrow-right-to-bracket"></i>
                        <span>Đăng xuất</span>
                    </a>                  
                </li>		  
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		@yield('admin_content')
    </section>

</section>
<!--main content end-->
</section>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{asset('backend/js/bootstrap.js')}}"></script>
<script src="{{asset('backend/js/fontawesome.min.js')}}"></script>
<script src="{{asset('backend/js/all.min.js')}}"></script>
<script src="{{asset('backend/js/all.js')}}"></script>
<script src="{{asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('backend/js/scripts.js')}}"></script>
<script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('backend/js/jquery.scrollTo.js')}}"></script>
<script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('backend/js/jquery.scrollTo.js')}}"></script>
<script type="text/javascript">
	CKEDITOR.replace( 'ckeditor1', {
		filebrowserImageUploadUrl : "{{url('uploads-ckeditor?_token='.csrf_token())}}",
		filebrowserBrowseUrl : '{{url('file-browser?_token='.csrf_token())}}',       
		filebrowserUploadMethod: 'form' 
	});
	CKEDITOR.replace( 'ckeditor2', {
		filebrowserImageUploadUrl : "{{url('uploads-ckeditor?_token='.csrf_token())}}",
		filebrowserBrowseUrl : '{{url('file-browser?_token='.csrf_token())}}',       
		filebrowserUploadMethod: 'form' 
	});
	CKEDITOR.replace( 'ckeditor3', {
		filebrowserImageUploadUrl : "{{url('uploads-ckeditor?_token='.csrf_token())}}",
		filebrowserBrowseUrl : '{{url('file-browser?_token='.csrf_token())}}',       
		filebrowserUploadMethod: 'form' 
	});
	CKEDITOR.replace( 'ckeditor4', {
		filebrowserImageUploadUrl : "{{url('uploads-ckeditor?_token='.csrf_token())}}",
		filebrowserBrowseUrl : '{{url('file-browser?_token='.csrf_token())}}',       
		filebrowserUploadMethod: 'form' 
	});
</script>
<script type="text/javascript">			
$(document).ready(function(){
	chart30daysorder();
	var chart=new Morris.Bar({
					// ID of the element in which to draw the chart.
					element: 'chart',
					lineColors:['#326da8','#89a832','#a83632','#a87d32','#a87d32'],
					pointFillColors:['#ffffff'],
					pointStrokeColors:['black'],
					fillOpacity:0.3,
					hideHover:'auto',
					parseTime:false,
					xkey: 'period',
					// A list of names of data record attributes that contain y-values.
					ykeys: ['order','sales','profit','quantity'],
					behaveLikeLine:true,
					// Labels for the ykeys -- will be displayed when you hover over the
					// chart.
					labels: ['Đơn hàng','Doanh số','Lợi nhuận','Số lượng']
				});	
	function chart30daysorder(){
		var _token=$('input[name="_token"]').val();
		$.ajax({
			url:"{{url('/days-order')}}",
			method:"POST",
			dataType:"JSON",
			data:{_token:_token},
			success:function(data){
				chart.setData(data);
			}
		});
	};

	$('#btn-dashboard-filter').click(function(){
		var _token=$('input[name="_token"]').val();
		var from_date=$('#datepicker').val();
		var to_date=$('#datepicker2').val();
		$.ajax({
			url:"{{url('/filter-by-date')}}",
			method:"POST",
			dataType:"JSON",
			data:{from_date:from_date,to_date:to_date,_token:_token},
			success:function(data){
				chart.setData(data);
			}
		});
	});
	$('.dashboard-filter').change(function(){
		var dashboard_value=$(this).val();
		var _token=$('input[name="_token"]').val();
		$.ajax({
			url:"{{url('/dashboard-filter')}}",
			method:"POST",
			dataType:"JSON",
			data:{dashboard_value:dashboard_value,_token:_token},
			success:function(data){
				chart.setData(data);
			}
		});
	});
});
</script>
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
	<script type="text/javascript" src="{{asset('backend/js/monthly.js')}}"></script>
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
	<!-- Datepicker -->
<script type="text/javascript">
	$( function(){
		$( "#datepicker" ).datepicker({
			prevText:"Tháng trước",
			nextText:"Tháng sau",
			dateFormat:"yy-mm-dd",
			dayNamesMin:["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
			duration:"slow"
		});
		$( "#datepicker2" ).datepicker({
			prevText:"Tháng trước",
			nextText:"Tháng sau",
			dateFormat:"yy-mm-dd",
			dayNamesMin:["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
			duration:"slow"
		});
	});
</script>
	<!-- //Datepicker -->
</body>
</html>
