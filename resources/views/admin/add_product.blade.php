@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Sản Phẩm
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
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh 1</label>
                                    <input type="file" name="product_image1" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh 2</label>
                                    <input type="file" name="product_image2" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh 3</label>
                                    <input type="file" name="product_image3" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá bán</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả Sản Phẩm</label>
                                    <textarea style="resize:none" rows="8"  class="form-control" name="product_desc"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Danh Mục Sản Phẩm</label>
                                    <select class="form-control m-bot15" name="product_category">
                                       @foreach($cate_product as $key => $cate) 
                                        <option value="{{$cate->idtheloai}}">{{$cate->tentheloai}}</option>
                                       @endforeach                                     
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển Thị</label>
                                    <select class="form-control m-bot15" name="product_status">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>                                      
                                    </select>
                                </div>                        
                                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection            