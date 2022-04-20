
<?php $__env->startSection('content_details_product'); ?>
<h3 class="text-center">Đơn Hàng Của Bạn</h3>
    <!-- Gio hang -->
<div class="details-order-home">
    <div class="giohang">      
        <div class="chitietgiohang">
            <div class="container-fluid">
                <div class="table-responsive-sm">
                    <table class="table table-th">
                        <thead>
                            <tr id="title">
                                <th>Hình Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Tổng Giá</th>
                            </tr>
                        </thead>                      
                        <tbody id="table-body-product">
                            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                            
                            <tr id="gh-product-detail">                               
                                <td><img width="50" height="50" src="<?php echo e(URL::to($v_product->hinhanh1)); ?>" /></td>
                                <td><?php echo e($v_product->tensanpham); ?></td>
                                    <?php if($v_product->idtheloai!=5): ?>                               
                                    <td><?php echo e(number_format($v_product->dhct_giaban)); ?><u>đ</u>/kg</td>
                                    <?php else: ?>
                                    <td><?php echo e(number_format($v_product->dhct_giaban)); ?><u>đ</u>/phần</td>
                                     <?php endif; ?>
                            <?php
                                if($v_product->idtheloai!=5){
                                    if(($v_product->soluongban/1000)<1){
                                    echo '<td>'.$v_product->soluongban.'g</td>';
                                    }elseif(($v_product->soluongban/1000)<10){
                                    $khoiluong=$v_product->soluongban/1000;
                                    echo '<td>'.$khoiluong.'kg</td>';
                                    }elseif(($v_product->soluongban/10000)<10){
                                    $khoiluong=$v_product->soluongban/10000;
                                    echo '<td>'.$khoiluong.'yến</td>';
                                    }elseif(($v_product->soluongban/100000)<10){
                                    $khoiluong=$v_product->soluongban/100000;
                                    echo '<td>'.$khoiluong.'tạ</td>';
                                    }elseif(($v_product->soluongban/1000000)<10){
                                    $khoiluong=$v_product->soluongban/1000000;
                                    echo '<td>'.$khoiluong.'tấn</td>';
                                    }
                                }else{
                                    echo '<td>'.$v_product->soluongban.' phần</td>';
                                }
                            ?>
                              <?php if($v_product->idtheloai!=5): ?>                               
                                        <td><?php echo e(number_format($v_product->dhct_giaban * $v_product->soluongban/1000)); ?><u>đ</u></td>
                                        <?php else: ?>
                                        <td><?php echo e(number_format($v_product->dhct_giaban * $v_product->soluongban)); ?><u>đ</u></td>
                                        <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                         
                            <tr>
                                <td colspan="7" class="gh-tongtien">
                                    <?php $__currentLoopData = $order_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$order_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    if($order_details->dh_magiamgia!=NULL){
                                    ?>
                                    <p>Đơn hàng có áp dụng mã <?php echo e($order_details->motagiamgia); ?></p>
                                    <?php
                                    }
                                    ?>
                                    <p>Tổng Cộng: <b class="text-danger"><?php echo e(number_format($order_details->tongtien)); ?><u>đ</u></b></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                            </tr>                              
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('product_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/pages/cart/show_details_order.blade.php ENDPATH**/ ?>