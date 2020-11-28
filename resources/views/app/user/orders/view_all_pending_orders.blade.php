@extends('app.user.index2')

@section('mainsection')
  
    <h3 class="pt-4 ml-5">All Pending Orders</h3>
    
    <div class="card m-5" >
              <div class="card-body">
                  <table class="table table-bordered table-condensed" >
	              	   <thead>
	              	   	  <tr>
	              	   	  	  <th><strong><u>Order ID</u></strong></th>
	              	   	  	  <th><strong><u>Created At</u></strong></th>
	              	   	  	  <th><strong><u>Status</u></strong></th>
	              	   	  	  <th><strong><u>Products</u></strong></th>
	              	   	  	  <th><strong><u>Total Price</u></strong></th>
	              	   	  </tr>
	              	   </thead>


	              	   <tbody> 
	              	   	     @foreach($UserOrders as $UserOrder) 
                                   <tr>
                                   	   <td>{{ $UserOrder->id }}</td>
                                   	   <td>{{ $UserOrder->created_at }}</td>
                                   	   <td>{{ $UserOrder->status }}</td>
                                   	   <td>
                                                   <table>
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Qty</th>
                                                                <th>Price</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>   
                                                            @foreach($UserOrder->products as $Single_Product)
                                                                 <tr>
                                                                      <td>{{ $Single_Product->product->name }}</td>
                                                                      <td>{{ $Single_Product->product_qty }}</td>
                                                                      <td>{{ $Single_Product->product_price }}</td>
                                                                 </tr>
                                                            @endforeach
                                                        </tbody>
                                                        
                                                   </table>
                                       </td>
                                   	   <td>{{ $UserOrder->totalPrice }}</td>
                                   </tr>
	              	   	     @endforeach
	              	   </tbody>

	              </table>
              </div>
    </div>

@endsection