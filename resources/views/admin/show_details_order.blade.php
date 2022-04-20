@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Hiển thị chi tiết đơn hàng
            </header>
            <div class="panel-body">
                <?php
                        $messeage=Session::get('message');
                        if($messeage){
                            echo '<span class="text-alert">'.$messeage.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                <div class="agile-grid">

                    <div class="col-lg-12">
                        <p class="hd-title">Thông tin khách hàng</p>
                    </div>
                    @foreach($edit_order_customer as $key => $edit_order_customer)
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="">Họ và Tên</label>
                                    <section class="panel">
                                        <div class="panel-body">{{$edit_order_customer->tenkhachhang}}</div>
                                    </section>
                                </div>
                                <div class="col-sm-6">
                                <label for="">Số điện thoại</label>
                                    <section class="panel">
                                        <div class="panel-body">{{$edit_order_customer->sodienthoai}}</div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                        <label for="">Địa chỉ</label>
                            <section class="panel">
                                <div class="panel-body">{{$edit_order_customer->diachi}}</div>
                            </section>
                        </div>
                        <div class="form-group">
                                    <label for="exampleInputPassword1">Ghi chú khách hàng</label>
                                    <textarea style="resize:none" rows="8"  class="form-control" id="exampleInputPassword1" name="product_order_desc">{{$edit_order_customer->ghichu}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình thức giao hàng: </label>
                                    <span>
                                    <?php
                                        if($edit_order_customer->giaohang==0){
                                            echo 'Nhận hàng trực tiếp tại của hàng';
                                        }elseif($edit_order_customer->giaohang==1){
                                            echo 'Nhận hàng tại nhà (COD)';
                                        }else{
                                            echo 'Thanh toán trực tuyến';
                                        }
                                        ?>
                                    </span>
                        </div>
                    </div>                    
                    @endforeach
                </div>
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thông tin đơn hàng
                        </div>                      
                        <div class="table-responsive">
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        <th>Lô sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình Ảnh</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>                                
                                        <th>Thành tiền</th>
                                        
                                        <th style="width:30px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($edit_order_product as $key => $pro)
                                    <tr>
                                        <td>{{$pro ->idlosanpham}}</td>
                                        <td>{{$pro ->tensanpham}}</td>
                                        <td><img src="{{URL::to($pro ->hinhanh1)}}" height="100" width="100"></td>
                                        @if($pro->idtheloai!=5)                               
                                        <td>{{number_format($pro->dhct_giaban)}}<u>đ</u>/kg</td>
                                        @else
                                        <td>{{number_format($pro->dhct_giaban)}}<u>đ</u>/phần</td>
                                        @endif
                                        <?php
                                        if($pro->idtheloai!=5){
                                            if(($pro->soluongban/1000)<1){
                                            echo '<td>'.$pro->soluongban.'g</td>';
                                            }elseif(($pro->soluongban/1000)<10){
                                            $khoiluong=$pro->soluongban/1000;
                                            echo '<td>'.$khoiluong.'kg</td>';
                                            }elseif(($pro->soluongban/10000)<10){
                                            $khoiluong=$pro->soluongban/10000;
                                            echo '<td>'.$khoiluong.'yến</td>';
                                            }elseif(($pro->soluongban/100000)<10){
                                            $khoiluong=$pro->soluongban/100000;
                                            echo '<td>'.$khoiluong.'tạ</td>';
                                            }elseif(($pro->soluongban/1000000)<10){
                                            $khoiluong=$pro->soluongban/1000000;
                                            echo '<td>'.$khoiluong.'tấn</td>';
                                            }
                                        }else{
                                            echo '<td>'.$pro->soluongban.' phần</td>';
                                        }
                                        ?>                                
                                         @if($pro->idtheloai!=5)                               
                                        <td>{{number_format($pro->dhct_giaban * $pro->soluongban/1000)}}<u>đ</u></td>
                                        @else
                                        <td>{{number_format($pro->dhct_giaban * $pro->soluongban)}}<u>đ</u></td>
                                        @endif
                                        <td><span class="text-ellipsis">    
                                    </tr>                                        
                                    @endforeach
      
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @foreach($edit_order_coupon as $key => $edit_order_coupon)
                    <h4 class="text-right">Áp dụng mã giảm giá: {{$edit_order_coupon->tilegiamgia}}% </h4>
                    <h4 class="text-right"><span class="text-black">Tạm tính:{{number_format($edit_order_customer->tongtien*100/(100-$edit_order_coupon->tilegiamgia))}}<u>đ</u></span></h4>
                    @endforeach
                    <h3 class="text-right">Tổng giá trị đơn hàng:<span class="text-danger">{{number_format($edit_order_customer->tongtien)}}<u>đ</u></span></h3>
                </div>
            </div>
 @endsection