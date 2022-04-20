<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start(); 
class CategoryProduct extends Controller
{
    public function auth_login(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function add_category_product(){
        $this->auth_login();
        return view('admin.add_category_product');
    }
    public function all_category_product(){
        $this->auth_login();
        $all_category_product=DB::table('theloai')->get();
        $manager_category_product=view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function save_category_product(Request $request){
        $this->auth_login();
        $data=array();
        $data['tentheloai']=$request->category_product_name;
        $data['motatheloai']=$request->category_product_desc;
        $data['hienthi']=$request->category_product_status;
        $save_condition=DB::table('theloai')->where('tentheloai',$request->category_product_name)->first();
        if(!$save_condition){
        DB::table('theloai')->insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
        }else{
        Session::put('message','Danh mục đã tồn tại!');
        return Redirect::to('add-category-product');    
        }
    }
    public function active_category_product($category_product_id){
        $this->auth_login();
        DB::table('theloai')->where('idtheloai',$category_product_id)->update(['hienthi' => 0]);
        Session::put('message','Kích hoạt ẩn danh mục thành công');
        return Redirect::to('all-category-product');
    }
    public function unactive_category_product($category_product_id){
        $this->auth_login();
        DB::table('theloai')->where('idtheloai',$category_product_id)->update(['hienthi' => 1]);
        Session::put('message','Kích hoạt hiển thị mục thành công');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id){
        $this->auth_login();
        $edit_category_product=DB::table('theloai')->where('idtheloai',$category_product_id)->get();
        $manager_category_product=view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }
    public function delete_category_product($category_product_id){
        $this->auth_login();
        DB::table('theloai')->where('idtheloai',$category_product_id)->delete();
        Session::put('message','Đã xóa danh mục sản phẩm thành công!');
        return Redirect::to('all-category-product');
    }
    public function update_category_product(Request $request,$category_product_id){
        $this->auth_login();
        $data=array();
        $data['tentheloai']=$request->category_product_name;
        $data['motatheloai']=$request->category_product_desc;
        DB::table('theloai')->where('idtheloai',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    //End Function Admin Page
    public function show_category_home($category_product_id){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();
        
        $all_product=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->join('theloai','sanpham.idtheloai','=','theloai.idtheloai')->where('sanpham.idtheloai',$category_product_id)->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->where('sanpham.hienthisanpham',1)->paginate(6);
        $category_name=DB::table('theloai')->where('idtheloai',$category_product_id)->limit(1)->get();
        $get_banner=DB::table('banner')->where('hienthi',1)->get();
        $get_banner_image=DB::table('banner')->where('hienthi',1)->get();
        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('category_name',$category_name)->with('get_banner',$get_banner)->with('get_banner_image',$get_banner_image);
    }
    public function show_category_home_condition($category_product_id,$condition){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();
        if($condition=="sort_by=price-asc"){
            $all_product=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->join('theloai','sanpham.idtheloai','=','theloai.idtheloai')->where('sanpham.idtheloai',$category_product_id)->orderby('giaban','asc')->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->paginate(6);
        }  
        elseif($condition=="sort_by=price-desc"){
            $all_product=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->join('theloai','sanpham.idtheloai','=','theloai.idtheloai')->where('sanpham.idtheloai',$category_product_id)->orderby('giaban','desc')->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->paginate(6);
        } 
        elseif($condition=="sort_by=name-az"){
            $all_product=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->join('theloai','sanpham.idtheloai','=','theloai.idtheloai')->where('sanpham.idtheloai',$category_product_id)->orderby('tensanpham','asc')->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->paginate(6);
        } 
        elseif($condition=="sort_by=name-za"){
            $all_product=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->join('theloai','sanpham.idtheloai','=','theloai.idtheloai')->where('sanpham.idtheloai',$category_product_id)->orderby('tensanpham','desc')->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->paginate(6);
        }  
        elseif($condition=="sort_by=new-product"){
            $all_product=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->join('theloai','sanpham.idtheloai','=','theloai.idtheloai')->where('sanpham.idtheloai',$category_product_id)->orderby('idsanpham','desc')->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->limit(8)->paginate(6);
        }   
        elseif($condition=="sort_by=most-selling"){
            $most_selling = DB::table('donhangchitiet')
            ->select(DB::raw('COUNT(*) as total_sales,idsanpham'))
            ->groupBy('idsanpham')
            ->orderby('total_sales','desc')
            ->get();
            $all_product=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->where('sanpham.idtheloai',$category_product_id)->where('sanpham.idsanpham',$most_selling[0]->idsanpham)->orwhere('sanpham.idsanpham',$most_selling[1]->idsanpham)->orwhere('sanpham.idsanpham',$most_selling[2]->idsanpham)->orwhere('sanpham.idsanpham',$most_selling[3]->idsanpham)->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->paginate(6);
        }   
        $category_name=DB::table('theloai')->where('idtheloai',$category_product_id)->limit(1)->get();
        $get_banner=DB::table('banner')->where('hienthi',1)->get();
        $get_banner_image=DB::table('banner')->where('hienthi',1)->get();
        // echo $category_product_id;
        // echo $condition;
        return view('pages.category.show_category_condition')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('category_name',$category_name)->with('get_banner',$get_banner)->with('get_banner_image',$get_banner_image);
    }
    public function show_new_product(){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();
        $get_banner=DB::table('banner')->where('hienthi',1)->get();
        $get_banner_image=DB::table('banner')->where('hienthi',1)->get();
        $all_product=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->join('theloai','sanpham.idtheloai','=','theloai.idtheloai')->where('hienthisanpham','1')->orderby('idsanpham','desc')->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->paginate(9);
        return view('pages.category.show_new_product')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('get_banner',$get_banner)->with('get_banner_image',$get_banner_image);
    }
    public function show_promotion_cate(){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();
        $get_banner=DB::table('banner')->where('hienthi',1)->get();
        $get_banner_image=DB::table('banner')->where('hienthi',1)->get();
        $all_product=DB::table('sanpham')->Join('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->join('theloai','sanpham.idtheloai','=','theloai.idtheloai')->where('hienthisanpham','1')->orderby('idsanpham','desc')->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->paginate(9);
        return view('pages.category.show_promotion')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('get_banner',$get_banner)->with('get_banner_image',$get_banner_image);
    }
    
}
