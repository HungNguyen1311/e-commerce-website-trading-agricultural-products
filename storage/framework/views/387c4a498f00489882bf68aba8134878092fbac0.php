
<?php $__env->startSection('admin_content'); ?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Số Sản Phẩm
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
            <th>Mã</th>
            <th>Giá nhập</th>
            <th>Số lượng nhập</th>
            <th>Số lượng tồn</th>
            <th>Thương Hiệu</th>
            <th>Ngày hết hạn</th>
            <th>Xóa</th>          
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $all_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
          <tr>
            <td><?php echo e($pro ->idlosanpham); ?></td>
            <td><?php echo e(number_format($pro ->gianhap)); ?><u>đ</u></td>
            <?php
              if($pro->idtheloai!=5){
                if(($pro->soluongnhap/1000)<1){
                echo '<td>'.$pro->soluongnhap.'g</td>';
                }elseif(($pro->soluongnhap/1000)<10){
                $khoiluong=$pro->soluongnhap/1000;
                echo '<td>'.$khoiluong.'kg</td>';
                }elseif(($pro->soluongnhap/10000)<10){
                $khoiluong=$pro->soluongnhap/10000;
                echo '<td>'.$khoiluong.'yến</td>';
                }elseif(($pro->soluongnhap/100000)<10){
                $khoiluong=$pro->soluongnhap/100000;
                echo '<td>'.$khoiluong.'tạ</td>';
                }elseif(($pro->soluongnhap/1000000)<10){
                $khoiluong=$pro->soluongnhap/1000000;
                echo '<td>'.$khoiluong.'tấn</td>';
                }
              }else{
                echo '<td>'.$pro->soluongnhap.' phần</td>';
              }
            ?>  
            <?php
            if($pro->idtheloai!=5){
              if(($pro->soluongton/1000)<1){
              echo '<td>'.$pro->soluongton.'g</td>';
              }elseif(($pro->soluongton/1000)<10){
              $khoiluong=$pro->soluongton/1000;
              echo '<td>'.$khoiluong.'kg</td>';
              }elseif(($pro->soluongton/10000)<10){
              $khoiluong=$pro->soluongton/10000;
              echo '<td>'.$khoiluong.'yến</td>';
              }elseif(($pro->soluongton/100000)<10){
              $khoiluong=$pro->soluongton/100000;
              echo '<td>'.$khoiluong.'tạ</td>';
              }elseif(($pro->soluongton/1000000)<10){
              $khoiluong=$pro->soluongton/1000000;
              echo '<td>'.$khoiluong.'tấn</td>';
              }       
            }else{
              echo '<td>'.$pro->soluongton.' phần</td>';
            }     
            ?>   
            <td><?php echo e($pro ->tenthuonghieu); ?></td>
            <td><?php echo e($pro ->ngayhethan); ?></td>
            <td><span class="text-ellipsis">
            <a onclick="return confirm('Lô sản phẩm sẽ được xóa ?')" href="<?php echo e(URL::to('/delete-package-product/'.$pro->idlosanpham)); ?>" class="active styling-delete" ui-toggle-class=""> <i class="fa fa-times text-danger text"></i></a>   
            </span></td>
            <td>
              <a href="<?php echo e(URL::to('/edit-package-product/'.$pro->idlosanpham)); ?>" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-pen-to-square text-success"></i></a>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/show_package_product.blade.php ENDPATH**/ ?>