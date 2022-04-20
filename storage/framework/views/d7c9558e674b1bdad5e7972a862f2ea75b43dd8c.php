
<?php $__env->startSection('admin_content'); ?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Mã Giảm Giá
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
            <th>Mã giảm giá</th>
            <th>Tỉ lệ giảm giá</th>
            <th>Mô tả giảm giá</th>
            <th>Hiển thị</th>
            <th>Ngày hết hạn</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $all_product_coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_product_coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><?php echo e($all_product_coupon ->magiamgia); ?></td>
            <td><?php echo e($all_product_coupon ->tilegiamgia); ?>%</td>
            <td><?php echo e($all_product_coupon ->motagiamgia); ?></td>
            <td><span class="text-ellipsis">
            <?php
                if($all_product_coupon->hienthi==1){
            ?>
                <a href="<?php echo e(URL::to('/unactive-coupon/'.$all_product_coupon->idmagiamgia)); ?>"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
             <?php  
            }else{
            ?>
                <a href="<?php echo e(URL::to('/active-coupon/'.$all_product_coupon->idmagiamgia)); ?>"><span class="fa-thumb-styling fa fa-thumbs-down text-danger"></span></a>
            <?php
                }
            ?>    
            </span></td>
            <td><?php echo e($all_product_coupon ->ngayhethan); ?></td>
            <td>
              <a href="<?php echo e(URL::to('/edit-coupon-product/'.$all_product_coupon->idmagiamgia)); ?>" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-pen-to-square text-success"></i></a>
                       </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/all_coupon.blade.php ENDPATH**/ ?>