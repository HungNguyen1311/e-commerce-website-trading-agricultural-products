<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start(); 
class FormController extends Controller
{
    public function auth_login(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function all_form(){
        $this->auth_login();
        $all_form_product=DB::table('phieunhap')->Join('nhanvien','phieunhap.idnhanvien','=','nhanvien.idnhanvien')->get();
        // print_r($all_form_product);
        return view('admin.all_form')->with('all_product_form',$all_form_product);
    }
    public function show_form($form_product_id){
        $this->auth_login();
        $edit_form_product=DB::table('chitietphieunhap')->Join('sanpham','chitietphieunhap.idsanpham','=','sanpham.idsanpham')->where('chitietphieunhap.idphieunhap',$form_product_id)->get();
        $manager_form_product=view('admin.show_details_form')->with('edit_form_product',$edit_form_product);
        // print_r($edit_form_product);
        
        return view('admin_layout')->with('admin.show_details_form',$manager_form_product);
    }
}
