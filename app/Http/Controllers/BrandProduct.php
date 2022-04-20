<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start(); 
class BrandProduct extends Controller
{
    public function auth_login(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function add_brand_product(){
        $this->auth_login();
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->auth_login();
        $all_brand_product=DB::table('thuonghieu')->get();
        $manager_brand_product=view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }
    public function save_brand_product(Request $request){
        $this->auth_login();
        $data=array();
        $data['tenthuonghieu']=$request->brand_product_name;
        $data['motathuonghieu']=$request->brand_product_desc;
        $data['hienthithuonghieu']=$request->brand_product_status;
        $save_condition=DB::table('thuonghieu')->where('tenthuonghieu',$request->brand_product_name)->first();
        if(!$save_condition){
        DB::table('thuonghieu')->insert($data);
        Session::put('message','Thêm thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
        }else{
        Session::put('message','Thương hiệu đã tồn tại');
        return Redirect::to('add-brand-product');   
        }
    }
    public function active_brand_product($brand_product_id){
        $this->auth_login();
        DB::table('thuonghieu')->where('idthuonghieu',$brand_product_id)->update(['hienthithuonghieu' => 0]);
        Session::put('message','Kích hoạt ẩn thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    public function unactive_brand_product($brand_product_id){
        $this->auth_login();
        DB::table('thuonghieu')->where('idthuonghieu',$brand_product_id)->update(['hienthithuonghieu' => 1]);
        Session::put('message','Kích hoạt hiển thị thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    public function edit_brand_product($brand_product_id){
        $this->auth_login();
        $edit_brand_product=DB::table('thuonghieu')->where('idthuonghieu',$brand_product_id)->get();
        $manager_brand_product=view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }
    public function delete_brand_product($brand_product_id){
        $this->auth_login();
        DB::table('thuonghieu')->where('idthuonghieu',$brand_product_id)->delete();
        Session::put('message','Đã xóa thương hiệu sản phẩm thành công!');
        return Redirect::to('all-brand-product');
    }
    public function update_brand_product(Request $request,$brand_product_id){
        $this->auth_login();
        $data=array();
        $data['tenthuonghieu']=$request->brand_product_name;
        $data['motathuonghieu']=$request->brand_product_desc;
        DB::table('thuonghieu')->where('idthuonghieu',$brand_product_id)->update($data);
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
}
