<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Trang Quản Lý Admin </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?php echo e(asset('backend/css//style.css')); ?>" rel='stylesheet' type='text/css' />
<link href="<?php echo e(asset('backend/css/style-responsive.css')); ?>" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?php echo e(asset('backend/css/font.css')); ?>" type="text/css"/>
<link href="<?php echo e(asset('backend/css/font-awesome.css')); ?>" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="admin-login-body">
    <div class="log-w3">
    <div class="w3layouts-main">
        <h2>ĐĂNG KÝ THÀNH VIÊN</h2>
        <?php
        $messeage=Session::get('message');
        if($messeage){
            echo '<span class="text-aler">'.$messeage.'</span>';
            Session::put('message',null);
        }
        ?>
            <form action="<?php echo e(URL::to('/save-validation')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="text" class="ggg" name="admin_name" placeholder="Họ và tên"   required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                <input type="text" class="ggg" name="admin_address" placeholder="Địa chỉ"   required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                <input type="text" class="ggg" name="admin_phone" placeholder="Số điện thoại"   required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                <input type="text" class="ggg" name="admin_email" placeholder="Tài Khoản"   required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                <input type="password" class="ggg" name="admin_password" placeholder="Mật Khẩu"   required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                    <div class="clearfix"></div>
                    <input type="submit" value="Đăng Ký" name="login">
            </form>
    </div>
    </div>
</div>
<script src="<?php echo e(asset('backend/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/jquery.nicescroll.js')); ?>"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?php echo e(asset('backend/js/jquery.scrollTo.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\luanvan\resources\views//admin_validation.blade.php ENDPATH**/ ?>