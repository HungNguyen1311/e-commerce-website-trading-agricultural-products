
<?php $__env->startSection('admin_content'); ?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Mã Giảm Giá
                        </header>
                        <div class="panel-body">
                        <?php
                        $messeage=Session::get('message');
                        if($messeage){
                            echo '<span class="text-alert">'.$messeage.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                        <?php $__currentLoopData = $edit_promotion_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $edit_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="position-center">
                                <form role="form" action="<?php echo e(URL::to('/update-coupon-product/'.$edit_value->idmagiamgia)); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Mã giảm giá</label>
                                    <input type="text" value="<?php echo e($edit_value->magiamgia); ?>" name="coupon_text" class="form-control" id="exampleInputEmail1" placeholder="Mã giảm giá">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tỉ lệ giảm giá</label>
                                    <input type="text" value="<?php echo e($edit_value->tilegiamgia); ?>" name="discount_percent" class="form-control" id="exampleInputEmail1" placeholder="Tỉ lệ giảm giá">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả giảm giá</label>
                                    <input type="text" value="<?php echo e($edit_value->motagiamgia); ?>" name="coupon_desc" class="form-control" id="exampleInputEmail1" placeholder="Mô tả giảm giá">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày hết hạn</label>
                                    <input type="date" value="<?php echo e($edit_value->ngayhethan); ?>" name="coupon_exp_date" class="form-control" id="exampleInputEmail1" placeholder="Ngày hết hạn">
                                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                              
                                <button type="submit" name="update_coupon_product" class="btn btn-info">Cập nhật Mã</button>
                            </form>
                            
                        </div>
                    </section>
            </div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/edit_coupon.blade.php ENDPATH**/ ?>