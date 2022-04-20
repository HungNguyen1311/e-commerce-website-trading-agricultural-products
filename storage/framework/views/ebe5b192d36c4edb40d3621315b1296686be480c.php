
<?php $__env->startSection('content_details_product'); ?>
 <!-- validation -->
 <div class="validation-body">
        <h5>validation site</h5>
        <div class="validation">
            <div class="container-fluid mt-3">
                <h4 class="mb-2 text-center fw-bold">Đăng Kí Tài Khoản</h4>
                <p id="validation-content">Bạn đã có tài khoản? <a href="<?php echo e(URL::to('/login-checkout')); ?>">Đăng nhập tại đây!</a></p>
                <form action="<?php echo e(URL::to('/add-customer')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label for="inputAddress">Họ Và Tên(*)</label>
                        <input name="customer_name" type="text" class="form-control" id="myAddress" placeholder="Họ và tên"   required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Tài Khoản(*)</label>
                        <input name="customer_account" type="text" class="form-control" id="myAddress" placeholder="Tài Khoản"  required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Mật Khẩu(*)</label>
                        <input name="customer_password" type="password" class="form-control" id="myAddress2" placeholder="Mật Khẩu"  required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Số Điện Thoại(*)</label>
                        <input name="customer_phone" type="text" class="form-control" id="myAddress2" placeholder="Số điện thoại"  required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Địa Chỉ(*)</label>
                        <input name="customer_address" type="text" class="form-control" id="myAddress2" placeholder="Địa chỉ"  required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Email</label>
                        <input name="customer_email" type="text" class="form-control" id="myAddress2" placeholder="Email"  required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                    </div>
                    <button type="submit" class="btn  btn-block mt-3 ">ĐĂNG KÍ <i
                            class="fas fa-sign-in-alt"></i></button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('product_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/pages/checkout/add_customer.blade.php ENDPATH**/ ?>