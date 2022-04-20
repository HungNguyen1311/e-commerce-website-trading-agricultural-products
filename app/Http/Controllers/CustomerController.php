<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start(); 

class CustomerController extends Controller
{
    public function auth_login(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function show_customer(){
        $this->auth_login();
        $all_customer_product=DB::table('khachhang')->get();
        return view('admin.all_customer')->with('all_customer',$all_customer_product);
    }
    public function show_customer_order($customerId){
        $this->auth_login();
        $all_customer_order=DB::table('donhang')->Join('khachhang','donhang.idkhachhang','=','khachhang.idkhachhang')->where('khachhang.idkhachhang',$customerId)->get();
        return view('admin.show_customer_order')->with('all_customer_order',$all_customer_order);
        // print_r($all_customer_order);
    }

}
