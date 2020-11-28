<?php

namespace App\Http\Controllers;


use App\UserOrder;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;




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

                  Mail::to($UserOrder->get_order_user)->send(new OrderShipped($UserOrder));

           	      return ['success'=>'Order Successfully Delivered'];
           }
}
