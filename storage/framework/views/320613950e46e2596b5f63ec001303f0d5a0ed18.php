
<?php $__env->startSection('admin_content'); ?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Lô Sản Phẩm
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
                                <?php $__currentLoopData = $edit_package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <form role="form" action="<?php echo e(URL::to('/update-package-product/'.$pro->idlosanpham)); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="form-group">
                                    <label for="exampleInputFile">Tên Sản Phẩm</label>
                                    <select class="form-control m-bot15" name="product_id">
                                       <?php $__currentLoopData = $all_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <?php if($product->idsanpham==$pro->idsanpham): ?>
                                            <option selected value="<?php echo e($product->idsanpham); ?>"><?php echo e($product->tensanpham); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($product->idsanpham); ?>"><?php echo e($product->tensanpham); ?></option>
                                        <?php endif; ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                     
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Lượng Nhập Hàng</label>
                                    <input type="number" min=1 name="product_amount" class="form-control" id="exampleInputEmail1" value="<?php echo e($pro->soluongnhap); ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Lượng Tồn</label>
                                    <input type="number" min=1 name="product_exist" class="form-control" id="exampleInputEmail1" value="<?php echo e($pro->soluongton); ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Nhập Hàng</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="<?php echo e($pro->gianhap); ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày Hết Hạn</label>
                                    <input type="date" name="product_date_expire" class="form-control" id="exampleInputEmail1" value="<?php echo e($pro->ngayhethan); ?>" >
                                </div>                               
                                <div class="form-group">
                                    <label for="exampleInputFile">Thương Hiệu</label>
                                    <select class="form-control m-bot15" name="product_brand">
                                       <?php $__currentLoopData = $brand_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <?php if($brand->idthuonghieu==$pro->idthuonghieu): ?>
                                                    <option selected value="<?php echo e($brand->idthuonghieu); ?>"><?php echo e($brand->tenthuonghieu); ?></option>
                                            <?php else: ?>
                                                    <option value="<?php echo e($brand->idthuonghieu); ?>"><?php echo e($brand->tenthuonghieu); ?></option>
                                            <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                        
                                    </select>
                                </div>                       
                                <button type="submit" name="add_package" class="btn btn-info">Cập nhật lô sản phẩm</button>
                            </form>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        </div>
                    </section>

            </div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/edit_package_product.blade.php ENDPATH**/ ?>