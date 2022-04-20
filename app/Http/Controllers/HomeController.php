<?php

namespace App\Http\Controllers;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
session_start(); 

class HomeController extends Controller
{
    public function index(){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();

        // $all_product=DB::table('sanpham')->join('theloai','theloai.idtheloai','=','sanpham.idtheloai')
        // ->join('thuonghieu','thuonghieu.idthuonghieu','=','sanpham.idthuonghieu')->orderby('idsanpham','desc')->get();
        $all_product=DB::table('sanpham')->where('hienthisanpham','1')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->orderby('idsanpham','desc')->limit(4)->get();
        $all_product_tcnk=DB::table('sanpham')->where('hienthisanpham','1')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->orderby('sanpham.idsanpham','asc')->limit(4)->get();
        
        $most_selling = DB::table('donhangchitiet')
                ->select(DB::raw('COUNT(*) as total_sales,idsanpham'))
                ->groupBy('idsanpham')
                ->orderby('total_sales','desc')
                ->get();
        $most_product=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->where('sanpham.idsanpham',$most_selling[0]->idsanpham)->orwhere('sanpham.idsanpham',$most_selling[1]->idsanpham)->orwhere('sanpham.idsanpham',$most_selling[2]->idsanpham)->orwhere('sanpham.idsanpham',$most_selling[3]->idsanpham)->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->get();
        $get_banner=DB::table('banner')->where('hienthi',1)->get();
        $get_banner_image=DB::table('banner')->where('hienthi',1)->get();
        // print_r($all_product_tcnk);
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('all_product_tcnk',$all_product_tcnk)->with('most_product',$most_product)->with('get_banner',$get_banner)->with('get_banner_image',$get_banner_image);
    }
    public function contact(){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();

        // $all_product=DB::table('sanpham')->join('theloai','theloai.idtheloai','=','sanpham.idtheloai')
        // ->join('thuonghieu','thuonghieu.idthuonghieu','=','sanpham.idthuonghieu')->orderby('idsanpham','desc')->get();
        $all_product=DB::table('sanpham')->where('hienthisanpham','1')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->orderby('idsanpham','desc')->limit(4)->get();
        $all_product_tcnk=DB::table('sanpham')->where('hienthisanpham','1')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->orderby('sanpham.idsanpham','asc')->limit(4)->get();
        
        $most_selling = DB::table('donhangchitiet')
                ->select(DB::raw('COUNT(*) as total_sales,idsanpham'))
                ->groupBy('idsanpham')
                ->orderby('total_sales','desc')
                ->get();
        $most_product=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->where('idsanpham',$most_selling[0]->idsanpham)->orwhere('idsanpham',$most_selling[1]->idsanpham)->orwhere('idsanpham',$most_selling[2]->idsanpham)->orwhere('idsanpham',$most_selling[3]->idsanpham)->get();
        $get_banner=DB::table('banner')->where('hienthi',1)->get();
        $get_banner_image=DB::table('banner')->where('hienthi',1)->get();
        // print_r($all_product_tcnk);
        return view('pages.contact')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('all_product_tcnk',$all_product_tcnk)->with('most_product',$most_product)->with('get_banner',$get_banner)->with('get_banner_image',$get_banner_image);
    }
    public function search(Request $request){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();
        $keywords=$request->keywords_submit;

         // $all_product=DB::table('sanpham')->join('theloai','theloai.idtheloai','=','sanpham.idtheloai')
        // ->join('thuonghieu','thuonghieu.idthuonghieu','=','sanpham.idthuonghieu')->orderby('idsanpham','desc')->get();
        $all_product=DB::table('sanpham')->where('hienthisanpham','1')->limit(4)->get();
        $all_product_tcnk=DB::table('sanpham')->where('hienthisanpham','1')->limit(4)->get();

        $search_product=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->where('hienthisanpham','1')->where('tensanpham','like','%'.$keywords.'%')->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->get();
        $get_banner=DB::table('banner')->where('hienthi',1)->get();
        $get_banner_image=DB::table('banner')->where('hienthi',1)->get();
        Session::put('keyword_name',$keywords);
        return view('pages.sanpham.search_product')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('get_banner',$get_banner)->with('get_banner_image',$get_banner_image);
    }
    public function object_detection(){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();

        $get_banner=DB::table('banner')->where('hienthi',1)->get();
        $get_banner_image=DB::table('banner')->where('hienthi',1)->get();
        // print_r($all_product_tcnk);
        return view('pages.object_detection')->with('category',$cate_product)->with('brand',$brand_product)->with('get_banner',$get_banner)->with('get_banner_image',$get_banner_image);
    }
    public function more_details_detect($name_product){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();

         // $all_product=DB::table('sanpham')->join('theloai','theloai.idtheloai','=','sanpham.idtheloai')
        // ->join('thuonghieu','thuonghieu.idthuonghieu','=','sanpham.idthuonghieu')->orderby('idsanpham','desc')->get();
        $all_product=DB::table('sanpham')->where('hienthisanpham','1')->limit(4)->get();
        $all_product_tcnk=DB::table('sanpham')->where('hienthisanpham','1')->limit(4)->get();
        $slice = Str::after($name_product, 'Quả ');
        $search_product=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->where('hienthisanpham','1')->where('tensanpham','like','%'.$slice.'%')->leftJoin('losanpham','losanpham.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongton) as soluongton,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,giakhuyenmai'))->groupBy('sanpham.idsanpham')->get();
        $get_banner=DB::table('banner')->where('hienthi',1)->get();
        $get_banner_image=DB::table('banner')->where('hienthi',1)->get();
        return view('pages.more_product_detect')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('get_banner',$get_banner)->with('get_banner_image',$get_banner_image);
    }
    public function post_image(Request $request){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();
        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();

        $get_banner=DB::table('banner')->where('hienthi',1)->get();
        $get_banner_image=DB::table('banner')->where('hienthi',1)->get();

        $get_image1=$request->file('product_image1');
        $get_name_image1=$get_image1->getClientOriginalName();
        $name_image1=current(explode('.',$get_name_image1));
        $new_image1=$name_image1.rand(0,999999).'.'.$get_image1->getClientOriginalExtension();        
        $get_image1->move('yolov4/uploads',$new_image1);
        $image_url='yolov4/uploads/'.$new_image1;
    
        $python_path=public_path('yolov4/object_detection.py');
        $process = new Process(['C:\Users\quoch\AppData\Roaming\Python\Python39\python.exe', $python_path, '--image' ,$image_url]);      
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $all_obj_detect= $process->getOutput();
        $test=explode("+",$all_obj_detect);

        $removed = Str::remove('[', $test[1]);
        $removed = Str::remove(']', $removed);
        $removed = Str::remove("'", $removed);
        $final_result=explode(",",$removed);
        for ($i = 0; $i < count($final_result); $i++){
            if(ltrim(rtrim($final_result[$i]))=="qua tao"){
                $final_result[$i]="táo";
            }elseif(ltrim(rtrim($final_result[$i]))=="qua chuoi"){
                $final_result[$i]="Chuối";
            }elseif(ltrim(rtrim($final_result[$i]))=="cu khoai tay"){
                $final_result[$i]="Khoai tây";
            }elseif(ltrim(rtrim($final_result[$i]))=="ot chuong"){
                $final_result[$i]="Ớt chuông";
            }elseif(ltrim(rtrim($final_result[$i]))=="bap cai"){
                $final_result[$i]="Bắp cải";
            }elseif(ltrim(rtrim($final_result[$i]))=="ca rot"){
                $final_result[$i]="Cà rốt";
            }elseif(ltrim(rtrim($final_result[$i]))=="sup lo"){
                $final_result[$i]="Súp lơ";
            }elseif(ltrim(rtrim($final_result[$i]))=="ot"){
                $final_result[$i]="Ớt";
            }elseif(ltrim(rtrim($final_result[$i]))=="bap"){
                $final_result[$i]="Bắp";
            }elseif(ltrim(rtrim($final_result[$i]))=="dua leo"){
                $final_result[$i]="Dưa leo";
            }elseif(ltrim(rtrim($final_result[$i]))=="ca tim"){
                $final_result[$i]="Cà tím";
            }elseif(ltrim(rtrim($final_result[$i]))=="toi"){
                $final_result[$i]="Tỏi";
            }elseif(ltrim(rtrim($final_result[$i]))=="gung"){
                $final_result[$i]="Gừng";
            }elseif(ltrim(rtrim($final_result[$i]))=="nho"){
                $final_result[$i]="Nho";
            }elseif(ltrim(rtrim($final_result[$i]))=="ot xanh"){
                $final_result[$i]="Ớt xanh";
            }elseif(ltrim(rtrim($final_result[$i]))=="kiwi"){
                $final_result[$i]="Kiwi";
            }elseif(ltrim(rtrim($final_result[$i]))=="chanh"){
                $final_result[$i]="Chanh";
            }elseif(ltrim(rtrim($final_result[$i]))=="cai xanh"){
                $final_result[$i]="Cải xanh";
            }elseif(ltrim(rtrim($final_result[$i]))=="xoai"){
                $final_result[$i]="Xoài";
            }elseif(ltrim(rtrim($final_result[$i]))=="cu hanh"){
                $final_result[$i]="Củ hành";
            }elseif(ltrim(rtrim($final_result[$i]))=="qua cam"){
                $final_result[$i]="Cam";
            }elseif(ltrim(rtrim($final_result[$i]))=="qua le"){
                $final_result[$i]="Lê";
            }elseif(ltrim(rtrim($final_result[$i]))=="dau hat"){
                $final_result[$i]="Đậu";
            }elseif(ltrim(rtrim($final_result[$i]))=="qua dua"){
                $final_result[$i]="Dứa";
            }elseif(ltrim(rtrim($final_result[$i]))=="qua luu"){
                $final_result[$i]="Lựu";
            }elseif(ltrim(rtrim($final_result[$i]))=="cu khoai lang"){
                $final_result[$i]="Khoai lang";
            }elseif(ltrim(rtrim($final_result[$i]))=="cu cai trang"){
                $final_result[$i]="Củ cải trắng";
            }elseif(ltrim(rtrim($final_result[$i]))=="mong toi"){
                $final_result[$i]="Mồng tơi";
            }elseif(ltrim(rtrim($final_result[$i]))=="ca chua"){
                $final_result[$i]="Cà chua";
            }elseif(ltrim(rtrim($final_result[$i]))=="cu cai tim"){
                $final_result[$i]="Củ cải tím";
            }elseif(ltrim(rtrim($final_result[$i]))=="dua hau"){
                $final_result[$i]="Dưa hấu";
            }elseif(ltrim(rtrim($final_result[$i]))=="cu cai do"){
                $final_result[$i]="Củ cải đỏ";
            }elseif(ltrim(rtrim($final_result[$i]))=="cu den"){
                $final_result[$i]="Củ dền";
            }
        }
        
        $get_info=DB::table('dinhduong')->whereIn('tennongsan',$final_result)->get();
        Session::put('image_after_detect',$test[0]);
        Session::put('all_obj_detect',$get_info);
        Session::put('image_url',$image_url);
        // print_r($final_result);
        return view('pages.object_detection')->with('category',$cate_product)->with('brand',$brand_product)->with('get_banner',$get_banner)->with('get_banner_image',$get_banner_image);
    }
}
