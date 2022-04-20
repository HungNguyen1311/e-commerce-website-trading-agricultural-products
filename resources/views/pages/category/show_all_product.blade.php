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
                    
                    <div class="sort-menu">
                        <div class="dropdown sort-menu-dropdown">
                            <a class="btn dropdown-toggle sort-content btn-light" href="#" role="button"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Sắp xếp (sort)
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Sản phẩm nổi bật</a></li>
                                <li><a class="dropdown-item" href="#">Giá: Tăng dần</a></li>
                                <li><a class="dropdown-item" href="#">Giá: Giảm dần</a></li>
                                <li><a class="dropdown-item" href="#">Mới nhất</a></li>
                                <li><a class="dropdown-item" href="#">Bán chạy nhất</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- SAN PHAM MOI  -->
                    <div class="spm">
                        <div class="container-fluid">
                            <div class="row d-inline-flex">
                                <!-- Gallery Item 1 -->
                                @foreach($all_product as $key => $cate)
                                <div class="col-12 col-sm-6 col-md-4 p-2 grid-product">
                                    <div class="d-flex flex-column text-center height100">
                                        <div class="grid-product-img">
                                            <a href="{{URL::to('/chitietsanpham/'.$cate->idsanpham)}}">
                                                <img src="{{URL::to($cate->hinhanh1)}}" />
                                                <h2><button>XEM CHI TIẾT <i class="fa-solid fa-right-long"></i></button>
                                                </h2>
                                            </a>
                                        </div>
                                        <h4>{{$cate->tensanpham}}</h4>
                                        <p id="price">{{number_format($cate->giaban)}}<u>đ</u></p>
                                        <div class="shopping-cart"><a href="#" id="tvgh"><i
                                                    class="fas fa-shopping-cart"></i> Thêm
                                                vào giỏ hàng</a></div>
                                    </div>
                                </div>  
                                @endforeach                          
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Something">
                        <ul class="pagination justify-content-center bg-light mt-3">
                            <li class="page-item">
                                <a class="page-link" href="#" tabindex="-1">Trang đầu</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Trang cuối</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection 