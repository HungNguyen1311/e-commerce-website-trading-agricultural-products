@extends('welcome')
@section('content')
    <div class="content-danhmucsanpham">
        <div class="container-fluid">
            <div class="row danhmuc-row m-auto">
                <div class="col-sm-3">
                    <div class="new-post">
                        <h4 class="new-post-title">Bài viết mới nhất</h4>
                        @foreach($new_post as $key => $new)
                        <div class= "container-fluid">
                            <div class= "row body-post mb-3">
                                <div class ="col-sm-4">
                                    <div class="image-post2">
                                        <img src="{{URL::to($new->hinhanhbaiviet)}}" width="300" height="150">
                                    </div>                               
                                </div>
                                <div class ="col-sm-8">
                                    <h4><a href="{{URL::to('/chitietbaiviet/'.$new->idbaiviet)}}" class="details-post-title2">{{$new->tieudebaiviet}}</a></h4>    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="banner-danhmuc-post mt-3">
                        <img src="{{URL::to('frontend/image/banner/abstract-colorful-sales-banner_23-2148337625.webp')}}" alt="" height="430" width="350">
                    </div>
                </div>
                <div class="col-sm-9 danhmuc-hienthi">
                <h3 class="title-post-styling">Tất cả bài viết</h3>
                @foreach($get_post as $key => $post)
                    <div class ="col-sm-12">
                        <div class= "container-fluid">
                            <div class= "row body-post mb-5">
                                <div class ="col-sm-4">
                                    <div class="image-post">
                                    <img src="{{URL::to($post->hinhanhbaiviet)}}" width="300" height="150">
                                    </div>                               
                                </div>
                                <div class ="col-sm-8">
                                <h4><a href="{{URL::to('/chitietbaiviet/'.$post->idbaiviet)}}" class="details-post-title">{{$post->tieudebaiviet}}</a></h4>    
                                <p class="details-post-desc">{!!$post->mieutabaiviet!!}</p>
                                <p><a href="{{URL::to('/chitietbaiviet/'.$post->idbaiviet)}}" class="details-post-button">Xem chi tiết <i class="fa-solid fa-up-right-from-square"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>                  
                 @endforeach    
                    <div class="cate_pagination">
                            {{$get_post->links()}}
                    </div>             
                </div>                  
            </div>
        </div>
    </div>
@endsection 