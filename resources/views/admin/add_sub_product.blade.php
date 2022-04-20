@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Phiếu nhập sản phẩm
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
                                <form role="form" action="{{URL::to('/save-info-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}                             
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Lượng phiếu nhập</label>
                                    <input type="text" name="product_amount" class="form-control" id="exampleInputEmail1" >
                                </div>                                          
                                <button type="submit" name="add_product" class="btn btn-info">Tiếp tục</button>
                            </form>
                            </div>
                        </div>
                    </section>

            </div>
@endsection            