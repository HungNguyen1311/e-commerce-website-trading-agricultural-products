@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Phiếu Nhập Sản Phẩm
                        </header>
                        <div class="panel-body">
                        <?php
                        $messeage=Session::get('message');
                        $soluong=Session::get('soluonglo');
                        if($messeage){
                            echo '<span class="text-alert">'.$messeage.'</span>';
                            Session::put('message',null);
                        }
                        ?>                       
                            <div class="position-center-add-package">
                                <form role="form" action="{{URL::to('/save-package-product/'.$soluong)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="table-responsive-sm">
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Stt</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng nhập</th>
                                            <th>Giá nhập</th>
                                            <th>Ngày hết hạn</th>
                                            <th>Thương hiệu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @for ($i=0;$i<$soluong;$i++) 
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>
                                            <select class="form-control m-bot15"  name="product_id{{$i}}">
                                                @foreach($all_product as $key => $product)                                                                             
                                                    <option value="{{$product->idsanpham}}">{{$product->tensanpham}}</option>                                          
                                                @endforeach                                        
                                            </select> 
                                            </td>
                                            <td>
                                            <input type="number" min=1 name="product_amount{{$i}}" class="form-control" id="exampleInputEmail1" >
                                            </td>
                                            <td><input type="text" name="product_price{{$i}}" class="form-control" id="exampleInputEmail1" ></td>
                                            <td><input type="date" name="product_date_expire{{$i}}" class="form-control" id="exampleInputEmail1" ></td>
                                            <td> 
                                                <select class="form-control m-bot15" name="product_brand{{$i}}">
                                                @foreach($brand_product as $key => $brand) 
                                                    <option value="{{$brand->idthuonghieu}}">{{$brand->tenthuonghieu}}</option>
                                                @endforeach                                        
                                                </select>
                                            </td>
                                        </tr>
                                    @endfor      
                                    </tbody>
                                    </table>

                                </div>               
                             <input type="hidden" name="staff_id" class="form-control" id="exampleInputEmail1" value="{{Session::get('admin_id')}}" >          
                             <button type="submit" name="add_product" class="btn btn-info">Thêm lô sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection            