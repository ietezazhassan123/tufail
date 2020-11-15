<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserOrder;



class OrderAdmin extends Controller
{
           public function AllOrders()
           {
           	      $UserOrders = UserOrder::where('status','pending')->get();
           	      return view('app.admin.orders.all',['UserOrders'=>$UserOrders]);
           }


           public function AllDeliveredOrder()
           {
           	      $UserOrders = UserOrder::where('status','!=','pending')->get();
           	      return view('app.admin.orders.deliverd',['UserOrders'=>$UserOrders]);
           }


           public function deliver_order($id)
           {
           	      $UserOrder = UserOrder::findOrFail($id);
           	      $UserOrder->status = "deliver";
           	      $UserOrder->save();

           	      return ['success'=>'Order Successfully Delivered'];
           }
}
