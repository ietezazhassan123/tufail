<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;
use App\Product;
use App\UserOrder;
use App\OrderProduct;


class UserDealingProduct extends Controller
{



           public function ShowAllProducts()
           {
           	        $Products = Product::all();
                    return view('app.store.all_products',['Products'=>$Products]);
           }


           public function ProductQuickView($id)
           {
           	        $Product = Product::findOrFail($id);
           	        return view('app.store.quick_view',['Product'=>$Product]);
           }


           public function Add_to_cart(Request $request,$id,$qty)
           {
           	        $cart = $request->session()->has('cart') ? $request->session()->get('cart') : [];
           	        if(array_key_exists($id, $cart))
           	        {
                            $cart[$id]['qty'] = $cart[$id]['qty']+$qty;
           	        }else{
           	        	    $product = Product::findOrFail($id);
           	        	    $cart[$id] = [
      				                 'name' => $product->name,
      				                 'qty' => $qty,
      				                 'description' => $product->description,
      				                 'price' => $product->price,
      				                 'image' => $product->product_images->first()->image_path
      				             ];
           	        }

           	        $request->session()->put('cart',$cart);
           	        return ['success'=>'Product Successfully Added to Cart'];
           }



           public function View_Cart()
           {
           	      return view('app.store.cart');
           }



           public function clear_cart(Request $request)
           {
           	       $request->session()->flush();
           }



           public function remove_product_from_cart(Request $request,$id)
           {
                    $cart = $request->session()->has('cart') ? $request->session()->get('cart') : [];
                    if(array_key_exists($id, $cart))
                    {
                           unset($cart[$id]);
                    }

                    $request->session()->put('cart',$cart);

                    $total = 0;
                    foreach ($cart as $key => $value) {
                         $total = $total+ $value['price']*$value['qty'];
                    }
                    return ['success'=>'Product Successfully Removed from Cart' , 'total'=>$total];
           }



          public function change_qty_from_cart(Request $request,$id,$qty)
          {
                   $cart = $request->session()->has('cart') ? $request->session()->get('cart') : [];
                    if(array_key_exists($id, $cart))
                    {
                            $cart[$id]['qty'] = $qty;
                    }else{
                          $product = Product::findOrFail($id);
                          $cart[$id] = [
                             'name' => $product->name,
                             'qty' => $qty,
                             'description' => $product->description,
                             'price' => $product->price,
                             'image' => $product->product_images->first()->image_path
                         ];
                    }

                    $request->session()->put('cart',$cart);
                    return ['success'=>'Product Successfully Added to Cart'];
          }








}
