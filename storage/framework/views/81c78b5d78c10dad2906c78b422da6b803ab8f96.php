
<?php $__env->startSection('admin_content'); ?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi Tiết Phiếu Nhập
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Mã lô</th>
            <th>Số lượng nhập</th>
            <th>Giá nhập</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $edit_form_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_product_form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
          <tr>
            <td><?php echo e($all_product_form ->tensanpham); ?></td>
            <td><?php echo e($all_product_form ->idlosanpham); ?></td>
            <?php
            if($all_product_form->idtheloai!=5){
              if(($all_product_form->soluongnhap/1000)<1){
              echo '<td>'.$all_product_form->soluongnhap.'g</td>';
              }elseif(($all_product_form->soluongnhap/1000)<10){
              $khoiluong=$all_product_form->soluongnhap/1000;
              echo '<td>'.$khoiluong.'kg</td>';
              }elseif(($all_product_form->soluongnhap/10000)<10){
              $khoiluong=$all_product_form->soluongnhap/10000;
              echo '<td>'.$khoiluong.'yến</td>';
              }elseif(($all_product_form->soluongnhap/100000)<10){
              $khoiluong=$all_product_form->soluongnhap/100000;
              echo '<td>'.$khoiluong.'tạ</td>';
              }elseif(($all_product_form->soluongnhap/1000000)<10){
              $khoiluong=$all_product_form->soluongnhap/1000000;
              echo '<td>'.$khoiluong.'tấn</td>';
              }       
            }else{
              echo '<td>'.$all_product_form->soluongnhap.' phần</td>';
            }     
            ?>
            <?php if($all_product_form->idtheloai!=5): ?>  
            <td><?php echo e(number_format($all_product_form ->gianhap)); ?><u>đ</u>/kg</td>
            <?php else: ?>
            <td><?php echo e(number_format($all_product_form ->gianhap)); ?><u>đ</u></td>
            <?php endif; ?>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/show_details_form.blade.php ENDPATH**/ ?>