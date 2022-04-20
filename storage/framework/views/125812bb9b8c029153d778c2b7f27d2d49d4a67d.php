
<?php $__env->startSection('admin_content'); ?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Sản Phẩm
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
                                <form role="form" action="<?php echo e(URL::to('/save-product')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh 1</label>
                                    <input type="file" name="product_image1" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh 2</label>
                                    <input type="file" name="product_image2" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh 3</label>
                                    <input type="file" name="product_image3" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá bán</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả Sản Phẩm</label>
                                    <textarea style="resize:none" rows="8"  class="form-control" name="product_desc"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Danh Mục Sản Phẩm</label>
                                    <select class="form-control m-bot15" name="product_category">
                                       <?php $__currentLoopData = $cate_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <option value="<?php echo e($cate->idtheloai); ?>"><?php echo e($cate->tentheloai); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                     
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển Thị</label>
                                    <select class="form-control m-bot15" name="product_status">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>                                      
                                    </select>
                                </div>                        
                                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/add_product.blade.php ENDPATH**/ ?>