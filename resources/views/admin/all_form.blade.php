@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Phiếu Nhập
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
            <th>Mã phiếu nhập</th>
            <th>Tên nhân viên</th>
            <th>Ngày tạo</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product_form as $key => $all_product_form)  
          <tr>
            <td>{{$all_product_form ->idphieunhap}}</td>
            <td>{{$all_product_form ->tennhanvien}}</td>
            <td>{{$all_product_form ->ngaynhap}}</td>
            <td>
              <a href="{{URL::to('/show-form/'.$all_product_form->idphieunhap)}}" class="active styling-edit" ui-toggle-class=""><i class="fa-solid fa-magnifying-glass"></i></a>       
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection            