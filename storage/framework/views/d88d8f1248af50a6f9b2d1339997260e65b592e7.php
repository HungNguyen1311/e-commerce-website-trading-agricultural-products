
<?php $__env->startSection('admin_content'); ?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Các Đơn Hàng 
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
      <?php
        $messeage=Session::get('message');
        if($messeage){
            echo '<span class="text-alert">'.$messeage.'</span>';
            Session::put('message',null);
        }
        ?>
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Ngày tạo</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $all_customer_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_customer_order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><?php echo e($all_customer_order ->iddonhang); ?></td>
            <td><?php echo e($all_customer_order ->tenkhachhang); ?></td>
            <td><?php echo e($all_customer_order ->ngayban); ?></td>
            <td><?php echo e(number_format($all_customer_order ->tongtien)); ?><u>đ</u></td>
            <td><?php
                        if($all_customer_order->trangthai==0)
                            echo 'Đang chờ xử lý';
                        else{
                            echo 'Đã xử lý';
                        }    
                        ?></td>
            <td>
              <a href="<?php echo e(URL::to('/show-order-product/'.$all_customer_order->iddonhang)); ?>" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-pen-to-square text-success"></i></a>  
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/show_customer_order.blade.php ENDPATH**/ ?>