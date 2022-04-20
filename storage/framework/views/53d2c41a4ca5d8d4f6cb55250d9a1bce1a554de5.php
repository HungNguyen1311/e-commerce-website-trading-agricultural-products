
<?php $__env->startSection('admin_content'); ?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Phiếu Nhập
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
            <th>Mã phiếu nhập</th>
            <th>Tên nhân viên</th>
            <th>Ngày tạo</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $all_product_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_product_form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
          <tr>
            <td><?php echo e($all_product_form ->idphieunhap); ?></td>
            <td><?php echo e($all_product_form ->tennhanvien); ?></td>
            <td><?php echo e($all_product_form ->ngaynhap); ?></td>
            <td>
              <a href="<?php echo e(URL::to('/show-form/'.$all_product_form->idphieunhap)); ?>" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-magnifying-glass"></i></a>       
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/all_form.blade.php ENDPATH**/ ?>