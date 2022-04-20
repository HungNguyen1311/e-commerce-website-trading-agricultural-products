<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start(); 
class BannerController extends Controller
{
    public function auth_login(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function add_banner(){
        $this->auth_login();
        return view('admin.add_banner');
    }
    public function all_banner(){
        $this->auth_login();
        $all_banner=DB::table('banner')->get();
        $manager_banner=view('admin.show_banner')->with('all_banner',$all_banner);
        return view('admin_layout')->with('admin.show_banner',$manager_banner);
    }
    public function save_banner(Request $request){
        $this->auth_login();
        $data=array();
        $data['hienthi']=$request->banner_status;
        $get_image1=$request->file('banner_image');
        $get_name_image1=$get_image1->getClientOriginalName();
        $name_image1=current(explode('.',$get_name_image1));
        $new_image1=$name_image1.rand(0,9999).'.'.$get_image1->getClientOriginalExtension();        
        $get_image1->move('uploads/banner',$new_image1);
        $data['hinhanh']='uploads/banner/'.$new_image1;

        DB::table('banner')->insert($data);
        Session::put('message','Thêm banner thành công');
        return Redirect::to('show-banner');
    }
    public function active_banner($banner_id){
        $this->auth_login();
        DB::table('banner')->where('idbanner',$banner_id)->update(['hienthi' => 0]);
        Session::put('message','Kích hoạt ẩn banner thành công');
        return Redirect::to('show-banner');
    }
    public function unactive_banner($banner_id){
        $this->auth_login();
        DB::table('banner')->where('idbanner',$banner_id)->update(['hienthi' => 1]);
        Session::put('message','Kích hoạt hiển thị banner thành công');
        return Redirect::to('show-banner');
    }
    public function edit_banner($banner_id){
        $this->auth_login();
        $edit_banner=DB::table('banner')->where('idbanner',$banner_id)->get();
        $manager_banner=view('admin.edit_banner')->with('edit_banner',$edit_banner);
        return view('admin_layout')->with('admin.edit_banner',$manager_banner);
    }
    public function delete_banner($banner_id){
        $this->auth_login();
        DB::table('banner')->where('idbanner',$banner_id)->delete();
        Session::put('message','Đã xóa banner thành công!');
        return Redirect::to('show-banner');
    }
    public function update_banner(Request $request,$banner_id){
        $this->auth_login();
        $data=array();
        $data['hienthi']=$request->banner_status;
        $get_image1=$request->file('banner_image');
        $get_name_image1=$get_image1->getClientOriginalName();
        $name_image1=current(explode('.',$get_name_image1));
        $new_image1=$name_image1.rand(0,9999).'.'.$get_image1->getClientOriginalExtension();        
        $get_image1->move('uploads/banner',$new_image1);
        $data['hinhanh']='uploads/banner/'.$new_image1;

        DB::table('banner')->where('idbanner',$banner_id)->update($data);
        Session::put('message','Cập nhật banner thành công!');    
        return Redirect::to('show-banner');
        
    }
    //End Function Admin Page
    public function show_banner_home($banner_id){
        $cate=DB::table('banner')->where('hienthi','1')->orderby('idbanner','asc')->get();
        $brand=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();
        
        $all=DB::table('banner')->leftJoin('khuyenmai','banner.idbanner','=','khuyenmai.idbanner_khuyenmai')->join('banner','banner.idbanner','=','banner.idbanner')->where('banner.idbanner',$banner_id)->paginate(6);
        $banner_name=DB::table('banner')->where('idbanner',$banner_id)->limit(1)->get();
        return view('pages.banner.show_banner')->with('banner',$cate)->with('brand',$brand)->with('all',$all)->with('banner_name',$banner_name);
    }
    public function show_banner_home_condition($banner_id,$condition){
        $cate=DB::table('banner')->where('hienthi','1')->orderby('idbanner','asc')->get();
        $brand=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();
        if($condition=="sort_by=price-asc"){
            $all=DB::table('banner')->leftJoin('khuyenmai','banner.idbanner','=','khuyenmai.idbanner_khuyenmai')->join('banner','banner.idbanner','=','banner.idbanner')->where('banner.idbanner',$banner_id)->orderby('giaban','asc')->paginate(6);
        }  
        elseif($condition=="sort_by=price-desc"){
            $all=DB::table('banner')->leftJoin('khuyenmai','banner.idbanner','=','khuyenmai.idbanner_khuyenmai')->join('banner','banner.idbanner','=','banner.idbanner')->where('banner.idbanner',$banner_id)->orderby('giaban','desc')->paginate(6);
        } 
        elseif($condition=="sort_by=name-az"){
            $all=DB::table('banner')->leftJoin('khuyenmai','banner.idbanner','=','khuyenmai.idbanner_khuyenmai')->join('banner','banner.idbanner','=','banner.idbanner')->where('banner.idbanner',$banner_id)->orderby('tenbanner','asc')->paginate(6);
        } 
        elseif($condition=="sort_by=name-za"){
            $all=DB::table('banner')->leftJoin('khuyenmai','banner.idbanner','=','khuyenmai.idbanner_khuyenmai')->join('banner','banner.idbanner','=','banner.idbanner')->where('banner.idbanner',$banner_id)->orderby('tenbanner','desc')->paginate(6);
        }  
        elseif($condition=="sort_by=new"){
            $all=DB::table('banner')->leftJoin('khuyenmai','banner.idbanner','=','khuyenmai.idbanner_khuyenmai')->join('banner','banner.idbanner','=','banner.idbanner')->where('banner.idbanner',$banner_id)->orderby('idbanner','desc')->limit(8)->paginate(6);
        }   
        elseif($condition=="sort_by=most-selling"){
            $most_selling = DB::table('donhangchitiet')
            ->select(DB::raw('COUNT(*) as total_sales,idbanner'))
            ->groupBy('idbanner')
            ->orderby('total_sales','desc')
            ->get();
            $all=DB::table('banner')->leftJoin('khuyenmai','banner.idbanner','=','khuyenmai.idbanner_khuyenmai')->where('banner.idbanner',$banner_id)->where('idbanner',$most_selling[0]->idbanner)->orwhere('idbanner',$most_selling[1]->idbanner)->orwhere('idbanner',$most_selling[2]->idbanner)->orwhere('idbanner',$most_selling[3]->idbanner)->paginate(6);
        }   
        $banner_name=DB::table('banner')->where('idbanner',$banner_id)->limit(1)->get();
        
        // echo $banner_id;
        // echo $condition;
        return view('pages.banner.show_banner_condition')->with('banner',$cate)->with('brand',$brand)->with('all',$all)->with('banner_name',$banner_name);
    }
    public function show_new(){
        $cate=DB::table('banner')->where('hienthi','1')->orderby('idbanner','asc')->get();
        $brand=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();

        $all=DB::table('banner')->leftJoin('khuyenmai','banner.idbanner','=','khuyenmai.idbanner_khuyenmai')->join('banner','banner.idbanner','=','banner.idbanner')->where('hienthibanner','1')->orderby('idbanner','desc')->paginate(9);
        return view('pages.banner.show_new')->with('banner',$cate)->with('brand',$brand)->with('all',$all);
    }
    public function show_promotion_cate(){
        $cate=DB::table('banner')->where('hienthi','1')->orderby('idbanner','asc')->get();
        $brand=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();

        $all=DB::table('banner')->Join('khuyenmai','banner.idbanner','=','khuyenmai.idbanner_khuyenmai')->join('banner','banner.idbanner','=','banner.idbanner')->where('hienthibanner','1')->orderby('idbanner','desc')->paginate(9);
        return view('pages.banner.show_promotion')->with('banner',$cate)->with('brand',$brand)->with('all',$all);
    }
    
}
