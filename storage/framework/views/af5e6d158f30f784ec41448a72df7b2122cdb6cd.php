
<?php $__env->startSection('admin_content'); ?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Xác Nhận Đơn Hàng
            </header>
            <div class="panel-body">
                <?php
                        $messeage=Session::get('message');
                        if($messeage){
                            echo '<span class="text-alert">'.$messeage.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                <div class="agile-grid">

                    <div class="col-lg-12">
                        <p class="hd-title">Thông tin khách hàng</p>
                    </div>
                    <?php $__currentLoopData = $edit_order_customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $edit_order_customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="">Họ và Tên</label>
                                    <section class="panel">
                                        <div class="panel-body"><?php echo e($edit_order_customer->tenkhachhang); ?></div>
                                    </section>
                                </div>
                                <div class="col-sm-6">
                                <label for="">Số điện thoại</label>
                                    <section class="panel">
                                        <div class="panel-body"><?php echo e($edit_order_customer->sodienthoai); ?></div>
                                    </section>
                                </div>
                            </div>
                        </div>  
                        <div class="col-lg-6">
                        <label for="">Địa chỉ</label>
                            <section class="panel">
                                <div class="panel-body"><?php echo e($edit_order_customer->diachi); ?></div>
                            </section>
                        </div>
                        <div class="form-group">
                                    <label for="exampleInputPassword1">Ghi chú khách hàng</label>
                                    <textarea style="resize:none" rows="8"  class="form-control" id="exampleInputPassword1" name="product_order_desc"><?php echo e($edit_order_customer->ghichu); ?></textarea>
                        </div>
                        <div class="form-group">
                                    <label for="exampleInputPassword1">Hình thức giao hàng: </label>
                                    <span>
                                        <?php
                                        if($edit_order_customer->giaohang==0){
                                            echo 'Nhận hàng trực tiếp tại của hàng';
                                        }elseif($edit_order_customer->giaohang==1){
                                            echo 'Nhận hàng tại nhà (COD)';
                                        }else{
                                            echo 'Thanh toán trực tuyến';
                                        }
                                        ?>
                                    </span>
                        </div>
                    </div>                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thông tin đơn hàng
                        </div>                      
                        <div class="table-responsive">
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        <th>Lô sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình Ảnh</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>                                
                                        <th>Thành tiền</th>
                                        
                                        <th style="width:30px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $edit_order_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($pro ->idlosanpham); ?></td>
                                        <td><?php echo e($pro ->tensanpham); ?></td>
                                        <td><img src="<?php echo e(URL::to($pro ->hinhanh1)); ?>" height="100" width="100"></td>
                                        <?php if($pro->idtheloai!=5): ?>                               
                                        <td><?php echo e(number_format($pro->dhct_giaban)); ?><u>đ</u>/kg</td>
                                        <?php else: ?>
                                        <td><?php echo e(number_format($pro->dhct_giaban)); ?><u>đ</u>/phần</td>
                                        <?php endif; ?>
                                        <?php
                                        if($pro->idtheloai!=5){
                                            if(($pro->soluongban/1000)<1){
                                            echo '<td>'.$pro->soluongban.'g</td>';
                                            }elseif(($pro->soluongban/1000)<10){
                                            $khoiluong=$pro->soluongban/1000;
                                            echo '<td>'.$khoiluong.'kg</td>';
                                            }elseif(($pro->soluongban/10000)<10){
                                            $khoiluong=$pro->soluongban/10000;
                                            echo '<td>'.$khoiluong.'yến</td>';
                                            }elseif(($pro->soluongban/100000)<10){
                                            $khoiluong=$pro->soluongban/100000;
                                            echo '<td>'.$khoiluong.'tạ</td>';
                                            }elseif(($pro->soluongban/1000000)<10){
                                            $khoiluong=$pro->soluongban/1000000;
                                            echo '<td>'.$khoiluong.'tấn</td>';
                                            }
                                        }else{
                                            echo '<td>'.$pro->soluongban.' phần</td>';
                                        }
                                        ?>   
                                        <?php if($pro->idtheloai!=5): ?>                               
                                        <td><?php echo e(number_format($pro->dhct_giaban * $pro->soluongban/1000)); ?><u>đ</u></td>
                                        <?php else: ?>
                                        <td><?php echo e(number_format($pro->dhct_giaban * $pro->soluongban)); ?><u>đ</u></td>
                                        <?php endif; ?>
                                        <td><span class="text-ellipsis">    
                                    </tr>                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php $__currentLoopData = $edit_order_coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $edit_order_coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h4 class="text-right">Áp dụng mã giảm giá: <?php echo e($edit_order_coupon->tilegiamgia); ?>% </h4>
                    <h4 class="text-right"><span class="text-black">Tạm tính:<?php echo e(number_format($edit_order_customer->tongtien*100/(100-$edit_order_coupon->tilegiamgia))); ?><u>đ</u></span></h4>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <h3 class="text-right mt-3">Tổng giá trị đơn hàng:<span class="text-danger"><?php echo e(number_format($edit_order_customer->tongtien)); ?><u>đ</u></span></h3>
                    <form role="form" action="<?php echo e(URL::to('/update-order-product/'.$edit_order_customer->iddonhang)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="staff_id_hidden" value="<?php echo e(Session::get('admin_id')); ?>">
                        <select class="form-select order-select-status" aria-label="Default select example" name="order_status">
                        <?php if($edit_order_customer->trangthai=='1'): ?>
                                <option selected value="1">Đã xác nhận</option>
                                <option value="0">Đang chờ xử lý</option>
                                <option value="2">Đang chuẩn bị hàng</option>
                                <option value="3">Đơn hàng đã xử lý</option>
                        <?php elseif($edit_order_customer->trangthai=='0'): ?>
                                <option selected value="0">Đang chờ xử lý</option>
                                <option value="1">Đã xác nhận</option>
                                <option value="2">Đang chuẩn bị hàng</option>
                                <option value="3">Đơn hàng đã xử lý</option>
                        <?php elseif($edit_order_customer->trangthai=='2'): ?>
                                <option selected value="2">Đang chuẩn bị hàng</option>
                                <option value="0">Đang chờ xử lý</option>
                                <option value="1">Đã xác nhận</option>
                                <option value="3">Đơn hàng đã xử lý</option>      
                        <?php else: ?>
                        <option selected value="3">Đơn hàng đã xử lý</option>
                                <option value="0">Đang chờ xử lý</option>
                                <option value="1">Đã xác nhận</option>
                                <option value="2">Đang chuẩn bị hàng</option>          
                        <?php endif; ?>  
                        </select>
                        <button type="submit" class="btn btn-outline-success btn-styling-order">Xác nhận đơn hàng <i class="fa-solid fa-right-to-bracket"></i></button>
                    </form>
                </div>
            </div>
            <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/edit_order.blade.php ENDPATH**/ ?>