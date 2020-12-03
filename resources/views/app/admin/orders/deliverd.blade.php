@extends('app.admin.index2')

@section('mainsection')
  
    <h3 class="pt-4 ml-5">All Delivered Orders</h3> <br />

        <button class="btn btn-md btn-danger ml-5 delete_all_received_orders">Delete All Delivered Order</button>

    
    <div class="card m-5" >
              
              <div class="card-body">
                  <table class="table table-bordered table-condensed" >
	              	   <thead>
	              	   	  <tr>
	              	   	  	  <th><strong><u>Order ID</u></strong></th>
	              	   	  	  <th><strong><u>Created At</u></strong></th>
                              <th><strong><u>Created By</u></strong></th>
	              	   	  	  <th><strong><u>City</u></strong></th>
	              	   	  	  <th><strong><u>Address</u></strong></th>
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
                                       <td>{{ $UserOrder->email }}</td>
                                       <td>{{ $UserOrder->city }}</td>
                                       <td>{{ $UserOrder->address }}</td>
                                   	   <td> <span class="badge badge-warning">{{ strtoupper($UserOrder->status) }}</span></td>
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
                                             @if($UserOrder->status == "Received")
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
                          title: 'Deliver it?',
                          text: "You won't be able to revert this!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, Deliver it!'
                    }).then((result) => {
                          if (result.isConfirmed) {
                                axios.get('receive_order/'+order_id)
                                .then((response)=>{
                                       if(response.data.success)
                                       {
                                               Swal.fire(
                                                    'Delived?',
                                                    'Order Successfully Delivered?',
                                                    'success'
                                                );
                                               location.reload();
                                       }
                                });
                          }
                    })
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
    })
</script>
@endsection