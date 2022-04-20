@extends('product_details')
@section('content_details_product')
    <!-- Gio hang -->
    <div class="giohang">
    <?php
        $get_id_coupon=Session::get('idgiamgia');
        $get_coupon=Session::get('tilegiamgia');
        $customer_id=Session::get('idkhachhang');
        if($customer_id!=NULL){                             
        ?>
        <a class="purchase-history" href="{{URL::to('/purchase-history/'.$customer_id)}}">Lịch sử mua hàng của bạn <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
        <?php
        }else{
        ?>
        <p class="recommend-login">Vui lòng đăng nhập để có thể tra cứu lịch sử mua hàng(*)</p>
        <?php
        }
        ?>
        <h3>Giỏ Hàng Của Bạn</h3>
        <div class="chitietgiohang">
            <?php
            $content=Cart::getContent();  
            $a=[];
            // echo '<prev>';
            // print_r($content);
            // echo '</prev>';   
            ?>
            <div class="container-fluid">
                <div class="table-responsive-sm">
                    <table class="table table-th">
                        <thead>
                            <tr id="title">
                                <th>No</th>
                                <th>Hình Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Tổng Giá</th>
                                <th>Công Cụ</th>
                            </tr>
                        </thead>                      
                        <tbody id="table-body-content">
                            @foreach($content as $v_content)
                            @if($v_content->attributes->idtheloai==5)
                            <tr id="gh-product-detail">
                                <td class="text-center">{{$v_content->id}}</td>
                                <td><img width="50" height="50" src="{{URL::to($v_content->attributes->image)}}" /></td>
                            <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                {{csrf_field()}}
                                <td>{{$v_content->name}}</td>
                                <td>{{number_format($v_content->price)}} <sup><u>đ</u></sup>/ phần</td>
                                <td>
                                    <div class="input-group number-spinner2">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="dwn"><i
                                                    class="fa fa-minus"></i></button>
                                        </span>
                                        <input type="text" value="{{$v_content->quantity}}" name="cart_quantity" class="cart_product_quantity">
                                        
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="up"><i
                                                    class="fa fa-plus"></i></button>
                                        </span>
                                    </div>
                                    <input type="hidden" name="cart_productid" value="{{$v_content->id}}">
                                    <input name="update_qty" type="submit" value="Cập Nhật" class="btn btn-default">                                  
                                </td>
                            </form>
                                <td><?php 
                                $subtotal=$v_content->price * $v_content->quantity;
                                array_push($a,$subtotal);
                                echo number_format($subtotal);
                                ?><sup><u>đ</u></sup></td>
                                <td id="icon-margin">
                                <a href="{{URL::to('/delete-to-cart/'.$v_content->id)}}"><i class="fas fa-trash-alt text-black"></a></i>
                                </td>
                            </tr>
                            @else
                            <tr id="gh-product-detail">
                                <td class="text-center">{{$v_content->id}}</td>
                                <td><img width="50" height="50" src="{{URL::to($v_content->attributes->image)}}" /></td>
                            <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                {{csrf_field()}}
                                <td>{{$v_content->name}}</td>
                                <td>{{number_format($v_content->price)}} <sup><u>đ</u></sup>/kg</td>
                                <td>
                                    <div class="input-group number-spinner">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="dwn"><i
                                                    class="fa fa-minus"></i></button>
                                        </span>
                                        <input type="text" value="{{$v_content->quantity}}" name="cart_quantity" class="cart_product_quantity">
                                        
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="up"><i
                                                    class="fa fa-plus"></i></button>
                                        </span>
                                    </div>
                                    <input type="hidden" name="cart_productid" value="{{$v_content->id}}">
                                    <input name="update_qty" type="submit" value="Cập Nhật" class="btn btn-default">                                  
                                </td>
                            </form>
                                <td><?php 
                                $subtotal=$v_content->price * $v_content->quantity/1000;
                                array_push($a,$subtotal);
                                echo number_format($subtotal)
                                ?><sup><u>đ</u></sup></td>
                                <td id="icon-margin">
                                <a href="{{URL::to('/delete-to-cart/'.$v_content->id)}}"><i class="fas fa-trash-alt text-black"></a></i>
                                </td>
                            </tr>
                            @endif
                            @endforeach                         
                            <tr>
                            <?php
                                            $messeage_false=Session::get('message-false');
                                            if($messeage_false){
                                                echo '<span class="text-alert">'.$messeage_false.'</span>';
                                                Session::put('message-false',null);
                                            }
                                    ?>  
                                <td colspan="7" class="gh-tongtien">
                                    <?php
                                    $total_order=array_sum($a);
                                    $price_total=$total_order;
                                    $price_after_coupon=((100-$get_coupon)*$price_total)/100;
                                    $price_discount=$price_total*$get_coupon/100;
                                    if($get_coupon){                                
                                    ?>
                                    <p>Tạm Tính <b class="text-danger">{{number_format($price_total)}}<u>đ</u></b></p>
                                    <p>Giảm Giá:({{$get_coupon}})%: <b class="text-danger">{{number_format($price_discount)}}<u>đ</u></b></p>
                                    <p>Tổng Cộng: <b class="text-danger">{{number_format($price_after_coupon)}}<u>đ</u></b></p>
                                    <?php
                                    }else{
                                        $total_order=array_sum($a);
                                    ?>                                 
                                    <p>Tổng Cộng: <b class="text-danger">{{number_format($total_order)}}<u>đ</u></b></p>
                                    <?php
                                    }
                                    ?>                                  
                                </td>
                            </tr>
                            <tr id="magiamgia">
                                <form action="{{URL::to('/use-coupon')}}" method="POST">
                                    {{csrf_field()}}
                                <td colspan="7">
                                    <div class="input-group">
                                        <input type="text" class="form-control text-giamgia" name="magiamgia" placeholder="Mã Giảm Giá">
                                        <div class="input-group-append">
                                            <button class="btn btn-danger mr-5" type="submit">Sử Dụng</button>
                                        </div>
                                    </div>
                                    <?php
                                    $messeage_get_success=Session::get('get-coupon');
                                    if($messeage_get_success){
                                        echo '<span class="text-alert">'.$messeage_get_success.'</span>';
                                        Session::put('get-coupon',null);
                                    }
                                    ?>
                                </td>
                                </form>
                            </tr>
                            <tr>
                                <td colspan="7" id="giohang-button">
                                    <a href="{{URL::to('/delete-cart')}}"><button class="btn btn-secondary"><i class="fas fa-trash-alt"></i>
                                        Xóa Tất Cả</button></a>
                                </td>
                            </tr>                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
        $customer_id=Session::get('idkhachhang');
        if($customer_id==NULL){                             
        ?>
        <div class="thongtinkhachhang">
        <div class="container-fluid mt-3">
            <h4 class="mb-2 text-center fw-bold">Thông Tin Giao Hàng</h4>
            <form action="{{URL::to('/payment')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="inputAddress">Họ Và Tên(*)</label>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input name="customer_cart_name" type="text" class="form-control"  required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Số Điện Thoại(*)</label>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input name="customer_cart_phone" type="text" class="form-control"  required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Địa Chỉ(*)</label>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-house"></i></span>
                        </div>
                        <input name="customer_cart_address" type="text" class="form-control"  required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                        <input type="hidden" name="magiamgia" value="{{$get_id_coupon}}">
                        <input type="hidden" name="tongtien" value="{{$total_order}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Email(*)</label>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input name="customer_cart_email" type="text" class="form-control" placeholder="abc@gmail.com"   required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">                     
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Ghi Chú(*)</label>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                        <textarea style="resize:none;"   class="form-control" id="exampleInputPassword1" name="customer_cart_desc"   required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Thanh Toán(*)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Hình Thức(*)</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="customer_cart_delivery"  required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                            <option value="" selected hidden>Lựa chọn hình thức giao hàng...</option>
                            <option value="0">Nhận Hàng Trực Tiếp tại cửa hàng</option>
                            <option value="1">Nhận Hàng Tại Nhà (COD)</option>
                            <option value="2">Thanh toán trực tuyến</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-success mt-2 " id="btn-thanhtoan" name="redirect">Xác Nhận và Thanh Toán <i
                        class="fas fa-sign-in-alt"></i></button>
         </form>
        </div>
    </div>
        <?php
        }else{               
        ?>
       <div class="thongtinkhachhang">
        <div class="container-fluid mt-3">
            <h4 class="mb-2 text-center fw-bold">Thông Tin Giao Hàng</h4>  
            <form action="{{URL::to('/payment-account')}}" method="POST">
                {{csrf_field()}}         
                <div class="form-group">
                    <label for="inputAddress2">Ghi Chú(*)</label>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                        <input type="hidden" name="magiamgia" value="{{$get_id_coupon}}">
                        <textarea  style="resize:none" rows="4" cols="20"  class="form-control" id="exampleInputPassword1" name="customer_cart_desc"  required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')"></textarea>
                        <input name="customer_cart_id" type="hidden" class="form-control" value="{{$customer_id}}">
                        <input type="hidden" name="tongtien" value="{{$total_order}}">
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Thanh Toán(*)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Hình Thức(*)</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="customer_cart_delivery"    required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')" >
                            <option value="" selected hidden>Lựa chọn hình thức giao hàng...</option>
                            <option value="0">Nhận Hàng Trực Tiếp tại cửa hàng</option>
                            <option value="1">Nhận Hàng Tại Nhà (COD)</option>
                            <option value="2">Thanh toán trực tuyến</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-success mt-2 " id="btn-thanhtoan" name="redirect">Xác Nhận và Thanh Toán <i
                        class="fas fa-sign-in-alt"></i></button>
        </form>
        </div>
    </div>
        <?php
        }
        ?>
@endsection