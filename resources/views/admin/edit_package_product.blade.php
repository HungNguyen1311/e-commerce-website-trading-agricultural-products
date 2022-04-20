@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Lô Sản Phẩm
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
                                @foreach($edit_package as $key=> $pro)
                                <form role="form" action="{{URL::to('/update-package-product/'.$pro->idlosanpham)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                    <label for="exampleInputFile">Tên Sản Phẩm</label>
                                    <select class="form-control m-bot15" name="product_id">
                                       @foreach($all_product as $key => $product) 
                                        @if($product->idsanpham==$pro->idsanpham)
                                            <option selected value="{{$product->idsanpham}}">{{$product->tensanpham}}</option>
                                        @else
                                            <option value="{{$product->idsanpham}}">{{$product->tensanpham}}</option>
                                        @endif
                                       @endforeach                                     
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Lượng Nhập Hàng</label>
                                    <input type="number" min=1 name="product_amount" class="form-control" id="exampleInputEmail1" value="{{$pro->soluongnhap}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Lượng Tồn</label>
                                    <input type="number" min=1 name="product_exist" class="form-control" id="exampleInputEmail1" value="{{$pro->soluongton}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Nhập Hàng</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro->gianhap}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày Hết Hạn</label>
                                    <input type="date" name="product_date_expire" class="form-control" id="exampleInputEmail1" value="{{$pro->ngayhethan}}" >
                                </div>                               
                                <div class="form-group">
                                    <label for="exampleInputFile">Thương Hiệu</label>
                                    <select class="form-control m-bot15" name="product_brand">
                                       @foreach($brand_product as $key => $brand) 
                                            @if($brand->idthuonghieu==$pro->idthuonghieu)
                                                    <option selected value="{{$brand->idthuonghieu}}">{{$brand->tenthuonghieu}}</option>
                                            @else
                                                    <option value="{{$brand->idthuonghieu}}">{{$brand->tenthuonghieu}}</option>
                                            @endif
                                @endforeach                                        
                                    </select>
                                </div>                       
                                <button type="submit" name="add_package" class="btn btn-info">Cập nhật lô sản phẩm</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection            