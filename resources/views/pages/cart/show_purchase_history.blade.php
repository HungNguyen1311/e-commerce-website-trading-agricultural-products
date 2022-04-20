@extends('product_details')
@section('content_details_product')
<?php
    $customer_name=Session::get('customer_name');
?>
<h2 class=text-center>Lịch Sử Mua Hàng</h2>
<div class="purchase_history">
    <div class="container-fluid">
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Ngày tạo</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order_purchase as $key => $purchase)
                    <tr>
                        <td>{{$purchase->iddonhang}}</td>
                        <td>{{$purchase->ngayban}}</td>
                        <td>{{number_format($purchase->tongtien)}}<u>đ</u></td>
                        
                        @if($purchase->trangthai==0)
                            <td>Đang chờ xử lý</td>
                        @elseif($purchase->trangthai==1)
                            <td>Đã xác nhận</td>
                        @elseif($purchase->trangthai==2)
                            <td>Đang chuẩn bị hàng</td>
                        @else
                            <td>Đã xử lý</td>    
                        @endif  
                        
                        <td><a href="{{URL::to('details-order-home/'.$purchase->iddonhang)}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>

            </div>
        </div>
</div>
@endsection