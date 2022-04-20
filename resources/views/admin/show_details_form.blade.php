@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi Tiết Phiếu Nhập
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Mã lô</th>
            <th>Số lượng nhập</th>
            <th>Giá nhập</th>
          </tr>
        </thead>
        <tbody>
          @foreach($edit_form_product as $key => $all_product_form)  
          <tr>
            <td>{{$all_product_form ->tensanpham}}</td>
            <td>{{$all_product_form ->idlosanpham}}</td>
            <?php
            if($all_product_form->idtheloai!=5){
              if(($all_product_form->soluongnhap/1000)<1){
              echo '<td>'.$all_product_form->soluongnhap.'g</td>';
              }elseif(($all_product_form->soluongnhap/1000)<10){
              $khoiluong=$all_product_form->soluongnhap/1000;
              echo '<td>'.$khoiluong.'kg</td>';
              }elseif(($all_product_form->soluongnhap/10000)<10){
              $khoiluong=$all_product_form->soluongnhap/10000;
              echo '<td>'.$khoiluong.'yến</td>';
              }elseif(($all_product_form->soluongnhap/100000)<10){
              $khoiluong=$all_product_form->soluongnhap/100000;
              echo '<td>'.$khoiluong.'tạ</td>';
              }elseif(($all_product_form->soluongnhap/1000000)<10){
              $khoiluong=$all_product_form->soluongnhap/1000000;
              echo '<td>'.$khoiluong.'tấn</td>';
              }       
            }else{
              echo '<td>'.$all_product_form->soluongnhap.' phần</td>';
            }     
            ?>
            @if($all_product_form->idtheloai!=5)  
            <td>{{number_format($all_product_form ->gianhap)}}<u>đ</u>/kg</td>
            @else
            <td>{{number_format($all_product_form ->gianhap)}}<u>đ</u></td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection            