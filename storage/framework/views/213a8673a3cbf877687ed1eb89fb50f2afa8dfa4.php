
<?php $__env->startSection('content'); ?>
    <div class="content-danhmucsanpham">
        <div class="container-fluid">
            <div class="row danhmuc-row m-auto">
                <div class="col-sm-3 post-body">
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
                </div>
                <div class="col-sm-9 danhmuc-hienthi">
                    <h3 class="text-center"><?php echo e($post->tieudebaiviet); ?></h3>      
                    <div class="content_post">
                        <?php echo $post->noidungbaiviet; ?>

                        <?php $__currentLoopData = $more_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $more_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p>>>Xem thêm: <a  class="more_post" href="<?php echo e(URL::to('/chitietbaiviet/'.$more_post->idbaiviet)); ?>"><?php echo e($more_post->tieudebaiviet); ?></a></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>      
                </div>                  
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/pages/baiviet/show_post_details.blade.php ENDPATH**/ ?>