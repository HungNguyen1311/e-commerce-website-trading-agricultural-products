<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start(); 

class CartController extends Controller
{
    public function add_cart_ajax(Request $request){
        $data=$request->all();
        $session_id=substr(md5(microtime()),rand(0,26),5);
        // $cart=Session::get('cart');
        $product_id=$request->cart_product_id;
        $quantity=100 ;
        $product_info=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->where('sanpham.idsanpham',$product_id)->first();
        $check_cart_product=0;
        $check_items =Cart::getContent();
        foreach($check_items as $row){
            if($row->name == $product_info->tensanpham){
                $check_cart_product++;
            }
        }
        if($check_cart_product==0){
            if($product_info->idtheloai!=5){
                $data['id']=$product_info->idsanpham;
                $data['quantity']=$quantity;
                $data['name']=$product_info->tensanpham;
                if($product_info->giakhuyenmai==NULL){
                $data['price']=$product_info->giaban;
                }else{
                $data['price']=$product_info->giakhuyenmai;    
                }
                $data['attributes']['image']=$product_info->hinhanh1;
                $data['attributes']['idtheloai']=$product_info->idtheloai;
                Cart::add($data);
                
            }else{
                $data['id']=$product_info->idsanpham;
                $data['quantity']=1;
                $data['name']=$product_info->tensanpham;
                if($product_info->giakhuyenmai==NULL){
                $data['price']=$product_info->giaban;
                }else{
                $data['price']=$product_info->giakhuyenmai;    
                }
                $data['attributes']['image']=$product_info->hinhanh1;
                $data['attributes']['idtheloai']=$product_info->idtheloai;
    
                Cart::add($data);
                // Cart::clear();
            }
        }
        
    }
    public function save_cart(Request $request){
        $current_url=$request->url_current_hidden;
        $product_id=$request->productid_hidden;
        $quantity=$request->qty;
        $product_info=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->where('sanpham.idsanpham',$product_id)->first();
        $get_amount=DB::table('losanpham')->where('idsanpham',$product_id)->where('hienthilosanpham',1)->select(DB::raw('SUM(soluongton) as soluongton,idsanpham'))->groupBy('idsanpham')->first();
        $check_cart_product=0;
        $check_items =Cart::getContent();
        foreach($check_items as $row){
            if($row->name == $product_info->tensanpham){
                $check_cart_product=1;
            }
        }
        if($check_cart_product==1){
            foreach($check_items as $cart_product){
                if($cart_product->name==$product_info->tensanpham){
                    $get_amount_cart=$cart_product->quantity + $quantity;
                    if($get_amount_cart > $get_amount->soluongton){
                        Session::put('message-false','Số lượng sản phẩm hiện tại không đủ!');
                        return redirect()->back();
                    }else{
                        if($product_info->idtheloai!=5){
                            $data['id']=$product_info->idsanpham;
                            $data['quantity']=$quantity;
                            $data['name']=$product_info->tensanpham;
                            if($product_info->giakhuyenmai==NULL){
                            $data['price']=$product_info->giaban;
                            }else{
                            $data['price']=$product_info->giakhuyenmai;    
                            }
                            $data['attributes']['image']=$product_info->hinhanh1;
                            $data['attributes']['idtheloai']=$product_info->idtheloai;
                            Cart::add($data);
                            // Cart::clear();
                            return redirect()->back();
                        }else{
                            $data['id']=$product_info->idsanpham;
                            $data['quantity']=$quantity;
                            $data['name']=$product_info->tensanpham;
                            if($product_info->giakhuyenmai==NULL){
                            $data['price']=$product_info->giaban*($quantity);
                            }else{
                            $data['price']=$product_info->giakhuyenmai*($quantity);    
                            }
                            $data['attributes']['image']=$product_info->hinhanh1;
                            $data['attributes']['idtheloai']=$product_info->idtheloai;
                            Cart::add($data);
                            // Cart::clear();
                            return redirect()->back();
                        }
                    }
                }
            }
        }else{
            if($quantity>$get_amount->soluongton){
                Session::put('message-false','Số lượng sản phẩm hiện tại không đủ!');
                return redirect()->back();
            }else{
                if($product_info->idtheloai!=5){
                    $data['id']=$product_info->idsanpham;
                    $data['quantity']=$quantity;
                    $data['name']=$product_info->tensanpham;
                    if($product_info->giakhuyenmai==NULL){
                    $data['price']=$product_info->giaban;
                    }else{
                    $data['price']=$product_info->giakhuyenmai;    
                    }
                    $data['attributes']['image']=$product_info->hinhanh1;
                    $data['attributes']['idtheloai']=$product_info->idtheloai;
                    Cart::add($data);
                    // Cart::clear();
                    return redirect()->back();
                }else{
                    $data['id']=$product_info->idsanpham;
                    $data['quantity']=$quantity;
                    $data['name']=$product_info->tensanpham;
                    if($product_info->giakhuyenmai==NULL){
                    $data['price']=$product_info->giaban;
                    }else{
                    $data['price']=$product_info->giakhuyenmai;    
                    }
                    $data['attributes']['image']=$product_info->hinhanh1;
                    $data['attributes']['idtheloai']=$product_info->idtheloai;
                    Cart::add($data);
                    // Cart::clear();
                    return redirect()->back();
                }
            }
        }
        
    }
    public function save_home_cart(Request $request){
        $current_url_home=$request->url_current_hidden;
        $product_id=$request->productid_home_hidden;
        $quantity=100 ;
        $product_info=DB::table('sanpham')->leftJoin('khuyenmai','sanpham.idsanpham','=','khuyenmai.idsanpham_khuyenmai')->where('sanpham.idsanpham',$product_id)->first();
        
        if($product_info->idtheloai!=5){
            $data['id']=$product_info->idsanpham;
            $data['quantity']=$quantity;
            $data['name']=$product_info->tensanpham;
            if($product_info->giakhuyenmai==NULL){
            $data['price']=$product_info->giaban;
            }else{
            $data['price']=$product_info->giakhuyenmai;    
            }
            $data['attributes']['image']=$product_info->hinhanh1;
            $data['attributes']['idtheloai']=$product_info->idtheloai;
            Cart::add($data);
            // Cart::clear();
            if($current_url_home=="http://localhost:8080/luanvan/public/tim-kiem"){
                return Redirect::to('/show-cart');
            }else{
                return redirect()->back();
            }  
        }else{
            $data['id']=$product_info->idsanpham;
            $data['quantity']=1;
            $data['name']=$product_info->tensanpham;
            if($product_info->giakhuyenmai==NULL){
            $data['price']=$product_info->giaban;
            }else{
            $data['price']=$product_info->giakhuyenmai;    
            }
            $data['attributes']['image']=$product_info->hinhanh1;
            $data['attributes']['idtheloai']=$product_info->idtheloai;

            Cart::add($data);
            // Cart::clear();
            if($current_url_home=="http://localhost:8080/luanvan/public/tim-kiem"){
                return Redirect::to('/show-cart');
            }else{
                return redirect()->back();
            }  
        }
            
        // return Redirect::to($current_url_home);
        // echo '<prev>';
        // print_r($data);
        // echo '</prev>';
    }

    public function show_cart(){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();

        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function delete_to_cart($rowId){
        Cart::remove($rowId);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId=$request->cart_productid;
        $quantity=$request->cart_quantity;
        $get_amount=DB::table('losanpham')->where('idsanpham',$rowId)->where('hienthilosanpham',1)->select(DB::raw('SUM(soluongton) as soluongton,idsanpham'))->groupBy('idsanpham')->first();
        if($quantity>$get_amount->soluongton){
            Session::put('message-false','Số lượng sản phẩm hiện tại không đủ!');
            return redirect()->back();
        }else{
        Cart::update($rowId, array(
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            ),
          ));          
        return Redirect::to('/show-cart');
        }
    }
    public function delete_cart(){
        Cart::clear();
        Session::put('idgiamgia',NULL);
        Session::put('tilegiamgia',NULL);
        return Redirect::to('/show-cart');
    }
    public function payment(Request $request){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();

        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();

        $data['tenkhachhang']=$request->customer_cart_name;
        $data['sodienthoai']=$request->customer_cart_phone;
        $data['diachi']=$request->customer_cart_address;
        $data['email']=$request->customer_cart_email;
        // $data['ghichu']=$request->customer_cart_desc;
        // $data['giaohang']=$request->customer_cart_delivery;

        $customer_id=DB::table('khachhang')->insertGetId($data);
        $get_id_magiamgia=DB::table('magiamgia')->where('idmagiamgia',$request->magiamgia)->first();
        $data_donhang['idkhachhang']=$customer_id;
        $data_donhang['ghichu']=$request->customer_cart_desc;
        $data_donhang['giaohang']=$request->customer_cart_delivery;
        $get_total=$request->tongtien;
        if($get_id_magiamgia){
            $data_donhang['tongtien']=$get_total * (100-$get_id_magiamgia->tilegiamgia) /100;
        }
        else{
            $data_donhang['tongtien']=$get_total;
        }
        $data_donhang['dh_magiamgia']=$request->magiamgia;

        $donhang_id=DB::table('donhang')->insertGetId($data_donhang);
        Session::put('tilegiamgia',NULL);
        Session::put('idgiamgia',NULL);
        $items =Cart::getContent();
        foreach($items as $row) {
            $data_donhangchitiet['iddonhang']=$donhang_id;
            $payment_product=DB::table('sanpham')->where('tensanpham',$row->name)->first();
            $data_donhangchitiet['idsanpham']=$payment_product->idsanpham;
            $get_amount_product=DB::table('losanpham')->where('idsanpham',$payment_product->idsanpham)->where('soluongton','>',0)->orderBy('idlosanpham','asc')->first();
            $get_soluong=$get_amount_product->soluongton;
            $data_update_soluong=$get_soluong - $row->quantity;
            if($data_update_soluong<0){
                $data_donhangchitiet['soluongban']=$get_soluong;
                $data_donhangchitiet['dhct_giaban']=$row->price;
                $data_donhangchitiet['idlosanpham']=$get_amount_product->idlosanpham;
                DB::table('losanpham')->where('idlosanpham',$get_amount_product->idlosanpham)->update(['soluongton'=> 0]);
                DB::table('donhangchitiet')->insert($data_donhangchitiet);
                $get_amount_product2=DB::table('losanpham')->where('idsanpham',$payment_product->idsanpham)->where('soluongton','>',0)->orderBy('idlosanpham','asc')->first();
                $amount_final=$get_amount_product2->soluongton + $data_update_soluong;
                DB::table('losanpham')->where('idlosanpham',$get_amount_product2->idlosanpham)->update(['soluongton'=> $amount_final]);
                $data_donhangchitiet['soluongban']=$data_update_soluong * (-1);
                $data_donhangchitiet['idlosanpham']=$get_amount_product2->idlosanpham;
                DB::table('donhangchitiet')->insert($data_donhangchitiet);
            }else{
                DB::table('losanpham')->where('idlosanpham',$get_amount_product->idlosanpham)->update(['soluongton'=> $data_update_soluong]);
                $data_donhangchitiet['soluongban']=$row->quantity;
                $data_donhangchitiet['dhct_giaban']=$row->price;       
                $data_donhangchitiet['idlosanpham']=$get_amount_product->idlosanpham; 
                $donhangchitiet_id=DB::table('donhangchitiet')->insertGetId($data_donhangchitiet);    
            }           
        }
        if($data_donhang['giaohang']==2){
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            Cart::clear();
            $vnp_Returnurl = "http://localhost:8080/luanvan/public/delete-cart";
            $vnp_TmnCode = "ZX1RFJJ9";//Mã website tại VNPAY 
            $vnp_HashSecret = "BNZXXCNLMRSGDJQYABJSHIGGMJIUOYAD"; //Chuỗi bí mật

            $vnp_TxnRef = $donhang_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh toán đơn hàng trực tuyến';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $data_donhang['tongtien']  * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Add Params of 2.0.1 Version
            // $vnp_ExpireDate = $_POST['txtexpire'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef                     
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array('code' => '00'
                , 'message' => 'success'
                , 'data' => $vnp_Url);
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }                
            }else{
                Cart::clear();
                return Redirect::to('/show-cart');  
            }        
    }

    public function payment_account(Request $request){

        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();

        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();
        $get_id_magiamgia=DB::table('magiamgia')->where('idmagiamgia',$request->magiamgia)->first();
        $payment_customer_id=$request->customer_cart_id;
        $details_customer=DB::table('khachhang')->where('idkhachhang',$payment_customer_id)->first();
        // $data['ghichu']=$request->customer_cart_desc;
        // $data['giaohang']=$request->customer_cart_delivery;

        $get_id_magiamgia=DB::table('magiamgia')->where('idmagiamgia',$request->magiamgia)->first();
        $data_donhang['idkhachhang']=$payment_customer_id;
        $data_donhang['ghichu']=$request->customer_cart_desc;
        $data_donhang['giaohang']=$request->customer_cart_delivery;
        $get_total=$request->tongtien;

        if($get_id_magiamgia){
            $data_donhang['tongtien']=$get_total * (100-$get_id_magiamgia->tilegiamgia) /100;
        }else{
            $data_donhang['tongtien']=$get_total;
        }
        $data_donhang['dh_magiamgia']=$request->magiamgia;


        // echo '<prev>';
        // print_r($data_donhang);
        // echo '</prev>';

        $donhang_id=DB::table('donhang')->insertGetId($data_donhang);
        Session::put('tilegiamgia',NULL);
        Session::put('idgiamgia',NULL);
        $items =Cart::getContent();
        foreach($items as $row) {
            $data_donhangchitiet['iddonhang']=$donhang_id;
            $payment_product=DB::table('sanpham')->where('tensanpham',$row->name)->first();
            $data_donhangchitiet['idsanpham']=$payment_product->idsanpham;
            $get_amount_product=DB::table('losanpham')->where('idsanpham',$payment_product->idsanpham)->where('soluongton','>',0)->orderBy('idlosanpham','asc')->first();
            $get_soluong=$get_amount_product->soluongton;
            $data_update_soluong=$get_soluong - $row->quantity;
            if($data_update_soluong<0){
                $data_donhangchitiet['soluongban']=$get_soluong;
                $data_donhangchitiet['dhct_giaban']=$row->price;
                $data_donhangchitiet['idlosanpham']=$get_amount_product->idlosanpham;
                DB::table('losanpham')->where('idlosanpham',$get_amount_product->idlosanpham)->update(['soluongton'=> 0]);
                DB::table('donhangchitiet')->insert($data_donhangchitiet);
                $get_amount_product2=DB::table('losanpham')->where('idsanpham',$payment_product->idsanpham)->where('soluongton','>',0)->orderBy('idlosanpham','asc')->first();
                $amount_final=$get_amount_product2->soluongton + $data_update_soluong;
                DB::table('losanpham')->where('idlosanpham',$get_amount_product2->idlosanpham)->update(['soluongton'=> $amount_final]);
                $data_donhangchitiet['soluongban']=$data_update_soluong * (-1);
                $data_donhangchitiet['idlosanpham']=$get_amount_product2->idlosanpham;
                DB::table('donhangchitiet')->insert($data_donhangchitiet);
            }else{
                DB::table('losanpham')->where('idlosanpham',$get_amount_product->idlosanpham)->update(['soluongton'=> $data_update_soluong]);
                $data_donhangchitiet['soluongban']=$row->quantity;
                $data_donhangchitiet['dhct_giaban']=$row->price;  
                $data_donhangchitiet['idlosanpham']=$get_amount_product->idlosanpham;     
                $donhangchitiet_id=DB::table('donhangchitiet')->insertGetId($data_donhangchitiet);    
            }           
        }
        if($data_donhang['giaohang']==2){
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            Cart::clear();
            $vnp_Returnurl = "http://localhost:8080/luanvan/public/delete-cart";
            $vnp_TmnCode = "ZX1RFJJ9";//Mã website tại VNPAY 
            $vnp_HashSecret = "BNZXXCNLMRSGDJQYABJSHIGGMJIUOYAD"; //Chuỗi bí mật

            $vnp_TxnRef = $donhang_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh toán đơn hàng trực tuyến';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $data_donhang['tongtien']  * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Add Params of 2.0.1 Version
            // $vnp_ExpireDate = $_POST['txtexpire'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef                     
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array('code' => '00'
                , 'message' => 'success'
                , 'data' => $vnp_Url);
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }                
            }else{
                Cart::clear();
                return Redirect::to('/show-cart');  
            }    
    }
    public function use_coupon(Request $request){
        $coupon_code=$request->magiamgia;
        $result=DB::table('magiamgia')->where('magiamgia',$coupon_code)->where('hienthi',1)->first();
        if($result){
            Session::put('tilegiamgia',$result->tilegiamgia);
            Session::put('idgiamgia',$result->idmagiamgia);
            Session::put('get-coupon','Bạn vừa sử dụng thành công mã giảm giá');
        }else{
            Session::put('get-coupon','Mã giảm giá đã nhập sai!');
            Session::put('tilegiamgia',NULL);
            Session::put('idgiamgia',NULL);
        }
        return Redirect::to('/show-cart');    
    }
    public function purchase_history($customerId){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();

        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();
        $name_customer=DB::table('khachhang')->where('idkhachhang',$customerId)->first();
        Session::put('customerId',$customerId);
        Session::put('customer_name',$name_customer->tenkhachhang);
        $order_purchase=DB::table('donhang')->where('donhang.idkhachhang',$customerId)->Join('khachhang','donhang.idkhachhang','=','khachhang.idkhachhang')->get(); 
        return view('pages.cart.show_purchase_history')->with('category',$cate_product)->with('brand',$brand_product)->with('category',$cate_product)->with('order_purchase',$order_purchase);
        // print_r($order_purchase);
    }
    public function details_order_home($orderid){
        $cate_product=DB::table('theloai')->where('hienthi','1')->orderby('idtheloai','asc')->get();

        $brand_product=DB::table('thuonghieu')->where('hienthithuonghieu','1')->orderby('idthuonghieu','desc')->get();
        $product_details=DB::table('donhangchitiet')->where('donhangchitiet.iddonhang',$orderid)->Join('sanpham','donhangchitiet.idsanpham','=','sanpham.idsanpham')->select(DB::raw('SUM(soluongban) as soluongban,sanpham.idsanpham,tensanpham,hinhanh1,giaban,motasanpham,sanpham.idtheloai,sanpham.ngaynhap,hienthisanpham,dhct_giaban'))->groupBy('sanpham.idsanpham')->get();
        $order_purchase=DB::table('donhang')->where('donhang.iddonhang',$orderid)->leftJoin('magiamgia','magiamgia.idmagiamgia','=','donhang.dh_magiamgia')->get(); 

        return view('pages.cart.show_details_order')->with('category',$cate_product)->with('brand',$brand_product)->with('product',$product_details)->with('order_details',$order_purchase);
        // print_r($order_purchase);
    }
}
