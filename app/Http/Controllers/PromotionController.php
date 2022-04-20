<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start(); 
class PromotionController extends Controller
{
    public function auth_login(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function add_promotion(){
        $this->auth_login();
        $all_product=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->where('giakhuyenmai',NULL)->get();
        // print_r ($all_product);
        return view('admin.add_promotion')->with('all_product',$all_product);
    }
    public function all_promotion(){
        $this->auth_login();
        $all_promotion_product=DB::table('sanpham')->Join('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->get();
        // print_r($all_promotion_product);
        return view('admin.all_promotion')->with('all_product_promotion',$all_promotion_product);
    }
    public function save_promotion(Request $request){
        $this->auth_login();
        $data=array();

        $data['idsanpham_khuyenmai']=$request->product_id_promotion;
        $data['giakhuyenmai']=$request->product_price_promotion;
        $data['ngayhethan']=$request->product_date_promotion;
             
        DB::table('khuyenmai')->insert($data);
        Session::put('message','Thêm sản phẩm khuyến mãi thành công!');
        return Redirect::to('/all-promotion');
    }
    public function add_coupon(){
        $this->auth_login();
        return view('admin.add_coupon');
    }
    public function all_coupon(){
        $this->auth_login();
        $all_promotion_coupon=DB::table('magiamgia')->get();
        // print_r($all_promotion_product);
        return view('admin.all_coupon')->with('all_product_coupon',$all_promotion_coupon);
    }
    public function save_coupon(Request $request){
        $this->auth_login();
        $data=array();
        $condition_add=DB::table('magiamgia')->where('magiamgia',$request->coupon_text)->first();
        if($condition_add){
            Session::put('message','Mã giảm giá đã tồn tại!');  
            return Redirect::to('/add-coupon');
        }else{
            $data['magiamgia']=$request->coupon_text;
            $data['tilegiamgia']=$request->discount_percent;
            $data['motagiamgia']=$request->coupon_desc;
            $data['ngayhethan']=$request->coupon_exp_date;
            DB::table('magiamgia')->insert($data);
            Session::put('message','Thêm mã giảm giá thành công');
            return Redirect::to('/all-coupon');
        }
    }
    public function active_coupon($couponId){
        $this->auth_login();
        DB::table('magiamgia')->where('idmagiamgia',$couponId)->update(['hienthi' => 1]);
        Session::put('message','Kích hoạt mã giảm giá  thành công');
        return Redirect::to('all-coupon');
    }
    public function unactive_coupon($couponId){
        $this->auth_login();
        DB::table('magiamgia')->where('idmagiamgia',$couponId)->update(['hienthi' => 0  ]);
        Session::put('message','Kích hoạt ẩn mã giảm giá thành công');
        return Redirect::to('all-coupon');
    }
    public function edit_coupon_product($coupon_product_id){
        $this->auth_login();
        $edit_promotion_product=DB::table('magiamgia')->where('idmagiamgia',$coupon_product_id)->get();
        $manager_promotion_product=view('admin.edit_coupon')->with('edit_promotion_product',$edit_promotion_product);
        // print_r($edit_promotion_product);
        return view('admin_layout')->with('admin.edit_coupon',$manager_promotion_product);
    }
    public function edit_promotion_product($promotion_product_id){
        $this->auth_login();
        $edit_promotion_product=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->where('idsanpham',$promotion_product_id)->get();
        $manager_promotion_product=view('admin.edit_promotion')->with('edit_promotion_product',$edit_promotion_product);
        // print_r($edit_promotion_product);
        return view('admin_layout')->with('admin.edit_promotion',$manager_promotion_product);
    }
    public function update_coupon_product(Request $request,$coupon_product_id){
        $this->auth_login();
        $data=array();
        $data['magiamgia']=$request->coupon_text;
        $data['tilegiamgia']=$request->discount_percent;
        $data['motagiamgia']=$request->coupon_desc;
        $data['ngayhethan']=$request->coupon_exp_date;
        DB::table('magiamgia')->where('idmagiamgia',$coupon_product_id)->update($data);
        Session::put('message','Cập nhật mã giảm giá thành công');
        return Redirect::to('/all-coupon');
    }
    public function delete_coupon($coupon_product_id){
        $this->auth_login();
        DB::table('magiamgia')->where('idmagiamgia',$coupon_product_id)->delete();
        Session::put('message','Đã xóa mã giảm giá thành công!');
        return Redirect::to('/all-coupon');
    }
    public function delete_promotion_product($promotion_product_id){
        $this->auth_login();
        DB::table('khuyenmai')->where('idsanpham_khuyenmai',$promotion_product_id)->delete();
        Session::put('message','Đã xóa sản phẩm khuyến mãi thành công!');
        return Redirect::to('/all-promotion');
    }
    public function update_promotion_product(Request $request,$promotion_product_id){
        $this->auth_login();
        $data=array();
        $data['giakhuyenmai']=$request->product_promotion_price;
        DB::table('khuyenmai')->where('idsanpham_khuyenmai',$promotion_product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm khuyến mãi thành công');
        return Redirect::to('/all-promotion');
    }
    

}
