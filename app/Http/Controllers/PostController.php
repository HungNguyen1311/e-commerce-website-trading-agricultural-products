<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use App\Models\Post;
session_start(); 
class PostController extends Controller
{
    public function auth_login(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function add_post(){
        $this->auth_login();
        $cate_product=DB::table('theloai')->orderby('idtheloai','desc')->get();

        return view('admin.post.add_post');
    }

    public function save_post(Request $request){
        $this->auth_login();
        $data=$request->all();
        $post= new Post();
        $post->tieudebaiviet= $data['post_title'];
        $post->mieutabaiviet= $data['post_desc'];
        $post->noidungbaiviet= $data['post_content'];
        $post->idnhanvien= $data['post_staff_id'];
        $post->hienthibaiviet= $data['post_status'];    
        
        $get_image1=$request->file('post_image');

        if($get_image1){
            $get_name_image1=$get_image1->getClientOriginalName();
            $name_image1=current(explode('.',$get_name_image1));
            $new_image1=$name_image1.rand(0,999999).'.'.$get_image1->getClientOriginalExtension();        
            $get_image1->move('uploads/post',$new_image1);
            $post->hinhanhbaiviet='uploads/post/'.$new_image1;        
            $post->save();
            Session::put('message','Thêm bài viết thành công');
            return redirect()->back();
        }else{
            Session::put('message',"Bạn chưa thêm hình ảnh");
            return redirect()->back();
        }
    }

    public function all_post(){
        $this->auth_login();
        $all_post=DB::table('baiviet')->join('nhanvien','nhanvien.idnhanvien','=','baiviet.idnhanvien')->get();                
        // echo($final_product);
        $manager_product=view('admin.post.all_post')->with('all_post',$all_post);
        return view('admin_layout')->with('admin.post.all_post',$manager_product);
    }

    public function delete_post($post_id){
        $this->auth_login();
        $post=Post::find($post_id);
        $post_image=$post->hinhanhbaiviet;
        if($post_image){
            unlink($post_image);
        }
        $post->delete();
        Session::put('message','Đã xóa bài viết thành công!');
        return redirect()->back();
    }

    public function edit_post($post_id){
        $this->auth_login();
        $post=Post::find($post_id);
        return view('admin.post.edit_post')->with(compact('post'));
    }

    public function update_post(Request $request,$post_id){
        $this->auth_login();
        $data=$request->all();

        $post= Post::find($post_id);
        $post->tieudebaiviet= $data['post_title'];
        $post->mieutabaiviet= $data['post_desc'];
        $post->noidungbaiviet= $data['post_content'];
        $post->idnhanvien= $data['post_staff_id'];
        $post->hienthibaiviet= $data['post_status'];    
        
        $get_image1=$request->file('post_image');

        if($get_image1){

            $post_image_old=$post->hinhanhbaiviet;
            unlink($post_image_old);

            $get_name_image1=$get_image1->getClientOriginalName();
            $name_image1=current(explode('.',$get_name_image1));
            $new_image1=$name_image1.rand(0,999999).'.'.$get_image1->getClientOriginalExtension();        
            $get_image1->move('uploads/post',$new_image1);
            $post->hinhanhbaiviet='uploads/post/'.$new_image1;        
            
        }
        $post->save();
        Session::put('message','Cập nhật bài viết thành công');
        return redirect()->back();
    }

    public function show_post(){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();
        $get_banner=DB::table('banner')->where('hienthi',1)->get();
        $get_banner_image=DB::table('banner')->where('hienthi',1)->get();
        
        $get_post=DB::table('baiviet')->where('hienthibaiviet',1)->paginate(5);
        $new_post=DB::table('baiviet')->where('hienthibaiviet',1)->orderBy('idbaiviet','desc')->limit(5)->get();
        return view('pages.baiviet.show_post')->with('category',$cate_product)->with('brand',$brand_product)->with('get_banner',$get_banner)->with('get_banner_image',$get_banner_image)->with('get_post',$get_post)->with('new_post',$new_post);
    }

    public function post_details($post_id){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();
        $get_banner=DB::table('banner')->where('hienthi',1)->get();
        $get_banner_image=DB::table('banner')->where('hienthi',1)->get();

        $all_post_details=DB::table('baiviet')->where('idbaiviet',$post_id)->first();
        $more_post=DB::table('baiviet')->where('idbaiviet','!=',$post_id)->where('hienthibaiviet',1)->limit(2)->get();
        $new_post=DB::table('baiviet')->where('hienthibaiviet',1)->orderBy('idbaiviet','desc')->limit(5)->get();
        return view('pages.baiviet.show_post_details')->with('category',$cate_product)->with('brand',$brand_product)->with('get_banner',$get_banner)->with('get_banner_image',$get_banner_image)->with('post',$all_post_details)->with('more_post',$more_post)->with('new_post',$new_post);
    }

    public function active_post($post_id){
        $this->auth_login();
        DB::table('baiviet')->where('idbaiviet',$post_id)->update(['hienthibaiviet' => 0]);
        Session::put('message','Kích hoạt ẩn bài viết thành công');
        return Redirect::to('all-post');
    }
    public function unactive_post($post_id){
        $this->auth_login();
        DB::table('baiviet')->where('idbaiviet',$post_id)->update(['hienthibaiviet' => 1]);
        Session::put('message','Kích hoạt hiển thị bài viếtthành công');
        return Redirect::to('all-post');
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
}
