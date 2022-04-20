@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Số Sản Phẩm
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
            <th>Mã</th>
            <th>Tên sản phẩm</th>
            <th>Giá nhập</th>
            <th>Số lượng tồn</th>
            <th>Thương Hiệu</th>
            <th>Ngày hết hạn</th>
            <th>Xóa</th>          
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key => $pro)  
          <tr>
            <td>{{$pro ->idlosanpham}}</td>
            <td>{{$pro ->tensanpham}}</td>
            <td>{{number_format($pro ->gianhap)}}<u>đ</u></td>
            <?php
            if($pro->idtheloai!=5){
              if(($pro->soluongton/1000)<1){
              echo '<td>'.$pro->soluongton.'g</td>';
              }elseif(($pro->soluongton/1000)<10){
              $khoiluong=$pro->soluongton/1000;
              echo '<td>'.$khoiluong.'kg</td>';
              }elseif(($pro->soluongton/10000)<10){
              $khoiluong=$pro->soluongton/10000;
              echo '<td>'.$khoiluong.'yến</td>';
              }elseif(($pro->soluongton/100000)<10){
              $khoiluong=$pro->soluongton/100000;
              echo '<td>'.$khoiluong.'tạ</td>';
              }elseif(($pro->soluongton/1000000)<10){
              $khoiluong=$pro->soluongton/1000000;
              echo '<td>'.$khoiluong.'tấn</td>';
              }       
            }else{
              echo '<td>'.$pro->soluongton.' phần</td>';
            }     
            ?>   
            <td>{{$pro ->tenthuonghieu}}</td>
            <td>{{$pro ->ngayhethan}}</td>
            <td><span class="text-ellipsis">
            <a onclick="return confirm('Lô sản phẩm sẽ được xóa ?')" href="{{URL::to('/delete-package-product/'.$pro->idlosanpham)}}" class="active styling-delete" ui-toggle-class=""> <i class="fa fa-times text-danger text"></i></a>   
            </span></td>
            <td>
              <a href="{{URL::to('/edit-package-product/'.$pro->idlosanpham)}}" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-pen-to-square text-success"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="cate_pagination">
      {{$all_product->links()}}
  </div>
</div>
@endsection            