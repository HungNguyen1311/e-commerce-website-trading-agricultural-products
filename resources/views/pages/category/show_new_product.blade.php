@extends('welcome')
@section('content')
    <div class="content-danhmucsanpham">
        <div class="container-fluid">
            <div class="row danhmuc-row m-auto">
                <div class="col-sm-3">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button btn-outline-success bg-success text-white" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne"
                                    aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    DANH MỤC SẢN PHẨM
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body menu-danhmuc">
                                    @foreach($category as $key => $cate_pro)
                                    <p><a href="{{URL::to('/danhmucsanpham/'.$cate_pro->idtheloai)}}">{{$cate_pro->tentheloai}}</a></p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-danhmuc">
                        <img src="{{URL::to('frontend/image/banner/banner-danhmuc3.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-sm-9 danhmuc-hienthi">
                    
                    <h4 id="danhmuc-content">Sản Phẩm Mới</h4>
                    <!-- SAN PHAM MOI  -->
                    <div class="spm">
                        <div class="container-fluid">
                            <div class="row d-inline-flex">
                                <!-- Gallery Item 1 -->
                                @foreach($all_product as $key => $cate)
                                <div class="col-12 col-sm-6 col-md-4 p-2 grid-product">
                                <form action="{{URL::to('/save-home-cart')}}" method="POST">
                                {{csrf_field()}}
                                    <div class="d-flex flex-column text-center height100">
                                    <?php if($cate->soluongton==0){ 
                                        ?>
                                        <div class="grid-product-img">
                                            <a href="{{URL::to('/chitietsanpham/'.$cate->idsanpham)}}">
                                                <img src="{{URL::to($cate->hinhanh1)}}" />
                                                <h2><button>HẾT HÀNG! <i class="fa-solid fa-right-long"></i></button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4>{{$cate->tensanpham}}</h4>
                                        <?php
                            $discount_percent=($cate->giakhuyenmai/$cate->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                            if($cate->giakhuyenmai==NULL){
                            ?>
                                        <p id="price">{{number_format($cate->giaban)}}<u>đ</u></p>
                                        <?php
                            }else{                             
                            ?>
                                        <p id="price">{{number_format($cate->giakhuyenmai)}}<u>đ</u>
                                            <del>{{number_format($cate->giaban)}} <u>đ</u> </del><label
                                                for="">-{{$discount_percent_total}}%</label></p>
                                        <?php
                            }
                            ?>
                                        <input type="hidden" name="productid_home_hidden" value="{{$cate->idsanpham}}">
                                        <div class="shopping-cart">
                                            <span id="out_product">Hết Hàng!</span>                    
                                        <?php }else{ 
                                        ?>
                                        <input type="hidden" value="{{$cate->idsanpham}}" class="cart_product_id_{{$cate->idsanpham}}">
                                        <input type="hidden" value="{{$cate->tensanpham}}" class="cart_product_name_{{$cate->idsanpham}}">
                                        <input type="hidden" value="{{$cate->hinhanh1}}" class="cart_product_image_{{$cate->idsanpham}}">
                                        <input type="hidden" value="{{$cate->giaban}}" class="cart_product_price_{{$cate->idsanpham}}">
                                        <input type="hidden" value="1" class="cart_product_qty_{{$cate->idsanpham}}">
                                        <div class="grid-product-img">
                                            <a href="{{URL::to('/chitietsanpham/'.$cate->idsanpham)}}">
                                                <img src="{{URL::to($cate->hinhanh1)}}" />
                                                <h2><button>XEM CHI TIẾT <i class="fa-solid fa-right-long"></i></button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4>{{$cate->tensanpham}}</h4>
                                        <?php
                            $discount_percent=($cate->giakhuyenmai/$cate->giaban)*100;
                            $discount_percent_total=round(100-$discount_percent);
                            if($cate->giakhuyenmai==NULL){
                            ?>
                                        <p id="price">{{number_format($cate->giaban)}}<u>đ</u></p>
                                        <?php
                            }else{                             
                            ?>
                                        <p id="price">{{number_format($cate->giakhuyenmai)}}<u>đ</u>
                                            <del>{{number_format($cate->giaban)}} <u>đ</u> </del><label
                                                for="">-{{$discount_percent_total}}%</label></p>
                                        <?php
                            }
                            ?>
                                        <input type="hidden" name="productid_home_hidden" value="{{$cate->idsanpham}}">
                                        <div class="shopping-cart">
                                        <button type="button" id="tvgh" class="add-to-cart"  data-id_product="{{$cate->idsanpham}}" ><i class="fas fa-shopping-cart add-to-cart"></i> Thêm
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
                    <div class="cate_pagination">
                        {{$all_product->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 