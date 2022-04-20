
<?php $__env->startSection('admin_content'); ?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê  bài viết
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
            <th>Tiêu đề bài viết</th>
            <th>Tóm tắt</th>
            <th>Hình Ảnh</th>
            <th>Nhân viên</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $all_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
          <tr>
            <td><?php echo e($post ->tieudebaiviet); ?></td>
            <td><?php echo $post->mieutabaiviet; ?></td>
            <td><img src="<?php echo e($post ->hinhanhbaiviet); ?>" height="100" width="130"></td>
            <td><?php echo e($post->tennhanvien); ?></td>
            <td><span class="text-ellipsis">
            <?php
                if($post->hienthibaiviet==1){
            ?>
                <a href="<?php echo e(URL::to('/active-post/'.$post->idbaiviet)); ?>"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
             <?php  
            }else{
            ?>
                <a href="<?php echo e(URL::to('/unactive-post/'.$post->idbaiviet)); ?>"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
            <?php
                }
            ?>    
            </span></td>
            <td>
              <a href="<?php echo e(URL::to('/edit-post/'.$post->idbaiviet)); ?>" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-pen-to-square text-success"></i></a>
              <a onclick="return confirm('Bải viết sẽ được xóa ?')" href="<?php echo e(URL::to('/delete-post/'.$post->idbaiviet)); ?>" class="active styling-delete" ui-toggle-class=""> <i class="fa fa-times text-danger text"></i></a>            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/post/all_post.blade.php ENDPATH**/ ?>