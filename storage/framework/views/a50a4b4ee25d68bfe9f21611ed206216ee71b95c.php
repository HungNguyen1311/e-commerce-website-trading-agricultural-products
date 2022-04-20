
<?php $__env->startSection('admin_content'); ?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Banner
                        </header>
                        <div class="panel-body">
                        <?php
                        $messeage=Session::get('message');
                        if($messeage){
                            echo '<span class="text-alert">'.$messeage.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                            <div class="position-center">
                                <?php $__currentLoopData = $edit_banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <form role="form" action="<?php echo e(URL::to('/update-banner/'.$pro->idbanner)); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh 1</label>
                                    <input type="file" name="banner_image" class="form-control" id="exampleInputEmail1" >
                                    <img src="<?php echo e(URL::to($pro ->hinhanh)); ?>" height="150" width="300">         
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển Thị</label>
                                    <select class="form-control m-bot15" name="banner_status">
                                            <?php if($pro->hienthi=='1'): ?>
                                                    <option selected value="1">Hiển Thị</option>
                                                    <option value="0">Ẩn</option>
                                            <?php elseif($pro->hienthi=='0'): ?>
                                                    <option selected value="0">Ẩn</option>
                                                    <option value="1">Hiển thị</option>  
                                            <?php else: ?>
                                                    <option value="0">Ẩn</option>
                                                    <option value="1">Hiển thị</option>          
                                            <?php endif; ?>                                     
                                    </select>
                                </div>                        
                                <button type="submit" name="add_banner" class="btn btn-info">Cập nhật banner</button>
                            </form>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        </div>
                    </section>

            </div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/edit_banner.blade.php ENDPATH**/ ?>