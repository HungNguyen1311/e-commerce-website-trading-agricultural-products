<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/sweetalert.css')); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500&family=Rubik:wght@300&display=swap"
        rel="stylesheet">
    <title>Cửa Hàng Shop Trái Cây Nhập Khẩu QH Fruits </title>
</head>

<body>
    <!-- <header id="header">
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
            <p class="font-rale font-size-12 text-black-50 m-0">Web dev by Hung Nguyen</p>
        </div>
    </header> -->
    <div class=top-gt>
        <marquee behavior="" direction="">Cửa hàng nông sản sạch và chất lượng. Chuyên cung cấp các loại nông sản sạch,
            chất lượng cao, không tẩm thuốc và có nguồn gốc xuất sứ rõ ràng, đảm bảo uy tín và chất lượng , Trái cây đặc
            sản Việt Nam, Nông sản nhập nhiều nơi trên thế giới : Mỹ, Australia, Canada,...</marquee>
        <a href=""><i class="fa-solid fa-clock"></i> 8:00 - 21:00</a>
        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Địa chỉ: 138/7 Trần Vĩnh Kiết, Ninh Kiều, Cần Thơ"><i class="fa-solid fa-location-dot"></i> ĐỊA CHỈ</a>
        <a href=""><i class="fas fa-phone-volume"></i> 083.444.5508</a>
    </div>
    <div class="menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo e(URL::to('/trang-chu')); ?>"><b><img src="<?php echo e(URL::to('frontend/image/logo-coop/logo22.jpg')); ?>" alt=""></b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-2 m-auto margin-menu">
                        <li class="nav-item dropdown margin-menu-li">
                            <a class="nav-link dropdown-toggle nav-link active" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                TẤT CẢ SẢN PHẨM
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$cate_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="dropdown-item" href="<?php echo e(URL::to('/danhmucsanpham/'.$cate_pro->idtheloai)); ?>"><?php echo e(($cate_pro->tentheloai)); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                        
                        <li class="nav-item margin-menu-li">
                            <a class="nav-link active" id="nav-link-menu" aria-current="page" href="<?php echo e(URL::to('/danhmucsanpham/5')); ?>">CÁC GÓI SẢN
                                PHẨM</a>
                        </li>
                        <li class="nav-item margin-menu-li">
                            <a class="nav-link active" id="nav-link-menu" aria-current="page" href="<?php echo e(URL::to('/khuyen-mai')); ?>">KHUYẾN MÃI</a>
                        </li>
                        <li class="nav-item margin-menu-li">
                            <a class="nav-link active" id="nav-link-menu" href="<?php echo e(URL::to('/lien-he')); ?>">LIÊN HỆ</a>
                        </li>
                        <li class="nav-item margin-menu-li">
                            <a class="nav-link active" id="nav-link-menu" href="<?php echo e(URL::to('/bai-viet')); ?>">GÓC CHIA SẺ</a>
                        </li>
                        
                    </ul>
                    <!-- search -->
                    <div class="d-flex mb-0 search-icon">
                        <div class="strip d-flex justify-content-between py-1 bg-light">
                            <button type="button" class="btn btn-outline-success myPopover border-0 "
                                data-toggle="popover" data-placement="bottom" data-html="true"
                                data-popover-content="#myPopoverContent"><i
                                    class="fa-solid fa-magnifying-glass" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tìm Kiếm"></i></button>
                            <!-- Content for Popover: -->
                            <div id="myPopoverContent" style="display:none">
                                <ul style="padding:10px;list-style: none;font-family: 'Quicksand',sans-serif;">
                                    <li
                                        style="text-align: center;border-bottom: 2px solid rgba(128, 128, 128, 0.205); margin-bottom: 20px;font-size: 16px;">
                                        TÌM KIẾM</li>
                                    <li>
                                        <div class="input-group">
                                    <form action="<?php echo e(URL::to('/tim-kiem')); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>                     
                                            <div class="input-group-append">
                                            <input name="keywords_submit" type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
                                            <button class="btn btn-success " style="height: 40px;" type="submit"><i
                                                        class="fa-solid fa-magnifying-glass"></i></button>
                                            </div>
                                    </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <!-- login  -->
                    <div class="strip d-flex justify-content-between py-1 bg-light">
                        <div class="font-rale font-size-10 mt-0">
                            <div class="dangnhap">
                                <?php
                                $customer_id=Session::get('idkhachhang');
                                if($customer_id==NULL){                             
                                ?>
                                <button type="button" class="btn btn-outline-success border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tài Khoản"><a href="<?php echo e(URL::to('/login-checkout')); ?>"><i
                                            class="fa-solid fa-circle-user"></i></a></button>
                                <?php
                                }else{               
                                ?>
                                <button type="button" class="btn btn-outline-success border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Đăng Xuất"><a href="<?php echo e(URL::to('/logout-checkout')); ?>"><i class="fa-solid fa-right-from-bracket"></i></a></button>
                                <?php
                                }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                    <?php
                    $cartCollection=Cart::getContent();  
                    // echo '<prev>';
                    // print_r($content);
                    // echo '</prev>';         
                    ?>
                    <!-- Cart icon -->
                    <div class="strip d-flex justify-content-between  py-1 bg-light me-5">
                        <div class="font-rale font-size-10 mt-0">
                            <div class="giohang-icon-menu">
                                <button type="button" class="btn btn-outline-success border-0 button-showcart-styling" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Giỏ Hàng"><a
                                        href="<?php echo e(URL::to('/show-cart')); ?>"><i
                                            class="fa-solid fa-cart-shopping"></i><span class="number-product-styling"></span></a></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </div>
    <!--banner -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">         
            <?php $__currentLoopData = $get_banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $get_banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            if($key==0){
            ?>    
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <?php   
            }else{
            ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo e($key); ?>"aria-label="<?php echo e($key+1); ?>"></button>
            <?php
            }
            ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
        </div>
        <div class="carousel-inner">
        <?php $__currentLoopData = $get_banner_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $get_banner_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        if($k==0){       
        ?>
        <div class="carousel-item active">
            <img src="<?php echo e(URL::to($get_banner_image->hinhanh)); ?>" class="d-block w-100" alt="...">
        </div>
        <?php
        }else{    
        ?>
        <div class="carousel-item">
            <img src="<?php echo e(URL::to($get_banner_image->hinhanh)); ?>" class="d-block w-100" alt="...">
        </div>
        <?php
        }
        ?>        
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- banner-content -->
    <div class="banner-content-danhmuc">
        <section id="sm-banner-danhmuc" class="section-p1">
            <div class="banner-box">
                <h2>Nông Sản Củ</h2>              
               <a href="<?php echo e(URL::to('/danhmucsanpham/1')); ?>"><button class="btn btn-outline-light">Xem Thêm</button></a>
            </div>
            <div class="banner-box banner-box2">
                <h2>Nông Sản Lá</h2>               
                <a href="<?php echo e(URL::to('/danhmucsanpham/2')); ?>"><button class="btn btn-outline-light">Xem Thêm</button></a>
            </div>
            <div class="banner-box banner-box3">
                <h2>Nông Sản Gia Vị</h2>           
                <a href="<?php echo e(URL::to('/danhmucsanpham/4')); ?>"><button class="btn btn-outline-light">Xem Thêm</button></a>
            </div>
            <div class="banner-box banner-box4">
                <h2>Nông Sản Quả</h2>           
                <a href="<?php echo e(URL::to('/danhmucsanpham/3')); ?>"><button class="btn btn-outline-light">Xem Thêm</button></a>
            </div>
        </section>
    </div>
    <?php echo $__env->yieldContent('content'); ?>
    <div class="final">
        <div class="d-flex p-1 mb-2 final-styling">
            <div class="flex-fill m-1 p-1 ">
                <div class="ms-5">
                    <p class="fw-bold fs-3">QUOC HUNG FRUITS</p>
                    <p>Địa chỉ: 138/7 Trần Vĩnh Kiết, Ninh Kiều, Cần Thơ</p>
                    <p>Điện thoại: <i class="fas fa-phone-volume"></i> 083.444.5508</p>
                    <p>Email: quochungst1311@gmail.com</p>
                    <p>MST: 05284216845</p>
                </div>
                <div class="icon-mxh ms-5">
                    <i class="fab fa-youtube"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter-square"></i>
                </div>
            </div>
            <div class="flex-fill m-1 p-1 sub-final-styling">
                <div class="ms-5">
                <p>QUY ĐỊNH CHÍNH SÁCH</p>
                <p><a class="final-content" href="#"><i class="fas fa-angle-double-right"></i> Hướng dẫn đặt hàng và
                        thanh toán</a></p>
                <p><a class="final-content" href="#"><i class="fas fa-angle-double-right"></i> Chính sách giao hàng và
                        đổi trả</a></p>
                <p><a class="final-content" href="<?php echo e(URL::to('/object-detection')); ?>"><i class="fas fa-angle-double-right"></i> Nhận dạng ảnh</a>
                </p>
                <img src="<?php echo e(URL::to('frontend/image/logo-coop/logo-bct-official.png')); ?>" alt="" width="180px" height="80px">
                </div>
            </div>
            <div class="flex-fill m-1 p-1 sub-final-styling">
               <div class="ms-5">
                <p>FANPAGE-FACEBOOK</p>
                <img src="<?php echo e(URL::to('frontend/image/MXH/Facebook-fanpage.jpg')); ?>" alt="" width="200px" height="100px">
               </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('frontend/js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/index.js')); ?>"></script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
        $('.myPopover').popover({
            html: true,
            content: function () {
                var elementId = $(this).attr("data-popover-content");
                return $(elementId).html();
            }
        });
    </script>
    <style>
        .rw-header.rw-with-subtitle {
            background-color: green;
            font-family: 'Quicksand';
        }
        .rw-launcher{
            height: 50px;
            width: 50px;
        }
    </style>
    <script>
    !(function () {
    let e = document.createElement("script"),
    t = document.head || document.getElementsByTagName("head")[0];
  (e.src =
    "https://cdn.jsdelivr.net/npm/rasa-webchat@1.x.x/lib/index.js"),
    // Replace 1.x.x with the version that you want
    (e.async = !0),
    (e.onload = () => {
     sessionStorage.clear()
      window.WebChat.default(
        {
          initPayload:'/greet',  
          customData: { language: "en" },
          socketUrl: "http://localhost:5005",
          title: "Tư vấn khách hàng 24/7",
          subtitle: "Nhập vào yêu cầu để bắt đầu",
          inputTextFieldHint: "Nhập tin nhắn...",
          params:{storage: "session"},
          // add other props here
        },
        null
      );
    }),
    t.insertBefore(e, t.firstChild);
})();
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            var id= $(this).data('id_product');
            var cart_product_id =$('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'<?php echo e(url('/add-cart-ajax')); ?>',
                method: 'POST',
                data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_price:cart_product_price,cart_product_image:cart_product_image,cart_product_qty:cart_product_qty,_token:_token},
                success:function(){
                    swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Mua tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "<?php echo e(url('/show-cart')); ?>";
                            });

                }
            });
        });
    });
</script>
</body>

</html><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/welcome.blade.php ENDPATH**/ ?>