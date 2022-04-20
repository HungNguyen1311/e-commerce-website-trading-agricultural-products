<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start(); 
class CheckoutController extends Controller
{
    public function login_checkout(){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();

        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function validation(){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();

        return view('pages.checkout.add_customer')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function add_customer(Request $request){
        $data=array();
        $data['tenkhachhang']=$request->customer_name;
        $data['taikhoan']=$request->customer_account;
        $data['matkhau']=md5($request->customer_password);
        $data['sodienthoai']=$request->customer_phone;
        $data['diachi']=$request->customer_address;
        $data['email']=$request->customer_email;

        $customer_id=DB::table('khachhang')->insertGetId($data);
        Session::put('idkhachhang',$customer_id);
        Session::put('tenkhachhang',$request->customer_name);
        return Redirect::to('/trang-chu');

    }
    public function logout_checkout(){
        Session::put('tenkhachhang',null);
        Session::put('idkhachhang',null);
        return Redirect::to('/trang-chu');
    }
    public function login_account(Request $request){
        $customer_account_name=$request->login_account;
        $customer_password=md5($request->login_password);

        $result= DB::table('khachhang')->where('taikhoan',$customer_account_name)->where('matkhau',$customer_password)->first();
        if($result){
            Session::put('idkhachhang',$result->idkhachhang);
            Session::put('tenkhachhang',$result->tenkhachhang);
            return Redirect::to('/trang-chu');
        }else{
            Session::put('message_wrong_login','Mật Khẩu hoặc tài khoản đã nhập sai!');
            return Redirect::to('/login-checkout');
        }

    }
}
