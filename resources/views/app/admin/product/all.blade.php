@extends('app.admin.index')

@section('mainsection')
  
    <h3 class="pt-4 ml-5">Products</h3>

            @if($message = Session::get('success'))
                <div class="row offset-md-2">
						<div class="col-md-8 alert alert-success alert-block">
							<button type="button" class="close" data-dismiss="alert">×</button>	
						        <strong>{{ $message }}</strong>
						</div>
			    </div>
			@endif
    
    <div class="card m-5" >
              <div class="card-header">
                   <a class="btn btn-md btn-success float-right" href="{{ route('Product.create') }}">Create New Product</a>
              </div>
              <div class="card-body">
                  <table class="table table-bordered table-condensed" >
	              	   <thead>
	              	   	  <tr>
	              	   	  	  <th><strong><u>Name</u></strong></th>
	              	   	  	  <th><strong><u>Description</u></strong></th>
	              	   	  	  <th><strong><u>Category</u></strong></th>
	              	   	  	  <th><strong><u>Sub Category</u></strong></th>
	              	   	  	  <th><strong><u>Image</u></strong></th>
	              	   	  	  <th><strong><u>Edit</u></strong></th>
	              	   	  	  <th><strong><u>Delete</u></strong></th>
	              	   	  </tr>
	              	   </thead>


	              	    <tbody>
	              	    	  @foreach($Products as $Product)
				              	   	  <tr>
				              	   	  	  <td>{{ $Product->name }}</td>
				              	   	  	  <td>{{ $Product->description }}</td>
				              	   	  	  <td>{{ $Product->category->name }}</td>
				              	   	  	  <td>{{ $Product->sub_category->name }}</td>
				              	   	  	  <td>
				              	   	  	  	  @if($Product->product_images->first() != null)
				              	   	  	  	       <img src="http://localhost/shopping/public/Images/Products/{{ $Product->product_images->first()->image_path }}" width="100px">
				              	   	  	  	  @else
				              	   	  	  	       No Image
				              	   	  	  	  @endif
				              	   	  	  </td>
				              	   	  	  <td><button class="btn btn-md btn-primary edit_category" data-eid="{{ $Product->id }}">Edit</button></td>
				              	   	  	  <td><button class="btn btn-md btn-danger delete_category" data-did="{{ $Product->id }}">Delete</button></td>
				              	   	  </tr>
		              	   	  @endforeach
	              	   </tbody>
	              </table>
              </div>
    </div>




<script type="text/javascript">
		 $(document).ready(function() {


		 	          $.ajaxSetup({
				             headers: {
			       	             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		                   }
		              });



		              $('body').on('click','.delete_category',function(){
		              	        let id = $(this).data('did');

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
										    axios.delete('Product/'+id)
										    .then(()=>{
										    	    Swal.fire(
													      'Deleted!',
													      'Product has been deleted.',
													      'success'
												    );

												    location.reload();
										    })  
								        }
								});
		              });





		              $('body').on('click','.edit_category',function(){
                               let id = $(this).data('eid');
                               window.location = "Product/"+id+"/edit";
		              });



	     });
</script>


@endsection