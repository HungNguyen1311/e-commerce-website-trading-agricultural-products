@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Sản Phẩm
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
                                @foreach($edit_product as $key=> $pro)
                                <form role="form" action="{{URL::to('/update-product/'.$pro->idsanpham)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->tensanpham}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh 1</label>
                                    <input type="file" name="product_image1" class="form-control" id="exampleInputEmail1" >
                                    <?php
                                        if($pro->hinhanh1 !=''){
                                            echo '<img src="'.URL::to($pro->hinhanh1).'" height="150" width="150">';
                                        }
                                    ?>           
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh 2</label>
                                    <input type="file" name="product_image2" class="form-control" id="exampleInputEmail1" >
                                    <?php
                                        if($pro->hinhanh2 !=''){
                                            echo '<img src="'.URL::to($pro->hinhanh2).'" height="150" width="150">';
                                        }
                                    ?>  
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh 3</label>
                                    <input type="file" name="product_image3" class="form-control" id="exampleInputEmail1" >
                                    <?php
                                        if($pro->hinhanh3 !=''){
                                            echo '<img src="'.URL::to($pro->hinhanh3).'" height="150" width="150">';
                                        }
                                    ?>  
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá bán</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro->giaban}}" >
                                    <input type="hidden" name="staff_id" class="form-control" id="exampleInputEmail1" value="{{Session::get('admin_id')}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả Sản Phẩm</label>
                                    <textarea style="resize:none" rows="8"  class="form-control" id="exampleInputPassword1" name="product_desc">{{$pro->motasanpham}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Danh Mục Sản Phẩm</label>
                                    <select class="form-control m-bot15" name="product_category">
                                       @foreach($cate_product as $key => $cate) 
                                        @if($cate->idtheloai==$pro->idtheloai)
                                            <option selected value="{{$cate->idtheloai}}">{{$cate->tentheloai}}</option>
                                        @else
                                            <option value="{{$cate->idtheloai}}">{{$cate->tentheloai}}</option>
                                        @endif
                                       @endforeach                                     
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển Thị</label>
                                    <select class="form-control m-bot15" name="product_status">
                                            @if($pro->hienthisanpham=='1')
                                                    <option selected value="1">Hiển Thị</option>
                                                    <option value="0">Ẩn</option>
                                            @elseif($pro->hienthisanpham=='0')
                                                    <option selected value="0">Ẩn</option>
                                                    <option value="1">Hiển thị</option>  
                                            @else
                                                    <option value="0">Ẩn</option>
                                                    <option value="1">Hiển thị</option>          
                                            @endif                                     
                                    </select>
                                </div>                        
                                <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection            