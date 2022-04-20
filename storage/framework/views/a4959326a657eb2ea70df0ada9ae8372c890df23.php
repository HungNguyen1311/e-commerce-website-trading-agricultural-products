
<?php $__env->startSection('admin_content'); ?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Phiếu Nhập Sản Phẩm
                        </header>
                        <div class="panel-body">
                        <?php
                        $messeage=Session::get('message');
                        $soluong=Session::get('soluonglo');
                        if($messeage){
                            echo '<span class="text-alert">'.$messeage.'</span>';
                            Session::put('message',null);
                        }
                        ?>                       
                            <div class="position-center-add-package">
                                <form role="form" action="<?php echo e(URL::to('/save-package-product/'.$soluong)); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="table-responsive-sm">
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Stt</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng nhập</th>
                                            <th>Giá nhập</th>
                                            <th>Ngày hết hạn</th>
                                            <th>Thương hiệu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php for($i=0;$i<$soluong;$i++): ?> 
                                        <tr>
                                            <td><?php echo e($i+1); ?></td>
                                            <td>
                                            <select class="form-control m-bot15"  name="product_id<?php echo e($i); ?>">
                                                <?php $__currentLoopData = $all_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                                             
                                                    <option value="<?php echo e($product->idsanpham); ?>"><?php echo e($product->tensanpham); ?></option>                                          
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                        
                                            </select> 
                                            </td>
                                            <td>
                                            <input type="number" min=1 name="product_amount<?php echo e($i); ?>" class="form-control" id="exampleInputEmail1" >
                                            </td>
                                            <td><input type="text" name="product_price<?php echo e($i); ?>" class="form-control" id="exampleInputEmail1" ></td>
                                            <td><input type="date" name="product_date_expire<?php echo e($i); ?>" class="form-control" id="exampleInputEmail1" ></td>
                                            <td> 
                                                <select class="form-control m-bot15" name="product_brand<?php echo e($i); ?>">
                                                <?php $__currentLoopData = $brand_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                    <option value="<?php echo e($brand->idthuonghieu); ?>"><?php echo e($brand->tenthuonghieu); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                        
                                                </select>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>      
                                    </tbody>
                                    </table>

                                </div>               
                             <input type="hidden" name="staff_id" class="form-control" id="exampleInputEmail1" value="<?php echo e(Session::get('admin_id')); ?>" >          
                             <button type="submit" name="add_product" class="btn btn-info">Thêm lô sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/add_info_product.blade.php ENDPATH**/ ?>