
<?php $__env->startSection('content'); ?>
<?php
    $all_obj_detect=Session::get('all_obj_detect');
    $image_detect=Session::get('image_after_detect');
    $image_url=Session::get('image_url');
?>
<h2 class="text-center mt-4">Phần Mềm Nhận Diện Nông Sản</h2>
<div class="body-content-od">
    <form role="form" action="<?php echo e(URL::to('/post-image')); ?>" method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="exampleInputEmail1">Chọn Hình Ảnh</label>
        <input type="file" name="product_image1" class="form-control" id="exampleInputEmail1" >
    </div>
    <button type="submit" name="add_product" class="btn btn-success mt-4 button-detec-styling">Nhận dạng</button>
    </form>
</div>
     <?php if($all_obj_detect): ?>
    <div class="show-result">
        <div class="image-detect">
            <img src="<?php echo e(URL::to('/detect_image/'.$image_detect)); ?>" alt="" height="400" width="600">
        </div>
        <div class="object-content">
            <h4 class="detect-result-content text-center">Kết quả nhận diện có <?php echo e(count($all_obj_detect)); ?> loại nông sản</h4>
            <div class="container-fluid">
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center th-styling">Tên nông sản</th>
                            <th class="text-center th-styling">Vitamin</th>
                            <th class="text-center th-styling">Dinh dưỡng</th>
                            <th class="text-center">#</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $all_obj_detect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_obj_detect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($all_obj_detect->tennongsan); ?></td>
                            <td><?php echo e($all_obj_detect->vitamin); ?></td>
                            <td><?php echo e($all_obj_detect->luongdung); ?></td>
                            <td><a class="more-details-detect" href="<?php echo e(URL::to('/more-details-detect/'.ltrim($all_obj_detect->tennongsan))); ?>"><i class="fa-solid fa-magnifying-glass text-center"></i></a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    </tbody>
                    </table>
                </div>
        </div>
    </div>
    </div>
    <?php
    Session::put('all_obj_detect',NULL);
    ?>
     <?php endif; ?>

<?php $__env->stopSection(); ?>    
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/pages/object_detection.blade.php ENDPATH**/ ?>