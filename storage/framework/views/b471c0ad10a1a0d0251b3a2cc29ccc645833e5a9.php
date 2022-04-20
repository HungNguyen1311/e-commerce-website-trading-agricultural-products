
<?php $__env->startSection('content'); ?>
<div class="content">
        <!-- TRAI CAY NHAP KHAU -->
        <div class="TCNK">
            <div class="container-fluid">
                <div class="content-tctnk">
                    <p>Các sản phẩm liên quan</p>
                </div>
                <div class="row d-inline-flex">
                    <!-- Gallery Item 1 -->
                    <?php $__currentLoopData = $search_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product_tcnk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-sm-6 col-md-3 p-2 grid-product">
                    <form action="<?php echo e(URL::to('/save-home-cart')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <div class="d-flex flex-column text-center height100">
                        <?php if($product_tcnk->soluongton==0){ 
                                        ?>
                                        <div class="grid-product-img">
                                            <a href="<?php echo e(URL::to('/chitietsanpham/'.$product_tcnk->idsanpham)); ?>">
                                                <img src="<?php echo e(URL::to($product_tcnk->hinhanh1)); ?>" />
                                                <h2><button>HẾT HÀNG! <i class="fa-solid fa-right-long"></i></button>
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
        </div> 
</div>       
<?php $__env->stopSection(); ?>    
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/pages/more_product_detect.blade.php ENDPATH**/ ?>