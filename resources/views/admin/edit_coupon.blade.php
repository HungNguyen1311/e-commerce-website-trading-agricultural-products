@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Mã Giảm Giá
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
                                <form role="form" action="{{URL::to('/update-coupon-product/'.$edit_value->idmagiamgia)}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Mã giảm giá</label>
                                    <input type="text" value="{{$edit_value->magiamgia}}" name="coupon_text" class="form-control" id="exampleInputEmail1" placeholder="Mã giảm giá">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tỉ lệ giảm giá</label>
                                    <input type="text" value="{{$edit_value->tilegiamgia}}" name="discount_percent" class="form-control" id="exampleInputEmail1" placeholder="Tỉ lệ giảm giá">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả giảm giá</label>
                                    <input type="text" value="{{$edit_value->motagiamgia}}" name="coupon_desc" class="form-control" id="exampleInputEmail1" placeholder="Mô tả giảm giá">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày hết hạn</label>
                                    <input type="date" value="{{$edit_value->ngayhethan}}" name="coupon_exp_date" class="form-control" id="exampleInputEmail1" placeholder="Ngày hết hạn">
                                </div>
                        @endforeach                                                              
                                <button type="submit" name="update_coupon_product" class="btn btn-info">Cập nhật Mã</button>
                            </form>
                            
                        </div>
                    </section>
            </div>
@endsection            