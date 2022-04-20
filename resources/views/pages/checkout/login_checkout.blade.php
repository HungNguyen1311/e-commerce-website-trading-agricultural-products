@extends('product_details')
@section('content_details_product')
<!-- Login -->
<div class="login-body">
        <h5>Login-Site</h5>
        <div class="login-content">
            <h4 class="mb-1 text-center">Chào mừng đến với QH Fruits. Đăng nhập ngay!</h4>
        </div>
        <div class="login">
            <div class="container-fluid mt-3 container-login">
            <?php
            $messeage=Session::get('message_wrong_login');
            if($messeage){
                echo '<span class="text-alert_login">'.$messeage.'</span>';
                Session::put('message_wrong_login',null);
            }
            ?>
                <form action="{{URL::to('/login-account')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="form-group">
                            <label for="inputAddress">Email hoặc số điện thoại(*)</label>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="login_account" type="text" class="form-control" placeholder="Email hoặc số điện thoại"  required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Mật khẩu (*)</label>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                </div>
                                <input name="login_password" type="password" class="form-control" placeholder="Mật khẩu"  required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">
                            </div>
                        </div>
                    </div>
                    <div class="login-footer">
                        <button type="submit" class="btn  btn-block">Đăng Nhập <i
                                class="fas fa-sign-in-alt"></i></button>
                        <p><a href="">Quên mật khẩu?</a></p>
                        <p><a href="{{URL::to('/validation')}}">Đăng ký tài khoản mới!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection