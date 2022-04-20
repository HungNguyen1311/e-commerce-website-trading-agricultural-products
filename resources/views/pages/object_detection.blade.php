@extends('welcome')
@section('content')
<?php
    $all_obj_detect=Session::get('all_obj_detect');
    $image_detect=Session::get('image_after_detect');
    $image_url=Session::get('image_url');
?>
<h2 class="text-center mt-4">Phần Mềm Nhận Diện Nông Sản</h2>
<div class="body-content-od">
    <form role="form" action="{{URL::to('/post-image')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
    <div class="form-group">
        <label for="exampleInputEmail1">Chọn Hình Ảnh</label>
        <input type="file" name="product_image1" class="form-control" id="exampleInputEmail1" >
    </div>
    <button type="submit" name="add_product" class="btn btn-success mt-4 button-detec-styling">Nhận dạng</button>
    </form>
</div>
     @if($all_obj_detect)
    <div class="show-result">
        <div class="image-detect">
            <img src="{{URL::to('/detect_image/'.$image_detect)}}" alt="" height="400" width="600">
        </div>
        <div class="object-content">
            <h4 class="detect-result-content text-center">Kết quả nhận diện có {{count($all_obj_detect)}} loại nông sản</h4>
            <div class="container-fluid">
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center th-styling">Tên nông sản</th>
                            <th class="text-center th-styling">Vitamin</th>
                            <th class="text-center th-styling">Dinh dưỡng</th>
                            <th class="text-center">#</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($all_obj_detect as $key => $all_obj_detect)
                        <tr>
                            <td>{{$all_obj_detect->tennongsan}}</td>
                            <td>{{$all_obj_detect->vitamin}}</td>
                            <td>{{$all_obj_detect->luongdung}}</td>
                            <td><a class="more-details-detect" href="{{URL::to('/more-details-detect/'.ltrim($all_obj_detect->tennongsan))}}"><i class="fa-solid fa-magnifying-glass text-center"></i></a></td>
                        </tr>
                    @endforeach   
                    </tbody>
                    </table>
                </div>
        </div>
    </div>
    </div>
    <?php
    Session::put('all_obj_detect',NULL);
    ?>
     @endif

@endsection    