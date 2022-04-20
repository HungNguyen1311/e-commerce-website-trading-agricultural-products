
<?php $__env->startSection('content'); ?>
    <div class="content-danhmucsanpham">
        <div class="container-fluid">
            <div class="row danhmuc-row m-auto">
                <div class="col-sm-3">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button btn-outline-success bg-success text-white" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne"
                                    aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    DANH MỤC SẢN PHẨM
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body menu-danhmuc">
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p><a href="<?php echo e(URL::to('/danhmucsanpham/'.$cate_pro->idtheloai)); ?>"><?php echo e($cate_pro->tentheloai); ?></a></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-danhmuc">
                        <img src="<?php echo e(URL::to('frontend/image/banner/banner-danhmuc3.jpg')); ?>" alt="">
                    </div>
                </div>
                <div class="col-sm-9 danhmuc-hienthi">
                    <?php $__currentLoopData = $category_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name_cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h4 id="danhmuc-content"><?php echo e($name_cate->tentheloai); ?></h4>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="sort-menu">
                        <div class="dropdown sort-menu-dropdown">
                            <a class="btn dropdown-toggle sort-content btn-light" href="#" role="button"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Sắp xếp (sort)
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">                               
                            <li><a class="dropdown-item" href="<?php echo e(URL::to('/danhmucsanpham/'.$name_cate->idtheloai.'/sort_by=price-asc')); ?>">Giá: Tăng dần</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(URL::to('/danhmucsanpham/'.$name_cate->idtheloai.'/sort_by=price-desc')); ?>">Giá: Giảm dần</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(URL::to('/danhmucsanpham/'.$name_cate->idtheloai.'/sort_by=name-az')); ?>">Tên: A-Z</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(URL::to('/danhmucsanpham/'.$name_cate->idtheloai.'/sort_by=name-za')); ?>">Tên: Z-A</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(URL::to('/danhmucsanpham/'.$name_cate->idtheloai.'/sort_by=new-product')); ?>">Mới nhất</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(URL::to('/danhmucsanpham/'.$name_cate->idtheloai.'/sort_by=most-selling')); ?>">Bán chạy nhất</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- SAN PHAM MOI  -->
                    <div class="spm">
                        <div class="container-fluid">
                            <div class="row d-inline-flex">
                                <!-- Gallery Item 1 -->
                                <?php $__currentLoopData = $all_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12 col-sm-6 col-md-4 p-2 grid-product">
                                <form action="<?php echo e(URL::to('/save-home-cart')); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                    <div class="d-flex flex-column text-center height100">
                                    <?php if($cate->soluongton==0){ 
                                        ?>
                                        <div class="grid-product-img">
                                            <a href="<?php echo e(URL::to('/chitietsanpham/'.$cate->idsanpham)); ?>">
                                                <img src="<?php echo e(URL::to($cate->hinhanh1)); ?>" />
                                                <h2><button>HẾT HÀNG! <i class="fa-solid fa-right-long"></i></button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4><?php echo e($cate->tensanpham); ?></h4>
                                        <?php
                            $discount_percent=($cate->giakhuyenmai/$cate->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                            if($cate->giakhuyenmai==NULL){
                            ?>
                                        <p id="price"><?php echo e(number_format($cate->giaban)); ?><u>đ</u></p>
                                        <?php
                            }else{                             
                            ?>
                                        <p id="price"><?php echo e(number_format($cate->giakhuyenmai)); ?><u>đ</u>
                                            <del><?php echo e(number_format($cate->giaban)); ?> <u>đ</u> </del><label
                                                for="">-<?php echo e($discount_percent_total); ?>%</label></p>
                                        <?php
                            }
                            ?>
                                        <input type="hidden" name="productid_home_hidden" value="<?php echo e($cate->idsanpham); ?>">
                                        <div class="shopping-cart">
                                            <span id="out_product">Hết Hàng!</span>                    
                                        <?php }else{ 
                                        ?>
                                        <input type="hidden" value="<?php echo e($cate->idsanpham); ?>" class="cart_product_id_<?php echo e($cate->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($cate->tensanpham); ?>" class="cart_product_name_<?php echo e($cate->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($cate->hinhanh1); ?>" class="cart_product_image_<?php echo e($cate->idsanpham); ?>">
                                        <input type="hidden" value="<?php echo e($cate->giaban); ?>" class="cart_product_price_<?php echo e($cate->idsanpham); ?>">
                                        <input type="hidden" value="1" class="cart_product_qty_<?php echo e($cate->idsanpham); ?>">
                                        <div class="grid-product-img">
                                            <a href="<?php echo e(URL::to('/chitietsanpham/'.$cate->idsanpham)); ?>">
                                                <img src="<?php echo e(URL::to($cate->hinhanh1)); ?>" />
                                                <h2><button>XEM CHI TIẾT <i class="fa-solid fa-right-long"></i></button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4><?php echo e($cate->tensanpham); ?></h4>
                                        <?php
                            $discount_percent=($cate->giakhuyenmai/$cate->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                            if($cate->giakhuyenmai==NULL){
                            ?>
                                        <p id="price"><?php echo e(number_format($cate->giaban)); ?><u>đ</u></p>
                                        <?php
                            }else{                             
                            ?>
                                        <p id="price"><?php echo e(number_format($cate->giakhuyenmai)); ?><u>đ</u>
                                            <del><?php echo e(number_format($cate->giaban)); ?> <u>đ</u> </del><label
                                                for="">-<?php echo e($discount_percent_total); ?>%</label></p>
                                        <?php
                            }
                            ?>
                                        <input type="hidden" name="productid_home_hidden" value="<?php echo e($cate->idsanpham); ?>">
                                        <div class="shopping-cart">
                                        <button type="button" id="tvgh" class="add-to-cart"  data-id_product="<?php echo e($cate->idsanpham); ?>" ><i class="fas fa-shopping-cart add-to-cart"></i> Thêm
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
                    <div class="cate_pagination">
                        <?php echo e($all_product->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/pages/category/show_category_condition.blade.php ENDPATH**/ ?>