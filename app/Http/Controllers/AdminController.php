<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Statistic;
use Carbon\Carbon;
session_start(); 
class AdminController extends Controller
{
    public function auth_login(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        $this->auth_login();
        $this->auth_login();
        $all_order_product=DB::table('donhang')->Join('khachhang','donhang.idkhachhang','=','khachhang.idkhachhang')->orderby('donhang.trangthai','asc')->where('donhang.trangthai','<>',3)->get();
        // print_r($all_order_product);
        return view('admin.dashboard')->with('all_product_order',$all_order_product);
    }
    public function dashboard(Request $request){
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);

        $result= DB::table('nhanvien')->where('taikhoan',$admin_email)->where('matkhau',$admin_password)->first();
        if($result){
            Session::put('admin_name',$result->tennhanvien);
            Session::put('admin_id',$result->idnhanvien);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Mật Khẩu hoặc tài khoản đã nhập sai!');
            return Redirect::to('/admin');
        }
    }
    public function validation(Request $request){
        return view('/admin_validation');
    }
    public function save_validation(Request $request){
        $data['tennhanvien']=$request->admin_name;
        $data['diachi']=$request->admin_address;
        $data['sodienthoai']=$request->admin_phone;
        $data['taikhoan']=$request->admin_email;
        $data['matkhau']=md5($request->admin_password);
        $admin_id=DB::table('nhanvien')->insertGetId($data);
        Session::put('admin_name',$request->admin_name);
        Session::put('admin_id',$admin_id);
        return Redirect::to('/dashboard');
    }
    public function logout(){
        $this->auth_login();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
    public function days_order(){
        $now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $sub30days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
        $sub7days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $get=Statistic::whereBetween('ngaythongke',[$sub30days,$now])->orderBy('ngaythongke','asc')->get();
        foreach($get as $key =>$val){
            $chart_data[]= array(
                'period' => $val->ngaythongke,
                'order' => $val->tongdonhang,
                'sales' => $val->tongtien,
                'profit'=>$val->loinhuan,
                'quantity'=>$val->soluongban
            );
        }
        echo $data= json_encode($chart_data);
    }
    public function filter_by_date(Request $request){
        $data=$request->all();
        $from_date=$data['from_date'];
        $to_date=$data['to_date'];
        $get=Statistic::whereBetween('ngaythongke',[$from_date,$to_date])->orderBy('ngaythongke','asc')->get();
        foreach($get as $key =>$val){
            $chart_data[]= array(
                'period' => $val->ngaythongke,
                'order' => $val->tongdonhang,
                'sales' => $val->tongtien,
                'profit'=>$val->loinhuan,
                'quantity'=>$val->soluongban

            );
        }
        echo $data= json_encode($chart_data);
    }
    public function dashboard_filter(Request $request){
        $data=$request->all();
        $dauthangnay=Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc=Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc=Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value']=='7ngay'){
            $get=Statistic::whereBetween('ngaythongke',[$sub7days,$now])->orderBy('ngaythongke','asc')->get();
        }elseif($data['dashboard_value']=='thangtruoc'){
            $get=Statistic::whereBetween('ngaythongke',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('ngaythongke','asc')->get();
        }elseif($data['dashboard_value']=='thangnay'){
            $get=Statistic::whereBetween('ngaythongke',[$dauthangnay,$now])->orderBy('ngaythongke','asc')->get();
        }else{
            $get=Statistic::whereBetween('ngaythongke',[$sub365days,$now])->orderBy('ngaythongke','asc')->get();
        }
        foreach($get as $key =>$val){
            $chart_data[]= array(
                'period' => $val->ngaythongke,
                'order' => $val->tongdonhang,
                'sales' => $val->tongtien,
                'profit'=>$val->loinhuan,
                'quantity'=>$val->soluongban

            );
        }
        echo $data= json_encode($chart_data);
    }
}
