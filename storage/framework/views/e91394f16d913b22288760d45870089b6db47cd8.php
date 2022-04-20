
<?php $__env->startSection('admin_content'); ?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Bài Viết
                        </header>
                        <div class="panel-body">
                        <?php
                        $messeage=Session::get('message');
                        if($messeage){
                            echo '<span class="text-alert">'.$messeage.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                            <div class="position-center">
                                <form role="form" action="<?php echo e(URL::to('/save-post')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu Đề Bài Viết</label>
                                    <input type="text" name="post_title" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tóm Tắt Bài Viết</label>
                                    <textarea style="resize:none" rows="8"  class="form-control" id="ckeditor1" name="post_desc"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội Dung Bài Viết</label>
                                    <input type="hidden" name="post_staff_id" class="form-control" id="exampleInputEmail1" value="<?php echo e(Session::get('admin_id')); ?>">  
                                    <textarea style="resize:none" rows="8"  class="form-control" id="ckeditor2" name="post_content"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh Bài Viết</label>
                                    <input type="file" name="post_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển Thị</label>
                                    <select class="form-control m-bot15" name="post_status">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>                                      
                                    </select>
                                </div>                        
                                <button type="submit" name="add_brand_product" class="btn btn-info">Thêm bài viết</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
<?php $__env->stopSection(); ?>            
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luanvan\resources\views/admin/post/add_post.blade.php ENDPATH**/ ?>