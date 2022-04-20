@extends('welcome')
@section('content')
<div class="content">
        <!-- TRAI CAY NHAP KHAU -->
        <div class="TCNK">
            <div class="container-fluid">
                <div class="content-tctnk">
                    <p>-- Kết Quả Tìm Kiếm--</p>
                </div>
                <div class="mieuta-content">
                    <?php
                    $keyword_content=Session::get('keyword_name');
                    $current_url=URL::current();
                    ?>
                    <p>Từ Khóa:  "{{$keyword_content}}"</p>
                </div>
                <div class="row d-inline-flex">
                    <!-- Gallery Item 1 -->
                    @foreach($search_product as $key => $product_tcnk)
                    <div class="col-12 col-sm-6 col-md-3 p-2 grid-product">
                    <form>
                        {{csrf_field()}}
                        <div class="d-flex flex-column text-center height100">
                        <?php if($product_tcnk->soluongton==0){ 
                                        ?>
                                        <div class="grid-product-img">
                                            <a href="{{URL::to('/chitietsanpham/'.$product_tcnk->idsanpham)}}">
                                                <img src="{{URL::to($product_tcnk->hinhanh1)}}" />
                                                <h2><button>HẾT HÀNG! <i class="fa-solid fa-right-long"></i></button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4>{{$product_tcnk->tensanpham}}</h4>
                                        <?php
                            $discount_percent=($product_tcnk->giakhuyenmai/$product_tcnk->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                            if($product_tcnk->giakhuyenmai==NULL){
                            ?>
                                        <p id="price">{{number_format($product_tcnk->giaban)}}<u>đ</u></p>
                                        <?php
                            }else{                             
                            ?>
                                        <p id="price">{{number_format($product_tcnk->giakhuyenmai)}}<u>đ</u>
                                            <del>{{number_format($product_tcnk->giaban)}} <u>đ</u> </del><label
                                                for="">-{{$discount_percent_total}}%</label></p>
                                        <?php
                            }
                            ?>
                                        <input type="hidden" name="productid_home_hidden" value="{{$product_tcnk->idsanpham}}">
                                        <div class="shopping-cart">
                                            <span id="out_product">Hết Hàng!</span>                    
                                        <?php }else{ 
                                        ?>
                                        <input type="hidden" value="{{$product_tcnk->idsanpham}}" class="cart_product_id_{{$product_tcnk->idsanpham}}">
                                        <input type="hidden" value="{{$product_tcnk->tensanpham}}" class="cart_product_name_{{$product_tcnk->idsanpham}}">
                                        <input type="hidden" value="{{$product_tcnk->hinhanh1}}" class="cart_product_image_{{$product_tcnk->idsanpham}}">
                                        <input type="hidden" value="{{$product_tcnk->giaban}}" class="cart_product_price_{{$product_tcnk->idsanpham}}">
                                        <input type="hidden" value="1" class="cart_product_qty_{{$product_tcnk->idsanpham}}">
                                        <div class="grid-product-img">
                                            <a href="{{URL::to('/chitietsanpham/'.$product_tcnk->idsanpham)}}">
                                                <img src="{{URL::to($product_tcnk->hinhanh1)}}" />
                                                <h2><button>XEM CHI TIẾT <i class="fa-solid fa-right-long"></i></button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4>{{$product_tcnk->tensanpham}}</h4>
                                        <?php
                            $discount_percent=($product_tcnk->giakhuyenmai/$product_tcnk->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                            if($product_tcnk->giakhuyenmai==NULL){
                            ?>
                                        <p id="price">{{number_format($product_tcnk->giaban)}}<u>đ</u></p>
                                        <?php
                            }else{                             
                            ?>
                                        <p id="price">{{number_format($product_tcnk->giakhuyenmai)}}<u>đ</u>
                                            <del>{{number_format($product_tcnk->giaban)}} <u>đ</u> </del><label
                                                for="">-{{$discount_percent_total}}%</label></p>
                                        <?php
                            }
                            ?>
                                        <input type="hidden" name="productid_home_hidden" value="{{$product_tcnk->idsanpham}}">
                                        <input type="hidden" name="url_current_hidden" value="{{$current_url}}">
                                        <div class="shopping-cart">
                                        <button type="button" id="tvgh" class="add-to-cart"  data-id_product="{{$product_tcnk->idsanpham}}" ><i class="fas fa-shopping-cart add-to-cart"></i> Thêm
                                                vào giỏ hàng</button>  
                                        <?php } 
                                        ?>                                     
                                        </div>
                                    </div>
                                </form>
                    </div>
                    @endforeach                   
                </div>
            </div>
        </div> 
</div>       
@endsection    