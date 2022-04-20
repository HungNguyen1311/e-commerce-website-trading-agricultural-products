@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê  Sản Phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-3">
      <form action="{{URL::to('/tim-kiem-sanpham')}}" method="POST">
        <div class="input-group">        
           {{csrf_field()}}  
          <input type="text" class="input-sm form-control" placeholder="Nhập tên sản phẩm..." name="product_name">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </span>
        </div>
        </form>
      </div>
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
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Hình Ảnh</th>
            <th>Danh mục</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key => $pro)  
          <tr>
            <td>{{$pro ->tensanpham}}</td>
            <td>{{number_format($pro ->giaban)}}<u>đ</u></td>
            <?php
            if($pro->idtheloai!=5){
              if(($pro->soluongton/1000)<1){
                echo '<td>'.$pro->soluongton.' g</td>';
              }elseif(($pro->soluongton/1000)<10){
                $khoiluong=$pro->soluongton/1000;
                echo '<td>'.$khoiluong.'kg</td>';
              }elseif(($pro->soluongton/10000)<10){
                $khoiluong=$pro->soluongton/10000;
                echo '<td>'.$khoiluong.' yến</td>';
              }elseif(($pro->soluongton/100000)<10){
                $khoiluong=$pro->soluongton/100000;
                echo '<td>'.$khoiluong.' tạ</td>';
              }elseif(($pro->soluongton/1000000)<10){
                $khoiluong=$pro->soluongton/1000000;
                echo '<td>'.$khoiluong.' tấn</td>';
              }
            }else{
                echo '<td>'.$pro->soluongton.' phần</td>';
            }
            ?>
            <td><img src="{{$pro ->hinhanh1}}" height="100" width="130"></td>
            <td>{{$pro ->tentheloai}}</td>
            <td><span class="text-ellipsis">
            <?php
                if($pro->hienthisanpham==1){
            ?>
                <a href="{{URL::to('/active-product/'.$pro->idsanpham)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
             <?php  
            }else{
            ?>
                <a href="{{URL::to('/unactive-product/'.$pro->idsanpham)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
            <?php
                }
            ?>    
            </span></td>
            <td>
              <a href="{{URL::to('/edit-product/'.$pro->idsanpham)}}" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-pen-to-square text-success"></i></a>
              <a href="{{URL::to('/all-package-product/'.$pro->idsanpham)}}" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-magnifying-glass"></i></a> 
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection            