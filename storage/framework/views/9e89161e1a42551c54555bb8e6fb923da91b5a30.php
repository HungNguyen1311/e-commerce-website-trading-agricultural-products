
<?php $__env->startSection('content'); ?>
<div class="content">
        <!-- TRAI CAY NHAP KHAU -->
        <div class="TCNK">
            <?php
            $current_url=URL::current();
            ?>
            <div class="container-fluid">
                <div class="content-tctnk">
                    <p>-- NÔNG SẢN HỮU CƠ --</p>
                </div>
                <div class="mieuta-content">
                    <p>NÔNG SẢN ĐƯỢC NHẬP KHẨU TỪ NHIỀU NƠI TRÊN THẾ GIỚI</p>
                </div>
                <div class="row d-inline-flex">
                    <!-- Gallery Item 1 -->
                    <?php $__currentLoopData = $all_product_tcnk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product_tcnk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-sm-6 col-md-3 p-2 grid-product">
                        <form>
                            <?php echo e(csrf_field()); ?>

                        <div class="d-flex flex-column text-center height100">
                        <?php if($product_tcnk->soluongton==0){ 
                                        ?>
                                        <div class="grid-product-img">
                                            <a href="<?php echo e(URL::to('/chitietsanpham/'.$product_tcnk->idsanpham)); ?>">
                                                <img src="<?php echo e(URL::to($product_tcnk->hinhanh1)); ?>" />
                                                <h2><button>HẾT HÀNG!</button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4><?php echo e($product_tcnk->tensanpham); ?></h4>
                                        <?php
                            $discount_percent=($product_tcnk->giakhuyenmai/$product_tcnk->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                            if($product_tcnk->giakhuyenmai==NULL){
                            ?>
                                        <p id="price"><?php echo e(number_format($product_tcnk->giaban)); ?><u>đ</u></p>
                                        <?php
                            }else{                             
                            ?>
                                        <p id="price"><?php echo e(number_format($product_tcnk->giakhuyenmai)); ?><u>đ</u>
                                            <del><?php echo e(number_format($product_tcnk->giaban)); ?> <u>đ</u> </del><label
                                                for="">-<?php echo e($discount_percent_total); ?>%</label></p>
                                        <?php
                            }
                            ?>
                                        <input type="hidden" name="productid_home_hidden" value="<?php echo e($product_tcnk->idsanpham); ?>">
                                        <div class="shopping-cart">
                                            <span id="out_product">Hết Hàng!</span>                    
                                        <?php }else{ 
                                        ?>

                                        <input type="hidden" value="<?php echo e($product_tcnk->idsanpham); ?>" class="cart_product_id_<?php echo e($product_tcnk->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($product_tcnk->tensanpham); ?>" class="cart_product_name_<?php echo e($product_tcnk->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($product_tcnk->hinhanh1); ?>" class="cart_product_image_<?php echo e($product_tcnk->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($product_tcnk->giaban); ?>" class="cart_product_price_<?php echo e($product_tcnk->idsanpham); ?>">
                                        <input type="hidden" value="1" class="cart_product_qty_<?php echo e($product_tcnk->idsanpham); ?>">
                                        
                                        <div class="grid-product-img">
                                            <a href="<?php echo e(URL::to('/chitietsanpham/'.$product_tcnk->idsanpham)); ?>">
                                                <img src="<?php echo e(URL::to($product_tcnk->hinhanh1)); ?>" />
                                                <h2><button>XEM CHI TIẾT <i class="fa-solid fa-right-long"></i></button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4><?php echo e($product_tcnk->tensanpham); ?></h4>
                                        <?php
                            $discount_percent=($product_tcnk->giakhuyenmai/$product_tcnk->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                            if($product_tcnk->giakhuyenmai==NULL){
                            ?>
                                        <p id="price"><?php echo e(number_format($product_tcnk->giaban)); ?><u>đ</u></p>
                                        <?php
                            }else{                             
                            ?>
                                        <p id="price"><?php echo e(number_format($product_tcnk->giakhuyenmai)); ?><u>đ</u>
                                            <del><?php echo e(number_format($product_tcnk->giaban)); ?> <u>đ</u> </del><label
                                                for="">-<?php echo e($discount_percent_total); ?>%</label></p>
                                        <?php
                            }
                            ?>
                                        <input type="hidden" name="productid_home_hidden" value="<?php echo e($product_tcnk->idsanpham); ?>">
                                        <div class="shopping-cart">
                                        <button type="button" id="tvgh" class="add-to-cart"  data-id_product="<?php echo e($product_tcnk->idsanpham); ?>" ><i class="fas fa-shopping-cart add-to-cart"></i> Thêm
                                                vào giỏ hàng</button> 
                                        <?php } 
                                        ?>                                                                   
                                        </div>
                                    </div>
                                </form>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                   
                </div>
            </div>
            <a href="<?php echo e(URL::to('/danhmucsanpham/2')); ?>"><div class="btn-xemthem"><button id="xt-btn">XEM THÊM</button></div></a>
        </div>
        <!-- SAN PHAM MOI  -->
        <div class="spm">
            <div class="container-fluid">
                <div class="content-tctnk">
                    <p>-- SẢN PHẨM MỚI --</p>
                </div>
                <div class="mieuta-content">
                    <p>NÔNG SẢN MỚI ĐẢM BẢO CHẤT LƯỢNG CAO</p>
                </div>
                
                <div class="row d-inline-flex">
                    <!-- Gallery Item 1 -->
                    <?php $__currentLoopData = $all_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                    <div class="col-12 col-sm-6 col-md-3 p-2 grid-product">
                        <div class="d-flex flex-column text-center height100">
                        <form>
                        <?php echo e(csrf_field()); ?>

                        <?php if($product->soluongton==0){ 
                                        ?>
                                        <div class="grid-product-img">
                                            <a href="<?php echo e(URL::to('/chitietsanpham/'.$product->idsanpham)); ?>">
                                                <img src="<?php echo e(URL::to($product->hinhanh1)); ?>" />
                                                <h2><button>HẾT HÀNG!</button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4><?php echo e($product->tensanpham); ?></h4>
                                        <?php
                            $discount_percent=($product->giakhuyenmai/$product->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                            if($product->giakhuyenmai==NULL){
                            ?>
                                        <p id="price"><?php echo e(number_format($product->giaban)); ?><u>đ</u></p>
                                        <?php
                            }else{                             
                            ?>
                                        <p id="price"><?php echo e(number_format($product->giakhuyenmai)); ?><u>đ</u>
                                            <del><?php echo e(number_format($product->giaban)); ?> <u>đ</u> </del><label
                                                for="">-<?php echo e($discount_percent_total); ?>%</label></p>
                                        <?php
                            }
                            ?>
                                        <input type="hidden" name="productid_home_hidden" value="<?php echo e($product->idsanpham); ?>">
                                        <div class="shopping-cart">
                                            <span id="out_product">Hết Hàng!</span>                    
                                        <?php }else{ 
                                        ?>
                                        <input type="hidden" value="<?php echo e($product->idsanpham); ?>" class="cart_product_id_<?php echo e($product->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($product->tensanpham); ?>" class="cart_product_name_<?php echo e($product->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($product->hinhanh1); ?>" class="cart_product_image_<?php echo e($product->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($product->giaban); ?>" class="cart_product_price_<?php echo e($product->idsanpham); ?>">
                                        <input type="hidden" value="1" class="cart_product_qty_<?php echo e($product->idsanpham); ?>">


                                        <div class="grid-product-img">
                                            <a href="<?php echo e(URL::to('/chitietsanpham/'.$product->idsanpham)); ?>">
                                                <img src="<?php echo e(URL::to($product->hinhanh1)); ?>" />
                                                <h2><button>XEM CHI TIẾT <i class="fa-solid fa-right-long"></i></button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4><?php echo e($product->tensanpham); ?></h4>
                                        <?php
                            $discount_percent=($product->giakhuyenmai/$product->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                            if($product->giakhuyenmai==NULL){
                            ?>
                                        <p id="price"><?php echo e(number_format($product->giaban)); ?><u>đ</u></p>
                                        <?php
                            }else{                             
                            ?>
                                        <p id="price"><?php echo e(number_format($product->giakhuyenmai)); ?><u>đ</u>
                                            <del><?php echo e(number_format($product->giaban)); ?> <u>đ</u> </del><label
                                                for="">-<?php echo e($discount_percent_total); ?>%</label></p>
                                        <?php
                            }
                            ?>
                                        <input type="hidden" name="productid_home_hidden" value="<?php echo e($product->idsanpham); ?>">
                                        <div class="shopping-cart">
                                        <button type="button" id="tvgh" class="add-to-cart"  data-id_product="<?php echo e($product->idsanpham); ?>" ><i class="fas fa-shopping-cart add-to-cart"></i> Thêm
                                                vào giỏ hàng</button>  
                                        <?php } 
                                        ?>                                     
                                        </div>
                                    </div>
                                </form>
                    </div>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                 
                </div>
            </div>
            <a href="<?php echo e(URL::to('/sanphammoi')); ?>"><div class="btn-xemthem"><button id="xt-btn">XEM THÊM</button></div></a>
        </div>
        <!-- banner-content -->
        <div class="banner-content">
            <section id="sm-banner" class="section-p1">
                <div class="banner-box">
                    <h4>Combo Gói Sản Phẩm</h4>
                    <h2>Giá Cực Sốc</h2>
                    <a href="<?php echo e(URL::to('/danhmucsanpham/5')); ?>"><button class="btn btn-outline-light">Xem Thêm</button></a>
                </div>
                <div class="banner-box banner-box2">
                    <h4>Sản Phẩm Mới</h4>
                    <h2>Chất Lượng Cao</h2>
                    <a href="<?php echo e(URL::to('/sanphammoi')); ?>"><button class="btn btn-outline-light">Xem Thêm</button></a>
                </div>
            </section>
        </div>
        <!-- SAN PHAM BAN CHAY -->
        <div class="spbc">
            <div class="container-fluid">
                <div class="content-tctnk">
                    <p>-- SẢN PHẨM BÁN CHẠY --</p>
                </div>
                <div class="mieuta-content">
                    <p>NÔNG SẢN ĐƯỢC TIÊU DÙNG PHỔ BIẾN</p>
                </div>
                <div class="row d-inline-flex">
                    <!-- Gallery Item 1 -->
                    <?php $__currentLoopData = $most_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $most_selling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                    <div class="col-12 col-sm-6 col-md-3 p-2 grid-product">
                        <div class="d-flex flex-column text-center height100">
                        <form>
                        <?php echo e(csrf_field()); ?>

                        <?php if($most_selling->soluongton==0){ 
                                        ?>
                                        <div class="grid-product-img">
                                            <a href="<?php echo e(URL::to('/chitietsanpham/'.$most_selling->idsanpham)); ?>">
                                                <img src="<?php echo e(URL::to($most_selling->hinhanh1)); ?>" />
                                                <h2><button>HẾT HÀNG!</button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4><?php echo e($most_selling->tensanpham); ?></h4>
                                        <?php
                            $discount_percent=($most_selling->giakhuyenmai/$most_selling->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                            if($most_selling->giakhuyenmai==NULL){
                            ?>
                                        <p id="price"><?php echo e(number_format($most_selling->giaban)); ?><u>đ</u></p>
                                        <?php
                            }else{                             
                            ?>
                                        <p id="price"><?php echo e(number_format($most_selling->giakhuyenmai)); ?><u>đ</u>
                                            <del><?php echo e(number_format($most_selling->giaban)); ?> <u>đ</u> </del><label
                                                for="">-<?php echo e($discount_percent_total); ?>%</label></p>
                                        <?php
                            }
                            ?>
                                        <input type="hidden" name="productid_home_hidden" value="<?php echo e($most_selling->idsanpham); ?>">
                                        <div class="shopping-cart">
                                            <span id="out_product">Hết Hàng!</span>                    
                                        <?php }else{ 
                                        ?>

                                        <input type="hidden" value="<?php echo e($most_selling->idsanpham); ?>" class="cart_product_id_<?php echo e($most_selling->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($most_selling->tensanpham); ?>" class="cart_product_name_<?php echo e($most_selling->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($most_selling->hinhanh1); ?>" class="cart_product_image_<?php echo e($most_selling->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($most_selling->giaban); ?>" class="cart_product_price_<?php echo e($most_selling->idsanpham); ?>">
                                        <input type="hidden" value="1" class="cart_product_qty_<?php echo e($most_selling->idsanpham); ?>">
                                        <div class="grid-product-img">
                                            <a href="<?php echo e(URL::to('/chitietsanpham/'.$most_selling->idsanpham)); ?>">
                                                <img src="<?php echo e(URL::to($most_selling->hinhanh1)); ?>" />
                                                <h2><button>XEM CHI TIẾT <i class="fa-solid fa-right-long"></i></button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4><?php echo e($most_selling->tensanpham); ?></h4>
                                        <?php
                            $discount_percent=($most_selling->giakhuyenmai/$most_selling->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                            if($most_selling->giakhuyenmai==NULL){
                            ?>
                                        <p id="price"><?php echo e(number_format($most_selling->giaban)); ?><u>đ</u></p>
                                        <?php
                            }else{                             
                            ?>
                                        <p id="price"><?php echo e(number_format($most_selling->giakhuyenmai)); ?><u>đ</u>
                                            <del><?php echo e(number_format($most_selling->giaban)); ?> <u>đ</u> </del><label
                                                for="">-<?php echo e($discount_percent_total); ?>%</label></p>
                                        <?php
                            }
                            ?>
                                        <input type="hidden" name="productid_home_hidden" value="<?php echo e($most_selling->idsanpham); ?>">
                                        <div class="shopping-cart">
                                        <button type="button" id="tvgh" class="add-to-cart"  data-id_product="<?php echo e($most_selling->idsanpham); ?>" ><i class="fas fa-shopping-cart add-to-cart"></i> Thêm
                                                vào giỏ hàng</button>                                           
                                        <?php } 
                                        ?>                                     
                                        </div>
                                    </div>
                                </form>
                    </div>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                               
                </div>
            </div>
        </div>

        <!-- Quang Ba Thuong Hieu -->
        <div class="quangbathuonghieu">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-5 img-quangba ">
                        <div id="zoom-in">
                            <img src="frontend/image/logo-coop/food-safety-logo2.png" alt="">
                        </div>
                    </div>
                    <div class="col-sm-7 ">
                        <p class="quangba-content-brand">QH FRUITS - NÔNG SẢN TƯƠI, CHẤT LƯỢNG CAO</p>
                        <P class="quangba-content"><i class="fas fa-check"></i> CUNG CẤP CÁC LOẠI NÔNG SẢN TƯƠI, CHẤT
                            LƯỢNG.</P>
                        <p class="quangba-content"><i class="fas fa-check"></i> CÁC LOẠI NÔNG SẢN ĐƯỢC NHẬP CHÍNH GỐC.
                        </p>
                        <p class="quangba-content"><i class="fas fa-check"></i> ĐẢM BẢO VỆ SINH, AN TOÀN THỰC PHẨM.</p>
                        <p class="quangba-content"><i class="fas fa-check"></i> GIAO HÀNG HOÀN TOÀN MIỄN PHÍ, CÓ NGAY
                            SAU KHI ĐẶT HÀNG.</p>
                    </div>
                </div>
            </div>
            <!-- Doi Tac -->
        </div>
        <div class="doitac">
            <p id="doitac-content">-- ĐỐI TÁC - KHÁCH HÀNG --</p>
            <div class="logo-coop-img">
                <img src="frontend/image/logo-coop/zyro-image.png" alt="" id="logo-coop">
                <img src="frontend/image/logo-coop/zyro-image (6).png " alt="" id="logo-coop">
                <img src="frontend/image/logo-coop/zyro-image (3).png" alt="" id="logo-coop">
                <img src="frontend/image/logo-coop/zyro-image (4).png" alt="" id="logo-coop">
                <img src="frontend/image/logo-coop/zyro-image (5).png" alt="" id="logo-coop">
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>    
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/pages/home.blade.php ENDPATH**/ ?>