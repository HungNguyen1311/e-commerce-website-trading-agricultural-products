@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Sản Phẩm Khuyến Mãi
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
                                <form role="form" action="{{URL::to('/save-promotion')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputFile">Tên sản phẩm</label>
                                    <select class="form-control m-bot15" name="product_id_promotion">
                                       @foreach($all_product as $key => $product)                                                                             
                                        <option value="{{$product->idsanpham}}">{{$product->tensanpham}}-{{number_format($product->giaban)}}<u>đ</u></option>                                          
                                       @endforeach                                        
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Khuyến Mãi</label>
                                    <input type="text" name="product_price_promotion" class="form-control" id="exampleInputEmail1" >
                                    <input type="hidden" name="staff_id" class="form-control" id="exampleInputEmail1" value="{{Session::get('admin_id')}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày Hết Hạn</label>
                                    <input type="date" name="product_date_promotion" class="form-control" id="exampleInputEmail1" >
                                </div>                                                    
                                <button type="submit" name="add_promotion" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>
                        </div>
                    </section>
            </div>
@endsection            