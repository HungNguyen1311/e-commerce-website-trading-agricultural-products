
<?php $__env->startSection('content_details_product'); ?>
<!-- product link -->
    <div class="link-product">
        <?php $__currentLoopData = $product_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p>
            <a href="<?php echo e(URL::to('/trang-chu')); ?>" id="link-content">Trang Chủ </a>/
            <a href="" id="link-content">Tất cả sản phẩm </a>/ <?php echo e($product->tensanpham); ?>

        </p>
    </div>
    <!-- product  -->
    <div class="product">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 product-image">
                    <div id="img-container">
                        <div id="lens"></div>
                        <img src="<?php echo e(URL::to($product->hinhanh1)); ?>" alt="" id="featured">
                    </div>
                    <img src="<?php echo e(URL::to($product->hinhanh1)); ?>" alt="" class="thumbnail active1">
                    <?php
                    $current_url=URL::current();
                    if($product->hinhanh2 !=''){
                      echo'  <img src="'.URL::to($product->hinhanh2).'" alt="" class="thumbnail">';
                    }
                    if($product->hinhanh3 !=''){
                        echo'  <img src="'.URL::to($product->hinhanh3).'" alt="" class="thumbnail">';
                      }
                    ?>

                </div>
                <div class="col-sm-9 product-details ">
                    <form action="<?php echo e(URL::to('/save-cart')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <p class="product-name"><?php echo e($product->tensanpham); ?></p>
                        <?php
                            $discount_percent=($product->giakhuyenmai/$product->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                         if($product->idtheloai!=5){  
                            if($product->giakhuyenmai==NULL){
                            ?>
                            <p class="product-content">Giá: <a id="gia"><?php echo e(number_format($product->giaban)); ?>đ/kg</a></a></p>
                            <?php
                            }else{                             
                            ?>
                            <p class="product-content">Giá: <a id="gia"><?php echo e(number_format($product->giakhuyenmai)); ?>đ/kg <del class="del-styling"><?php echo e(number_format($product->giaban)); ?> <u>đ</u> </del></a></a></p>
                            <!-- <p id="price"><?php echo e(number_format($product->giakhuyenmai)); ?><u>đ</u> <del><?php echo e(number_format($product->giaban)); ?> <u>đ</u> </del><label for="">-<?php echo e($discount_percent_total); ?>%</label></p> -->
                            <?php
                            }
                        }else{
                            if($product->giakhuyenmai==NULL){
                        ?>   
                            <p class="product-content">Giá: <a id="gia"><?php echo e(number_format($product->giaban)); ?>đ/phần</a></a></p>
                            <?php
                            }else{                             
                            ?>
                            <p class="product-content">Giá: <a id="gia"><?php echo e(number_format($product->giakhuyenmai)); ?>đ/phần <del class="del-styling"><?php echo e(number_format($product->giaban)); ?> <u>đ</u> </del></a></a></p>
                            <!-- <p id="price"><?php echo e(number_format($product->giakhuyenmai)); ?><u>đ</u> <del><?php echo e(number_format($product->giaban)); ?> <u>đ</u> </del><label for="">-<?php echo e($discount_percent_total); ?>%</label></p> -->
                            <?php
                            }
                        }
                        ?>                    
                        <p class="product-content">Đơn vị tính: Kilogram</p>
                        <p class="product-content">Mã sản phẩm: <?php echo e($product->idsanpham); ?></p>
                        <p class="product-content">Đạt tiêu chuẩn: Hữu cơ (VCO)</p>
                        <?php if($product->idtheloai!=5): ?>
                        <p class="product-content-dathang">Số Lượng(gram):</p>  
                        <?php else: ?>
                        <p class="product-content-dathang">Số Lượng(phần):</p>  
                        <?php endif; ?>
                        <?php if($product->idtheloai==5): ?>
                        <input type="number" name="qty" id="qty_input" value="1" min="1" class="form-control">
                        <?php else: ?>
                        <input type="number" name="qty" id="qty_input" value="100" min="100" class="form-control">
                        <?php endif; ?>                     
                        <input type="hidden" name="productid_hidden" value="<?php echo e($product->idsanpham); ?>">
                        <input type="hidden" name="url_current_hidden" value="<?php echo e($current_url); ?>">
                                                     
                        <?php
                        if($product->soluongton==0){
                        ?>  
                        <span class="text-out-product">Sản phẩm hết hàng!</span>
                        <?php
                        }else{
                        ?>    
                        <button class="btn btn-block btn-add-cart">THÊM VÀO GIỎ
                            <i class="fas fa-shopping-basket"></i></button>
                        <?php
                        }
                        ?>  
                        <?php
                                $messeage_false=Session::get('message-false');
                                if($messeage_false){
                                    echo '<span class="text-alert">'.$messeage_false.'</span>';
                                    Session::put('message-false',null);
                                }
                        ?>                                               
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="thongtinsanpham product">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9 col9-width fs-5">
                    <button class="btn btn-success btn-block btn-add-cart">MÔ TẢ SẢN PHẨM</button>
                    <div class="product-infomation">
                        <p>Dinh Dưỡng:</p>
                        <p><?php echo e($product->motasanpham); ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="facebook-comment">
        <h4>Bình Luận <i class="fa-solid fa-comment"></i></h4>
        <div class="fb-comments" data-href="http://qh-fruits.com/chitietsanpham/.<?php echo e($product->idsanpham); ?>" data-width="1100" data-numposts="2"></div>
    </div>
    <!-- SAN PHAM MOI  -->
    <div class="spm">
            <div class="container-fluid">
            <div class="content-tctnk bg-success text-white">
                <p>Sản Phẩm Liên Quan</p>
            </div>
                <div class="row d-inline-flex">
                    <!-- Gallery Item 1 -->
                    <?php $__currentLoopData = $same_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $same_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="col-12 col-sm-6 col-md-3 p-2 grid-product">
                        <div class="d-flex flex-column text-center height100">
                        <form>
                        <?php echo e(csrf_field()); ?>

                        <?php if($same_product->soluongton==0){ 
                                        ?>
                                        <div class="grid-product-img">
                                            <a href="<?php echo e(URL::to('/chitietsanpham/'.$same_product->idsanpham)); ?>">
                                                <img src="<?php echo e(URL::to($same_product->hinhanh1)); ?>" />
                                                <h2><button>HẾT HÀNG! <i class="fa-solid fa-right-long"></i></button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4><?php echo e($same_product->tensanpham); ?></h4>
                                        <?php
                            $discount_percent=($same_product->giakhuyenmai/$same_product->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                            if($same_product->giakhuyenmai==NULL){
                            ?>
                                        <p id="price"><?php echo e(number_format($same_product->giaban)); ?><u>đ</u></p>
                                        <?php
                            }else{                             
                            ?>
                                        <p id="price"><?php echo e(number_format($same_product->giakhuyenmai)); ?><u>đ</u>
                                            <del><?php echo e(number_format($same_product->giaban)); ?> <u>đ</u> </del><label
                                                for="">-<?php echo e($discount_percent_total); ?>%</label></p>
                                        <?php
                            }
                            ?>
                                        <input type="hidden" name="productid_home_hidden" value="<?php echo e($same_product->idsanpham); ?>">
                                        <div class="shopping-cart">
                                            <span id="out_product">Hết Hàng!</span>                    
                                        <?php }else{ 
                                        ?>
                                        <input type="hidden" value="<?php echo e($same_product->idsanpham); ?>" class="cart_product_id_<?php echo e($same_product->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($same_product->tensanpham); ?>" class="cart_product_name_<?php echo e($same_product->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($same_product->hinhanh1); ?>" class="cart_product_image_<?php echo e($same_product->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($same_product->giaban); ?>" class="cart_product_price_<?php echo e($same_product->idsanpham); ?>">
                                        <input type="hidden" value="1" class="cart_product_qty_<?php echo e($same_product->idsanpham); ?>">


                                        <div class="grid-product-img">
                                            <a href="<?php echo e(URL::to('/chitietsanpham/'.$same_product->idsanpham)); ?>">
                                                <img src="<?php echo e(URL::to($same_product->hinhanh1)); ?>" />
                                                <h2><button>XEM CHI TIẾT <i class="fa-solid fa-right-long"></i></button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4><?php echo e($same_product->tensanpham); ?></h4>
                                        <?php
                            $discount_percent=($same_product->giakhuyenmai/$same_product->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                            if($same_product->giakhuyenmai==NULL){
                            ?>
                                        <p id="price"><?php echo e(number_format($same_product->giaban)); ?><u>đ</u></p>
                                        <?php
                            }else{                             
                            ?>
                                        <p id="price"><?php echo e(number_format($same_product->giakhuyenmai)); ?><u>đ</u>
                                            <del><?php echo e(number_format($same_product->giaban)); ?> <u>đ</u> </del><label
                                                for="">-<?php echo e($discount_percent_total); ?>%</label></p>
                                        <?php
                            }
                            ?>
                                        <input type="hidden" name="productid_home_hidden" value="<?php echo e($same_product->idsanpham); ?>">
                                        <div class="shopping-cart">
                                        <button type="button" id="tvgh" class="add-to-cart"  data-id_product="<?php echo e($same_product->idsanpham); ?>" ><i class="fas fa-shopping-cart add-to-cart"></i> Thêm
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
            <?php $__currentLoopData = $more_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $more_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(URL::to('/danhmucsanpham/'.$more_product->idtheloai)); ?>"><div class="btn-xemthem"><button id="xt-btn">XEM THÊM</button></div></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('product_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/pages/sanpham/show_details.blade.php ENDPATH**/ ?>