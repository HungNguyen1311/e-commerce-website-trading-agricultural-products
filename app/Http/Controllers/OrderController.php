<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start(); 
class OrderController extends Controller
{
    public function auth_login(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function unprocessed_order(){
        $this->auth_login();
        $all_order_product=DB::table('donhang')->Join('khachhang','donhang.idkhachhang','=','khachhang.idkhachhang')->where('trangthai','<>',3)->get();
        // print_r($all_order_product);
        return view('admin.all_order')->with('all_product_order',$all_order_product);
    }
    public function complete_order(){
        $this->auth_login();
        $all_order_product=DB::table('donhang')->Join('khachhang','donhang.idkhachhang','=','khachhang.idkhachhang')->where('trangthai',3)->Join('nhanvien','donhang.idnhanvien','=','nhanvien.idnhanvien')->get();
        // print_r($all_order_product);
        return view('admin.show_complete_order')->with('all_product_order',$all_order_product);
    }
    public function add_order(){
        $this->auth_login();
        $all_product=DB::table('sanpham')->leftJoin('donhang','sanpham.idsanpham','=','donhang.idsanpham_donhang')->where('giadonhang',NULL)->get();
        // print_r ($all_product);
        return view('admin.add_order')->with('all_product',$all_product);
    }
    public function all_order(){
        $this->auth_login();
        $all_order_product=DB::table('donhang')->Join('khachhang','donhang.idkhachhang','=','khachhang.idkhachhang')->get();
        print_r($all_order_product);
        // return view('admin.all_order')->with('all_product_order',$all_order_product);
    }
    public function save_order(Request $request){
        $this->auth_login();
        $data=array();

        $data['idsanpham_donhang']=$request->product_id_order;
        $data['giadonhang']=$request->product_price_order;
        $data['ngayhethan']=$request->product_date_order;
             
        DB::table('donhang')->insert($data);
        Session::put('message','Thêm sản phẩm khuyến mãi thành công!');
        return Redirect::to('/all-order');
    }
    public function edit_order_product($order_product_id){
        $this->auth_login();

        $edit_order_customer=DB::table('donhang')->Join('khachhang','donhang.idkhachhang','=','khachhang.idkhachhang')->where('iddonhang',$order_product_id)->get();   
        $edit_order_coupon=DB::table('donhang')->Join('magiamgia','donhang.dh_magiamgia','=','magiamgia.idmagiamgia')->where('iddonhang',$order_product_id)->get();   
        $edit_order_product=DB::table('donhangchitiet')->Join('sanpham','donhangchitiet.idsanpham','=','sanpham.idsanpham')->where('iddonhang',$order_product_id)->get();    
        $manager_order_product=view('admin.edit_order')->with('edit_order_customer',$edit_order_customer)->with('edit_order_product',$edit_order_product)->with('edit_order_coupon',$edit_order_coupon);
        // print_r($edit_order_product);
        
        return view('admin_layout')->with('admin.edit_order',$manager_order_product);
    }
    public function show_order_product($order_product_id){
        $this->auth_login();
        $edit_order_coupon=DB::table('donhang')->Join('magiamgia','donhang.dh_magiamgia','=','magiamgia.idmagiamgia')->where('iddonhang',$order_product_id)->get();   
        $edit_order_customer=DB::table('donhang')->Join('khachhang','donhang.idkhachhang','=','khachhang.idkhachhang')->where('iddonhang',$order_product_id)->get();   
        $edit_order_product=DB::table('donhangchitiet')->Join('sanpham','donhangchitiet.idsanpham','=','sanpham.idsanpham')->where('iddonhang',$order_product_id)->get();
        $manager_order_product=view('admin.show_details_order')->with('edit_order_customer',$edit_order_customer)->with('edit_order_product',$edit_order_product)->with('edit_order_coupon',$edit_order_coupon);
        // print_r($edit_order_product);
        
        return view('admin_layout')->with('admin.show_details_order',$manager_order_product);
    }
    public function delete_order_product($order_product_id){
        $this->auth_login();
        DB::table('donhangchitiet')->where('iddonhang',$order_product_id)->delete();
        DB::table('donhang')->where('iddonhang',$order_product_id)->delete();
        Session::put('message','Đã xóa đơn hàng thành công!');
        return redirect()->back();
    }
    public function update_order_product(Request $request,$order_product_id){
        $this->auth_login();
        $data=array();
        $data['idnhanvien']=$request->staff_id_hidden;
        $data['trangthai']=$request->order_status;
        DB::table('donhang')->where('iddonhang',$order_product_id)->update($data);
        if($request->order_status==3){
        $data_thongke=array();
        $get_donhang=DB::table('donhang')->where('iddonhang',$order_product_id)->first();
        $get_date=explode(" ",$get_donhang->ngayban);
        $get_statistic=DB::table('thongke')->where('ngaythongke',$get_date[0])->first();
        if($get_statistic){
            $get_tongtien=$get_statistic->tongtien;
            $get_loinhuan=$get_statistic->loinhuan;
            $get_soluongban=$get_statistic->soluongban;
            $get_tongdonhang=$get_statistic->tongdonhang;
            $data_thongke['tongtien']=$get_tongtien+$get_donhang->tongtien;
            $data_thongke['loinhuan']=$get_loinhuan;
            $data_thongke['soluongban']=$get_soluongban;
            $data_thongke['tongdonhang']=$get_tongdonhang+1;
            $get_chitietdonhang=DB::table('donhangchitiet')->where('iddonhang',$order_product_id)->get();
            foreach($get_chitietdonhang as $row){
                $get_losanpham=DB::table('losanpham')->where('idlosanpham',$row->idlosanpham)->first();  
                $get_product_info=DB::table('sanpham')->where('idsanpham',$get_losanpham->idsanpham)->first();
                if($get_product_info->idtheloai!=5){
                    $loinhuan=0;    
                    $tongtiensanpham=$row->soluongban * $row->dhct_giaban/1000;
                    $tonggianhap=$row->soluongban * $get_losanpham->gianhap/1000;
                    $loinhuan=$tongtiensanpham-$tonggianhap;
                    $data_thongke['loinhuan']=round($data_thongke['loinhuan']+$loinhuan);   
                    $data_thongke['soluongban']=$data_thongke['soluongban'] + 1; 
                }else{
                    $loinhuan=0;    
                    $tongtiensanpham=$row->soluongban * $row->dhct_giaban;
                    $tonggianhap=$row->soluongban * $get_losanpham->gianhap;
                    $loinhuan=$tongtiensanpham-$tonggianhap;
                    $data_thongke['loinhuan']=round($data_thongke['loinhuan']+$loinhuan);   
                    $data_thongke['soluongban']=$data_thongke['soluongban'] + 1; 
                }
                  
            }
            DB::table('thongke')->where('idthongke',$get_statistic->idthongke)->update($data_thongke);
        }else{
            $data_thongke['tongtien']=$get_donhang->tongtien;
            $data_thongke['loinhuan']=0;
            $data_thongke['soluongban']=0;
            $data_thongke['tongdonhang']=1;
            $data_thongke['ngaythongke']=$get_date[0];
            $get_chitietdonhang=DB::table('donhangchitiet')->where('iddonhang',$order_product_id)->get();
            foreach($get_chitietdonhang as $row){
                $get_losanpham=DB::table('losanpham')->where('idlosanpham',$row->idlosanpham)->first();  
                $get_product_info=DB::table('sanpham')->where('idsanpham',$get_losanpham->idsanpham)->first();
                if($get_product_info->idtheloai!=5){
                    $loinhuan=0;    
                    $tongtiensanpham=$row->soluongban * $row->dhct_giaban/1000;
                    $tonggianhap=$row->soluongban * $get_losanpham->gianhap/1000;
                    $loinhuan=$tongtiensanpham-$tonggianhap;
                    $data_thongke['loinhuan']=round($data_thongke['loinhuan']+$loinhuan);   
                    $data_thongke['soluongban']=$data_thongke['soluongban'] + 1; 
                }else{
                    $loinhuan=0;    
                    $tongtiensanpham=$row->soluongban * $row->dhct_giaban;
                    $tonggianhap=$row->soluongban * $get_losanpham->gianhap;
                    $loinhuan=$tongtiensanpham-$tonggianhap;
                    $data_thongke['loinhuan']=round($data_thongke['loinhuan']+$loinhuan);   
                    $data_thongke['soluongban']=$data_thongke['soluongban'] + 1; 
                }   
            }
            DB::table('thongke')->insert($data_thongke);
        }
    }
        Session::put('message','Xác nhận đơn hàng thành công!');
        return redirect()->back();
    }
}
