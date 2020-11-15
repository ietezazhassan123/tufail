<?php

namespace App\Http\Controllers;

use App\UserOrder;
use Illuminate\Http\Request;


use Auth;
use App\Product;
use App\OrderProduct;


class UserOrderController extends Controller
{
                        
                        public function __construct()
                        {
                                $this->middleware('auth');
                        }


                        public function CheckOut()
                          {
                                return view('app.store.checkout');
                          }


                        public function index()
                        {
                               $UserOrders = UserOrder::where('status','pending')->where('user_id',Auth::user()->id)->get();
                               return view('app.user.orders.view_all_pending_orders',['UserOrders'=>$UserOrders]);
                        }

                        
                        public function create()
                        {
                            //
                        }

                        
                        public function store(Request $request)
                        {
                            //
                        }

                        public function show(UserOrder $userOrder)
                        {
                            //
                        }

                        
                        public function edit(UserOrder $userOrder)
                        {
                            //
                        }

                        
                        public function update(Request $request, UserOrder $userOrder)
                        {
                            //
                        }

                       
                        public function destroy(UserOrder $userOrder)
                        {
                            //
                        }



                        public function PlaceOrder(Request $request)
                        {
                                $request->validate([
                                    'mobileno' => 'required',
                                    'address' => 'required',
                                    'city' => 'required'
                                ],[
                                    'mobileno.required' => 'Mobile Number is Required',
                                    'address.required' => 'Address is Required',
                                    'city.required' => 'City is Required',
                                ]);

                                

                                $cart = $request->session()->has('cart') ? $request->session()->get('cart') : [];

                                $UserOrder = new UserOrder;
                                $UserOrder->user_id = Auth::user()->id;
                                $UserOrder->name = Auth::user()->name ;
                                $UserOrder->email = Auth::user()->email ;
                                $UserOrder->city = $request->city ;
                                $UserOrder->mobile_number = $request->mobileno ;
                                $UserOrder->address = $request->address ;

                                $total = 0;
                                foreach ($cart as $key => $value)
                                {
                                    $total = $total+($value['qty']*$value['price']);
                                }
                                $UserOrder->totalPrice = $total;
                                $UserOrder->save();


                                foreach ($cart as $key => $value) 
                                {
                                       $OrderProduct = new OrderProduct;
                                       $OrderProduct->order_id = $UserOrder->id ;
                                       $OrderProduct->product_id =  $key;
                                       $OrderProduct->product_qty =  $value['qty'];
                                       $OrderProduct->product_price =  $value['price'];
                                       $OrderProduct->save();

                                }

                                $request->session()->forget('cart');
                                return ['success'=>'Order Placed Successfully'];
                        }




                        public function MyPendingOrder()
                        {
                                $UserOrders = UserOrder::where('status','pending')->where('user_id',Auth::user()->id)->get();
                                return view('app.user.orders.view_all_pending_orders',['UserOrders'=>$UserOrders]);
                        }


                        public function MyDeliveredOrder()
                        {
                               $UserOrders = UserOrder::where('status','!=','pending')->where('user_id',Auth::user()->id)->get();
                               return view('app.user.orders.view_all_deliver_orders',['UserOrders'=>$UserOrders]);
                        }



                        public function receive_order($id)
                        {
                              $UserOrder = UserOrder::findOrFail($id);
                              $UserOrder->status = "Received";
                              $UserOrder->save();

                              return ['success'=>'Order Successfully Received'];
                        }
}
