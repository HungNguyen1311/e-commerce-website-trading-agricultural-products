@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Banner
                        </header>
                        <div class="panel-body">
                        <?php
                        $messeage=Session::get('message');
                        if($messeage){
                            echo '<span class="text-alert">'.$messeage.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                            <div class="position-center">
                                @foreach($edit_banner as $key=> $pro)
                                <form role="form" action="{{URL::to('/update-banner/'.$pro->idbanner)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh 1</label>
                                    <input type="file" name="banner_image" class="form-control" id="exampleInputEmail1" >
                                    <img src="{{URL::to($pro ->hinhanh)}}" height="150" width="300">         
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển Thị</label>
                                    <select class="form-control m-bot15" name="banner_status">
                                            @if($pro->hienthi=='1')
                                                    <option selected value="1">Hiển Thị</option>
                                                    <option value="0">Ẩn</option>
                                            @elseif($pro->hienthi=='0')
                                                    <option selected value="0">Ẩn</option>
                                                    <option value="1">Hiển thị</option>  
                                            @else
                                                    <option value="0">Ẩn</option>
                                                    <option value="1">Hiển thị</option>          
                                            @endif                                     
                                    </select>
                                </div>                        
                                <button type="submit" name="add_banner" class="btn btn-info">Cập nhật banner</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection            