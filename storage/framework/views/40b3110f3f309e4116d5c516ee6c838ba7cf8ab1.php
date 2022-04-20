
<?php $__env->startSection('admin_content'); ?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Danh Mục Sản Phẩm
                        </header>
                        <div class="panel-body">
                        <?php
                        $messeage=Session::get('message');
                        if($messeage){
                            echo '<span class="text-alert">'.$messeage.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                        <?php $__currentLoopData = $edit_category_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $edit_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="position-center">
                                <form role="form" action="<?php echo e(URL::to('/update-category-product/'.$edit_value->idtheloai)); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Danh Mục</label>
                                    <input type="text" value="<?php echo e($edit_value->tentheloai); ?>" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize:none" rows="8"  class="form-control" id="exampleInputPassword1" name="category_product_desc" ><?php echo e($edit_value->motatheloai); ?></textarea>
                                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                              
                                <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/edit_category_product.blade.php ENDPATH**/ ?>