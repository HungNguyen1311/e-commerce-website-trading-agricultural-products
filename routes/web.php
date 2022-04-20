<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
//Frontend
Route::get('/',[HomeController::class, 'index']);
Route::get('/trang-chu',[HomeController::class, 'index']);
Route::get('/lien-he',[HomeController::class, 'contact']);
Route::get('/object-detection',[HomeController::class, 'object_detection']);
Route::get('/more-details-detect/{name_product}',[HomeController::class, 'more_details_detect']);
Route::post('/post-image',[HomeController::class, 'post_image']);
Route::post('/tim-kiem',[HomeController::class, 'search']);
Route::post('/post-image',[HomeController::class, 'post_image']);

//DanhMucSanPham
Route::get('/danhmucsanpham/{category_product_id}',[CategoryProduct::class, 'show_category_home']);
Route::get('/khuyen-mai',[CategoryProduct::class, 'show_promotion_cate']);
Route::get('/danhmucsanpham/{category_product_id}/{condition}',[CategoryProduct::class, 'show_category_home_condition']);
Route::get('/sanphammoi',[CategoryProduct::class, 'show_new_product']);
Route::get('/chitietsanpham/{product_id}',[ProductController::class, 'details_product']);

//Backend
Route::get('/admin',[AdminController::class, 'index']);
Route::get('/dashboard',[AdminController::class, 'show_dashboard']);
Route::get('/logout',[AdminController::class, 'logout']);
Route::get('/validation-dashboard',[AdminController::class, 'validation']);
Route::post('/admin-dashboard',[AdminController::class, 'dashboard']);
Route::post('/save-validation',[AdminController::class, 'save_validation']);
Route::post('/filter-by-date',[AdminController::class, 'filter_by_date']);
Route::post('/dashboard-filter',[AdminController::class, 'dashboard_filter']);
Route::post('/days-order',[AdminController::class, 'days_order']);

//Category-product
Route::get('/add-category-product',[CategoryProduct::class, 'add_category_product']);
Route::get('/all-category-product',[CategoryProduct::class, 'all_category_product']);
Route::get('/edit-category-product/{category_product_id}',[CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}',[CategoryProduct::class, 'delete_category_product']);

Route::get('/unactive-category-product/{category_product_id}',[CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}',[CategoryProduct::class, 'active_category_product']);

Route::post('/save-category-product',[CategoryProduct::class, 'save_category_product']);
Route::post('/update-category-product/{category_product_id}',[CategoryProduct::class, 'update_category_product']);

//brand-product
Route::get('/add-brand-product',[BrandProduct::class, 'add_brand_product']);
Route::get('/all-brand-product',[BrandProduct::class, 'all_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}',[BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}',[BrandProduct::class, 'delete_brand_product']);

Route::get('/unactive-brand-product/{brand_product_id}',[BrandProduct::class, 'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}',[BrandProduct::class, 'active_brand_product']);

Route::post('/save-brand-product',[BrandProduct::class, 'save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}',[BrandProduct::class, 'update_brand_product']);

//Product
Route::get('/add-product',[ProductController::class, 'add_product']);
Route::post('/add-product',[ProductController::class, 'add_product']);
Route::get('/all-product',[ProductController::class, 'all_product']);
Route::get('/edit-product/{product_id}',[ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}',[ProductController::class, 'delete_product']);
Route::get('/add-sub-product',[ProductController::class, 'add_sub_product']);
Route::get('/unactive-product/{product_id}',[ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}',[ProductController::class, 'active_product']);
Route::get('/all-package-product/{product_id}',[ProductController::class, 'all_package_product']);
Route::get('/show-sub-product',[ProductController::class, 'show_sub_product']);

Route::get('/delete-package-product/{package_id}',[ProductController::class, 'delete_package_product']);
Route::get('/edit-package-product/{package_id}',[ProductController::class, 'edit_package_product']);

Route::post('/save-product',[ProductController::class, 'save_product']);
Route::post('/save-package-product/{amount_product}',[ProductController::class, 'save_package_product']);
Route::post('/save-info-product',[ProductController::class, 'save_info_product']);
Route::post('/update-product/{product_id}',[ProductController::class, 'update_product']);
Route::post('/update-package-product/{package_id}',[ProductController::class, 'update_package_product']);
Route::post('/tim-kiem-sanpham',[ProductController::class, 'search_product_admin']);



//Cart
Route::post('/save-cart',[CartController::class, 'save_cart']);
Route::post('/save-home-cart',[CartController::class, 'save_home_cart']);
Route::post('/update-cart-quantity',[CartController::class, 'update_cart_quantity']);
Route::post('/payment',[CartController::class, 'payment']);
Route::post('/payment-account',[CartController::class, 'payment_account']);
Route::post('/use-coupon',[CartController::class, 'use_coupon']);
Route::get('/show-cart',[CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}',[CartController::class, 'delete_to_cart']);
Route::get('/delete-cart',[CartController::class, 'delete_cart']); 
Route::get('/purchase-history/{customerId}',[CartController::class, 'purchase_history']); 
Route::get('/details-order-home/{orderId}',[CartController::class, 'details_order_home']);
// Ajax-cart
Route::post('/add-cart-ajax',[CartController::class, 'add_cart_ajax']);

//Check-out
Route::get('/login-checkout',[CheckoutController::class, 'login_checkout']);  
Route::get('/validation',[CheckoutController::class, 'validation']);  
Route::get('/logout-checkout',[CheckoutController::class, 'logout_checkout']);  
Route::post('/add-customer',[CheckoutController::class, 'add_customer']); 
Route::post('/login-account',[CheckoutController::class, 'login_account']); 

//Promotion
Route::get('/all-promotion',[PromotionController::class, 'all_promotion']);
Route::get('/add-promotion',[PromotionController::class, 'add_promotion']);
Route::get('/edit-promotion-product/{promotion_product_id}',[PromotionController::class, 'edit_promotion_product']);
Route::get('/delete-promotion-product/{promotion_product_id}',[PromotionController::class, 'delete_promotion_product']);
Route::post('/add-promotion',[PromotionController::class, 'add_promotion']);
Route::post('/save-promotion',[PromotionController::class, 'save_promotion']);
Route::post('/update-promotion-product/{promotion_product_id}',[PromotionController::class, 'update_promotion_product']);
Route::get('/all-coupon',[PromotionController::class, 'all_coupon']);
Route::get('/add-coupon',[PromotionController::class, 'add_coupon']);
Route::post('/save-coupon',[PromotionController::class, 'save_coupon']);
Route::get('/edit-coupon-product/{coupon_product_id}',[PromotionController::class, 'edit_coupon_product']);
Route::post('/update-coupon-product/{coupon_product_id}',[PromotionController::class, 'update_coupon_product']);
Route::get('/delete-coupon/{coupon_product_id}',[PromotionController::class, 'delete_coupon']);
Route::get('/unactive-coupon/{couponId}',[PromotionController::class, 'unactive_coupon']);
Route::get('/active-coupon/{couponId}',[PromotionController::class, 'active_coupon']);

// order
Route::get('/all-order',[OrderController::class, 'all_order']);
Route::get('/add-order',[OrderController::class, 'add_order']);
Route::get('/unprocessed-order',[OrderController::class, 'unprocessed_order']);
Route::get('/complete-order',[OrderController::class, 'complete_order']);
Route::get('/edit-order-product/{order_product_id}',[OrderController::class, 'edit_order_product']);
Route::get('/show-order-product/{order_product_id}',[OrderController::class, 'show_order_product']);
Route::get('/delete-order-product/{order_product_id}',[OrderController::class, 'delete_order_product']);
Route::post('/update-order-product/{order_product_id}',[OrderController::class, 'update_order_product']);
Route::post('/add-order',[OrderController::class, 'add_order']);
Route::post('/save-order',[OrderController::class, 'save_order']);
//banner
Route::get('/edit-banner/{banner_product_id}',[BannerController::class, 'edit_banner']);
Route::get('/show-banner/{banner_product_id}',[BannerController::class, 'show_banner']);
Route::get('/delete-banner/{banner_product_id}',[BannerController::class, 'delete_banner']);
Route::get('/add-banner',[BannerController::class, 'add_banner']);
Route::post('/update-banner/{banner_product_id}',[BannerController::class, 'update_banner']);
Route::post('/save-banner',[BannerController::class, 'save_banner']);
Route::get('/show-banner',[BannerController::class, 'all_banner']);
Route::get('/unactive-banner/{bannerId}',[BannerController::class, 'unactive_banner']);
Route::get('/active-banner/{bannerId}',[BannerController::class, 'active_banner']);
//form
Route::get('/all-form',[FormController::class, 'all_form']);
Route::get('/show-form/{form_product_id}',[FormController::class, 'show_form']);
//Customer
Route::get('/show-customer',[CustomerController::class, 'show_customer']);
Route::get('/show-customer-order/{customerId}',[CustomerController::class, 'show_customer_order']);

//ckeditor
Route::post('/uploads-ckeditor',[ProductController::class, 'ckeditor_image']);
Route::get('/file-browser',[ProductController::class, 'file_browser']);

//Post
Route::get('/all-post',[PostController::class, 'all_post']);
Route::get('/add-post',[PostController::class, 'add_post']);
Route::get('/delete-post/{post_id}',[PostController::class, 'delete_post']);
Route::get('/edit-post/{post_id}',[PostController::class, 'edit_post']);
Route::post('/save-post',[PostController::class, 'save_post']); 
Route::post('/update-post/{post_id}',[PostController::class, 'update_post']); 
Route::get('/unactive-post/{post_id}',[PostController::class, 'unactive_post']);
Route::get('/active-post/{post_id}',[PostController::class, 'active_post']);

//Baiviet-fronend
Route::get('/bai-viet',[PostController::class, 'show_post']);
Route::get('/chitietbaiviet/{post_id}',[PostController::class, 'post_details']);