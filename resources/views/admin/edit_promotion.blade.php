@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Sản Phẩm Khuyến Mãi
                        </header>
                        <div class="panel-body">
                        <?php
                        $messeage=Session::get('message');
                        if($messeage){
                            echo '<span class="text-alert">'.$messeage.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                        @foreach($edit_promotion_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-promotion-product/'.$edit_value->idsanpham)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputFile">Tên Sản Phẩm</label>
                                    <select class="form-control m-bot15" name="promotion_product_id">
                                       @foreach($edit_promotion_product as $key => $edit_value_name) 
                                            @if($edit_value_name->idsanpham==$edit_value->idsanpham)
                                                    <option selected value="{{$edit_value_name->idsanpham}}">{{$edit_value_name->tensanpham}}</option>
                                            @else
                                                    <option value="{{$edit_value_name->idsanpham}}">{{$edit_value_name->tensanpham}}</option>
                                            @endif
                                       @endforeach                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Khuyến Mãi</label>
                                    <input type="text" name="product_promotion_price" class="form-control" id="exampleInputEmail1" value="{{$edit_value->giakhuyenmai}}">                                </div>
                        @endforeach                                                              
                                <button type="submit" name="update_promotion_product" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
@endsection            