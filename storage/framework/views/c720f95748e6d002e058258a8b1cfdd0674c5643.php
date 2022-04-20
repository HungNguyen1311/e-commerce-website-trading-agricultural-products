
<?php $__env->startSection('admin_content'); ?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Sản Phẩm Khuyến Mãi
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
                                <form role="form" action="<?php echo e(URL::to('/save-promotion')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label for="exampleInputFile">Tên sản phẩm</label>
                                    <select class="form-control m-bot15" name="product_id_promotion">
                                       <?php $__currentLoopData = $all_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                                             
                                        <option value="<?php echo e($product->idsanpham); ?>"><?php echo e($product->tensanpham); ?>-<?php echo e(number_format($product->giaban)); ?><u>đ</u></option>                                          
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                        
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Khuyến Mãi</label>
                                    <input type="text" name="product_price_promotion" class="form-control" id="exampleInputEmail1" >
                                    <input type="hidden" name="staff_id" class="form-control" id="exampleInputEmail1" value="<?php echo e(Session::get('admin_id')); ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày Hết Hạn</label>
                                    <input type="date" name="product_date_promotion" class="form-control" id="exampleInputEmail1" >
                                </div>                                                    
                                <button type="submit" name="add_promotion" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>
                        </div>
                    </section>
            </div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/add_promotion.blade.php ENDPATH**/ ?>