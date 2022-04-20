@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Mã Giảm Giá
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
                                <form role="form" action="{{URL::to('/save-coupon')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Mã giảm giá</label>
                                    <input type="text" name="coupon_text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tỉ lệ giảm giá</label>
                                    <input type="text"  name="discount_percent" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả giảm giá</label>
                                    <input type="text"  name="coupon_desc" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày hết hạn</label>
                                    <input type="date" name="coupon_exp_date" class="form-control" id="exampleInputEmail1" placeholder="Ngày hết hạn">
                                </div>                                                    
                                <button type="submit" name="update_coupon_product" class="btn btn-info">Thêm mã giảm giá</button>
                            </form>                          
                        </div>
                    </section>
            </div>
@endsection            