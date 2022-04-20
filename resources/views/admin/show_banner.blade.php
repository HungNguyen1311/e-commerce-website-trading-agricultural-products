@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Banner
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
      <?php
        $messeage=Session::get('message');
        if($messeage){
            echo '<span class="text-alert">'.$messeage.'</span>';
            Session::put('message',null);
        }
        ?>
        <thead>
          <tr>
            <th>Mã Banner</th>
            <th>Hình ảnh</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_banner as $key => $cate_pro)  
          <tr>
            <td>{{$cate_pro ->idbanner}}</td>
            <td><img src="{{$cate_pro ->hinhanh}}" height="100" width="300"></td>
            <td><span class="text-ellipsis">
            <?php
                if($cate_pro->hienthi==1){
            ?>
                <a href="{{URL::to('/active-banner/'.$cate_pro->idbanner)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
             <?php  
            }else{
            ?>
                <a href="{{URL::to('/unactive-banner/'.$cate_pro->idbanner)}}"><span class="fa-thumb-styling fa fa-thumbs-down text-danger"></span></a>
            <?php
                }
            ?>    
            </span></td>
            <td>           
              <a onclick="return confirm('Banner sẽ được xóa ?')" href="{{URL::to('/delete-banner/'.$cate_pro->idbanner)}}" class="active styling-delete" ui-toggle-class=""> <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection            