
<?php $__env->startSection('admin_content'); ?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Phiếu nhập sản phẩm
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
                                <form role="form" action="<?php echo e(URL::to('/save-info-product')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>                             
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Lượng phiếu nhập</label>
                                    <input type="text" name="product_amount" class="form-control" id="exampleInputEmail1" >
                                </div>                                          
                                <button type="submit" name="add_product" class="btn btn-info">Tiếp tục</button>
                            </form>
                            </div>
                        </div>
                    </section>

            </div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/add_sub_product.blade.php ENDPATH**/ ?>