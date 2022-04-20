@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Danh Sách Khách Hàng
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
            <th>Mã khách hàng</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_customer as $key => $all_khachhang)  
          <tr>
            <td>{{$all_khachhang ->idkhachhang}}</td>
            <td>{{$all_khachhang ->tenkhachhang}}</td>
            <td>{{$all_khachhang ->sodienthoai}}</td>
            <td>{{$all_khachhang ->diachi}}</td>
            <td>{{$all_khachhang ->email}}</td>
            <td>
              <a href="{{URL::to('/show-customer-order/'.$all_khachhang->idkhachhang)}}" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-file-invoice"></i></a>       
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection            