
<?php $__env->startSection('content_details_product'); ?>
<?php
    $customer_name=Session::get('customer_name');
?>
<h2 class=text-center>Lịch Sử Mua Hàng</h2>
<div class="purchase_history">
    <div class="container-fluid">
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Ngày tạo</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order_purchase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($purchase->iddonhang); ?></td>
                        <td><?php echo e($purchase->ngayban); ?></td>
                        <td><?php echo e(number_format($purchase->tongtien)); ?><u>đ</u></td>
                        
                        <?php if($purchase->trangthai==0): ?>
                            <td>Đang chờ xử lý</td>
                        <?php elseif($purchase->trangthai==1): ?>
                            <td>Đã xác nhận</td>
                        <?php elseif($purchase->trangthai==2): ?>
                            <td>Đang chuẩn bị hàng</td>
                        <?php else: ?>
                            <td>Đã xử lý</td>    
                        <?php endif; ?>  
                        
                        <td><a href="<?php echo e(URL::to('details-order-home/'.$purchase->iddonhang)); ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>

            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('product_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/pages/cart/show_purchase_history.blade.php ENDPATH**/ ?>