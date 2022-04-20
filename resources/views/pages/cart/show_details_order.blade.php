@extends('product_details')
@section('content_details_product')
<h3 class="text-center">Đơn Hàng Của Bạn</h3>
    <!-- Gio hang -->
<div class="details-order-home">
    <div class="giohang">      
        <div class="chitietgiohang">
            <div class="container-fluid">
                <div class="table-responsive-sm">
                    <table class="table table-th">
                        <thead>
                            <tr id="title">
                                <th>Hình Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Tổng Giá</th>
                            </tr>
                        </thead>                      
                        <tbody id="table-body-product">
                            @foreach($product as $v_product)                            
                            <tr id="gh-product-detail">                               
                                <td><img width="50" height="50" src="{{URL::to($v_product->hinhanh1)}}" /></td>
                                <td>{{$v_product->tensanpham}}</td>
                                    @if($v_product->idtheloai!=5)                               
                                    <td>{{number_format($v_product->dhct_giaban)}}<u>đ</u>/kg</td>
                                    @else
                                    <td>{{number_format($v_product->dhct_giaban)}}<u>đ</u>/phần</td>
                                     @endif
                            <?php
                                if($v_product->idtheloai!=5){
                                    if(($v_product->soluongban/1000)<1){
                                    echo '<td>'.$v_product->soluongban.'g</td>';
                                    }elseif(($v_product->soluongban/1000)<10){
                                    $khoiluong=$v_product->soluongban/1000;
                                    echo '<td>'.$khoiluong.'kg</td>';
                                    }elseif(($v_product->soluongban/10000)<10){
                                    $khoiluong=$v_product->soluongban/10000;
                                    echo '<td>'.$khoiluong.'yến</td>';
                                    }elseif(($v_product->soluongban/100000)<10){
                                    $khoiluong=$v_product->soluongban/100000;
                                    echo '<td>'.$khoiluong.'tạ</td>';
                                    }elseif(($v_product->soluongban/1000000)<10){
                                    $khoiluong=$v_product->soluongban/1000000;
                                    echo '<td>'.$khoiluong.'tấn</td>';
                                    }
                                }else{
                                    echo '<td>'.$v_product->soluongban.' phần</td>';
                                }
                            ?>
                              @if($v_product->idtheloai!=5)                               
                                        <td>{{number_format($v_product->dhct_giaban * $v_product->soluongban/1000)}}<u>đ</u></td>
                                        @else
                                        <td>{{number_format($v_product->dhct_giaban * $v_product->soluongban)}}<u>đ</u></td>
                                        @endif
                            </tr>
                            @endforeach                         
                            <tr>
                                <td colspan="7" class="gh-tongtien">
                                    @foreach($order_details as $key =>$order_details)
                                    <?php
                                    if($order_details->dh_magiamgia!=NULL){
                                    ?>
                                    <p>Đơn hàng có áp dụng mã {{$order_details->motagiamgia}}</p>
                                    <?php
                                    }
                                    ?>
                                    <p>Tổng Cộng: <b class="text-danger">{{number_format($order_details->tongtien)}}<u>đ</u></b></p>
                                    @endforeach
                                </td>
                            </tr>                              
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection