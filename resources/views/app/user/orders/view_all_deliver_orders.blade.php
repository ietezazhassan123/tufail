@extends('app.user.index2')

@section('mainsection')
  
    <h3 class="pt-4 ml-5">All Delivered Orders</h3>

    <button class="btn btn-md btn-danger ml-5 delete_all_received_orders">Delete All Delivered Order</button>


    
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
	              	   	  	  <th><strong><u>Action</u></strong></th>
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
                                   	   <td>
                                   	   	   @if($UserOrder->status == 'deliver')
                                   	   	      <button class="btn btn-md btn-success Receive_order" data-oid="{{ $UserOrder->id }}">Receive</button>
                                   	       @else
                                               <span class="badge badge-warning">Received</span> <br />
                                               <button class="btn btn-md btn-danger delete_deliver_order" data-id="{{ $UserOrder->id }}">Delete</button>
                                           @endif
                                   	   </td>
                                   </tr>
	              	   	     @endforeach
	              	   </tbody>

	              </table>
              </div>
    </div>



<script type="text/javascript">
	$(document).ready(function(){
               $('.Receive_order').on('click',function(){
                         let order_id = $(this).data('oid');

                         Swal.fire({
	                          title: 'Receive it?',
	                          text: "You won't be able to revert this!",
	                          icon: 'warning',
	                          showCancelButton: true,
	                          confirmButtonColor: '#3085d6',
	                          cancelButtonColor: '#d33',
	                          confirmButtonText: 'Yes, Receive it!'
	                     }).then((result) => {
	                          if (result.isConfirmed) {
	                                axios.get('receive_order/'+order_id)
	                                .then((response)=>{
	                                       if(response.data.success)
	                                       {
	                                               Swal.fire(
	                                                    'Received?',
	                                                    'Order Successfully Received',
	                                                    'success'
	                                                );
	                                               location.reload();
	                                       }
	                                });
	                          }
	                     });
               });





               $('.delete_deliver_order').on('click',function(){
                      let id =  $(this).data('id');
                      
                      Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                            if (result.isConfirmed) {
                                  axios.get('delete_order/'+id)
                                  .then((response)=>{
                                       if(response.data.success)
                                       {
                                            Swal.fire(
                                              'Deleted!',
                                              'This Order Successfully Delete.',
                                              'success'
                                            );
                                            location.reload();
                                       }
                                  });
                            }
                      });
               });



               $('.delete_all_received_orders').on('click',function(){
                      Swal.fire({
                            title: 'Are you sure?',
                            text: "You Are Sure to Delete All Delivered Order!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                            if (result.isConfirmed) {
                                  axios.get('delete_received_orders')
                                  .then((response)=>{
                                       if(response.data.success)
                                       {
                                            Swal.fire(
                                              'Deleted!',
                                              'All Received Order Deleted Successfully.',
                                              'success'
                                            );
                                            location.reload();
                                       }
                                  });
                            }
                      });
               });








	}); 
</script>
@endsection