
<?php $__env->startSection('admin_content'); ?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Đơn Hàng Đã Hoàn Thành
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
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
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Ngày tạo</th>
            <th>Tổng tiền</th>
            <th>Nhân viên</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $all_product_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_product_order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
          <tr>
            <td><?php echo e($all_product_order ->iddonhang); ?></td>
            <td><?php echo e($all_product_order ->tenkhachhang); ?></td>
            <td><?php echo e($all_product_order ->ngayban); ?></td>
            <td><?php echo e(number_format($all_product_order ->tongtien)); ?><u>đ</u></td>
            <td><?php echo e($all_product_order->tennhanvien); ?></td>
            <td>
              <a href="<?php echo e(URL::to('/show-order-product/'.$all_product_order->iddonhang)); ?>" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-magnifying-glass"></i></a>
           
              <a onclick="return confirm('Đơn hàng sẽ được xóa ?')" href="<?php echo e(URL::to('/delete-order-product/'.$all_product_order->iddonhang)); ?>" class="active styling-delete" ui-toggle-class=""> <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/show_complete_order.blade.php ENDPATH**/ ?>