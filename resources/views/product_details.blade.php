<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/sweetalert.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" /> -->
    <!-- <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" /> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500&family=Rubik:wght@300&display=swap"
        rel="stylesheet">
    <title>Fresh Fruits</title>
</head>

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="LXd9GyhH"></script>
    <!-- <header id="header">
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
            <p class="font-rale font-size-12 text-black-50 m-0">Web dev by Hung Nguyen</p>
        </div>
    </header> -->
    <div class=top-gt>
        <marquee behavior="" direction="">C???a h??ng n??ng s???n s???ch v?? ch???t l?????ng. Chuy??n cung c???p c??c lo???i n??ng s???n s???ch,
            ch???t l?????ng cao, kh??ng t???m thu???c v?? c?? ngu???n g???c xu???t s??? r?? r??ng, ?????m b???o uy t??n v?? ch???t l?????ng , Tr??i c??y ?????c
            s???n Vi???t Nam, N??ng s???n nh???p nhi???u n??i tr??n th??? gi???i : M???, Australia, Canada,...</marquee>
        <a href=""><i class="fa-solid fa-clock"></i> 8:00 - 21:00</a>
        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="?????a ch???: 138/7 Tr???n V??nh Ki???t, Ninh Ki???u, C???n Th??"><i class="fa-solid fa-location-dot"></i> ?????A CH???</a>
        <a href=""><i class="fas fa-phone-volume"></i> 083.444.5508</a>

    </div>
    <div class="menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{URL::to('/trang-chu')}}"><b><img src="{{URL::to('frontend/image/logo-coop/logo22.jpg')}}" alt=""></b></a>
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
                                T???T C??? S???N PH???M
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($category as $key =>$cate_pro)
                                <li><a class="dropdown-item" href="{{URL::to('/danhmucsanpham/'.$cate_pro->idtheloai)}}">{{($cate_pro->tentheloai)}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item margin-menu-li">
                            <a class="nav-link active" id="nav-link-menu" aria-current="page" href="{{URL::to('/danhmucsanpham/5')}}">C??C G??I S???N
                                PH???M</a>
                        </li>
                        <li class="nav-item margin-menu-li">
                            <a class="nav-link active" id="nav-link-menu" aria-current="page" href="{{URL::to('/khuyen-mai')}}">KHUY???N M??I</a>
                        </li>
                        <li class="nav-item margin-menu-li">
                            <a class="nav-link active" id="nav-link-menu" href="{{URL::to('/lien-he')}}">LI??N H???</a>
                        </li>
                        <li class="nav-item margin-menu-li">
                            <a class="nav-link active" id="nav-link-menu" href="{{URL::to('/bai-viet')}}">G??C CHIA S???</a>
                        </li>
                    </ul>
                    <!-- search -->
                    <div class="d-flex mb-0 search-icon">
                        <div class="strip d-flex justify-content-between py-1 bg-light">
                            <button type="button" class="btn btn-outline-success myPopover border-0 "
                                data-toggle="popover" data-placement="bottom" data-html="true"
                                data-popover-content="#myPopoverContent"><i
                                    class="fa-solid fa-magnifying-glass" data-bs-toggle="tooltip" data-bs-placement="bottom" title="T??m Ki???m"></i></button>
                            <!-- Content for Popover: -->
                            <div id="myPopoverContent" style="display:none">
                                <ul style="padding:10px;list-style: none;font-family: 'Quicksand',sans-serif;">
                                    <li
                                        style="text-align: center;border-bottom: 2px solid rgba(128, 128, 128, 0.205); margin-bottom: 20px;font-size: 16px;">
                                        T??M KI???M</li>
                                    <li>
                                        <div class="input-group">
                                    <form action="{{URL::to('/tim-kiem')}}" method="POST">
                                            {{csrf_field()}}                     
                                            <div class="input-group-append">
                                            <input name="keywords_submit" type="text" class="form-control" placeholder="T??m ki???m s???n ph???m">
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
                                <button type="button" class="btn btn-outline-success border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="T??i Kho???n"><a href="{{URL::to('/login-checkout')}}"><i
                                            class="fa-solid fa-circle-user"></i></a></button>
                                <?php
                                }else{               
                                ?>
                                <button type="button" class="btn btn-outline-success border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="????ng Xu???t"><a href="{{URL::to('/logout-checkout')}}"><i class="fa-solid fa-right-from-bracket"></i></a></button>
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
                                <button type="button" class="btn btn-outline-success border-0 button-showcart-styling" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Gi??? H??ng"><a
                                        href="{{URL::to('/show-cart')}}"><i
                                            class="fa-solid fa-cart-shopping"></i><span class="number-product-styling"></span></a></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </div>
    @yield('content_details_product')
    <div class="final">
        <div class="d-flex p-1 mb-2 final-styling">
            <div class="flex-fill m-1 p-1 ">
                <div class="ms-5">
                    <p class="fw-bold fs-3">QUOC HUNG FRUITS</p>
                    <p>?????a ch???: 138/7 Tr???n V??nh Ki???t, Ninh Ki???u, C???n Th??</p>
                    <p>??i???n tho???i: <i class="fas fa-phone-volume"></i> 083.444.5508</p>
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
                <p>QUY ?????NH CH??NH S??CH</p>
                <p><a class="final-content" href="#"><i class="fas fa-angle-double-right"></i> H?????ng d???n ?????t h??ng v??
                        thanh to??n</a></p>
                <p><a class="final-content" href="#"><i class="fas fa-angle-double-right"></i> Ch??nh s??ch giao h??ng v??
                        ?????i tr???</a></p>
                <p><a class="final-content" href="{{URL::to('/object-detection')}}"><i class="fas fa-angle-double-right"></i> Nh???n d???ng ???nh</a>
                </p>
                <img src="{{URL::to('frontend/image/logo-coop/logo-bct-official.png')}}" alt="" width="180px" height="80px">
                </div>
            </div>
            <div class="flex-fill m-1 p-1 sub-final-styling">
               <div class="ms-5">
                <p>FANPAGE-FACEBOOK</p>
                <img src="{{URL::to('frontend/image/MXH/Facebook-fanpage.jpg')}}" alt="" width="200px" height="100px">
               </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('frontend/js/index.js')}}"></script>
    <script>
        $(document).on('click', '.number-spinner button', function () {
	var btn = $(this),
		oldValue = btn.closest('.number-spinner').find('input').val().trim(),
		newVal = 0;

	if (btn.attr('data-dir') == 'up') {
		newVal = parseInt(oldValue) + 50;
	} else {
		if (oldValue > 150) {
			newVal = parseInt(oldValue) - 50;
		} else {
			newVal = 100;
		}
	}
	btn.closest('.number-spinner').find('input').val(newVal);
});
    </script>
    <script>
        $(document).on('click', '.number-spinner2 button', function () {
	var btn = $(this),
		oldValue = btn.closest('.number-spinner2').find('input').val().trim(),
		newVal = 0;

	if (btn.attr('data-dir') == 'up') {
		newVal = parseInt(oldValue) + 1;
	} else {
		if (oldValue > 2) {
			newVal = parseInt(oldValue) - 1;
		} else {
			newVal = 1;
		}
	}
	btn.closest('.number-spinner2').find('input').val(newVal);
});
    </script>
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
                url:'{{url('/add-cart-ajax')}}',
                method: 'POST',
                data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_price:cart_product_price,cart_product_image:cart_product_image,cart_product_qty:cart_product_qty,_token:_token},
                success:function(){
                    swal({
                                title: "???? th??m s???n ph???m v??o gi??? h??ng",
                                text: "B???n c?? th??? mua h??ng ti???p ho???c t???i gi??? h??ng ????? ti???n h??nh thanh to??n",
                                showCancelButton: true,
                                cancelButtonText: "Mua ti???p",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "??i ?????n gi??? h??ng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/show-cart')}}";
                            });
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.add-to-cart2').click(function(){
            var id= $(this).data('id_product');
            var cart_product_id =$('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'{{url('/save-cart')}}',
                method: 'POST',
                data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_price:cart_product_price,cart_product_image:cart_product_image,cart_product_qty:cart_product_qty,_token:_token},
                success:function(){
                    swal({
                                title: "???? th??m s???n ph???m v??o gi??? h??ng",
                                text: "B???n c?? th??? mua h??ng ti???p ho???c t???i gi??? h??ng ????? ti???n h??nh thanh to??n",
                                showCancelButton: true,
                                cancelButtonText: "Mua ti???p",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "??i ?????n gi??? h??ng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/show-cart')}}";
                            });
                }
            });
        });
    });
</script>
</body>

</html>