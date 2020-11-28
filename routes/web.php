<?php

use Illuminate\Support\Facades\Route;

use App\Category;
use App\Product;

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

Route::get('/', function () {
			$Categories = Category::all();
			$Products = Product::inRandomOrder()->limit(9)->get();
			$ProductsSide = Product::inRandomOrder()->limit(3)->get();
		    return view('welcome',['Categories'=>$Categories , 'Products'=>$Products , 'ProductsSide'=>$ProductsSide]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('master',function(){
	  return view('layouts.master');
});


Route::resource('Category','CategoryController');
Route::resource('SubCategory','SubCategoryController');
Route::resource('Product','ProductController');

Route::get('category_related_subcategory/{id}','CategoryController@category_related_subcategory')->name('category_related_subcategory');
Route::post('store_image_id_for_deletion/{id}','ProductController@store_image_id_for_deletion');



Route::get('AdminPanel','AdminCont@index')->name('AdminPanel');
Route::get('UserPanel','NormalUserCont@index')->name('UserPanel');


Route::get('Show/All/Products','UserDealingProduct@ShowAllProducts')->name('ShowAllProducts');
Route::get('Product/Quick/View/{id}','UserDealingProduct@ProductQuickView')->name('ProductQuickView');

Route::get('Add_to_cart/{id}/{qty}','UserDealingProduct@Add_to_cart')->name('Add_to_cart');
Route::get('change_qty_from_cart/{id}/{qty}','UserDealingProduct@change_qty_from_cart')->name('change_qty_from_cart');
Route::get('View_Cart','UserDealingProduct@View_Cart')->name('View_Cart');


Route::get('clear_cart','UserDealingProduct@clear_cart')->name('clear_cart');
Route::get('remove_product_from_cart/{id}','UserDealingProduct@remove_product_from_cart')->name('remove_product_from_cart');


Route::get('CheckOut','UserOrderController@CheckOut')->name('CheckOut');
Route::post('PlaceOrder','UserOrderController@PlaceOrder')->name('PlaceOrder');




Route::resource('Orders','UserOrderController');

Route::get('MyPendingOrder','UserOrderController@MyPendingOrder')->name('MyPendingOrder');
Route::get('MyDeliveredOrder','UserOrderController@MyDeliveredOrder')->name('MyDeliveredOrder');
Route::get('receive_order/{id}','UserOrderController@receive_order')->name('receive_order');


Route::get('AllOrders','OrderAdmin@AllOrders')->name('AllOrders');
Route::get('deliver_order/{id}','OrderAdmin@deliver_order')->name('deliver_order');
Route::get('AllDeliveredOrder','OrderAdmin@AllDeliveredOrder')->name('AllDeliveredOrder');



Route::get('search_based_on_subcategory/{id}','SearchController@search_based_on_subcategory')->name('search_based_on_subcategory');
Route::post('search_products_based_on_filter','SearchController@search_products_based_on_filter')->name('search_products_based_on_filter');
Route::post('search_products_based_on_filter_for_login_user','SearchController@search_products_based_on_filter_for_login_user')->name('search_products_based_on_filter_for_login_user');



Route::get('UpdateProfile','Profile@UpdateProfile')->name('UpdateProfile');
Route::post('update_user_profile','Profile@update_user_profile')->name('update_user_profile');