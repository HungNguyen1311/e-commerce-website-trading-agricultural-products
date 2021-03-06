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
				Ch??o, <b>
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
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> ????ng Xu???t</a></li>
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
                    <span>Danh M???c S???n Ph???m</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Th??m danh m???c s???n ph???m</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Hi???n th??? danh m???c</a></li>                   
                    </ul>
                </li>     
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-users"></i>
                        <span>Kh??ch H??ng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/show-customer')}}">Hi???n th??? t???t c??? kh??ch h??ng</a></li>                   
                    </ul>
                </li>  
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-box"></i>
                        <span>S???n Ph???m</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Th??m s???n ph???m</a></li>
						<li><a href="{{URL::to('/add-sub-product')}}">Th??m l?? s???n ph???m</a></li>
						<li><a href="{{URL::to('/all-product')}}">Hi???n th??? s???n ph???m</a></li>        
						<li><a href="{{URL::to('/show-sub-product')}}">Hi???n th??? l?? s???n ph???m</a></li>            
                    </ul>
                </li> 
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-calendar-check"></i>
                        <span>Ch????ng Tr??nh Khuy???n M??i</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-promotion')}}">Th??m khuy???n m??i</a></li>
						<li><a href="{{URL::to('/all-promotion')}}">Hi???n th??? s???n ph???m khuy???n m??i</a></li>                   
                    </ul>
                </li>   
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-file-invoice"></i>
                        <span>????n H??ng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/unprocessed-order')}}">????n h??ng ch??a x??? l??</a></li>
						<li><a href="{{URL::to('/complete-order')}}">????n h??ng ???? ho??n th??nh</a></li>                   
                    </ul>
                </li>  
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-sliders"></i>
                        <span>Banner</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-banner')}}">Th??m banner</a></li>
						<li><a href="{{URL::to('/show-banner')}}">Hi???n th??? t???t c??? banner</a></li>                   
                    </ul>
                </li>  
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-ticket"></i>
                        <span>Phi???u Nh???p</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/all-form')}}">Hi???n th??? c??c phi???u nh???p</a></li>                   
                    </ul>
                </li>  
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-user-tag"></i>
                        <span>Th????ng Hi???u S???n Ph???m</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">Th??m th????ng hi???u s???n ph???m</a></li>
						<li><a href="{{URL::to('/all-brand-product')}}">Hi???n th??? th????ng hi???u s???n ph???m</a></li>                   
                    </ul>
                </li>   
                <li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-ticket"></i>
                        <span>M?? Gi???m Gi??</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-coupon')}}">Th??m m?? gi???m gi??</a></li>
						<li><a href="{{URL::to('/all-coupon')}}">Hi???n th??? c??c m?? gi???m gi?? </a></li>                   
                    </ul>
                </li>     
				<li class="sub-menu">
                    <a href="javascript:;">
					<i class="fa-solid fa-newspaper"></i>
                        <span>B??i Vi???t</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-post')}}">Th??m b??i vi???t</a></li>
						<li><a href="{{URL::to('/all-post')}}">Hi???n th??? t???t c??? b??i vi???t</a></li>                   
                    </ul>
                </li> 	
				<li class="sub-menu logout-styling">
                    <a href="{{URL::to('/logout')}}">
					<i class="fa-solid fa-arrow-right-to-bracket"></i>
                        <span>????ng xu???t</span>
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
					labels: ['????n h??ng','Doanh s???','L???i nhu???n','S??? l?????ng']
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
			prevText:"Th??ng tr?????c",
			nextText:"Th??ng sau",
			dateFormat:"yy-mm-dd",
			dayNamesMin:["Th??? 2", "Th??? 3", "Th??? 4", "Th??? 5", "Th??? 6", "Th??? 7", "Ch??? nh???t"],
			duration:"slow"
		});
		$( "#datepicker2" ).datepicker({
			prevText:"Th??ng tr?????c",
			nextText:"Th??ng sau",
			dateFormat:"yy-mm-dd",
			dayNamesMin:["Th??? 2", "Th??? 3", "Th??? 4", "Th??? 5", "Th??? 6", "Th??? 7", "Ch??? nh???t"],
			duration:"slow"
		});
	});
</script>
	<!-- //Datepicker -->
</body>
</html>
