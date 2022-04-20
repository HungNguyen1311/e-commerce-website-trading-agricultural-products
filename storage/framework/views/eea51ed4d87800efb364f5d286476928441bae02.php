
<?php $__env->startSection('admin_content'); ?>
<h3>Chào Mừng Bạn Đến Với Trang Quản Lý của QH Fruits</h3>
<div class="container-fluid">
	<div class="row">
		<span class="title-thongke">Thông kê doanh số lợi nhuận</span>
    <form autocomplete="off">
      <?php echo csrf_field(); ?>
      <div class="col-md-2">
        <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
        <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc doanh số">
      </div>
      <div class="col-md-2">
        <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
      </div>
      <div class="col-md-2">
        <p>
          Lọc theo:
          <select class="dashboard-filter form-control">
            <option>--Chọn--</option>
            <option value="7ngay">7 ngày qua</option>
            <option value="thangtruoc">Tháng trước</option>
            <option value="thangnay">Tháng này</option>
            <option value="365ngayqua">365 ngày qua</option>
          </select>
        </p>
      </div>
    </form>
    <div class="col-md-12">
        <div id="chart" style="height:250px;margin-bottom:40px;margin-top:20px"></div>
    </div>
	</div>
</div>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      <b>Đơn Hàng Hiện Hành</b>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Ngày tạo</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
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
            <?php if($all_product_order->trangthai==0): ?>
              <td>Đang chờ xử lý</td>
            <?php elseif($all_product_order->trangthai==1): ?>
              <td>Đã xác nhận</td>
            <?php elseif($all_product_order->trangthai==2): ?>
              <td>Đang chuẩn bị hàng</td>
            <?php endif; ?>  
            <td>
            <?php
                if($all_product_order->trangthai!=3){
            ?>
                <a href="<?php echo e(URL::to('/edit-order-product/'.$all_product_order->iddonhang)); ?>" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-pen-to-square text-success"></i></a></td>
            <?php
                }else{
            ?>
                <a href="<?php echo e(URL::to('/show-order-product/'.$all_product_order->iddonhang)); ?>" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-pen-to-square text-success"></i></a>

            <?php
                }
            ?>                                                                                           
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>