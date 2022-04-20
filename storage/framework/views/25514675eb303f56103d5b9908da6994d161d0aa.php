
<?php $__env->startSection('admin_content'); ?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Sản Phẩm Khuyến Mãi
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
                                <form role="form" action="<?php echo e(URL::to('/update-promotion-product/'.$edit_value->idsanpham)); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label for="exampleInputFile">Tên Sản Phẩm</label>
                                    <select class="form-control m-bot15" name="promotion_product_id">
                                       <?php $__currentLoopData = $edit_promotion_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $edit_value_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <?php if($edit_value_name->idsanpham==$edit_value->idsanpham): ?>
                                                    <option selected value="<?php echo e($edit_value_name->idsanpham); ?>"><?php echo e($edit_value_name->tensanpham); ?></option>
                                            <?php else: ?>
                                                    <option value="<?php echo e($edit_value_name->idsanpham); ?>"><?php echo e($edit_value_name->tensanpham); ?></option>
                                            <?php endif; ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Khuyến Mãi</label>
                                    <input type="text" name="product_promotion_price" class="form-control" id="exampleInputEmail1" value="<?php echo e($edit_value->giakhuyenmai); ?>">                                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                              
                                <button type="submit" name="update_promotion_product" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/edit_promotion.blade.php ENDPATH**/ ?>