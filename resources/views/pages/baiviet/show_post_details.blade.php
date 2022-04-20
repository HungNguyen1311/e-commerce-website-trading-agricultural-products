@extends('welcome')
@section('content')
    <div class="content-danhmucsanpham">
        <div class="container-fluid">
            <div class="row danhmuc-row m-auto">
                <div class="col-sm-3 post-body">
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
                </div>
                <div class="col-sm-9 danhmuc-hienthi">
                    <h3 class="text-center">{{$post->tieudebaiviet}}</h3>      
                    <div class="content_post">
                        {!!$post->noidungbaiviet!!}
                        @foreach($more_post as $key => $more_post)
                        <p>>>Xem thêm: <a  class="more_post" href="{{URL::to('/chitietbaiviet/'.$more_post->idbaiviet)}}">{{$more_post->tieudebaiviet}}</a></p>
                        @endforeach
                    </div>      
                </div>                  
            </div>
        </div>
    </div>
@endsection 