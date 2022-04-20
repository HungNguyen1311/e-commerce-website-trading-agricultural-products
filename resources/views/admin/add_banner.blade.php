@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm banner 
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
                                <form role="form" action="{{URL::to('/save-banner')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chọn Hình Ảnh</label>
                                    <input type="file" name="banner_image" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển Thị</label>
                                    <select class="form-control m-bot15" name="banner_status">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>                                      
                                    </select>
                                </div>                        
                                <button type="submit" name="add_banner_product" class="btn btn-info">Thêm banner</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection            