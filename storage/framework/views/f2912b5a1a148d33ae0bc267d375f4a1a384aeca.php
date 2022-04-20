
<?php $__env->startSection('admin_content'); ?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Banner
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
            <th>Mã Banner</th>
            <th>Hình ảnh</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $all_banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
          <tr>
            <td><?php echo e($cate_pro ->idbanner); ?></td>
            <td><img src="<?php echo e($cate_pro ->hinhanh); ?>" height="100" width="300"></td>
            <td><span class="text-ellipsis">
            <?php
                if($cate_pro->hienthi==1){
            ?>
                <a href="<?php echo e(URL::to('/active-banner/'.$cate_pro->idbanner)); ?>"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
             <?php  
            }else{
            ?>
                <a href="<?php echo e(URL::to('/unactive-banner/'.$cate_pro->idbanner)); ?>"><span class="fa-thumb-styling fa fa-thumbs-down text-danger"></span></a>
            <?php
                }
            ?>    
            </span></td>
            <td>           
              <a onclick="return confirm('Banner sẽ được xóa ?')" href="<?php echo e(URL::to('/delete-banner/'.$cate_pro->idbanner)); ?>" class="active styling-delete" ui-toggle-class=""> <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/show_banner.blade.php ENDPATH**/ ?>