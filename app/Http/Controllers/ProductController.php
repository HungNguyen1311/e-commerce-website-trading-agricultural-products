<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
session_start(); 

class ProductController extends Controller
{
    public function auth_login(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function add_product(){
        $this->auth_login();
        $cate_product=DB::table('theloai')->orderby('idtheloai','desc')->get();
        $brand_product=DB::table('thuonghieu')->orderby('idthuonghieu','desc')->get();

        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function add_sub_product(){
        $this->auth_login();
        $cate_product=DB::table('theloai')->orderby('idtheloai','desc')->get();
        $brand_product=DB::table('thuonghieu')->orderby('idthuonghieu','desc')->get();
        $all_product=DB::table('sanpham')->get();
        return view('admin.add_sub_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('all_product',$all_product);
    }
    public function save_info_product(Request $request){
        $cate_product=DB::table('theloai')->orderby('idtheloai','desc')->get();
        $brand_product=DB::table('thuonghieu')->orderby('idthuonghieu','desc')->get();
        $all_product=DB::table('sanpham')->get();
        $this->auth_login();
        $soluonglo=$request->product_amount;
        Session::put('soluonglo',$soluonglo);
        return view('admin.add_info_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('all_product',$all_product);
    }
    public function save_package_product(Request $request,$amount_product){
        $this->auth_login();
        $cate_product=DB::table('theloai')->orderby('idtheloai','desc')->get();
        $brand_product=DB::table('thuonghieu')->orderby('idthuonghieu','desc')->get();    
        $staff_id=$request->staff_id;
        $data_phieunhap['idnhanvien']=$staff_id;
        $get_phieunhap_id=DB::table('phieunhap')->insertGetId($data_phieunhap);
        $soluonglo=$amount_product;
        $data_chitietphieunhap=array();
        for($i=0;$i<$soluonglo;$i++){
            $temp_amount='product_amount'.''.$i;
            $temp_price='product_price'.''.$i;
            $temp_expire='product_date_expire'.''.$i;
            $temp_brand='product_brand'.''.$i;
            $temp_idsanpham='product_id'.''.$i;
            $data['soluongnhap']=$request->$temp_amount;
            $data['soluongton']=$request->$temp_amount;
            $data['idsanpham']=$request->$temp_idsanpham;
            $data['gianhap']=$request->$temp_price;
            $data['idthuonghieu']=$request->$temp_brand;
            $data['ngayhethan']=$request->$temp_expire;
            $losanpham_id=DB::table('losanpham')->insertGetId($data);   
            $data_chitietphieunhap['idphieunhap']=$get_phieunhap_id;
            $data_chitietphieunhap['idsanpham']=$request->$temp_idsanpham;
            $data_chitietphieunhap['idlosanpham']=$losanpham_id;
            $data_chitietphieunhap['soluongnhap']=$request->$temp_amount;
            $data_chitietphieunhap['gianhap']=$request->$temp_price;
            DB::table('chitietphieunhap')->insert($data_chitietphieunhap);
        }
        Session::put('message','Thêm lô sản phẩm thành công!');
        return Redirect::to('all-product');  
    }
    public function all_package_product($product_id){
        $this->auth_login();
        $all_product=DB::table('losanpham')->where('losanpham.idsanpham',$product_id)->where('hienthilosanpham',1)->join('sanpham','sanpham.idsanpham','=','losanpham.idsanpham')->join('thuonghieu','thuonghieu.idthuonghieu','=','losanpham.idthuonghieu')->orderby('idlosanpham','asc')->get();
        $manager_product=view('admin.show_package_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.show_package_product',$manager_product);
    }
    public function show_sub_product(){
        $this->auth_login();
        $all_product=DB::table('losanpham')->where('hienthilosanpham',1)->join('sanpham','sanpham.idsanpham','=','losanpham.idsanpham')->join('thuonghieu','thuonghieu.idthuonghieu','=','losanpham.idthuonghieu')->orderby('ngayhethan','asc')->paginate(10);
        $manager_product=view('admin.show_sub_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.show_package_product',$manager_product);
    }
    public function all_product(){
        $this->auth_login();
        $all_product=DB::table('sanpham')->join('theloai','theloai.idtheloai','=','sanpham.idtheloai')->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->where('hienthilosanpham',1)->orwhere('hienthilosanpham',0)->orwhere('hienthilosanpham',NULL)->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,tentheloai'))->groupBy('sanpham.idsanpham')->orderby('sanpham.idsanpham','desc')->paginate(10);                
        // echo($final_product);
        $manager_product=view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function search_product_admin(Request $request){
        $this->auth_login();
        $get_name=$request->product_name;
        // echo($final_product);
        $all_product=DB::table('sanpham')->where('sanpham.tensanpham','like','%'.$get_name.'%')->leftjoin('theloai','theloai.idtheloai','=','sanpham.idtheloai')->Join('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,tentheloai,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham'))->groupBy('sanpham.idsanpham')->get();                
        $manager_product=view('admin.search_product_admin')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
        // print_r($all_product1);
    }
    public function delete_package_product($package_id){
        $this->auth_login();
        DB::table('losanpham')->where('idlosanpham',$package_id)->update(['hienthilosanpham' => 0]);
        DB::table('losanpham')->where('idlosanpham',$package_id)->update(['soluongton' => 0]);
        Session::put('message','Đã xóa lô sản phẩm  thành công!');
        return redirect()->back();
    }
    public function edit_package_product($package_id){
        $this->auth_login();
        $cate_product=DB::table('theloai')->orderby('idtheloai','desc')->get();
        $brand_product=DB::table('thuonghieu')->orderby('idthuonghieu','desc')->get();
        $edit_package=DB::table('losanpham')->where('idlosanpham',$package_id)->get();
        $all_product=DB::table('sanpham')->get();
        $manager_product=view('admin.edit_package_product')->with('edit_package',$edit_package)->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('all_product',$all_product);
        return view('admin_layout')->with('admin.edit_package_product',$manager_product);
    }
    public function update_package_product(Request $request,$package_id){
        $this->auth_login();
        $data=array();
        $data['idsanpham']=$request->product_id;
        $data['soluongnhap']=$request->product_amount;
        $data['soluongton']=$request->product_exist;
        $data['gianhap']=$request->product_price;
        $data['ngayhethan']=$request->product_date_expire;
        $data['idthuonghieu']=$request->product_brand;
        DB::table('losanpham')->where('idlosanpham',$package_id)->update($data);
        Session::put('message','Cập nhật lô sản phẩm thành công!');    
        return Redirect::to('all-package-product/'.$request->product_id);
    }
    public function save_product(Request $request){
        $this->auth_login();
        $data=array();
        $data_phieunhap=array();
        $data_chitietphieunhap=array();
        $data['tensanpham']=$request->product_name;
        $data['giaban']=$request->product_price;
        $data['motasanpham']=$request->product_desc;
        $data['idtheloai']=$request->product_category;
        $data['hienthisanpham']=$request->product_status;
        $get_image1=$request->file('product_image1');
        $get_image2=$request->file('product_image2');
        $get_image3=$request->file('product_image3');

        $save_condition=DB::table('sanpham')->where('tensanpham',$request->product_name)->first();
        if(!$save_condition){
        if($get_image1){
            $get_name_image1=$get_image1->getClientOriginalName();
            $name_image1=current(explode('.',$get_name_image1));
            $new_image1=$name_image1.rand(0,999999).'.'.$get_image1->getClientOriginalExtension();        
            $get_image1->move('uploads/product',$new_image1);
            $data['hinhanh1']='uploads/product/'.$new_image1;
            if($get_image2){
                $get_name_image2=$get_image2->getClientOriginalName();
                $name_image2=current(explode('.',$get_name_image2));
                $new_image2=$name_image2.rand(0,999999).'.'.$get_image2->getClientOriginalExtension();
                $get_image2->move('uploads/product',$new_image2);
                $data['hinhanh2']='uploads/product/'.$new_image2;
            }else{
                $data['hinhanh2']='';
            }
            if($get_image3){
                $get_name_image3=$get_image3->getClientOriginalName();               
                $name_image3=current(explode('.',$get_name_image3));                              
                $new_image3=$name_image3.rand(0,999999).'.'.$get_image3->getClientOriginalExtension();                             
                $get_image3->move('uploads/product',$new_image3);                        
                $data['hinhanh3']='uploads/product/'.$new_image3;
            }else{
                $data['hinhanh3']='';
            }          
            DB::table('sanpham')->insert($data);
        }else{
            $data['hinhanh1']='';
            $data['hinhanh2']='';
            $data['hinhanh3']='';
            DB::table('sanpham')->insert($data);
        }
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-product');
        }else{
        Session::put('message','Sản phẩm đã tồn tại!');
        return Redirect::to('add-product');  
        }
    }
    public function active_product($product_id){
        $this->auth_login();
        DB::table('sanpham')->where('idsanpham',$product_id)->update(['hienthisanpham' => 0]);
        Session::put('message','Kích hoạt ẩn sản phẩm  thành công');
        return Redirect::to('all-product');
    }
    public function unactive_product($product_id){
        $this->auth_login();
        DB::table('sanpham')->where('idsanpham',$product_id)->update(['hienthisanpham' => 1]);
        Session::put('message','Kích hoạt hiển thị sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->auth_login();
        $cate_product=DB::table('theloai')->orderby('idtheloai','desc')->get();
        $brand_product=DB::table('thuonghieu')->orderby('idthuonghieu','desc')->get();
        $edit_product=DB::table('sanpham')->where('idsanpham',$product_id)->get();
        $manager_product=view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function delete_product($product_id){
        $this->auth_login();
        DB::table('sanpham')->where('idsanpham',$product_id)->delete();
        Session::put('message','Đã xóa sản phẩm thành công!');
        return Redirect::to('all-product');
    }
    public function update_product(Request $request,$product_id){
        $this->auth_login();
        $data=array();
        $data_phieunhap=array();
        $data_chitietphieunhap=array();
        $data['tensanpham']=$request->product_name;
        $data['giaban']=$request->product_price;
        $data['ngaynhap']=$request->product_date;
        $data['motasanpham']=$request->product_desc;
        $data['idtheloai']=$request->product_category;
        $data['hienthisanpham']=$request->product_status;
        $get_image1=$request->file('product_image1');
        $get_image2=$request->file('product_image2');
        $get_image3=$request->file('product_image3');

        if($get_image1){
            $get_name_image1=$get_image1->getClientOriginalName();
            $name_image1=current(explode('.',$get_name_image1));
            $new_image1=$name_image1.rand(0,999999).'.'.$get_image1->getClientOriginalExtension();        
            $get_image1->move('uploads/product',$new_image1);
            $data['hinhanh1']='uploads/product/'.$new_image1;
            if($get_image2){
                $get_name_image2=$get_image2->getClientOriginalName();
                $name_image2=current(explode('.',$get_name_image2));
                $new_image2=$name_image2.rand(0,999999).'.'.$get_image2->getClientOriginalExtension();
                $get_image2->move('uploads/product',$new_image2);
                $data['hinhanh2']='uploads/product/'.$new_image2;
            }
            if($get_image3){
                $get_name_image3=$get_image3->getClientOriginalName();               
                $name_image3=current(explode('.',$get_name_image3));                              
                $new_image3=$name_image3.rand(0,999999).'.'.$get_image3->getClientOriginalExtension();                             
                $get_image3->move('uploads/product',$new_image3);                        
                $data['hinhanh3']='uploads/product/'.$new_image3;
            DB::table('sanpham')->where('idsanpham',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công!');    
            return Redirect::to('all-product');
            }   
            DB::table('sanpham')->where('idsanpham',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công!');    
            return Redirect::to('all-product');                
        }elseif(!$get_image1){   
            if($get_image2){
                $get_name_image2=$get_image2->getClientOriginalName();
                $name_image2=current(explode('.',$get_name_image2));
                $new_image2=$name_image2.rand(0,999999).'.'.$get_image2->getClientOriginalExtension();
                $get_image2->move('uploads/product',$new_image2);
                $data['hinhanh2']='uploads/product/'.$new_image2;
            }
            if($get_image3){
                $get_name_image3=$get_image3->getClientOriginalName();               
                $name_image3=current(explode('.',$get_name_image3));                              
                $new_image3=$name_image3.rand(0,999999).'.'.$get_image3->getClientOriginalExtension();                             
                $get_image3->move('uploads/product',$new_image3);                        
                $data['hinhanh3']='uploads/product/'.$new_image3;
            }        
            DB::table('sanpham')->where('idsanpham',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công!');    
            return Redirect::to('all-product');
        }
    }
    //End Admin Page
    public function details_product($product_id){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();
        $product_details=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->where('sanpham.idsanpham',$product_id)->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->where('sanpham.idsanpham',$product_id)->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,hinhanh2,hinhanh3,giakhuyenmai'))->groupBy('sanpham.idsanpham')->get();
        $product_details_same=DB::table('sanpham')->where('idsanpham',$product_id)->first();
        $same_products=DB::table('sanpham')->where('idtheloai',$product_details_same->idtheloai)->where('sanpham.idsanpham','!=',$product_id)->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->orderby('sanpham.idsanpham','asc')->limit(7)->get();
        $more_product=DB::table('theloai')->where('idtheloai',$product_details_same->idtheloai)->get();
        return view('pages.sanpham.show_details')->with('category',$cate_product)->with('product_details',$product_details)->with('same_product',$same_products)->with('more_product',$more_product);
        // print_r($product_details);
    }
    public function ckeditor_image(Request $request){
        if($request->hasFile('upload')){
            $original_name=$request->file('upload')->getClientOriginalName();
            $fileName=pathinfo($original_name,PATHINFO_FILENAME);
            $extendsion=$request->file('upload')->getClientOriginalExtension();
            $fileName=$fileName.'_'.time().'.'.$extendsion;

            $request->file('upload')->move('uploads/ckeditor',$fileName);

            $CKEditorFuncNum=$request->input('CKEditorFuncNum');
            $url=asset('uploads/ckeditor/'.$fileName);
            $msg='Tải ảnh thành công';
            $response="<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$url','$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
