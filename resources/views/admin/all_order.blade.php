@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Các Đơn Hàng Chưa Xử Lý
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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Ngày tạo</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product_order as $key => $all_product_order)  
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$all_product_order ->iddonhang}}</td>
            <td>{{$all_product_order ->tenkhachhang}}</td>
            <td>{{$all_product_order ->ngayban}}</td>
            <td>{{number_format($all_product_order ->tongtien)}}<u>đ</u></td>
            @if($all_product_order->trangthai==0)
              <td>Đang chờ xử lý</td>
            @elseif($all_product_order->trangthai==1)
              <td>Đã xác nhận</td>
            @elseif($all_product_order->trangthai==2)
              <td>Đang chuẩn bị hàng</td>
            @endif  
            <td>
              <a href="{{URL::to('/edit-order-product/'.$all_product_order->iddonhang)}}" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-pen-to-square text-success"></i></a>
           
              <a onclick="return confirm('Đơn hàng sẽ được xóa ?')" href="{{URL::to('/delete-order-product/'.$all_product_order->iddonhang)}}" class="active styling-delete" ui-toggle-class=""> <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection            