
<?php $__env->startSection('content'); ?>
    <div class="content-danhmucsanpham">
        <div class="container-fluid">
            <div class="row danhmuc-row m-auto">
                <div class="col-sm-3">
                    <div class="new-post">
                        <h4 class="new-post-title">Bài viết mới nhất</h4>
                        <?php $__currentLoopData = $new_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class= "container-fluid">
                            <div class= "row body-post mb-3">
                                <div class ="col-sm-4">
                                    <div class="image-post2">
                                        <img src="<?php echo e(URL::to($new->hinhanhbaiviet)); ?>" width="300" height="150">
                                    </div>                               
                                </div>
                                <div class ="col-sm-8">
                                    <h4><a href="<?php echo e(URL::to('/chitietbaiviet/'.$new->idbaiviet)); ?>" class="details-post-title2"><?php echo e($new->tieudebaiviet); ?></a></h4>    
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="banner-danhmuc-post mt-3">
                        <img src="<?php echo e(URL::to('frontend/image/banner/abstract-colorful-sales-banner_23-2148337625.webp')); ?>" alt="" height="430" width="350">
                    </div>
                </div>
                <div class="col-sm-9 danhmuc-hienthi">
                <h3 class="title-post-styling">Tất cả bài viết</h3>
                <?php $__currentLoopData = $get_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class ="col-sm-12">
                        <div class= "container-fluid">
                            <div class= "row body-post mb-5">
                                <div class ="col-sm-4">
                                    <div class="image-post">
                                    <img src="<?php echo e(URL::to($post->hinhanhbaiviet)); ?>" width="300" height="150">
                                    </div>                               
                                </div>
                                <div class ="col-sm-8">
                                <h4><a href="<?php echo e(URL::to('/chitietbaiviet/'.$post->idbaiviet)); ?>" class="details-post-title"><?php echo e($post->tieudebaiviet); ?></a></h4>    
                                <p class="details-post-desc"><?php echo $post->mieutabaiviet; ?></p>
                                <p><a href="<?php echo e(URL::to('/chitietbaiviet/'.$post->idbaiviet)); ?>" class="details-post-button">Xem chi tiết <i class="fa-solid fa-up-right-from-square"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>                  
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                    <div class="cate_pagination">
                            <?php echo e($get_post->links()); ?>

                    </div>             
                </div>                  
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/pages/baiviet/show_post.blade.php ENDPATH**/ ?>