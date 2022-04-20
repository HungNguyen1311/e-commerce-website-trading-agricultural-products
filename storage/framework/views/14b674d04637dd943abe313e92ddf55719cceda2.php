
<?php $__env->startSection('admin_content'); ?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Danh Sách Khách Hàng
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
            <th>Mã khách hàng</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $all_customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_khachhang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
          <tr>
            <td><?php echo e($all_khachhang ->idkhachhang); ?></td>
            <td><?php echo e($all_khachhang ->tenkhachhang); ?></td>
            <td><?php echo e($all_khachhang ->sodienthoai); ?></td>
            <td><?php echo e($all_khachhang ->diachi); ?></td>
            <td><?php echo e($all_khachhang ->email); ?></td>
            <td>
              <a href="<?php echo e(URL::to('/show-customer-order/'.$all_khachhang->idkhachhang)); ?>" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-file-invoice"></i></a>       
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/all_customer.blade.php ENDPATH**/ ?>